# ITHENA Landing Page — Design Spec (extracted from `food-beverage-bakery`)

> Source: live page `https://dev-website.ithena.app/food-beverage-bakery/` and its exact source `111-ai-htmls/food-beverage-bakery-oem.html`. Every value below is copied from that page's actual inline `<style>` block and DOM — nothing invented. Use this as the generic template for other industry landing pages (packaging, tool-die, industrial-defense, etc.): keep the tokens, structure, and component patterns; swap copy, icons, and images per industry.

---

## 1. Scoping & isolation

The whole page is one WordPress/Elementor "HTML" widget: a `<style>` block, an SVG icon sprite, one `<section>` root, and a `<script>` — all scoped to a single root so it can't leak into or be leaked on by the host theme.

```html
<style> /* all rules below, scoped to section#main-section */ </style>
<svg style="display:none" aria-hidden="true"> <!-- icon sprite, see §6 --> </svg>
<section id="main-section" class="cust-landing" data-theme="light"> ... </section>
<script> /* theme toggle, reveal-on-scroll, counters, modal — see §10 */ </script>
```

Isolation rules applied to every selector:
- Root selector: `section#main-section` (id) — class `cust-landing` is carried for readability/JS hooks but the id is what CSS keys off.
- `section#main-section, section#main-section *:not(svg):not(svg *) { all:revert; }` — resets host theme's cascade.
- `box-sizing:border-box`, `margin:0`, `padding:0` reset on every descendant.
- Every property in every rule ends in `!important` to beat host theme specificity.
- One rule per line (selector + all declarations together) — keeps the block scannable and diff-friendly.

---

## 2. Theme architecture

Two themes, toggled by a `data-theme` attribute on the root section — **not** by swapping stylesheets or classes.

| Theme | Selector |
|---|---|
| Light (default token values) | `section#main-section` |
| Dark (override block) | `section#main-section[data-theme="dark"]` |

All spacing/radius/grid/transition tokens are declared once on the root; only **colour** tokens are overridden in the dark block. The toggle persists via `localStorage.setItem('cust-theme', mode)`.

---

## 3. Design tokens

### 3.1 Brand colours (theme-independent — same in light and dark)

| Token | Value | Usage |
|---|---|---|
| `--color-primary` | `#0083C8` | Brand blue — buttons, icons, badges, links, stat card bg |
| `--color-accent-red` | `#C00000` | Secondary CTA button fill |
| `--color-white` | `#FFFFFF` | Text-on-brand, icon fills |
| `--color-black` | `#000000` | Reference only (not used directly as a token elsewhere) |

### 3.2 Section backgrounds & text — light theme (default, no attribute)

| Token | Value | Usage |
|---|---|---|
| `--bg-section-a` | `#FFFFFF` | Hero-alternate sections (odd-numbered), cards, popups |
| `--bg-section-b` | `#D7ECF6` | Alternate sections (even-numbered), dash-tile fill |
| `--text-heading` | `#000000` | h1–h4, strong labels |
| `--text-body` | `#333333` | Paragraph copy |
| `--text-muted` | `#666666` | Eyebrow-adjacent micro text, labels, borders (via `color-mix`) |

### 3.3 Section backgrounds & text — dark theme (`[data-theme="dark"]` override)

| Token | Value |
|---|---|
| `--bg-section-a` | `#123049` |
| `--bg-section-b` | `#0D1B2E` |
| `--text-heading` | `#FFFFFF` |
| `--text-body` | `rgba(215,236,246,.8)` |
| `--text-muted` | `#8FAFC4` |

### 3.4 Derived / computed tokens

| Token | Formula | Notes |
|---|---|---|
| `--badge-tint` | `color-mix(in srgb, var(--color-primary) 14%, var(--color-white))` (light) / `32%` mixed with `--bg-section-a` (dark) | Not currently used on solid badges (see §6) but kept for tinted-badge variants |
| `--shadow-card` | `0 18px 40px rgba(0,0,0,.10)` (light) / `.45` (dark) | Cards, feature visuals, popup |
| `--shadow-float` | `0 12px 28px rgba(0,0,0,.16)` (light) / `.5` (dark) | Floating status cards, theme toggle button |

### 3.5 Typography scale (even-px only)

