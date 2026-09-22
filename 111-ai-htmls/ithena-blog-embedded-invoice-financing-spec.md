# Design Spec — Blog Post: Embedded Invoice Financing for Healthcare Software

**File:** `ithena-blog-embedded-invoice-financing.html`
**Type:** Long-form article page. Main content only — no site header, no footer, no nav.
**Delivery:** Single self-contained block, scoped to `#ith-post`, dropped into an Elementor HTML widget inside a full-width stretched section.

**Sources combined**
1. *How Healthcare Software Can Embed Invoice Financing for Medical Suppliers and Care Providers* (helloaria.eu) — the spine: the vertical, the numbers, the mechanics, results, FAQ.
2. *Embedded Invoice Financing vs Factoring: Aria's Perspective* (helloaria.eu) — the argument: 7-point comparison, cost structure, recovery behaviour, reputation, growth.

The two are merged into one narrative rather than concatenated: article 1 supplies **the problem and the build**, article 2 supplies **the case against the incumbent**, which sits in the middle as the turn of the piece.

---

## 1. Brief

| | |
|---|---|
| **Subject** | Embedding invoice financing inside healthcare software (hospital / care-provider procurement, medical supply platforms) |
| **Audience** | Product and platform leaders at healthcare software vendors; the CFO who has to sign off |
| **Primary job** | Convince them that building financing into the product beats sending suppliers off-platform to a factor — and show what it takes to ship it |
| **Secondary job** | Answer the comparison question ("embedded invoice financing vs factoring") without reading like an SEO page |
| **Voice** | Plain, measured, specific. Numbers do the persuading. No hype adjectives, no exclamation marks. |

**Governing insight.** Every fact in both articles is a fact about **elapsed time**: 60.3 days, 90 days, 200+ days, 24 hours, 15 hours, 5 days, 14 days, 2–4 weeks, 3 weeks. The subject matter is a clock. So the page is built on a clock, not on cards.

---

## 2. Design plan

### 2.1 Concept — the day rail

A thin vertical rail pinned to the left edge of the article counts **elapsed days as the reader scrolls**: it reads `DAY 0` at the top, accumulates to `DAY 60` through the problem half, then snaps to `24 HOURS` the moment the reader crosses into the embedded-financing half and holds there.

This is the page's one bold move. It is:
- the reading-progress indicator, so it earns its place functionally;
- the argument in physical form — the reader *feels* the 60 days accumulate, then watches them collapse;
- specific to this subject; it would make no sense on any other article.

Everything else on the page is deliberately quiet so this reads as the signature.

### 2.2 Rejected first pass, and why

The first plan was: full-bleed hero with `60.3` set at 140px, a stat strip of four counters underneath, alternating white/tinted sections of 3-up rounded feature cards, a two-column comparison table, an accordion FAQ.

That is the default shape for this brief — what any B2B fintech content page looks like — and it spends the reader's attention on chrome instead of the argument. Changed:

| Rejected | Shipped | Why |
|---|---|---|
| Giant hero number over a gradient wash | Hero **payment race** — two tracks animating the same invoice being paid at 60.3 days and at 24 hours | The comparison *is* the story; showing it beats stating it |
| Stat strip of four counters at the top | Results counters moved late, to the proof section, where they answer "does it work" | A stat bar before the problem is decoration |
| Two side-by-side comparison cards | One **segmented switch** flipping a single panel between Factoring / Embedded across seven dimensions | Forces a like-for-like read and halves the visual weight |
| 3-up rounded feature cards, twice | Comparison is the switch, the build is a **stepper**, costs are a **stack** | Three different content shapes should not wear the same card |
| Numbered markers on every feature group | Numbers appear only on the integration stepper | The integration genuinely is a sequence; the comparison is not |
| Photographic hero | Photography used only as section texture behind tinted bands | The subject is invisible — money moving — and a stock hospital corridor adds nothing |

### 2.3 Colour

