// Helper to measure text width and clamp text so it fits the card width perfectly

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
 * Trims text character-by-character from the end if it exceeds maxWidth in the given font.
 * Ensures the text NEVER overflows the card line.
 */
export function fitTextToWidth(text, font, maxWidth) {
  if (!text) return '';
  if (getTextWidth(text, font) <= maxWidth) return text;

  // Binary search for exact character cut-off
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

/**
 * Checks if the text has reached the full width capacity of the line (within threshold px).
 */
export function isTextFull(text, font, maxWidth, threshold = 18) {
  if (!text) return false;
  const width = getTextWidth(text, font);
  return width >= (maxWidth - threshold);
}
