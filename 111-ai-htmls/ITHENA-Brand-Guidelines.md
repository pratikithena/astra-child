# ITHENA Brand Guidelines
### Visual Identity Standards for Product & Industry Landing Pages

> **Source:** Distilled from the design system implemented on `dev-website.ithena.app` (originally built for the Food & Beverage/Bakery vertical). This document defines the *brand* rules — colour, type, layout, iconography, and component design — that must remain consistent across every industry landing page (Packaging, Tool & Die, Industrial Defense, and future verticals). Copy, imagery, and icon selection change per industry; the system defined here does not.

---

## 1. Brand Colour System

ITHENA's palette is intentionally minimal — one brand blue, one accent red, and a light/dark neutral system built around them. Brand colours are **fixed** and do not change between light and dark mode.

### 1.1 Core brand colours

| Colour | Hex | Role |
|---|---|---|
| **Primary Blue** | `#0083C8` | Primary brand colour — buttons, icons, links, badges, stat cards |
| **Accent Red** | `#C00000` | Secondary CTA fill only — used sparingly, never as a background colour |
| White | `#FFFFFF` | Text-on-brand, icon fills on solid colour |
| Black | `#000000` | Reference black — not applied directly as a surface or text token |

### 1.2 Light mode palette (default)

| Token | Hex | Application |
|---|---|---|
| Surface A | `#FFFFFF` | Primary section background, cards, modals |
| Surface B | `#D7ECF6` | Alternating section background, tile fills |
| Heading text | `#000000` | H1–H4, emphasis labels |
| Body text | `#333333` | Paragraph copy |
| Muted text | `#666666` | Micro-copy, supporting labels, hairline borders |

### 1.3 Dark mode palette

| Token | Hex / Value | Application |
|---|---|---|
| Surface A | `#123049` | Primary section background |
| Surface B | `#0D1B2E` | Alternating section background |
| Heading text | `#FFFFFF` | H1–H4, emphasis labels |
| Body text | `rgba(215,236,246,0.8)` | Paragraph copy |
| Muted text | `#8FAFC4` | Micro-copy, supporting labels |

**Brand rule:** Every page ships with both a light and dark presentation, toggled by the viewer — never hard-coded to one mode. The brand blue and accent red never change value between modes; only the neutral surfaces and text shift.

### 1.4 Elevation & depth

| Token | Light | Dark | Use |
|---|---|---|---|
| Card shadow | `0 18px 40px rgba(0,0,0,.10)` | `0 18px 40px rgba(0,0,0,.45)` | Cards, feature visuals, modals |
| Float shadow | `0 12px 28px rgba(0,0,0,.16)` | `0 12px 28px rgba(0,0,0,.50)` | Floating status cards, toggle button |

---

## 2. Typography

### 2.1 Typeface

A single type family is used across headings and body copy — ITHENA does not use a separate display font.

> **Noto Sans**, falling back to `-apple-system, BlinkMacSystemFont, "Segoe UI", Roboto, sans-serif`

### 2.2 Type scale

All sizes are fixed, even-pixel values — no fractional or fluid type sizes.

| Style | Size | Weight | Line height |
|---|---|---|---|
| H1 (hero headline) | 48px | 800 (Extra Bold) | 1.2 |
| H2 (section heading / stat number) | 32px | 800 (Extra Bold) | 1.2 |
| H3 (feature heading) | 24px | 700 (Bold) | 1.2 |
| H4 (icon-column heading) | 18px | 700 (Bold) | 1.2 |
| Body copy | 16px | 500 (Medium) | 1.6 |
| Eyebrow / kicker | 12px | 700, uppercase, 0.14em tracking | — |
| Micro copy | 14px | inherit | — |

### 2.3 Eyebrow (kicker) treatment

Every heading is preceded by a small uppercase label in brand blue, marked by a short horizontal rule — this is a signature ITHENA pattern and should appear above every major section heading.

