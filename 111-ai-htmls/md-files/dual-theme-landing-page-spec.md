# ITHENA Landing Page — Design System Reference

> **Purpose:** This document is the single source of truth Claude must follow when building any ITHENA industry landing page. Every value here is extracted from the live production site (`food-beverage-bakery`, `packaging-landing`). Do not invent new tokens — use what is listed.

---

## 1. Scoping & Isolation

Every landing page is a fully self-contained WordPress/Elementor block. All CSS must be:

- Scoped to a unique root element: `main.[page-slug]` (e.g. `main.packaging-landing`, `main.bakery-landing`).
- Scoped to a same root element: `main#main-section`
- Marked `!important` on every property to prevent theme bleed.
- Written as **one declaration per line** (selector + all declarations on a single line).
- Non-colour rules (grid, spacing, border-radius, transitions, animations) are inherited once from the root and never duplicated inside theme overrides.

```css
/* Correct single-line format */
main.page-slug .classname { property: value!important; property: value!important; }

/* Wrong — multi-line */
main.page-slug .classname {
  property: value!important;
}
```

Isolation boundary (always include, always first):

```css
main.page-slug, main.page-slug *:not(svg):not(svg *) { all:revert; }
main.page-slug, main.page-slug *, main.page-slug *::before, main.page-slug *::after { box-sizing:border-box!important; }
main.page-slug *, main.page-slug *::before, main.page-slug *::after { box-sizing:border-box!important; margin:0!important; padding:0!important; }
```

---

## 2. Theme Architecture

### 2.1 Parent selectors

| Theme | Selector |
|---|---|
| Light (default) | `main.page-slug` |
| Dark override | `main.page-slug[data-theme="dark"]` |

The light theme is always the **default** — no attribute needed. Dark mode is toggled by adding `data-theme="dark"` to the root element.

**Never use a bare `[data-theme]` selector without the page-slug parent.** Every override must follow the full parent-child chain:

```css
/* Correct */
main.page-slug[data-theme="dark"] .card { background:var(--surface)!important; }

/* Wrong — no parent scope */
[data-theme="dark"] .card { background:var(--surface)!important; }
```

### 2.2 Token blocks

Define all design tokens on the root element itself. The dark-theme block overrides only what changes — the full structure:

```css
/* Light tokens — default */
main.page-slug {
  --bg-primary: #ffffff;
  --bg-alt:     #d7ecf6;
  /* ... all tokens ... */
  color-scheme: light!important;
}

/* Dark tokens — override */
main.page-slug[data-theme="dark"] {
  --bg-primary: #0d1b2e;
  --bg-alt:     #123049;
  /* ... all tokens ... */
  color-scheme: dark!important;
}
```

---

## 3. Colour Tokens

### 3.1 Light theme

| Token | Value | Usage |
|---|---|---|
| `--bg-primary` | `#ffffff` | Page background, hero, CTA sections |
| `--bg-alt` | `#d7ecf6` | Alternating section backgrounds |
| `--surface` | `#ffffff` | Card backgrounds, panels |
| `--surface-hover` | `#f0f4f8` | Card hover state, ghost button hover |
| `--border` | `#e1e5eb` | All card and input borders |
| `--text-primary` | `#000000` | Headings, body copy, strong labels |
| `--text-secondary` | `#4d5563` | Sub-copy, descriptions, list items |
| `--brand` | `#0082c8` | Icons, strokes, focus rings, active states |
| `--brand-strong` | `#00679d` | Eyebrow text, strong-accent links |
| `--brand-dark` | `#00588a` | Gradient endpoint, deep brand |
| `--brand-grad` | `linear-gradient(135deg, #0082c8, #00588a)` | CTAs, stat numbers, progress bars |
| `--secondary` | `#c00000` | Error, accent-red, eyebrow dots |
| `--secondary-dark` | `#8a0000` | Secondary gradient endpoint |
| `--secondary-grad` | `linear-gradient(135deg, #c00000, #8a0000)` | Accent-red decorations |
| `--glow-blue` | `rgba(0, 130, 200, .16)` | Card hover glows, hero radial |
| `--glow-red` | `rgba(192, 0, 0, .12)` | Red accent glows |
| `--glass-1` | `rgba(0, 0, 0, .035)` | Faintest glass tint |
| `--glass-2` | `rgba(0, 0, 0, .05)` | Light glass tint, stat bars |
| `--glass-3` | `rgba(0, 0, 0, .08)` | Medium glass tint |
| `--glass-border` | `rgba(0, 0, 0, .12)` | Glass panel borders |
| `--glass-border-strong` | `rgba(0, 0, 0, .2)` | SVG connector lines |
| `--glass-dot` | `rgba(0, 0, 0, .15)` | Hero grid dots |
| `--shadow-sm` | `0 1px 2px rgba(0,0,0,.06)` | Subtle card elevation |
| `--shadow-md` | `0 8px 24px rgba(0,0,0,.08)` | Panel / hero visual shadow |
| `--shadow-lg` | `0 20px 48px rgba(0,0,0,.14)` | Lifted card, modal |

