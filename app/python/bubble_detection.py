"""
bubble_detection.py
Adaptive, per-frame bubble/blob detection.

WHY THIS CHANGED
----------------
The original implementation used a FIXED grayscale threshold (150) to
separate "bubbles" from the surrounding liquid:

    cv2.threshold(blurred, 150, 255, cv2.THRESH_BINARY_INV)

That breaks down whenever the liquid's own brightness changes across the
reaction — the Traffic Light reaction cycles through green -> red -> yellow,
each with a very different baseline brightness. Large patches of liquid can
then cross that fixed threshold and get counted as false-positive "bubbles"
(or real bubbles can stop being detected), purely because the liquid color
changed, not because anything bubble-related happened.

This version instead:
  1. Computes a threshold RELATIVE to each frame's own robust statistics
     (median + MAD), so it adapts automatically as the liquid's color/
     brightness changes over time — same "don't hardcode an absolute level,
     compare against the frame's own baseline" principle used for the color
     kinetics fix.
  2. Flags deviations in EITHER direction (brighter OR darker than the
     surrounding liquid), since bubbles can appear as either specular
     highlights or dark refraction spots depending on lighting geometry.
  3. Filters candidate blobs by AREA (relative to frame size, so it scales
     with resolution/ROI automatically) and by CIRCULARITY
     (4*pi*Area/Perimeter^2). Real bubbles are close to circular; the
     stirring rod, glass reflections, and ROI edges are not — so they get
     filtered out instead of inflating the bubble count.
  4. The relative (MAD-based) threshold is combined with an ABSOLUTE floor
     (MIN_ABSOLUTE_DEVIATION). This matters because on a real, compressed
     video, a near-uniform frame can have a median absolute deviation of
     essentially 0 (most pixels identical after compression) — without a
     floor, even a 1-gray-level compression artifact would then count as
     an "outlier" and the frame would be flooded with false positives. The
     floor says: regardless of how uniform the frame's noise floor is, a
     blob must differ from the background by at least this many gray
     levels to be considered a real brightness anomaly.
  5. A small morphological "opening" pass removes isolated single/few-pixel
     speckles before contour extraction, as a second line of defense
     against compression/sensor noise.
"""
import numpy as np
import cv2

# ---------------------------------------------------------------------------
# Tunable constants
# ---------------------------------------------------------------------------
MIN_AREA_FRACTION = 0.00005   # blob smaller than this fraction of the frame -> treated as noise, not a bubble
MAX_AREA_FRACTION = 0.05      # blob larger than this fraction of the frame -> treated as background/reflection, not a bubble
MIN_CIRCULARITY = 0.55        # 1.0 = perfect circle. Real bubbles are usually >= ~0.6-0.7; rods/reflections/edges score lower.
DEVIATION_SIGMA = 3.0         # how many robust-sigma a pixel must deviate from the frame's own median to be a bubble candidate
MIN_ABSOLUTE_DEVIATION = 18.0 # gray-level FLOOR for the deviation threshold (0-255 scale)


def detect_bubbles(gray_frame,
                    min_area_fraction=MIN_AREA_FRACTION,
                    max_area_fraction=MAX_AREA_FRACTION,
                    min_circularity=MIN_CIRCULARITY,
                    deviation_sigma=DEVIATION_SIGMA,
                    min_absolute_deviation=MIN_ABSOLUTE_DEVIATION):
    """Detect bubble-like blobs in one grayscale frame (2D uint8 numpy array).

    Returns (bubble_count, contours, binary_mask).
    """
    blurred = cv2.GaussianBlur(gray_frame, (5, 5), 0).astype(float)
    h, w = blurred.shape
    frame_area = float(h * w)

    median_val = np.median(blurred)
    mad = np.median(np.abs(blurred - median_val))
    relative_threshold = deviation_sigma * 1.4826 * mad
    deviation_threshold = max(relative_threshold, min_absolute_deviation)

    dev = np.abs(blurred - median_val)
    binary = (dev > deviation_threshold).astype('uint8') * 255

    # remove isolated speckle noise (second line of defense against
    # compression artifacts) before extracting contours
    kernel = np.ones((3, 3), np.uint8)
    binary = cv2.morphologyEx(binary, cv2.MORPH_OPEN, kernel)

    contours, _ = cv2.findContours(binary, cv2.RETR_EXTERNAL, cv2.CHAIN_APPROX_SIMPLE)

    min_area = min_area_fraction * frame_area
    max_area = max_area_fraction * frame_area

    bubble_contours = []
    for c in contours:
        area = cv2.contourArea(c)
        if area < min_area or area > max_area:
            continue
        perimeter = cv2.arcLength(c, True)
        if perimeter <= 0:
            continue
        circularity = 4.0 * np.pi * area / (perimeter ** 2)
        if circularity < min_circularity:
            continue
        bubble_contours.append(c)

    return len(bubble_contours), bubble_contours, binary