**Colour:** Primary Blue · **Style:** uppercase, bold, wide letter-spacing, with a 22px accent rule to its left.

---

## 3. Layout & Spacing

### 3.1 Container

- **Max width:** 1240px, centered
- **Horizontal padding:** fluid, scaling between 20px and 40px depending on viewport

### 3.2 Vertical rhythm

- Standard sections: fluid padding between 40px and 96px top/bottom
- Hero section: extra top clearance (96–128px) to clear the sticky header

### 3.3 Section alternation

Sections alternate between Surface A and Surface B backgrounds down the page, with a soft gradient blend at the top of each section — **there are never hard dividing lines** between sections. This soft transition is a core brand signature; sections should never feel like separate "blocks" stacked with visible seams.

### 3.4 Grid patterns

| Layout | Structure | Typical use |
|---|---|---|
| Hero split | Copy-led, slightly asymmetric (~55/45) | Hero section |
| 3-column | Equal thirds | Challenges / value-proposition strips |
| Zigzag feature | Equal halves, alternating order | Solution/feature panels |
| 2×2 tile grid | Equal quadrants | Dashboard mock visuals |
| 2-column banner | Equal halves | Video / closing CTA banner |

### 3.5 Corner radius system

| Radius | Applied to |
|---|---|
| 10px | Cards, hero imagery, form containers |
| 12px | Dashboard tiles |
| 20px | Stats bar card |
| 22px | Banner card |
| Pill (999px) | All buttons, inputs, tags/badges |
| Circle (50%) | Icon badges, floating indicator dots, toggle & close buttons |

**Brand rule:** Sharp, unrounded corners do not appear anywhere in the system. Buttons and tags are always fully pill-shaped; cards are always softly rounded.

---

## 4. Iconography

- **Style:** Hand-drawn, single-weight line icons, 24×24 base grid, rounded caps and joins, ~1.8px stroke.
- **Colour:** Icons never carry a hardcoded colour — they inherit colour from their context (`currentColor`), so the same icon can appear in brand blue, white, or a text colour depending on placement.
- **No icon fonts or third-party icon libraries** — every icon is a custom-drawn shape, keeping the visual language distinct and on-brand.

### 4.1 Icon sizing by context

| Context | Size | Colour |
|---|---|---|
| Circular badge icon | 22×22px | White (on solid brand-blue badge) |
| Inline bullet icon | 18×18px | Primary Blue |
| Dashboard label icon | 14–16px | Primary Blue |
| Toggle / utility icon | 18px | Primary Blue |
| Close / dismiss icon | 16px | Heading text colour |

### 4.2 Icon badge component

The circular "badge with icon" is ITHENA's signature UI motif — used for checklist items, feature highlights, and value propositions throughout every page.

- 48px circle, solid Primary Blue fill, centered white icon.
- **Always solid fill, never a pastel/tinted background** — a light blue tint fails accessible contrast for the icon on top of it. This is a firm brand + accessibility rule, not a stylistic option.

### 4.3 Icon selection per industry