| Token | Value | Used for |
|---|---|---|
| `--fs-micro` | `14px` | Micro copy, dash-tile labels, footer |
| `--fs-body` | `16px` | Paragraphs, buttons, list items |
| `--fs-h4` | `18px` | h4 (icon-column headings) |
| `--fs-lead` | `20px` | Reserved (lead paragraph size — not applied to `.cust-lead` in practice, which uses `--fs-body`) |
| `--fs-h3` | `24px` | h3 (feature block headings) |
| `--fs-h2` | `32px` | h2 (section headings, stat numbers) |
| `--fs-h1` | `48px` | h1 (hero headline) |

### 3.6 Layout tokens

| Token | Value |
|---|---|
| `--container-w` | `1240px` |
| `--radius-card` | `10px` |

---

## 4. Typography

**Font family (headings and body — one family, no separate display font):**
```css
font-family:'Noto Sans',-apple-system,BlinkMacSystemFont,'Segoe UI',Roboto,sans-serif;
```

| Element | Size token | Weight | Line-height |
|---|---|---|---|
| `h1` | `--fs-h1` (48px) | 800 | 1.2 |
| `h2` | `--fs-h2` (32px) | 800 | 1.2 |
| `h3` | `--fs-h3` (24px) | 700 | 1.2 |
| `h4` | `--fs-h4` (18px) | 700 | 1.2 |
| `p` | `--fs-body` (16px) | 500 | 1.6 (body default) |
| `.cust-eyebrow` | `12px` | 700, uppercase, `letter-spacing:.14em` | — |
| `.cust-micro` | `--fs-micro` (14px) | inherit | — |
| `.stat-num` | `--fs-h2` (32px) | 800 | — |
| `.dash-tile-tag` | `11px` | 700, uppercase, `letter-spacing:.04em` | — |
| `.float-card-title` | `--fs-micro` (14px) | 700, uppercase, `letter-spacing:.05em` | — |

Base body: `line-height:1.6`, `-webkit-font-smoothing:antialiased`.

Eyebrow label pattern (small kicker above every heading):
```css
.cust-eyebrow { display:inline-flex; align-items:center; gap:8px; font-size:12px; font-weight:700; letter-spacing:.14em; text-transform:uppercase; color:var(--color-primary); margin-bottom:14px; }
.cust-eyebrow::before { content:""; width:22px; height:2px; background:var(--color-primary); border-radius:2px; }
```

---

## 5. Layout & spacing

### 5.1 Container
```css
.cust-container { max-width:1240px; margin-inline:auto; padding-inline:clamp(20px,4vw,40px); }
```

### 5.2 Section vertical rhythm
```css
section { padding-block:clamp(40px,3vw,96px); }
.s-hero  { padding-top:clamp(96px,10vw,128px); } /* extra top clearance under sticky header */
```

### 5.3 Section background alternation + blend

Sections alternate between the two background slots; a `120–160px` linear-gradient fade at the **top** of each section blends it into the previous one — there are never hard divider lines.

```
s-hero      → bg-section-b   (no blend — first section)
s-intro     → bg-section-b   (blends from bg-section-b, i.e. flat — see note)
s-feature-1 → bg-section-a   (blends from bg-section-b)
s-feature-2 → bg-section-b   (blends from bg-section-a)
s-stats     → bg-section-a   (blends from bg-section-b)
s-value     → bg-section-a   (blends from bg-section-b)
s-banner    → bg-section-a   (blends from bg-section-a)
```

```css
section::before {
  content:""; position:absolute; left:0; right:0; top:0; height:clamp(120px,12vw,160px);
  pointer-events:none; z-index:0;
  background:linear-gradient(180deg, var(--cust-blend-from) 0%, transparent 100%);
}
.s-hero::before { display:none; } /* hero never blends — it's the top of the page */
```
Each section sets its own `--cust-blend-from` to the *previous* section's background colour. All direct children of `section` get `position:relative; z-index:1` so content sits above the blend layer.

### 5.4 Grid patterns actually used

| Pattern | CSS | Used in |
|---|---|---|
| Hero 2-col | `grid-template-columns:1.05fr .95fr` | Hero copy + visual |
| 3-col icon row | `grid-template-columns:repeat(3,1fr)` | Challenges strip, Business Value strip |
| 3-col stat bar | `grid-template-columns:repeat(3,1fr)` inside a solid brand-colour card | Stats section |
| 2-col feature (zigzag) | `grid-template-columns:1fr 1fr` with `order:2/1` swap on alt rows | Solution blocks |
| 2×2 dashboard tiles | `grid-template-columns:repeat(2,1fr)` | Feature-block visual mock |
| 2-col banner | `grid-template-columns:1fr 1fr` | Video/CTA banner |