### 3.2 Dark theme overrides

| Token | Light value | Dark value |
|---|---|---|
| `--bg-primary` | `#ffffff` | `#0d1b2e` |
| `--bg-alt` | `#d7ecf6` | `#123049` |
| `--surface` | `#ffffff` | `#121212` |
| `--surface-hover` | `#f0f4f8` | `#1c1c1c` |
| `--border` | `#e1e5eb` | `#2a2a2a` |
| `--text-primary` | `#000000` | `#ffffff` |
| `--text-secondary` | `#4d5563` | `#b0b3b8` |
| `--brand` | `#0082c8` | `#2ea6e6` |
| `--brand-strong` | `#00679d` | `#4db4ea` |
| `--brand-dark` | `#00588a` | `#1c86bf` |
| `--brand-grad` | `linear-gradient(135deg,#0082c8,#00588a)` | `linear-gradient(135deg,#2ea6e6,#0082c8)` |
| `--secondary` | `#c00000` | `#e23c3c` |
| `--secondary-dark` | `#8a0000` | `#c00000` |
| `--secondary-grad` | `linear-gradient(135deg,#c00000,#8a0000)` | `linear-gradient(135deg,#e23c3c,#c00000)` |
| `--glow-blue` | `rgba(0,130,200,.16)` | `rgba(0,130,200,.38)` |
| `--glow-red` | `rgba(192,0,0,.12)` | `rgba(192,0,0,.28)` |
| `--glass-1` | `rgba(0,0,0,.035)` | `rgba(255,255,255,.04)` |
| `--glass-2` | `rgba(0,0,0,.05)` | `rgba(255,255,255,.05)` |
| `--glass-3` | `rgba(0,0,0,.08)` | `rgba(255,255,255,.08)` |
| `--glass-border` | `rgba(0,0,0,.12)` | `rgba(255,255,255,.14)` |
| `--glass-border-strong` | `rgba(0,0,0,.2)` | `rgba(255,255,255,.18)` |
| `--glass-dot` | `rgba(0,0,0,.15)` | `rgba(255,255,255,.25)` |
| `--shadow-sm` | `0 1px 2px rgba(0,0,0,.06)` | `0 1px 2px rgba(0,0,0,.5)` |
| `--shadow-md` | `0 8px 24px rgba(0,0,0,.08)` | `0 8px 24px rgba(0,0,0,.5)` |
| `--shadow-lg` | `0 20px 48px rgba(0,0,0,.14)` | `0 24px 56px rgba(0,0,0,.6)` |

---

## 4. Section Backgrounds

Sections alternate between `--bg-primary` and `--bg-alt` using a linear-gradient fade so there are **no hard edges or dividers** between sections — one colour bleeds smoothly into the next.

### 4.1 Alternating pattern