The base icon set (eye, box, wrench, shield, percent, flame, thermometer, activity, bell, sliders, ticket, cart, clock, link, check, sun, moon, play, close, etc.) is a shared library. When building a new industry page, select icons that are **semantically appropriate to that industry** rather than reusing icons from another vertical verbatim (e.g., don't carry bakery-specific oven/flame icons onto a packaging or defense page).

---

## 5. Components

### 5.1 Buttons

| Style | Fill | Text | Use |
|---|---|---|---|
| Primary | Primary Blue | White | Main CTA — "Request a Demo," "Get Started" |
| Secondary | Accent Red (solid fill) | White | Secondary CTA — despite the name "outline," this is a solid red fill, never a ghost/transparent style |

- Pill-shaped, bold 16px label, generous padding (14px vertical / 28px horizontal).
- Subtle lift on hover (a small upward shift), never a colour change.
- Buttons expand to full width on small mobile screens.

### 5.2 Checklist item

Icon badge + two-line text (bold title, supporting description) — used for hero USP lists and value-proposition summaries.

### 5.3 Icon column

Centered badge → heading → supporting paragraph, arranged three per row on desktop, stacking to one column on mobile. Used for "Challenges" and "Business Value" strips.

### 5.4 Floating status cards

Small elevated cards overlapping the corners of the hero image, each showing a live or illustrative data point. A pulsing green status dot (`#1EA672`) signals "live" data — this motif reinforces ITHENA's real-time, connected-factory positioning and should appear wherever live monitoring is being communicated.

### 5.5 Stats bar

A solid brand-blue card containing a three-column KPI strip. Numbers may animate upward on scroll (count-up) to draw attention, or remain static for qualitative claims (e.g., "Zero downtime"). White numerals at 32px/800 weight on the brand-blue field.

### 5.6 Feature ("zigzag") panels

Alternating two-column layout — copy on one side, a dashboard-style visual mock on the other — flipping order on each successive panel down the page. This alternating rhythm is core to how ITHENA presents product capability: narrative copy paired with a visual "proof" of the platform in action.

### 5.7 Dashboard mock visual

A card-framed preview of the product UI: header row, then a 2×2 grid of status tiles. Status pills use green for "on track / nominal" states and a brand-blue tint for "monitoring / alert" states — this two-colour status language should stay consistent across every industry page.

### 5.8 Video / closing CTA banner

Two-column banner pairing a video placeholder (with a white circular play button) against a closing headline, copy, and CTA — used as the page's final conversion moment before the footer.

---

## 6. Motion & Interaction Principles

Motion at ITHENA is subtle and purposeful — it reinforces credibility and a "live system" feel, never decorative flourish.

| Moment | Brand intent |
|---|---|
| Scroll reveal | Content fades and lifts gently into view — pages should feel composed, not static |
| Stat count-up | Key metrics animate from zero when scrolled into view, drawing attention to proof points |
| Live-status pulse | A soft opacity pulse on status indicators signals real-time, always-on monitoring |
| Theme toggle | Light/dark preference is remembered across visits |

All motion must respect **reduced-motion accessibility preferences** — every animated element has a static fallback.

---

## 7. Responsive Behaviour

The layout degrades gracefully from desktop to mobile in a consistent sequence:

1. Multi-column heroes and feature panels collapse to a single column, image/visual centered below the copy.
2. Three-column strips collapse to a single column with increased vertical spacing.
3. Two-column cards (stats, banner) collapse to a single column.
4. Buttons expand to full width on the smallest screens.

---

## 8. Accessibility Standards

- Visible focus outline (Primary Blue, 2px) on every interactive element.
- Decorative graphics are hidden from assistive technology.
- Modals/dialogs use proper dialog semantics, trap and return focus correctly, and close on Escape.
- All motion has a reduced-motion fallback.
- Hero imagery includes a descriptive accessible label.
- **Icon badges are always solid brand-blue with white icons** — a tinted/pastel badge fails colour-contrast requirements and must never be used as a substitute.

---

## 9. Applying This System to a New Industry Page

When extending the brand to a new vertical, keep constant:

- [ ] The full colour token set (Section 1) — brand colours are shared across every ITHENA page, never re-picked per industry
- [ ] The Noto Sans type stack and type scale (Section 2)
- [ ] The seven-section page rhythm: Hero → Stats → Challenges → Solution 1 → Solution 2 → Business Value → Video/CTA banner
- [ ] Corner-radius and pill-button system (Section 3.5, 5.1)
- [ ] Solid-fill icon badge treatment (Section 4.2)
- [ ] The alternating background + soft-blend section rhythm (Section 3.3)

What changes per industry: headline and body copy, icon selection, dashboard tile labels/values, stat figures, and hero/feature imagery.

---

*This document reflects brand and design standards only. For implementation details — HTML/CSS scoping, JavaScript behaviour, WordPress/Elementor integration, and form-handling logic — refer to the accompanying technical design specification.*
