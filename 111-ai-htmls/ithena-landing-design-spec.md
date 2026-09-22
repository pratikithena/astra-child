# ITHENA landing pages — design & form spec

Covers the two live landing pages built as single Elementor **HTML widgets**:

| Page | URL | Post ID | Source file |
|---|---|---|---|
| iCRM Platform | `/icrm-platform/` | 82462 | `111-ai-htmls/icrm-hub-elementor.html` |
| FactoryGPT | `/factorygpt/` | 82380 | `111-ai-htmls/factorygpt-elementor.html` |

Every value below was **read from the live pages** with `getComputedStyle`, not copied from source. Measured 2026-08-27 at 1440 / 768 / 390 px.

---

## 1. Architecture

Both pages follow the same pattern as `food-beverage-bakery`:

```
Elementor page (template: elementor_header_footer)
└── section (full_width, stretched, zero padding)
    └── column (100%)
        ├── widget:html      ← <style> + <section id="main-section"> + <script>
        └── widget:shortcode ← [formidable id=119], CSS ID icrm-demo-form / fgpt-demo-form
```

- All CSS is scoped to `#main-section` and uses `!important` to beat the host theme.
- The Shortcode widget is hidden in page flow (`#icrm-demo-form { display:none }`) and **relocated into the modal** by the page's own `adoptDemoForm()` on `DOMContentLoaded`, on `load`, and on every popup open.
- Do **not** hide that widget with Elementor's `hidden-desktop/tablet/mobile` flags — they are `display:none !important` and survive the move, leaving the modal empty. (food-beverage-bakery does this and likely has that bug.)

---

## 2. Typography

### Font families

| Role | Stack |
|---|---|
| Everything | `'Noto Sans', -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, sans-serif` |
| FactoryGPT `.bot-p`, `.bot-l li` | `'Inter', -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, sans-serif` |

On FactoryGPT the three font tokens `--sans`, `--display` and `--mono` all resolve to the Noto Sans stack.

> **Inter is not served by this site.** Fonts actually loaded: Noto Sans, Montserrat, Poppins, Roboto, OpenSans, PlayfairDisplay, Font Awesome. There is no `@font-face` or Google Fonts link for Inter, so the two Inter rules render Inter **only for visitors who have it installed locally** — everyone else falls through to Segoe UI / system sans. To make it real, enqueue Inter in `functions.php`.

### Scale — iCRM Platform

Base body `16px / 400`, `line-height 1.5` (24px computed).

| Element | Size | Weight | Notes |
|---|---|---|---|
| `h1` | 48px | 800 | 32px below 560px; `max-width: 24ch` |
| `h2` | 32px | 800 | |
| `h3`, `.h3` | 24px | 700 | individual sections override lower |
| `.h4` | 18px | 700 | |
| `.lede` | 16px | 400 | |
| `.hero-bullet-text strong` | 16px | 700 | |
| `.hero-bullet-text p` | 14px | 400 | |
| `.body-sm` | 14px | 400 | |
| `.body-xs` | 13px | 400 | |
| `.cap` | 12px | 600 | uppercase, `letter-spacing .1em` |
| `.eyebrow` | 13px | 600 | uppercase pill |

### Scale — FactoryGPT

| Element | Size | Weight | Family | Measure |
|---|---|---|---|---|
| `.h1` | 48px | 800 | Noto Sans | 32px below 560px |
| `.h2` | 32px | 800 | Noto Sans | `max-width: 40ch` |
| `.bot-h` (h3) | 32px | 700 | Noto Sans | `max-width: 25ch` |
| `.role-side h3` | 32px | 700 | Noto Sans | |
| `.close h2` | `clamp(28px, 4.4vw, 48px)` | 700 | Noto Sans | `max-width: 30ch` |
| `.lede` | 16px | 500 | Noto Sans | `max-width: 60ch` |
| `.bot-p` | 16px | 500 | **Inter** | `max-width: 42ch` |
| `.bot-l li` | 14px | 400 | **Inter** | body-copy list |
| `.eyebrow` | 13px | 600 | Noto Sans | |
| `.btn` | 12px | 600 | Noto Sans | uppercase, `letter-spacing .16em` |

**Rule:** no `h3`-matching selector may declare above 32px. `build_fgpt.py` asserts this.

---

## 3. Colour

Brand blue `#0083C8` is theme-independent on both pages.

### iCRM Platform tokens

