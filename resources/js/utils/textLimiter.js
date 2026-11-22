// Helper to measure text width and dynamically calculate font size or clamp text
let measureCanvas = null;

export function getTextWidth(text, font) {
  if (!text) return 0;
  if (typeof document === 'undefined') return text.length * 10;
  if (!measureCanvas) {
    measureCanvas = document.createElement('canvas');
  }
  const ctx = measureCanvas.getContext('2d');
  ctx.font = font;
  return ctx.measureText(text).width;
}

/**
 * Calculates dynamic font size in px so that text fits on a single line within maxWidth.
 * If text fits at baseSize, returns baseSize.
 * If text exceeds maxWidth, reduces font size smoothly down to minSize.
 */
export function calculateAutoFontSize(text, fontSpec, baseSize, maxWidth, minSize = 16) {
  if (!text) return baseSize;
  const baseFont = typeof fontSpec === 'function' ? fontSpec(baseSize) : `${baseSize}px ${fontSpec}`;
  const measured = getTextWidth(text, baseFont);
  if (measured <= maxWidth) {
    return baseSize;
  }
  const calculated = Math.floor(baseSize * (maxWidth / measured));
  return Math.max(minSize, calculated);
}

/**
 * Trims text character-by-character only when it exceeds maxWidth at minSize.
 * Allows the user to type freely while font size scales down, preventing overflow beyond minSize.
 */
export function fitTextAtMinSize(text, fontSpec, minSize, maxWidth) {
  if (!text) return '';
  const minFont = typeof fontSpec === 'function' ? fontSpec(minSize) : `${minSize}px ${fontSpec}`;
  if (getTextWidth(text, minFont) <= maxWidth) {
    return text;
  }
  let low = 0;
  let high = text.length;
  let best = 0;
  while (low <= high) {
    const mid = Math.floor((low + high) / 2);
    const sub = text.slice(0, mid);
    if (getTextWidth(sub, minFont) <= maxWidth) {
      best = mid;
      low = mid + 1;
    } else {
      high = mid - 1;
    }
  }
  return text.slice(0, best);
}

/**
 * Checks if text has reached the absolute limit at minSize (used for warning when cannot type further).
 */
export function isTextFullAtMinSize(text, fontSpec, minSize, maxWidth, threshold = 10) {
  if (!text) return false;
  const minFont = typeof fontSpec === 'function' ? fontSpec(minSize) : `${minSize}px ${fontSpec}`;
  return getTextWidth(text, minFont) >= (maxWidth - threshold);
}

// Backwards-compatible aliases
export function fitTextToWidth(text, font, maxWidth) {
  if (!text) return '';
  if (getTextWidth(text, font) <= maxWidth) return text;
  let low = 0;
  let high = text.length;
  let best = 0;
  while (low <= high) {
    const mid = Math.floor((low + high) / 2);
    const sub = text.slice(0, mid);
    if (getTextWidth(sub, font) <= maxWidth) {
      best = mid;
      low = mid + 1;
    } else {
      high = mid - 1;
    }
  }
  return text.slice(0, best);
}

export function isTextFull(text, font, maxWidth, threshold = 18) {
  if (!text) return false;
  const width = getTextWidth(text, font);
  return width >= (maxWidth - threshold);
}