Brand palette, unchanged (`ITHENA-Brand-Guidelines.md` §1). Seven working values:

| Token | Light | Dark | Role |
|---|---|---|---|
| `--blue` | `#0083C8` | `#0083C8` | Brand. The embedded side of every comparison, links, rail fill, eyebrows |
| `--ink` | `#000000` | `#FFFFFF` | Headings |
| `--body` | `#333333` | `rgba(215,236,246,.8)` | Paragraphs |
| `--muted` | `#666666` | `#8FAFC4` | Captions, meta, axis labels |
| `--sa` | `#FFFFFF` | `#123049` | Page ground |
| `--sb` | `#D7ECF6` | `#0D1B2E` | Banded sections, panel fills |
| `--slow` | `#8FA3B4` | `#5C7488` | **The waiting.** Factoring, overdue days, the 60-day track |

`--slow` is the one addition to the brand set: a desaturated slate used exclusively for the old way. It is never red — red is ITHENA's reserved secondary CTA fill (§1.1), and reading late payment as an *error state* overstates it. Slow is not broken; it is slow.

Dark mode ships with the page and follows the viewer's system setting (`prefers-color-scheme`), per brand rule §1.3. No toggle button: an article inside a themed site should follow the site rather than offer a second control.

### 2.4 Type

Two families only, per the current ITHENA type directive:

- **Noto Sans** — 700/800 — every heading, subheading, figure, and the day rail.
- **Inter** — 400/500/700 — every word of body copy, UI label, caption, table cell.

Scale, 12 → 50px, fixed steps:

| Token | px | Use |
|---|---|---|
| `--fs-h1` | 50 (clamps to 34 on mobile) | Article title |
| `--fs-h2` | 32 | Section headings |
| `--fs-h3` | 24 | Sub-headings, panel titles |
| `--fs-sub` | 20 | Deck, pull-quote |
| `--fs-lede` | 18 | Section standfirst |
| `--fs-body` | 16 | Paragraphs |
| `--fs-small` | 14 | Captions, table cells, FAQ answers |
| `--fs-label` | 12 | Eyebrows, axis labels, meta |

Figures — the animated counters, the day rail — use Noto Sans 800 with `font-variant-numeric: tabular-nums` so digits do not jitter while counting.

Measure: body copy capped at **66 characters** (`max-width: 66ch`). The article column is 720px inside a 1240px container; the day rail and the interactive panels break out to the full container width.

### 2.5 Layout

```
 +------------------------------ 1240 -------------------------------+
 |                                                                   |
 | |            HERO - title, deck, meta, payment race               |
 | |   +--------------------------------------------------+          |
 | |   |  embedded  #===#                        24 hours  |          |
 | |   |  factoring #==============================# 60.3d |          |
 | |   +--------------------------------------------------+          |
 | |                                                                 |
 |DAY  +-- TOC chip rail (sticky, scrollspy) ----------------+       |
 | 12  +----------------------------------------------------+       |
 | |                                                                 |
 | |        +--------- 720 article column ---------+                 |
 | |        |  H2   standfirst   body body body    |                 |
 | |        +--------------------------------------+                 |
 | |   +-- full-width interactive panel (breaks out) --+             |
 | |   +-----------------------------------------------+             |
 | |                                                                 |
 +-------------------------------------------------------------------+
   ^ day rail, fixed, 56px gutter
```

- Article column **left-aligned**, ragged right. Justified text at a 66ch measure produces rivers; centred body copy is unreadable at this length.
- Interactive panels break out of the 720 column to the full 1240 — the change in width is what signals "this is a thing you use, not a thing you read".
- Section rhythm alternates `--sa` / `--sb` with the brand's soft top-blend (§3.3); no hard rules between sections.
- Radii per brand §3.5: 10px panels, 12px tiles, pill on every chip and button. Nothing square.

### 2.6 Motion

One orchestrated moment, then restraint.