| Token | Light | Dark |
|---|---|---|
| `--bg` | `#FFFFFF` | `#0D1B2E` |
| `--bg-tint` | `#D7ECF6` | `#123049` |
| `--bg-warm` | `#FFFFFF` | `#123049` |
| `--bg-deep` | `#0D1B2E` | `#0D1B2E` |
| `--surface` (cards) | `#FFFFFF` | `#123049` |
| `--surface-2` | `#D7ECF6` | `#0D1B2E` |
| `--text` | `#000000` | `#FFFFFF` |
| `--text-2` | `#333333` | `rgba(215,236,246,.8)` |
| `--muted` | `#666666` | `#8FAFC4` |
| `--muted-2` | `#666666` | `#8FAFC4` |
| `--line` | `rgba(6,22,42,.09)` | `rgba(255,255,255,.09)` |
| `--line-strong` | `rgba(6,22,42,.16)` | `rgba(255,255,255,.18)` |
| `--primary-wash` | `#E8F4FC` | `rgba(0,131,200,.14)` |

Theme-independent: `--primary #0083C8`, `--primary-dk #00679D`, `--primary-lt #2EA6E6`, `--mint #10B981`, `--amber #F59E0B`, `--rose #E11D48`, `--violet #7C3AED`, `--grad linear-gradient(135deg, #0083C8, #00588A)`.

### FactoryGPT tokens

| Token | Light | Dark |
|---|---|---|
| `--bg` | `#D7ECF6` | `#0D1B2E` |
| `--bg-2` / `--panel` | `#FFFFFF` | `#123049` |
| `--ink` | `#000000` | `#FFFFFF` |
| `--ink-2` | `#333333` | `rgba(215,236,246,.8)` |
| `--ink-3` | `#666666` | `#8FAFC4` |
| `--coral` | `#BE2A1E` | `#FF5B49` |
| `--mint` | `#0A7A52` | `#3FE0A0` |
| `--steel` | `#265F98` | `#5FA0DC` |
| `--bone` | `#7A5E2C` | `#D4B98A` |
| `--rule` | `color-mix(#666666 30%, transparent)` | `color-mix(#8FAFC4 25%, transparent)` |

Theme-independent: `--amber` / `--amber-fill` `#0083C8`, `--on-amber` `#FFFFFF`.

> The accent colours are **re-picked per theme**, not reused — the dark mint `#3FE0A0` would fail contrast on a light ground, so light mode uses `#0A7A52`. Follow this when adding accents.

### Contrast

Headings audited across both pages, both themes: **0 below 3:1**. Worst measured 11.15:1 (FactoryGPT dark) and 10.36:1 (light).

**Headings must declare `color: inherit`, not `var(--text)`.** The host theme sets an explicit colour on `h1`–`h6`, and an explicit colour beats an inherited one at any specificity — without this the dark theme's text colour never reaches headings. `inherit` also lets headings inside deliberately dark blocks (`.cta-card`, `.tcard.dark`) keep their own light colour.

---

## 4. Theme switching

- State lives in a `data-theme="light|dark"` attribute on `#main-section`.
- **The site header owns the theme.** `window.ithenaTheme` (in `wp-header-shortcode.php`) writes `html.dark`, persists to `localStorage['ithena-theme']`, and mirrors `data-theme` onto `#main-section`.
- Page-level scripts must **defer** to it: `if (window.ithenaTheme) { window.ithenaTheme.sync(); }` and route any in-page toggle through `window.ithenaTheme.toggle()`. Both pages previously kept their own key (`ithena-microsite-theme`, `fgpt-theme`) and raced the header.
- FactoryGPT paints an ECG canvas from CSS custom properties. The header sets the attribute directly, bypassing the page's `setTheme()`, so a `MutationObserver` on `data-theme` re-runs `readCols(); draw();`.
- `--header-h` is published on `<html>` by the header and updates on scroll (116px → 100px). Pages consume it as `calc(var(--header-h, 100px) + …)`. When no fixed header exists the page measures one and falls back to `0` — never the 100px design-time default, which reserves dead space.

## 5. Layout & section blending

| | iCRM | FactoryGPT |
|---|---|---|
| Container | `--maxw 1200px` / `--maxw-wide 1320px` | `--wrap 1240px` |
| Gutter | `24px` | `--pad clamp(20px, 4vw, 48px)` |
| Section rhythm | `clamp(40px, 3vw, 96px)` | `clamp(72px, 10vw, 80px)` |
| Radii | 8 / 12 / 18 / 26 / 34 / 999px | 14 / 18 / 999px |
| Easing | `cubic-bezier(.22,.68,.36,1)` | `cubic-bezier(.16,.9,.3,1)` |

Sections never meet on a hard line. A `::before` gradient (120–160px) fades each section out of the previous one; the hero is excluded.

- **iCRM:** `.tint::before` / `.tint::after` fade to `var(--bg)` at both ends — order-independent, works because no two tinted sections are adjacent.
- **FactoryGPT:** each `<section>` sets `--blend-from` inline to the previous section's background. Token-based, so it works in both themes automatically.