```css
/* Odd sections: alt colour fades down into primary */
main.page-slug > section:nth-of-type(odd) {
  background: linear-gradient(180deg, var(--bg-alt) 0, var(--bg-primary) clamp(64px,8vw,140px))!important;
}

/* Even sections: primary fades down into alt */
main.page-slug > section:nth-of-type(even) {
  background: linear-gradient(180deg, var(--bg-primary) 0, var(--bg-alt) clamp(64px,8vw,140px))!important;
}

/* Hero (first section): always solid primary */
main.page-slug > section:first-of-type {
  background: var(--bg-primary)!important;
}
```

### 4.2 Theme-specific section colours

| Theme | `--bg-primary` | `--bg-alt` |
|---|---|---|
| Light | `#ffffff` | `#d7ecf6` |
| Dark | `#0d1b2e` | `#123049` |

The gradient approach means no `border-top`, `border-bottom`, or `box-shadow` is ever placed between sections. `transition: background-color .35s ease` on `section` ensures theme-toggle animations are smooth.

---

## 5. Typography

### 5.1 Font families

| Role | Family | Stack |
|---|---|---|
| Display / headings | **Noto** | `''Noto Sans',-apple-system,BlinkMacSystemFont,'Segoe UI',Roboto,sans-serif` |
| Body / UI | **Noto** (same family) | `''Noto Sans',-apple-system,BlinkMacSystemFont,'Segoe UI',Roboto,sans-serif` |
| Monospace labels | Noto (or inherit) | Same stack — no separate mono family in production |

Import from Google Fonts:
```html
<link rel="preconnect" href="https://fonts.googleapis.com">
<link href="https://fonts.googleapis.com/css2?family=Sora:wght@400;600;700;800&display=swap" rel="stylesheet">
```

### 5.2 Font sizes — EVEN px only

All font sizes must be **even integers** in px. Never use odd px values (13px, 15px, 17px, 19px, 21px, etc.).

| Token / use | Size | Notes |
|---|---|---|
| H1 hero | `clamp(34px, 4.2vw + 16px, 48px)` | clamp endpoints must be even |
| H2 section | `clamp(28px, 2.6vw + 16px, 34px)` | |
| H3 card title | `clamp(18px, 1vw + 12px, 20px)` | |
| H4 / card heading | `18px` | |
| Stat number | `clamp(42px, 5vw, 58px)` | Sora 800 |
| Body / paragraph | `16px` | |
| Card body copy | `14px` | |
| Eyebrow label | `12px` | uppercase, letter-spacing .14em |
| Tag / badge | `12px` | uppercase, letter-spacing .08em |
| SVG node label | `12px` | |
| Small / meta | `12px` | |
| Button primary | `16px` | weight 600 |
| Button small | `14px` | weight 600 |
| Section-head sub | `16px` | |
| List item | `14px` | |

**Rule:** If a value resolves to an odd number (e.g. `13.5px`, `15px`), round up to the next even integer (`14px`, `16px`).

### 5.3 Font weights

| Weight | Usage |
|---|---|
| 400 | Body text, descriptions |
| 600 | Buttons, nav items, card labels, list items |
| 700 | Headings h2–h4, eyebrows, tags, strong |
| 800 | H1, stat numbers, logo wordmark |

### 5.4 Line heights

| Context | Value |
|---|---|
| Headings | `1.18` |
| Body text | `1.6` |
| Stat numbers | `1` |
| Tags / badges | `1` (set via min-height or padding) |

### 5.5 Letter spacing

| Context | Value |
|---|---|
| Headings | `-0.01em` |
| Eyebrow labels | `0.14em` |
| Badge / tag | `0.08em` |
| Stat prefix | `0.02em` |
| Body | none (browser default) |

---

## 6. Layout & Spacing

### 6.1 Container

```css
max-width: 1200px;
margin-inline: auto;
padding-inline: clamp(20px, 4vw, 40px);
```

### 6.2 Section padding

```css
padding-block: clamp(32px, 4vw, 56px);
```

### 6.3 Common grid patterns