### 5.5 Border radii

| Value | Usage |
|---|---|
| `10px` (`--radius-card`) | Cards, hero photo, dash-tiles-parent, form inputs' container context |
| `12px` | `.dash-tile` |
| `20px` | `.stats-card` |
| `22px` | `.banner-card` |
| `999px` (pill) | All buttons, inputs, badge/tag pills |
| `50%` | `.cust-badge` icon circles, floating dot indicators, theme toggle, popup close button, play button |

---

## 6. Icon system

**Technique:** one inline `<svg style="display:none">` sprite of `<symbol>` defs near the top of the widget; every icon instance is `<svg class="icon" width="W" height="H"><use href="#i-name"/></svg>`. No icon font, no external icon library.

```css
.icon { fill:none; stroke:currentColor; stroke-width:1.8; stroke-linecap:round; stroke-linejoin:round; }
```
Colour is inherited via `currentColor` / an explicit `color` on the wrapper — never hardcoded per-icon.

### 6.1 Icon sizes by context

| Context | Size | Colour |
|---|---|---|
| `.cust-badge .icon` (circular badge icon) | `22×22px` | `var(--color-white)` (badge bg is solid brand colour) |
| `.feature-bullets .icon` (inline list bullet) | `18×18px` | `var(--color-primary)` |
| `.dash-tile-label .icon` (mini dashboard label icon) | `14×14px` | `var(--color-primary)` |
| `.dash-head .icon` (dashboard header icon) | `16×16px` | `var(--color-primary)` |
| `.cust-theme-toggle .icon` | `18×18px` | `var(--color-primary)` |
| `.play-btn .icon` | `22×22px` | filled `var(--color-primary)` (this one uses `fill`, not `stroke`) |
| `.cust-popup-close .icon` | `16×16px` | `var(--text-heading)` |

### 6.2 Icon badge (the recurring "circle with icon" component)
```css
.cust-badge { width:48px; height:48px; border-radius:50%; background:var(--color-primary); display:flex; align-items:center; justify-content:center; }
```
Solid brand-colour fill with a white icon — chosen deliberately over a pastel tint for WCAG contrast (a 15% tint background scored ~1.1:1 contrast; solid brand + white icon fixes it — see project history in `tool-die-landing.html`).

### 6.3 Icon inventory (sprite symbols actually defined)

`i-eye, i-box, i-wrench, i-shield, i-percent, i-flame, i-thermo, i-activity, i-bell, i-sliders, i-ticket, i-cart, i-clock, i-link, i-check, i-sun, i-moon, i-play, i-oven, i-close` — all 24×24 viewBox, hand-drawn single-path/shape line icons (2px-ish stroke, rounded caps). Pick semantically matching icons per industry rather than reusing bakery-specific ones (oven/flame/thermo) verbatim.

---

## 7. Component patterns

### 7.1 Buttons
```css
.btn { display:inline-flex; align-items:center; justify-content:center; gap:8px; padding:14px 28px; border-radius:999px; font-size:16px; font-weight:700; border:1.5px solid transparent; }
.btn-primary { background:var(--color-primary); color:#fff; box-shadow:0 10px 24px rgba(0,131,200,.3); }
.btn-outline { background:var(--color-accent-red); color:#fff; } /* solid red fill, not a ghost/outline style despite the name */
.btn:hover { transform:translateY(-2px); }
```
Full-width on screens ≤520px.

### 7.2 Checklist item (hero USP list)
Badge icon (48px circle) + two-line text block (`<strong>` title + `<p>` description), `gap:14px`, items stacked with `gap:18px`.

### 7.3 Icon column (challenges / business-value strips)
Centered column: badge (48px, `margin-bottom:16px`) → `h4` → `p`. Three per row, 1-col stack below 760px.

### 7.4 Floating status cards (hero visual)
Two absolutely-positioned cards overlapping the hero image corners:
```css
.float-card { position:absolute; display:flex; flex-direction:column; gap:8px; padding:14px 16px; border-radius:10px; background:var(--bg-section-a); box-shadow:var(--shadow-float); border:1px solid color-mix(in srgb, var(--text-muted) 20%, transparent); min-width:190px; }
.float-card--live { top:-24px; right:-20px; }
.float-card--mock { bottom:-24px; left:-20px; }
```
A pulsing green status dot (`#1EA672`, `animation:cust-pulse 1.8s infinite`) marks "live" rows.

