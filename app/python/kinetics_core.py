"""
kinetics_core.py
Pure numpy/scipy logic for generic color-change kinetics analysis.
No cv2 / video dependency here on purpose, so this module can be unit-tested
with synthetic signals before touching real video files.

Design summary
---------------
1. `color_distance`: a direction-agnostic "reaction progress" signal —
   Euclidean distance in RGB space from a reference color. Unlike grayscale
   luminance (0.299R + 0.587G + 0.114B), this reacts to ANY hue change
   (green->red, red->yellow, blue->green, ...), not just the ones that
   happen to move total brightness.
2. `detect_segments`: finds abrupt drops in that signal (sudden jumps back
   toward the reference color = the solution was shaken/reset) and splits
   the timeline into segments at those points. A monotonic, single-direction
   video naturally yields exactly one segment (no drops found) — this is
   what makes the same code path handle monotonic AND cyclic data.
3. `fit_orders` / `analyze_segment`: the same zero/first/second-order
   linearization used in the original script, refactored into a reusable
   function and applied per-segment, with a LOCAL reference color
   (recomputed at the start of each segment) so every cycle is treated as
   its own clean, independent "reaction run" — the automated equivalent of
   manually trimming each cycle.
"""
import math
import numpy as np
from scipy.stats import linregress
from scipy.signal import savgol_filter

# ---------------------------------------------------------------------------
# Tunable constants (documented so they're easy to adjust per reaction type)
# ---------------------------------------------------------------------------
REF_WINDOW_SECONDS = 0.5      # how much of the start of a segment to average for its reference color
RESET_SIGMA = 6.0             # how many robust-sigma a frame-to-frame drop must be to count as a "reset"
MIN_SEGMENT_SECONDS = 2.0     # segments shorter than this are merged into a neighbour (too short to fit reliably)
SMOOTH_MAX_FRAC = 0.03        # smoothing window as a fraction of segment length (detection only, not regression)
SMOOTH_MIN_WINDOW = 5
SMOOTH_MAX_WINDOW = 25


def safe_linregress(x, y):
    try:
        return linregress(x, y)
    except Exception:
        return None


def lr_obj_to_dict(lr):
    if lr is None:
        return {'slope': None, 'intercept': None, 'r_value': None, 'p_value': None, 'stderr': None, 'r2': None}
    r2 = float(lr.rvalue ** 2) if getattr(lr, 'rvalue', None) is not None else None
    return {
        'slope': float(lr.slope),
        'intercept': float(lr.intercept),
        'r_value': float(lr.rvalue),
        'p_value': float(lr.pvalue),
        'stderr': float(lr.stderr) if lr.stderr is not None else None,
        'r2': r2,
    }


def smooth_signal(signal):
    """Light denoising used ONLY for segment/cycle detection, never for the
    actual regression, so reported R^2 always reflects the real per-frame data."""
    n = len(signal)
    if n < SMOOTH_MIN_WINDOW:
        return np.asarray(signal, dtype=float).copy()
    win = int(max(SMOOTH_MIN_WINDOW, min(SMOOTH_MAX_WINDOW, round(n * SMOOTH_MAX_FRAC))))
    if win % 2 == 0:
        win += 1
    if win >= n:
        win = n - 1 if (n - 1) % 2 == 1 else n - 2
    if win < 3:
        return np.asarray(signal, dtype=float).copy()
    try:
        return savgol_filter(np.asarray(signal, dtype=float), window_length=win, polyorder=2)
    except Exception:
        return np.asarray(signal, dtype=float).copy()


def compute_reference_color(R, G, B, fps, window_seconds=REF_WINDOW_SECONDS, start=0):
    """Average color over a short window instead of a single frame, so one
    noisy/glare frame can't skew the whole reference."""
    n = max(1, int(round(window_seconds * fps)))
    end = min(len(R), start + n)
    end = max(end, start + 1)
    return (
        float(np.mean(R[start:end])),
        float(np.mean(G[start:end])),
        float(np.mean(B[start:end])),
    )


def compute_color_distance(R, G, B, ref):
    R0, G0, B0 = ref
    R = np.asarray(R, dtype=float)
    G = np.asarray(G, dtype=float)
    B = np.asarray(B, dtype=float)
    return np.sqrt((R - R0) ** 2 + (G - G0) ** 2 + (B - B0) ** 2)