| Pattern | CSS |
|---|---|
| Hero 2-col (copy + visual) | `grid-template-columns: 1.05fr .95fr` |
| 3-col cards | `grid-template-columns: repeat(3, 1fr)` |
| 2-col detail | `grid-template-columns: .85fr 1.15fr` |
| 2-col detail reversed | `grid-template-columns: 1.15fr .85fr` |
| 4-col stats | `grid-template-columns: repeat(4, 1fr)` |
| Stat strip | `grid-template-columns: repeat(3, 1fr)` |
| Before/After | `grid-template-columns: 1fr auto 1fr` |

### 6.4 Border radii

| Token | Value | Usage |
|---|---|---|
| `--radius-sm` | `10px` | Inputs, small buttons |
| `--radius-md` | `16px` | Cards, panels |
| `--radius-lg` | `24px` | Large panels, CTA banner |

### 6.5 Icon sizes

| Class | Size | Usage |
|---|---|---|
| `.icon` | `24×24px` | Standard inline icons -  white in color |
| `.icon-sm` | `16×16px` | List bullets, inline accents - white in color |

---

## 7. Component Patterns

### 7.1 Eyebrow label

Small uppercase text that precedes a section heading. Always brand blue, with a 2px gradient line before it.

```css
.eyebrow { display:inline-flex; align-items:center; gap:8px; font-size:12px; font-weight:700; letter-spacing:.14em; text-transform:uppercase; color:var(--brand-strong); margin-bottom:14px; }
.eyebrow::before { content:""; width:22px; height:2px; background:var(--brand-grad); border-radius:2px; }
```

### 7.2 Cards

All cards share: `background:var(--surface)`, `border:1px solid var(--border)`, `border-radius:var(--radius-lg)`, `box-shadow:var(--shadow-sm)`.

Hover state: `border-color` transitions to `color-mix(in srgb, var(--brand) 35%, var(--border))`. Some cards also `translateY(-4px)` on hover.

The `.lift-card` class adds a stronger shadow on hover:
```
box-shadow: var(--shadow-lg), 0 0 0 1px color-mix(in srgb, var(--brand) 14%, transparent), 0 14px 32px -12px var(--glow-blue)
```

### 7.3 Stat card

Left accent bar: `width:5px; height:100%; background:var(--brand-grad)` — absolutely positioned at top-left.

Stat number: gradient text using `-webkit-background-clip:text` with `var(--brand-grad)`.

### 7.4 Buttons

| Variant | Background | Text | Shadow |
|---|---|---|---|
| Primary | `var(--brand-grad)` | `#fff` | `0 8px 20px rgba(0,130,200,.3)` |
| Ghost | `transparent` | `var(--text-primary)` | none |
| CTA (on dark banner) | `#fff` | `var(--brand-dark)` | `0 10px 26px rgba(0,0,0,.18)` |

All buttons: `border-radius:999px`, `font-weight:600`, `font-size:16px`, `padding:14px 26px`.  
Small variant: `font-size:14px`, `padding:9px 18px`.  
Hover: `translateY(-2px)` + increased glow.

### 7.5 Badge / pill tag

Two types: brand-blue tint and neutral-glass.

```
Brand:   background color-mix(in srgb, var(--brand) 16%, transparent), color var(--brand-strong)
Neutral: background var(--glass-2), color var(--text-secondary)
```

Both: `font-size:12px`, `font-weight:700`, `letter-spacing:.08em`, `text-transform:uppercase`, `border-radius:999px`, `padding:4px 10px`.

### 7.6 Icon box

Square container for feature icons: `border-radius:12px`, `background:color-mix(in srgb, var(--brand) 15%, var(--surface))`, icon colour `white`. Size: `48×48px` (standard) or `44×44px` (compact).

### 7.7 Stat bar / progress strip

`height:6px`, `border-radius:999px`, `background:var(--glass-2)`. Fill: `background:var(--brand-grad)`, animated width on `.in-view` using `transition:width 1.4s cubic-bezier(.22,.9,.24,1)`.