| Moment | Behaviour | Timing |
|---|---|---|
| **Hero payment race** (the orchestrated moment) | On load the 24h track fires and completes; a beat later the 60-day track begins its long crawl. Replay button. | 24h: 900ms `cubic-bezier(.16,.8,.24,1)`. 60d: 4200ms `linear` — deliberately boring, which is the point |
| Day rail | Scroll-linked, no easing, snaps to `24 HOURS` at the pivot section | Follows the scrollbar |
| Section entrances | Fade + 14px lift, once, 140ms stagger between siblings, at most three in flight | 420ms ease-out |
| Counters | Count from 0 on first view, tabular digits | 1100ms ease-out |
| Comparison switch | Panel cross-fades, accent slides between the two labels | 260ms |
| Cost stack | Layers grow from the baseline on view; hover or focus raises one layer 4px | 500ms grow / 180ms hover |
| Stepper | Clicked step expands, siblings collapse | 240ms height + fade |

`prefers-reduced-motion: reduce` resolves every animation instantly to its end state; the race shows both bars at final length with labels; the day rail still tracks scroll, because it is navigation rather than decoration.

### 2.7 Imagery

Photography is texture, never subject. Four ITHENA-owned images, low opacity behind tinted bands so the type stays the focus:

| Placement | Asset |
|---|---|
| Problem band | `2026/07/analysiss.webp` |
| Build / integration band | `2026/07/implementn.webp` |
| Reach / cross-border band | `2026/07/global-support.webp` |
| Closing CTA | `2026/07/fast-operation.webp` |

Everything else that looks like a graphic is drawn: inline SVG on a 24px grid, single weight, rounded caps, `currentColor` (brand §4). No icon fonts, no emoji.

---

## 3. Content map

| # | Section | Source | Shape |
|---|---|---|---|
| 0 | **Hero** — title, deck, meta (read time, updated) , payment race | Both | Animated two-track race |
| 1 | **The sixty-day gap** — why medical suppliers and care providers wait | Art. 1 §2 | Prose + DSO explorer |
| 2 | **What embedded actually means** — paid on issue, up to 100%, within 24h | Art. 1 §1, §3 | Prose + definition callout |
| 3 | **Factoring, honestly** — the seven-point comparison | Art. 2 §1–6, Art. 1 §6 | Segmented switch, seven rows |
| 4 | **What it actually costs** — four stacked fees against one | Art. 2 §4 | Interactive cost stack |
| 5 | **Building it without becoming a lender** — licence, capital, credit team, zero risk | Art. 1 §4 | Four-point checklist, icon badges |
| 6 | **Five steps, two to four weeks** — API, onboard, KYB, get paid now, repayment | Art. 1 §5 | Click-through stepper |
| 7 | **Keeping the buyer's terms** — reverse factoring, 100+ countries | Art. 1 §7 | Prose + two-column diagram |
| 8 | **What platforms have seen** — Job&Talent, StaffMe, UrbanChain, Comet | Art. 1 §8 | Count-up results, with the "no healthcare case studies yet" caveat stated plainly |
| 9 | **FAQ** — six questions | Art. 1 §9 | Native disclosure accordion |
| 10 | **Close** — one CTA | Both | Banner, single primary button |

**Numbers that survive verbatim:** 60.3 days · 52% · 47% · 200+ days (Greece, Portugal) · 30–90 days · 24 hours · up to 100% · 2–4 weeks · €100bn by the end of the decade, from €20–30bn in 2023 · €2.055tn and 11.5% of regional GDP · 14 days → 24 hours · 3 FTE → ~1 hr/week · 3 weeks, four countries · 95% inside 5 days · +0.8 NPS · £11M at ~15 hours · 100% execution · €1bn+ across 100+ countries.

**Attribution:** EU Payment Observatory 2025, Atradius Payment Practices Barometer, McKinsey, European factoring turnover — named inline, not hidden in a footnote.