**All CTAs are pills** (`border-radius: 999px`). Non-CTA chips and icon buttons keep their small radii.

---

## 6. Form design

One Formidable form (**ID 119** — "New - contact us form") serves both pages, adopted into a modal.

| | iCRM | FactoryGPT |
|---|---|---|
| Overlay | `#demoPopupOverlay` | `#fgptDemoPopup` |
| Trigger | `[data-demo-cta]` ×2 | `[data-demo-cta]` ×2 |
| Panel | `.demo-popup`, max-width 440px, `max-height 90vh`, `overflow-y auto` | same |
| Fields | Name*, Email*, Phone, Organization*, reCAPTCHA | same |

**Specs:** inputs 48–52px tall, submit 52–56px, labels 12px/700 `letter-spacing .06em` in `--muted` / `--ink-3`. Overlay `z-index: 999999`.

### Audit results — 6 combinations, all passing

| Page | 390px | 768px | 1440px |
|---|---|---|---|
| iCRM | ✅ | ✅ | ✅ |
| FactoryGPT | ✅ | ✅ | ✅ |

Checked per combination: panel fits viewport, reCAPTCHA not clipped, Submit hit-testable via `elementFromPoint`, touch targets ≥ 48px, label contrast ≥ 4.5:1, no horizontal document overflow.

### Three defects found and fixed

**1. reCAPTCHA clipped on mobile.** The widget draws at a fixed 304px, but its wrappers were being forced down to the container width (284px) with `overflow:hidden`, cutting off the reCAPTCHA badge and privacy links. Formidable's own `scale(0.86)` then shrank the already-clipped box.

```css
#main-section .frm-g-recaptcha > div,
#main-section .frm-g-recaptcha > div > div,
#main-section .frm-g-recaptcha iframe { width: 304px !important; max-width: none !important; }
```
Restoring the natural width lets the existing scale fit the whole widget (261px inside a 285px column).

**2. Submit button unreachable on mobile — the form could not be submitted.** The site chat widget (`.bubble-container-left`) is `z-index: 2147483647`, so it covered the modal and swallowed taps on Submit. No z-index can beat max-int, so it is hidden for the duration of the modal:

```css
body:has(#demoPopupOverlay.is-open) #chatBubbleRoot { display: none !important; }
```

**3. Field labels below WCAG AA.** Formidable's own style is 11px `#8D959F` — **3.03:1** on the white panel, under the 4.5:1 minimum.

```css
#main-section .demo-popup .frm_form_field label {
  font-size: 12px !important; font-weight: 700 !important;
  letter-spacing: .06em !important; color: var(--muted) !important;  /* --ink-3 on FactoryGPT */
}
```
Now **5.74:1** light and **5.89:1** dark.

---

## 7. Gotchas

- **`[hidden]` does not work inside `#main-section`.** The scoped reset strips the UA `[hidden]{display:none}` rule. Any element toggled via `.hidden = true` needs an explicit `[hidden]{display:none!important}` rule.
- **`svg { max-width:100% }` collapses icons to 0 width** inside a `display:grid; place-items:center` parent — the width resolves against a grid area sized by the icon itself. Add `max-width: none` to such icons.
- **`body{overflow:auto}` is left inline by a popup/consent plugin**, which turns `<body>` into a scroll container and silently kills every `position:sticky` on the page. Both pages carry `body:not([class*="pum-open"]) { overflow: visible !important; }`.
- **Declaration order beats intuition.** Several base rules sit *later* in the sheet than the overrides added near the top, at equal specificity. Where that happens the override uses `section#main-section` (0,1,2) instead of `#main-section` (0,1,1).
- **Container queries, not viewport queries, for components in columns.** The iCRM hero mock keeps its 208px sidebar keyed to `@container (max-width: 760px)` on `.hero-shot`; viewport width stopped being the component's width the moment it moved into a column.
- **The bridge API is flaky above ~800KB.** `POST /wp-json/ithena-bridge/v1/posts/{id}/elementor` fails intermittently at 1MB; retry loops are required. `/el/*`, `/site` and `/measurement/forms` are blocked outright (likely WAF).

---

## 8. Rebuilding

Both pages are generated from a source file by an assertion-checked build script, then uploaded verbatim so local and live match byte-for-byte.

```
scratchpad/build.py       01-icrm-hub.standalone.html → icrm-hub-elementor.html
scratchpad/build_fgpt.py  factoryGPT.html             → factorygpt-elementor.html
```

`build.py` also re-encodes 8 inline PNG screenshots to WebP at 1600px/q78 — **3.09MB → 0.73MB**, taking the page from 3.39MB to 1.03MB.