### 7.8 Before / After panel pair

Grid: `1fr auto 1fr`. Centre arrow: `44×44px` circle with `var(--brand-grad)` background. "Before" panel: `opacity:.72`, `background:var(--glass-1)`. "After" panel: full surface colour with brand-tinted border.

### 7.9 CTA banner (final section)

Full-width gradient block: `background:var(--brand-grad)`, `border-radius:var(--radius-lg)`, `text-align:center`. Heading and paragraph in `#fff`. White primary button, semi-transparent ghost button.

---

## 8. Section Sequence (page structure)

Every industry landing page follows this section order. Copy and visual IDs change per industry, but the structure is fixed:

```
1. Hero            — headline + USP bullets + CTA buttons + ecosystem visual
2. Challenges      — 3-card grid of industry pain points
3. Stats           — 3-column KPI strip with animated numbers
4. Solution 1      — detail panel: copy left, dashboard visual right
5. Solution 2      — detail panel reversed: visual left, copy right
6. Business value  — 3–4 column value strip
7. Video / CTA     — embedded video or secondary form
8. Final CTA       — full-width gradient banner + demo request form
```

Section backgrounds alternate per the gradient rule in §4. The hero (section 1) is always `--bg-primary` (solid, no gradient).

---

## 9. Hero Pattern

### 9.1 Layout

2-column grid on desktop (`1.05fr .95fr`), stacks to 1-column below 980px. Minimum height `100vh` not required — let content breathe at `padding-block: clamp(110px,9vw,140px) clamp(40px,4.5vw,60px)`.

### 9.2 Background treatment

Blue radial glow top-right behind the visual:
```css
radial-gradient(circle at 65% 35%, var(--glow-blue), transparent 62%)
```

### 9.3 Headline

- Eyebrow label above H1 (12px, brand colour, uppercase)
- H1: `clamp(34px, 4.2vw + 16px, 58px)`, weight 800
- Lead paragraph: `16px`, `color:var(--text-secondary)`, max-width 560px
- Sub note (optional): `16px`, `color:var(--text-secondary)` faint

### 9.4 CTA row

Flex row, gap 14px, wraps on mobile. Two buttons: primary gradient + ghost outline.

### 9.5 Ecosystem visual

SVG diagram with animated pulse lines (`stroke-dasharray:8 220`, `animation:eco-flow 4.5s linear infinite`). Float cards (`position:absolute`) sit above and below. Idle float animation: `translateY(-7px)` at 50%.

### 9.6 Theme toggle button

Fixed position `top:100px, right:clamp(20px,4vw,40px)`. Circle 44px, brand icon. Swap sun/moon icon using:
```css
main.page-slug .moon { display:none!important; }
main.page-slug[data-theme="dark"] .sun { display:none!important; }
main.page-slug[data-theme="dark"] .moon { display:block!important; }
```

---

## 10. Animation System

### 10.1 Scroll reveal

All cards and section content use `.reveal` / `.in-view` classes driven by an IntersectionObserver script.

Default: `opacity:0; transform:translateY(28px)` → `opacity:1; transform:none` on `.in-view`.  
Duration: `0.7s cubic-bezier(.16,1,.3,1)`.  
Directional variants: `reveal-down`, `reveal-up`, `reveal-right`, `reveal-left` — `1.1s cubic-bezier(.22,.9,.24,1)`.  
Stagger (`.stagger` parent): children delayed `.1s`, `.28s`, `.46s`, `.64s`, `.82s`, `1s`.

Always wrap in `@media (prefers-reduced-motion: no-preference)`.

### 10.2 Standard transitions

| Property | Value |
|---|---|
| Card hover | `transform .28s cubic-bezier(.22,.9,.24,1), box-shadow .28s ease` |
| Theme toggle | `background-color .35s ease, color .35s ease` |
| Button | `transform .25s ease, box-shadow .25s ease, background-color .25s ease, color .25s ease, border-color .25s ease` |
| Focus ring | none — immediate |