def detect_segments(time_arr, R, G, B, fps):
    """Return a list of (start_idx, end_idx) index pairs (inclusive).

    Works by looking for sudden, large drops in the *global* color-distance
    signal (computed from a single reference at the very start of the clip).
    A sudden drop means the color jumped back toward the starting color —
    i.e. the solution was shaken/reset. A purely monotonic reaction has no
    such drop and yields a single segment covering the whole clip.
    """
    n = len(time_arr)
    if n < 5:
        return [(0, n - 1)] if n > 0 else []

    ref0 = compute_reference_color(R, G, B, fps, start=0)
    global_signal = compute_color_distance(R, G, B, ref0)
    smoothed = smooth_signal(global_signal)

    diff = np.diff(smoothed)
    if len(diff) == 0:
        return [(0, n - 1)]

    med = np.median(diff)
    mad = np.median(np.abs(diff - med)) + 1e-9
    # robust z-score threshold (1.4826 converts MAD to a std-equivalent for normal data)
    threshold = med - RESET_SIGMA * 1.4826 * mad

    raw_reset_idx = np.where(diff < threshold)[0]  # drop happens between i and i+1

    min_len = max(3, int(round(MIN_SEGMENT_SECONDS * fps)))

    # cluster adjacent/nearby reset indices (one physical shake can span a few frames)
    boundaries = []
    for idx in raw_reset_idx:
        if not boundaries or idx - boundaries[-1] > max(3, min_len // 4):
            boundaries.append(int(idx))

    if not boundaries:
        return [(0, n - 1)]

    starts = [0] + [b + 1 for b in boundaries]
    ends = [b for b in boundaries] + [n - 1]

    segments = []
    for s, e in zip(starts, ends):
        if e - s + 1 >= min_len:
            segments.append((s, e))
        elif segments:
            # too short on its own: fold into the previous segment
            ps, _pe = segments[-1]
            segments[-1] = (ps, e)
        # if it's the very first chunk and too short, it just gets dropped
        # (e.g. a stray reset detected in the first fraction of a second)

    if not segments:
        segments = [(0, n - 1)]

    return segments


def fit_orders(t, y):
    """Zero/first/second-order linearization + R^2 for one (t, y) series.
    y must already be a non-negative 'reaction progress' proxy."""
    t = np.asarray(t, dtype=float)
    y = np.asarray(y, dtype=float) + 1e-9  # avoid hard zeros

    zr = safe_linregress(t, y)

    y_log_safe = y.copy()
    min_val = np.min(y_log_safe)
    if min_val <= 0:
        y_log_safe = y_log_safe + abs(min_val) + 1e-9
    fr = safe_linregress(t, np.log(y_log_safe))

    y_inv_safe = y.copy()
    y_inv_safe[y_inv_safe <= 0] = 1e-9
    sr = safe_linregress(t, 1.0 / y_inv_safe)

    r2_values = {
        'Zero-order': float(zr.rvalue ** 2) if zr is not None else 0.0,
        'First-order': float(fr.rvalue ** 2) if fr is not None else 0.0,
        'Second-order': float(sr.rvalue ** 2) if sr is not None else 0.0,
    }
    best_order = max(r2_values, key=r2_values.get)
    best_r2 = r2_values[best_order]

    regression_results = {
        'Zero-order': lr_obj_to_dict(zr),
        'First-order': lr_obj_to_dict(fr),
        'Second-order': lr_obj_to_dict(sr),
        'Best_Order': best_order,
        'Best_R2': best_r2,
    }

    k_zero = abs(regression_results['Zero-order']['slope']) if regression_results['Zero-order']['slope'] is not None else 0.0
    k_first = abs(regression_results['First-order']['slope']) if regression_results['First-order']['slope'] is not None else 0.0
    k_second = abs(regression_results['Second-order']['slope']) if regression_results['Second-order']['slope'] is not None else 0.0

    y0 = float(y[0]) if len(y) > 0 else 0.0
    half_life = {
        'zero': (y0 / (2 * k_zero)) if k_zero > 0 else None,
        'first': (math.log(2) / k_first) if k_first > 0 else None,
        'second': (1.0 / (k_second * y0)) if (k_second > 0 and y0 > 0) else None,
    }

    return {
        'regression_results': regression_results,
        'k': {'zero': k_zero, 'first': k_first, 'second': k_second},
        'half_life': half_life,
        'best_order': best_order,
        'best_r2': best_r2,
        'n_points': int(len(y)),
    }


def analyze_segments(time_arr, R, G, B, fps):
    """Full pipeline: detect cycles, then analyze each cycle independently
    with its own local reference color and its own local time axis (t=0 at
    the start of that cycle). Works unchanged whether the data turns out to
    be one monotonic segment or many cyclic ones."""
    time_arr = np.asarray(time_arr, dtype=float)
    R = np.asarray(R, dtype=float)
    G = np.asarray(G, dtype=float)
    B = np.asarray(B, dtype=float)

    idx_segments = detect_segments(time_arr, R, G, B, fps)

    segments_out = []
    for i, (s, e) in enumerate(idx_segments):
        seg_t_global = time_arr[s:e + 1]
        seg_R = R[s:e + 1]
        seg_G = G[s:e + 1]
        seg_B = B[s:e + 1]

        if len(seg_t_global) < 3:
            continue  # not enough points to fit anything meaningful

        local_ref = compute_reference_color(seg_R, seg_G, seg_B, fps, start=0)
        local_signal = compute_color_distance(seg_R, seg_G, seg_B, local_ref)
        t_local = seg_t_global - seg_t_global[0]

        fit = fit_orders(t_local, local_signal)

        segments_out.append({
            'segment_index': i,
            'start_time': float(seg_t_global[0]),
            'end_time': float(seg_t_global[-1]),
            'duration': float(seg_t_global[-1] - seg_t_global[0]),
            'n_points': fit['n_points'],
            'reference_color': {'r': local_ref[0], 'g': local_ref[1], 'b': local_ref[2]},
            'color_distance': local_signal.tolist(),
            'regression_results': fit['regression_results'],
            'half_life': fit['half_life'],
            'best_order': fit['best_order'],
            'best_r2': fit['best_r2'],
        })

    is_monotonic = len(segments_out) <= 1

    reproducibility = None
    if len(segments_out) >= 2:
        from collections import Counter
        order_key_map = {'Zero-order': 'zero', 'First-order': 'first', 'Second-order': 'second'}
        best_orders = [s['best_order'] for s in segments_out]
        dominant_order = Counter(best_orders).most_common(1)[0][0]
        dominant_key = order_key_map[dominant_order]

        k_vals = []
        for s in segments_out:
            slope = s['regression_results'][dominant_order]['slope']
            if slope is not None:
                k_vals.append(abs(slope))
        r2_vals = [s['best_r2'] for s in segments_out]

        k_vals_arr = np.array(k_vals, dtype=float)
        if len(k_vals_arr) >= 2 and np.mean(k_vals_arr) != 0:
            k_mean = float(np.mean(k_vals_arr))
            k_std = float(np.std(k_vals_arr, ddof=1))
            k_cv = float(100.0 * k_std / k_mean) if k_mean != 0 else None
        else:
            k_mean = float(np.mean(k_vals_arr)) if len(k_vals_arr) else None
            k_std = None
            k_cv = None

        reproducibility = {
            'dominant_order': dominant_order,
            'k_mean': k_mean,
            'k_std': k_std,
            'k_cv_percent': k_cv,
            'r2_mean': float(np.mean(r2_vals)) if r2_vals else None,
            'r2_min': float(np.min(r2_vals)) if r2_vals else None,
            'r2_max': float(np.max(r2_vals)) if r2_vals else None,
        }

    # global (whole-clip) diagnostic signal, always relative to the very first reference —
    # this is kept mainly for plotting / visual sanity-checking, not for the kinetics numbers.
    ref0 = compute_reference_color(R, G, B, fps, start=0)
    global_color_distance = compute_color_distance(R, G, B, ref0)

    return {
        'is_monotonic': is_monotonic,
        'cycle_count': len(segments_out),
        'segments': segments_out,
        'reproducibility': reproducibility,
        'global_color_distance': global_color_distance,
        'segment_boundaries_time': [float(time_arr[s]) for s, _e in idx_segments[1:]] if len(idx_segments) > 1 else [],
    }