### 7.5 Stats card (solid brand-colour KPI strip)
```css
.stats-card { background:var(--color-primary); border-radius:20px; padding:clamp(32px,4vw,48px); display:grid; grid-template-columns:repeat(3,1fr); box-shadow:0 24px 50px rgba(0,131,200,.28); }
.stat-num { font-size:32px; font-weight:800; color:#fff; }
.stat-label { font-size:16px; color:rgba(255,255,255,.9); }
```
Numbers count up from 0 via `data-count-to`/`data-suffix` attributes + IntersectionObserver-triggered `requestAnimationFrame` loop (1.2s duration). A stat can also be static text (e.g. "Zero") by omitting `data-count-to`.

### 7.6 Feature block ("zigzag" solution panels)
Two-column: copy (eyebrow + h3 + p + icon bullet list) on one side, a **dashboard mock visual** on the other. Alternates copy-left/visual-right and copy-right/visual-left via `order`. The dashboard mock:
```css
.feature-visual { background:var(--bg-section-a); border-radius:10px; box-shadow:var(--shadow-card); padding:clamp(22px,3vw,30px); border:1px solid color-mix(...15%...); }
.dash-head { display:flex; justify-content:space-between; border-bottom:1px solid ...; } /* title + status icon */
.dash-grid { display:grid; grid-template-columns:repeat(2,1fr); gap:12px; }
.dash-tile { background:var(--bg-section-b); border-radius:12px; padding:14px; } /* icon+label, then a status pill */
```
Status pill colours: green (`#1EA672` family, `.dash-tile-tag`) for "nominal/placed/on track", brand-blue tint (`.tag-info`) for "alert/monitoring/triggered" states.

### 7.7 Secondary CTA banner (video + copy)
```css
.banner-card { background:var(--bg-section-b); border-radius:22px; overflow:hidden; display:grid; grid-template-columns:1fr 1fr; box-shadow:var(--shadow-card); }
.banner-video { aspect-ratio:5/4; background:linear-gradient(160deg, brand-tint 30%→8%); } /* video-poster placeholder gradient */
.play-btn { width:64px; height:64px; border-radius:50%; background:#fff; box-shadow:0 10px 24px rgba(0,0,0,.25); }
```
Video label caption pinned bottom-left/right over a dark scrim: `background:rgba(0,0,0,.45)`.

### 7.8 "Request a Demo" modal
Centered overlay (`rgba(0,0,0,.55)` scrim + `backdrop-filter:blur(6px)`), pill-shaped inputs, primary button full-width. Opens on any `[data-demo-cta]` click (multiple CTAs share one modal instance), closes on backdrop click / Escape / close button. Focus moves to the close button on open and returns to the trigger on close. `transform:translateY(18px) scale(.98)` → identity on `.is-open`, `.28s ease`.

**Stacking:** the host site's sticky header (`#site-header`) runs `z-index:999995`. Any modal overlay must clear that or it renders *behind* the header. `.fbb-popup-overlay` uses `z-index:999999` — matching the value already used site-wide for full-screen overlays (see `wp-header-shortcode.php`'s own `.demo-overlay`, `.mobile-panel`, `.scrim`) rather than an arbitrary new number. Reuse `999999` for any new full-screen modal on these pages.

**Form adoption:** the popup ships with a hardcoded fallback form (`<form id="fbbPopupForm" class="fbb-fallback-form">`) but auto-adopts a live Elementor Shortcode widget the same way §7.9 does — give the widget rendering `[formidable id="..."]` the CSS ID `fbb-demo-form`, and `adoptFbbForm()` (run on load and on every popup open) relocates it into `#fbbPopupFormSlot` and hides the fallback. **Gotcha:** hiding the fallback via the bare `hidden` attribute does *not* work on this page — the root reset rule `section#main-section * { all:revert; }` strips the browser's default `[hidden]{display:none}` UA rule out of the cascade. An explicit override is required: `section#main-section .fbb-fallback-form[hidden] { display:none!important; }`. Any element toggled via `.hidden = true` inside `section#main-section` needs this same explicit `[hidden]{display:none!important;}` rule — don't rely on the attribute alone.