### 10.3 Named keyframe animations

| Name | Effect | Usage |
|---|---|---|
| `eco-idle-float` | `translateY(0)` ↔ `translateY(-7px)` | SVG ecosystem diagram |
| `eco-flow` | `stroke-dashoffset` 228→0 | SVG pulse lines |
| `eco-float` | `translateY(0)` ↔ `translateY(-8px) rotate(-1.2deg)` | Hero float cards |
| `zig-dots-flow` | `background-position` 0→12px | Zigzag connector dots |
| `tele-pulse` | `opacity 1→.35` | Live-dot blink |
| `poFadeUp` (modal) | `translateY(40px)→0` + opacity | Panel/modal reveal |

---

## 11. Responsive Breakpoints

| Breakpoint | Layout changes |
|---|---|
| `max-width:980px` | Hero stacks to 1 column; visual centres below copy |
| `max-width:760px` | 3-col stats → 1 col; zigzag → linear list; before/after stacks |
| `max-width:640px` | Solution cards → 1 col; value grid adjusts |
| `max-width:560px` | Mobile typography, float cards hidden, button full-width |
| `max-width:520px` | Buttons stack; hero CTAs column |
| `max-width:480px` | Fine-tune tap targets, reCAPTCHA scaled |

Tablet breakpoints (short viewports): `(min-width:768px) and (max-height:860px)` — tighter gaps, reduced field heights.

---

## 12. Accessibility

- `:focus-visible` always set: `outline:2px solid var(--brand); outline-offset:3px; border-radius:4px`.
- Skip-to-content link: `.skip-link` absolutely positioned off-screen, visible on focus.
- All animations wrapped in `@media (prefers-reduced-motion: no-preference)`.
- Forced colours mode: `@media (forced-colors:active)` — set `border:1px solid ButtonText` on interactive controls.
- SVG icons: decorative (`aria-hidden`); functional ones need `aria-label`.

---

## 13. CSS Architecture Checklist

Before submitting any landing page CSS, verify:

- [ ] All rules scoped to `main.[page-slug]`
- [ ] All properties marked `!important`
- [ ] Every rule on **one line** (selector + declarations)
- [ ] All font sizes are **even px integers** (12, 14, 16, 18, 20, 22, 24, 28, 34, 40, 42, 58 etc.)
- [ ] Light tokens defined on `main.[page-slug]` with no attribute
- [ ] Dark tokens defined on `main.[page-slug][data-theme="dark"]`
- [ ] Section BGs use gradient fade: light `#ffffff`↔`#d7ecf6`, dark `#0d1b2e`↔`#123049`
- [ ] Hero section overrides to solid `var(--bg-primary)` (no gradient)
- [ ] No `border-top` or `border-bottom` between adjacent sections
- [ ] `transition:background-color .35s ease` on `section` for smooth theme switch
- [ ] All animations in `@media (prefers-reduced-motion: no-preference)`
- [ ] `@media (forced-colors:active)` fallback on interactive controls
- [ ] No colour values written raw — use tokens via `var()` except in the token block itself

---

## 14. Quick-Reference: Light vs Dark at a Glance

```
                  LIGHT                DARK
Page bg:          #ffffff              #0d1b2e
Alt section bg:   #d7ecf6              #123049
Card surface:     #ffffff              #121212
Card surface hover: #f0f4f8           #1c1c1c
Border:           #e1e5eb              #2a2a2a
Primary text:     #000000              #ffffff
Secondary text:   #4d5563              #b0b3b8
Brand blue:       #0082c8              #2ea6e6
Brand gradient:   #0082c8→#00588a     #2ea6e6→#0082c8
Red accent:       #c00000              #e23c3c
Glass border:     rgba(0,0,0,.12)     rgba(255,255,255,.14)
Shadows:          rgba(0,0,0,.06/.08/.14) rgba(0,0,0,.5/.5/.6)
```
