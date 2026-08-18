#!/usr/bin/env python3
"""
analyze_kinetics.py  (v2 — generic color-change kinetics)
Server-ready script for the ChronoSpectra platform.

WHAT CHANGED FROM v1 AND WHY
-----------------------------
v1 fit the zero/first/second-order kinetics models against the video's
GRAYSCALE mean intensity (cv2.COLOR_BGR2GRAY). That conversion weights
channels as Y = 0.299 R + 0.587 G + 0.114 B, so a green<->red color change
can leave the grayscale value almost flat (green's weight ~roughly cancels
red's rise), which is very likely why videos of the reaction's green->red
stage came back with R^2 as low as ~0.02 even though the color change was
visually obvious. See kinetics_core.py's module docstring for the fix
in detail; in short:

  1. The "reaction progress" proxy is now the Euclidean distance between
     the current frame's mean (R, G, B) and a reference color — this reacts
     to ANY hue change, in any direction, not just the ones that happen to
     move overall brightness. Generic by construction: green->red,
     red->yellow, blue->green, whatever the actual reaction does.
  2. The video is no longer assumed to be one monotonic transition. Sudden,
     large drops in that color-distance signal (the solution being shaken
     back toward its starting color) are detected automatically and used to
     split the clip into segments/cycles. A genuinely monotonic video simply
     yields one segment — same code path, no special-casing needed.
  3. Each segment gets its OWN local reference color (recomputed at that
     segment's start) and its own local time axis, so every cycle is
     analyzed as an independent, clean "reaction run" — the automated
     equivalent of manually trimming each cycle before analysis.

kinetics_core.py contains the pure-numpy logic and is unit-tested against
synthetic data (see test_kinetics_core.py) independently of video I/O.

The JSON contract Laravel expects (top-level keys: hasil_analisis,
graf_files, graf_public, durasi, akurasi, data_point, interpretasi,
rekomendasi, regression_results, half_life) is preserved — those top-level
fields are populated from the FIRST detected segment so existing PHP code
keeps working unmodified. The full per-cycle breakdown is additionally
available under hasil_analisis.segmentation for anything that wants it.

Deploy: place BOTH this file and kinetics_core.py in app/python/.
"""
import os
os.environ["MPLCONFIGDIR"] = os.path.join(os.path.dirname(__file__), "matplotlib_config")

import matplotlib
matplotlib.use("Agg")

import argparse
import base64
import json
import os
import sys
import traceback

import cv2
import numpy as np
from scipy.signal import find_peaks
import matplotlib.pyplot as plt

sys.path.insert(0, os.path.dirname(os.path.abspath(__file__)))
from kinetics_core import (
    analyze_segments,
    compute_reference_color,
    compute_color_distance,
    REF_WINDOW_SECONDS,
)
from bubble_detection import detect_bubbles


def eprint(*args, **kwargs):
    print(*args, file=sys.stderr, **kwargs)