### 7.9 "Schedule Discovery Call" modal — live Formidable form auto-adopt (production pattern)

A more robust modal variant for real lead-gen forms: instead of a hardcoded placeholder `<form>` swapped in later, the script **relocates** a live Elementor "Shortcode" widget (rendering `[formidable id="..."]`) into the modal's empty form slot, so Formidable's own scripts, nonces, and AJAX submit handler keep working untouched — nothing is recreated.

```html
<div class="schedule-popup-overlay" id="schedulePopup" data-schedule-popup hidden>
  <div class="schedule-popup" role="dialog" aria-modal="true" aria-labelledby="schedulePopupTitle" tabindex="-1">
    <button type="button" class="schedule-popup-close" data-schedule-popup-close aria-label="Close dialog">
      <svg class="icon"><use href="#i-close"/></svg>
    </button>
    <div class="schedule-popup-head">
      <p class="eyebrow">Book a Discovery Call</p>
      <h3 id="schedulePopupTitle">Schedule a Demo Call</h3>
      <p>Tell us a little about your operation and our team will follow up to find a time that works.</p>
    </div>
    <!-- SCHEDULE_FORM_SLOT_START -->
    <div class="schedule-popup-form" id="schedulePopupFormSlot"></div>
    <!-- SCHEDULE_FORM_SLOT_END -->
  </div>
</div>
```

**Trigger convention:** any element with `[data-schedule-demo]` opens the popup — a sibling convention to `[data-demo-cta]` in §7.8. Pick one trigger attribute per page; don't mix the two modal patterns on the same page.

**Form adoption — the key difference from §7.8:**
- The Formidable form is never written into the popup markup. In Elementor, give the "Shortcode" widget that renders `[formidable id="..."]` the CSS ID `schedule-demo-form` (Advanced ▸ CSS ID panel).
- `adoptScheduleForm()` runs on `DOMContentLoaded`, again on `window.load` (catches late-rendering widgets), and again every time the popup opens. It looks for, in priority order: `#schedule-demo-form` / `.schedule-demo-form` → any `.elementor-widget-shortcode` containing `.frm_forms` or a bare `<form>` → a bare `.frm_forms` anywhere on the page. The first match found is **moved** (`appendChild`, not cloned) into `#schedulePopupFormSlot` and given `display:block`.
- A `scheduleFormMoved` flag makes adoption idempotent — safe to re-invoke on every open without re-querying or re-moving an already-placed form.

**Focus & lifecycle (stricter than §7.8):**

| Step | Behavior |
|---|---|
| Open | `adoptScheduleForm()` runs first; `lastFocused = document.activeElement`; overlay `hidden=false`; body scroll locked (`overflow:hidden`); a `keydown` listener for Escape is **attached** for the duration the popup is open |
| Focus | Next animation frame: `.is-open` is added and focus moves to the first `input`/`textarea` inside `.schedule-popup-form`, falling back to the close button if the form hasn't finished adopting yet |
| Close (Escape / backdrop click / close button) | `.is-open` removed; body scroll restored; the Escape `keydown` listener is **removed** (not left dangling on `document`); overlay set `hidden=true` after a 250ms delay to let the close transition finish; focus returned to `lastFocused` |
| Backdrop vs panel click | Click handler lives on the overlay and closes on any click that hits it directly; `.schedule-popup` (the panel) calls `stopPropagation()` so clicks inside the form/content never bubble up and self-close the modal |

**When to use which modal:** both §7.8 and §7.9 now auto-adopt a live Formidable widget by CSS ID (`fbb-demo-form` / `schedule-demo-form`), so the only real difference is what happens *before* a widget is adopted — §7.8 shows a working hardcoded fallback form, §7.9 shows nothing until adoption succeeds. Use §7.8's pattern when the popup needs to function even before an Elementor form is wired up; use §7.9's empty-slot pattern when a form is guaranteed to exist by the time the popup ships. The scoped add/remove of the Escape listener (rather than one permanent document-level listener) is the safer approach to copy forward into new modals either way.

---

## 8. Section sequence (generic page structure)