**Honesty rule:** section 8 opens by saying there are no healthcare deployments to cite yet and that the figures come from vertical SaaS and marketplaces. Burying that is the fastest way to lose a technical reader.

---

## 4. Component specs

### 4.1 Payment race (hero)

| Property | Embedded track | Factoring track |
|---|---|---|
| Fill | `--blue` | `--slow` |
| Height | 10px, pill | 10px, pill |
| Duration | 900ms | 4200ms |
| Easing | `cubic-bezier(.16,.8,.24,1)` | `linear` |
| End label | `24 hours` + paid marker | `60.3 days` + paid marker |
| Control | `Replay` pill button, `--muted` border | — |

Both tracks share one x-axis so the lengths are comparable. Ticks at 0 / 30 / 60 days.

### 4.2 Comparison switch

Segmented control, two options, `role="tablist"`. Seven rows: where it lives · who gets underwritten · new and small suppliers · speed · advance rate · who carries the risk · who chases payment. The active option's rows carry a 3px left border in `--blue` (embedded) or `--slow` (factoring). Keyboard: arrow keys move between options, `Home` / `End` jump.

### 4.3 Cost stack

Two columns of stacked blocks sharing a baseline. Factoring: processing fee, factoring commission on the full invoiced amount, finance commission between advance and due date, guarantee fund as frozen capital — four blocks in `--slow` at rising tints. Embedded: one block in `--blue`, labelled as a commission on what you choose to finance. Hover or focus a block and it lifts 4px, revealing its one-line definition. Not a chart: no false precision, block heights are illustrative and labelled as such.

### 4.4 Integration stepper

Five steps, horizontal on desktop (numbered 01–05 — this genuinely is a sequence), vertical on mobile. One expanded at a time, the first open by default. Each step carries a number, a title and two sentences of detail. `role="tablist"` with `aria-controls`.

### 4.5 Results counters

Four figures, counting up on first intersection, `tabular-nums`, with the final value present in the DOM as text so it is correct with JavaScript disabled.

### 4.6 FAQ

Native `<details>` / `<summary>`: chevron rotates, answer fades. No JavaScript required.

### 4.7 Buttons

Per brand §5.1. Primary: `--blue` fill, white 16px/700 label, pill, 14/28 padding, 2px lift on hover. Secondary: `#C00000` solid fill, never a ghost. Full width below 480px.

---

## 5. Accessibility

- Contrast: body `#333` on `#FFF` = 12.6:1; `--muted` `#666` on `#FFF` = 5.7:1; white on `--blue` = 4.6:1 and used only at large or bold sizes. Dark-mode pairs verified against `#123049`.
- Focus: 2px `--blue` outline at 2px offset on every interactive element. Never removed.
- The day rail is `aria-hidden` — it duplicates the scrollbar. The TOC chip rail is the real navigation: a `<nav>` with `aria-current`.
- The race, the cost stack and the reverse-factoring diagram are decorative presentations of facts that are also written in the prose, so each is `aria-hidden="true"` with its numbers stated in adjacent text.
- Switch and stepper are keyboard-operable tab patterns; the FAQ is native disclosure.
- Every animation has a reduced-motion end state.
- Touch targets at least 44px, chips spaced at least 8px.

---

## 6. Implementation constraints (Elementor)

- One `<div id="ith-post">` wrapper. Every selector prefixed `#ith-post` so the theme cannot leak in and the block cannot leak out.
- A `#ith-post *{box-sizing:border-box}` reset plus explicit margin and font resets on headings, lists and buttons — Astra styles all three.
- No external JavaScript. One `@import` for Noto Sans and Inter.
- All script inside a single IIFE, guarded so a second paste on the same page cannot double-bind.
- `IntersectionObserver` for reveals and counters, feature-detected, with everything visible if it is absent.
- Placed in a **full-width stretched** Elementor section at zero gap and zero padding — the block owns its own rhythm.