def main():
    parser = argparse.ArgumentParser(description='Analyze kinetics from a video')
    parser.add_argument('--video', required=True, help='Full path to the video file')
    parser.add_argument('--params', required=True, help='Base64-encoded JSON string of parameters')
    args = parser.parse_args()

    try:
        params_json = base64.b64decode(args.params).decode('utf-8')
        params = json.loads(params_json)
    except Exception as exc:
        eprint('Failed to decode --params:', exc)
        traceback.print_exc(file=sys.stderr)
        sys.exit(2)

    # Map expected parameter names (fall back to None when missing)
    reaction_name = params.get('nama_reaksi') or params.get('reaction_name') or ''
    initial_conc = params.get('konsentrasi_awal')
    ph_value = params.get('ph')
    total_volume = params.get('volume_total') or params.get('volume')
    solvent = params.get('pelarut')
    stirring_rate = params.get('laju_pengadukan')

    video_path = args.video
    if not os.path.isfile(video_path):
        eprint('Video file does not exist:', video_path)
        sys.exit(3)

    cap = cv2.VideoCapture(video_path)
    if not cap.isOpened():
        eprint('Error: Could not open video:', video_path)
        sys.exit(4)

    fps = cap.get(cv2.CAP_PROP_FPS)
    if fps is None or fps <= 0 or np.isnan(fps):
        fps = 30.0

    time_data = []
    intensity_red = []
    intensity_green = []
    intensity_blue = []
    bubble_count_data = []

    frame_count = 0
    try:
        while True:
            ret, frame = cap.read()
            if not ret:
                break

            current_time = frame_count / fps
            time_data.append(current_time)

            # average RGB (this is now the ONLY signal the kinetics fit uses)
            rgb_frame = cv2.cvtColor(frame, cv2.COLOR_BGR2RGB)
            avg_intensity_r = float(np.mean(rgb_frame[:, :, 0]))
            avg_intensity_g = float(np.mean(rgb_frame[:, :, 1]))
            avg_intensity_b = float(np.mean(rgb_frame[:, :, 2]))
            intensity_red.append(avg_intensity_r)
            intensity_green.append(avg_intensity_g)
            intensity_blue.append(avg_intensity_b)

            # bubble detection — adaptive per-frame threshold + size/circularity
            # filtering (see bubble_detection.py docstring for why the old
            # fixed threshold=150 approach broke down as the liquid's own
            # color/brightness changed across the reaction)
            gray_frame = cv2.cvtColor(frame, cv2.COLOR_BGR2GRAY)
            bubble_count, _bubble_contours, _bubble_mask = detect_bubbles(gray_frame)
            bubble_count_data.append(bubble_count)

            frame_count += 1
    finally:
        cap.release()

    if len(time_data) == 0:
        eprint('No frames were read from the video.')
        sys.exit(5)

    time_data = np.array(time_data, dtype=float)
    intensity_red_arr = np.array(intensity_red, dtype=float)
    intensity_green_arr = np.array(intensity_green, dtype=float)
    intensity_blue_arr = np.array(intensity_blue, dtype=float)
    bubble_count_data = np.array(bubble_count_data)

    intensity_yellow = [(r + g) / 2 for r, g in zip(intensity_red, intensity_green)]
    intensity_data = {
        'frame': list(range(len(intensity_red))),
        'red': intensity_red,
        'green': intensity_green,
        'blue': intensity_blue,
        'yellow': intensity_yellow,
    }

    # --- Absorbance per channel (kept for reference/plotting/peak-detection;
    #     reference color now uses a short averaging window instead of a
    #     single first frame, for the same robustness reason as the main fit) ---
    ref_r, ref_g, ref_b = compute_reference_color(intensity_red_arr, intensity_green_arr, intensity_blue_arr, fps)
    epsilon = 1e-9
    absorbance_red = list(np.log10((intensity_red_arr + epsilon) / (ref_r + epsilon)))
    absorbance_green = list(np.log10((intensity_green_arr + epsilon) / (ref_g + epsilon)))
    absorbance_blue = list(np.log10((intensity_blue_arr + epsilon) / (ref_b + epsilon)))
    ref_yellow = (ref_r + ref_g) / 2
    absorbance_yellow = list(np.log10((np.array(intensity_yellow) + epsilon) / (ref_yellow + epsilon)))

    peaks, _ = find_peaks(absorbance_red, distance=30, prominence=0.01)
    peak_indices = peaks.tolist()
    absorbance_data = {
        'frame': list(range(len(absorbance_red))),
        'absorbance_blue': absorbance_blue,
        'absorbance_green': absorbance_green,
        'absorbance_red': absorbance_red,
        'absorbance_yellow': absorbance_yellow,
        'peak_indices': peak_indices,
    }

    # --- Bubble metrics (unchanged from v1) ---
    time_diff_bubbles = np.diff(time_data)
    if len(time_diff_bubbles) > 0 and np.min(time_diff_bubbles) > 0:
        bubble_rate = np.diff(bubble_count_data) / time_diff_bubbles
    else:
        bubble_rate = np.array([0])
    total_bubbles = int(np.sum(np.maximum(0, np.diff(bubble_count_data))))
    average_bubble_rate = float(np.mean(bubble_rate[bubble_rate > 0])) if np.sum(bubble_rate > 0) > 0 else 0.0
    buble_data = {
        'total_bubbles': total_bubbles,
        'average_bubble_rate': average_bubble_rate,
        'bubble_count_data': bubble_count_data.tolist(),
    }

    # =========================================================================
    # THE ACTUAL FIX: generic, direction-agnostic, cycle-aware kinetics fit
    # =========================================================================
    seg_result = analyze_segments(time_data, intensity_red_arr, intensity_green_arr, intensity_blue_arr, fps)

    if len(seg_result['segments']) == 0:
        eprint('Not enough data points to fit any segment.')
        sys.exit(6)

    primary = seg_result['segments'][0]  # used to populate the legacy top-level fields
    best_order = primary['best_order']
    best_r2 = primary['best_r2']
    regression_results = primary['regression_results']
    half_life = primary['half_life']

    # =========================================================================
    # Plots
    # =========================================================================
    video_dir = os.path.dirname(os.path.abspath(video_path))
    video_basename = os.path.splitext(os.path.basename(video_path))[0]

    kinetics_plot_path = os.path.join(video_dir, f"{video_basename}_kinetics.png")
    rgb_plot_path = os.path.join(video_dir, f"{video_basename}_rgb.png")
    bubble_plot_path = os.path.join(video_dir, f"{video_basename}_bubbles.png")
    absorbance_plot_path = os.path.join(video_dir, f"{video_basename}_absorbance.png")

    try:
        # --- Plot 1: RGB + generic color-distance signal, with detected
        #     segment/cycle boundaries marked. Works the same whether there
        #     turns out to be 1 segment (monotonic) or many (cyclic). ---
        plt.figure(figsize=(10, 6))
        plt.plot(time_data, intensity_data['red'], label='Merah (R)', linewidth=1, color='red', alpha=0.6)
        plt.plot(time_data, intensity_data['green'], label='Hijau (G)', linewidth=1, color='green', alpha=0.6)
        plt.plot(time_data, intensity_data['blue'], label='Biru (B)', linewidth=1, color='blue', alpha=0.6)
        plt.plot(time_data, seg_result['global_color_distance'], label='Jarak Warna dari Referensi', linewidth=1.8, color='black')
        for b in seg_result['segment_boundaries_time']:
            plt.axvline(b, color='orange', linestyle='--', linewidth=1.2)
        n_cyc = seg_result['cycle_count']
        title_suffix = f"{n_cyc} siklus terdeteksi" if n_cyc > 1 else "transisi tunggal (monoton)"
        plt.xlabel('Waktu (detik)')
        plt.ylabel('Intensitas')
        plt.title(f'Perubahan Warna Terhadap Waktu ({title_suffix})')
        plt.grid(True)
        plt.legend()
        plt.tight_layout()
        plt.savefig(rgb_plot_path)
        plt.close()

        # --- Plot 2: per-segment local linearization, overlaid on local time
        #     (every segment starts at t=0), using each segment's own best
        #     order. One curve for monotonic data, N overlaid curves for
        #     cyclic data — makes cycle-to-cycle reproducibility visible. ---
        plt.figure(figsize=(10, 6))
        cmap = plt.get_cmap('tab10')
        for seg in seg_result['segments']:
            i = seg['segment_index']
            n_pts = seg['n_points']
            t_local = np.linspace(0, seg['duration'], n_pts)
            y = np.array(seg['color_distance'])
            color = cmap(i % 10)
            label = f"Siklus {i+1} ({seg['best_order']}, R²={seg['best_r2']:.3f})"
            plt.plot(t_local, y, '.', markersize=3, color=color, alpha=0.5)
            reg = seg['regression_results'][seg['best_order']]
            if reg['slope'] is not None:
                if seg['best_order'] == 'Zero-order':
                    fit_y = reg['intercept'] + reg['slope'] * t_local
                    plt.plot(t_local, fit_y, '-', color=color, linewidth=1.5, label=label)
                # first/second order fits are on a transformed y-axis; skip
                # drawing the transformed line here to keep this overview
                # plot simple and keep everything on one consistent y-axis.
                else:
                    plt.plot([], [], '-', color=color, linewidth=1.5, label=label)
        plt.xlabel('Waktu Lokal per Siklus (detik)')
        plt.ylabel('Jarak Warna dari Referensi Lokal')
        plt.title('Kecocokan Kinetika per Siklus (Reproduksibilitas Antar-Siklus)')
        plt.grid(True)
        plt.legend(fontsize=8)
        plt.tight_layout()
        plt.savefig(kinetics_plot_path)
        plt.close()

        # --- Plot 3: bubbles (unchanged) ---
        plt.figure(figsize=(10, 6))
        plt.scatter(time_data, bubble_count_data, s=5, label='Bubble Count')
        plt.xlabel('Time (seconds)')
        plt.ylabel('Number of Bubbles')
        plt.title('Bubble Formation Over Time')
        plt.grid(True)
        plt.legend()
        plt.tight_layout()
        plt.savefig(bubble_plot_path)
        plt.close()

        # --- Plot 4: absorbance per channel (unchanged, still useful for
        #     peak detection / diagnostic viewing) ---
        plt.figure(figsize=(10, 6))
        plt.plot(absorbance_data['frame'], absorbance_data['absorbance_red'], label='Absorbansi Merah', color='red', linewidth=1)
        plt.plot(absorbance_data['frame'], absorbance_data['absorbance_green'], label='Absorbansi Hijau', color='green', linewidth=1)
        plt.plot(absorbance_data['frame'], absorbance_data['absorbance_blue'], label='Absorbansi Biru', color='blue', linewidth=1)
        plt.plot(absorbance_data['frame'], absorbance_data['absorbance_yellow'], label='Absorbansi Kuning', color='gold', linewidth=1)
        if len(peak_indices) > 0:
            plt.scatter(peak_indices, [absorbance_data['absorbance_red'][i] for i in peak_indices], color='black', marker='x', s=50, label='Detected Peaks (Red)')
        plt.xlabel('Frame')
        plt.ylabel('Absorbance')
        plt.title('Absorbance Over Time')
        plt.grid(True)
        plt.legend()
        plt.tight_layout()
        plt.savefig(absorbance_plot_path)
        plt.close()

    except Exception:
        eprint('Warning: failed to generate/save plots')
        traceback.print_exc(file=sys.stderr)

    # =========================================================================
    # Path conversion for Laravel public storage (unchanged from v1)
    # =========================================================================
    graf_public = []
    try:
        normalized = os.path.normpath(os.path.abspath(video_path))
        if '/storage/app/public/' in normalized.replace('\\', '/'):
            graf_public = [
                os.path.join("storage", os.path.basename(os.path.dirname(p)), os.path.basename(p))
                for p in [kinetics_plot_path, rgb_plot_path, bubble_plot_path, absorbance_plot_path]
            ]
        else:
            graf_public = [
                p.replace("\\", "/").split("storage/app/public/")[-1]
                for p in [kinetics_plot_path, rgb_plot_path, bubble_plot_path, absorbance_plot_path]
            ]
            graf_public = ["storage/" + path for path in graf_public]
    except Exception:
        graf_public = [kinetics_plot_path, rgb_plot_path, bubble_plot_path, absorbance_plot_path]

    # =========================================================================
    # Output JSON — same top-level contract as v1 (+ new 'segmentation' block)
    # =========================================================================
    max_points = 2000
    step = max(1, int(len(time_data) / max_points))
    sampled = [
        {'t': float(t), 'intensity': float(i)}
        for t, i in zip(time_data[::step], seg_result['global_color_distance'][::step])
    ]

    n_cyc = seg_result['cycle_count']
    if n_cyc <= 1:
        interpretasi = (
            "Data warna bersifat monoton (tidak terdeteksi reset/pengocokan). "
            f"Berdasarkan jarak warna RGB terhadap referensi, orde reaksi yang paling cocok adalah "
            f"{best_order} (R² = {best_r2:.4f})."
        )
    else:
        rep = seg_result['reproducibility'] or {}
        cv_txt = f"{rep.get('k_cv_percent'):.1f}%" if rep.get('k_cv_percent') is not None else "tidak tersedia"
        interpretasi = (
            f"Terdeteksi {n_cyc} siklus warna (video berisi beberapa transisi berulang akibat pengocokan). "
            f"Setiap siklus dianalisis secara independen. Siklus pertama: orde {best_order}, R² = {best_r2:.4f}. "
            f"Rata-rata R² seluruh siklus = {rep.get('r2_mean', 0):.4f}; "
            f"koefisien variasi konstanta laju antar-siklus = {cv_txt}. "
            "Lihat 'segmentation' pada hasil_analisis untuk rincian tiap siklus."
        )

    result = {
        'hasil_analisis': {
            'intensity': intensity_data,
            'buble_data': buble_data,
            'absorbance_data': absorbance_data,
            'segmentation': {
                'is_monotonic': seg_result['is_monotonic'],
                'cycle_count': seg_result['cycle_count'],
                'segment_boundaries_time': seg_result['segment_boundaries_time'],
                'reproducibility': seg_result['reproducibility'],
                'segments': [
                    {
                        'segment_index': s['segment_index'],
                        'start_time': s['start_time'],
                        'end_time': s['end_time'],
                        'duration': s['duration'],
                        'n_points': s['n_points'],
                        'best_order': s['best_order'],
                        'best_r2': s['best_r2'],
                        'regression_results': s['regression_results'],
                        'half_life': s['half_life'],
                    }
                    for s in seg_result['segments']
                ],
            },
        },
        'graf_files': [kinetics_plot_path, rgb_plot_path, bubble_plot_path, absorbance_plot_path],
        'graf_public': graf_public,
        'durasi': float(time_data[-1]),
        # 'akurasi' stays as the raw R^2 (0-1 scale) for backward compatibility
        # with anything already consuming this field. R^2 is, strictly
        # speaking, "proportion of variance explained" — not the same concept
        # as classification accuracy — so if your UI shows a "%" suffix next
        # to it, that suffix is being applied to a 0-1 value, which is why it
        # reads as "0.02%" instead of "2%". Use 'akurasi_persen' below for a
        # value that is already scaled to match a "%" label.
        'akurasi': float(best_r2),
        'akurasi_persen': float(best_r2 * 100),
        'data_point': sampled,
        'interpretasi': interpretasi,
        'rekomendasi': [
            'Periksa kualitas video (stabilitas pencahayaan, kontras, hindari auto-exposure/auto white-balance jika kamera mendukung penguncian manual).',
            'Jika hanya 1 siklus terdeteksi padahal video berisi beberapa pengocokan, turunkan sensitivitas deteksi reset (RESET_SIGMA) di kinetics_core.py.',
            'Jika R^2 tiap siklus tetap rendah, periksa kebersihan ROI (hindari pantulan kaca, batang pengaduk, atau area di luar larutan).',
        ],
        'regression_results': regression_results,
        'half_life': half_life,
    }

    print(json.dumps(result, ensure_ascii=False))
    sys.exit(0)


if __name__ == '__main__':
    main()