```
1. Hero            — eyebrow + h1 + icon checklist (3 USPs) + 2 CTA buttons + hero image w/ 2 floating status cards
2. Stats bar       — solid brand-colour card, 3-column KPIs (mix of static + count-up numbers)
3. Intro/Challenges— centered heading + lead paragraph, then 3-column icon-badge grid of pain points
4. Solution 1      — feature block: copy+bullets left, dashboard mock right
5. Solution 2      — feature block reversed: dashboard mock left, copy+bullets right
6. Business value  — centered heading + lead paragraph, then 3-column icon-badge grid of outcomes
7. Video/CTA banner— 2-col: video placeholder + play button | heading + copy + CTA button
[Footer — not part of the widget; inherited from host theme]
```
This is a reusable skeleton — for a different industry, keep the section order and swap: eyebrow/heading copy, icon choices, dashboard tile labels/values, and stat numbers.

---

## 10. Interaction & motion

| Behavior | Mechanism |
|---|---|
| Theme toggle | `data-theme` attribute swap on root + `localStorage.setItem('cust-theme', mode)`; persisted across visits |
| Scroll reveal | `.reveal` → `.in-view` via `IntersectionObserver` (threshold 0.15); `opacity:0; translateY(20px)` → `opacity:1; none`, `.6s ease`; skipped entirely under `prefers-reduced-motion:reduce` |
| Stat count-up | `IntersectionObserver` (threshold 0.4) triggers a `requestAnimationFrame` tween from 0 to `data-count-to` over 1200ms |
| Live-status pulse | CSS `@keyframes cust-pulse` (`opacity 1↔.35`, 1.8s) on the small status dots, gated by `prefers-reduced-motion:no-preference` |
| "Explore the Platform" CTA | Smooth-scrolls to the Intro section (`scrollIntoView({behavior:'smooth'})`) |
| Demo modal (§7.8) | Shared overlay wired to every `[data-demo-cta]` button; focus-trap-lite (focus moves in/out), Escape closes via a permanent document listener |
| Schedule-demo modal (§7.9) | Shared overlay wired to every `[data-schedule-demo]` button; live Formidable form relocated into the slot on load and on each open; Escape listener scoped to attach/detach per open-cycle; body scroll locked while open |

---

## 11. Responsive breakpoints

| Breakpoint | Change |
|---|---|
| `max-width:980px` | Hero grid → 1 column; visual centers below copy, capped `max-width:460px` |
| `max-width:900px` | Feature (zigzag) grid → 1 column; `order` resets to document order |
| `max-width:820px` | Banner card → 1 column |
| `max-width:760px` | 3-col icon row → 1 column, gap bumped to 32px |
| `max-width:700px` | Stats card → 1 column |
| `max-width:520px` | Buttons go full-width |

---

## 12. Accessibility

- `:focus-visible { outline:2px solid var(--color-primary); outline-offset:3px; border-radius:4px; }` globally.
- Decorative SVGs (sprite root) marked `aria-hidden="true"`.
- Modal: `role="dialog" aria-modal="true" aria-labelledby`, focus sent into the panel on open (close button, or first field for §7.9's form-adopting variant), returned to the trigger on close, Escape-to-close.
- All motion (`reveal`, pulse dot) wrapped in `@media (prefers-reduced-motion: no-preference)` with a static fallback.
- Hero illustration uses `role="img" aria-label="..."` with a descriptive label.

---

## 13. Checklist for a new industry page built on this pattern

- [ ] Root: `<section id="main-section" class="[slug]-landing" data-theme="light">`, all CSS scoped to `section#main-section`
- [ ] Copy the 6 token blocks in §3 verbatim (brand colours are shared across all ITHENA pages — don't reinvent)
- [ ] Font stack: `'Noto Sans',-apple-system,BlinkMacSystemFont,'Segoe UI',Roboto,sans-serif`
- [ ] All font sizes even px, matching the §3.5 scale
- [ ] Follow the 7-section sequence in §9; swap copy/icons/dashboard data only
- [ ] Icon sprite: define only the symbols this page actually uses, `.icon` class with `stroke:currentColor`
- [ ] Badges solid `var(--color-primary)` fill + white icon (not a pastel tint — fails contrast)
- [ ] `btn-primary` = brand blue, `btn-outline` = solid `var(--color-accent-red)` (not transparent)
- [ ] Section blend gradient (`::before`, 120–160px) between every section, hero excluded
- [ ] Reveal-on-scroll + reduced-motion fallback wired via the same IntersectionObserver pattern
- [ ] One shared modal wired to its trigger attribute — §7.8's `[data-demo-cta]` placeholder-form pattern, or preferably §7.9's `[data-schedule-demo]` live-Formidable-adopt pattern if a real form already exists on the page
