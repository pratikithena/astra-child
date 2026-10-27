# ITHENA Product Page Blueprint

**Source:** reverse-engineered from the live page `https://ithena.ai/smart-service-iserv/` (iSERV — Smart Service for OEMs), measured in Chrome at a 1440 × 900 viewport on 2026-09-03. Values marked *(measured)* are computed styles read off the live DOM; everything else is the rule inferred from them.

**Purpose:** this is a reusable page system, not a description of one page. Any ITHENA product or platform page (iSERV, Aether, iCRM, a vertical landing page) can be assembled from the block library in §4 using the parameters in §3, without re-deriving the design.

---

## 1. The page in one paragraph

A single-column stack of 13 full-width bands on a near-white ground, each band holding one 1344px-max content column. Every band opens with the same three-part header — a small blue uppercase eyebrow, a large bold headline that ends in a full stop, and one paragraph of lede — then presents its evidence as a row of cards, a mock product screen, or a diagram. The brand carries almost no photography: the product is *drawn* in inline SVG and rebuilt in HTML/CSS, so what the reader sees is a working-looking interface rather than a screenshot. Blue is used only for signal — eyebrows, numbers, the primary action — and everything else is ink on white.

**Vertical budget (measured at 1440px wide; 12 000px total):**

| # | Band | Height | Share |
|---|---|---|---|
| 0 | Hero | 813 | 7% |
| 1 | Proof stats | 295 | 2% |
| 2 | Partner logos | 125 | 1% |
| 3 | Capabilities (3 cards) | 1244 | 10% |
| 4 | Audience / roles | 574 | 5% |
| 5 | The problem | 1448 | 12% |
| 6 | The loop / how it works | 817 | 7% |
| 7 | Product consoles | 1404 | 12% |
| 8 | Mobile app | 1107 | 9% |
| 9 | AI layer | 993 | 8% |
| 10 | Case studies (dark band) | 986 | 8% |
| 11 | FAQ | 1110 | 9% |
| 12 | Closing CTA | 764 | 6% |

Read that as a rhythm, not a quota. The two heaviest bands are the *problem* and the *product screens*; a page that spends its length anywhere else is off-system.

---

## 2. How to use this document

1. Pick the story: which 9–13 blocks from §4, in the order given. The order is load-bearing — see §9.
2. Set the tokens from §3. They do not change between pages.
3. Fill each block's content slots. Copy rules are in §8.
4. Decide the artwork per §7 — and default to *drawing* it, not sourcing a photo.
5. Run the checklist in §11.

---

## 3. Design parameters

### 3.1 Grid and containers

| Parameter | Value |
|---|---|
| Content column | `width: min(1344px, 86.7vw)` — *measured 1248px @1440, 1344px @1920* |
| Band width | full bleed; the background colour runs edge to edge |
| Column model | CSS grid inside the content column; no nested page-level grid |
| Text measure | headline block capped at **760–880px** *(measured)*; body paragraphs ≈ 70–80ch |
| Alignment | left by default. Centre only the *problem* header, the *FAQ* header, and the closing CTA. |

**Standard column splits (measured):**

| Use | Template | Gap |
|---|---|---|
| Hero, AI layer | `1.04fr 1fr` (611 / 588) | 49px (3.4vw) |
| Mobile-app band | `1.05fr 1fr` (610 / 581) | 58px (4vw) |
| 3-up feature cards | `repeat(3, 1fr)` (402) | 22px (1.5vw) |
| 3-up role cards | `repeat(3, 1fr)` (407) | 14px |
| 4-up step cards | `repeat(4, 1fr)` (301) | 14px |
| 2 × 2 problem cards | `repeat(2, 1fr)` (613) | 22px |
| Stat strip | `repeat(5, 1fr)` (249) | 0 — divided by hairlines, not gaps |
| Console shell | single 1248px card | — |

### 3.2 Spacing rhythm

Section padding is fluid and capped: **`clamp(48px, 5.6vw, 84px)`** top and bottom *(measured 80.6px @1440, 84px @1920)*. Three deliberate exceptions:

- Hero — `padding-top: 115–122px`, `padding-bottom: 0`; the stat strip below carries its own top padding.
- Closing CTA — `padding-top: 140px`.
- Logo strip and dark case-study band — `0`; they self-pad (the dark band uses `96px 0` inside its rounded shell).

Inner rhythm: eyebrow → 13px → headline → 14–18px → lede → 34–48px → content grid.

### 3.3 Colour

| Token | Hex | Role |
|---|---|---|
| Surface base | `#FAFAFA` | default band background |
| Surface alt | `#FFFFFF` | every other band, plus all card fills |
| Ink | `#1F2023` | headlines and body |
| Ink muted | `rgba(0,0,0,.7)` | labels, card body, stat captions |
| Brand blue | `#0083C8` | eyebrows, stat numbers, primary button, headline accent, links |
| Hairline | `#EAEAEA` | every card border, FAQ divider, stat divider |
| Dark band | `#0D1B2E` | case-study band only |
| Dark-band accent | `#BFE5F8` | numbers on the dark band |
| Chrome black | `#181818` | site header and footer |

**Mock-interface sub-palette** — used only inside drawn product screens, never on the page itself: `#E4EAF0` and `#EEF2F6` borders, `#EDF7FC` fill with a `#CFE7F5` border for the selected state, `#8494A2` for micro-labels.

Rules: bands alternate `#FAFAFA` → `#FFFFFF` down the page. Blue never becomes a background wash — it appears as text, one button, and one accent phrase per headline. Exactly one dark band per page.

### 3.4 Typography

One family throughout: **Noto Sans**, weights 400 / 600 / 700 / 800.

| Role | Size | Weight | Notes *(measured)* |
|---|---|---|---|
| H1 | 54px | 800 | one blue phrase inside an otherwise ink headline |
| H2 (band head) | 44px | 800 | ends in a full stop |
| H3 — screen title | 32px | 700 | |
| H3 — problem card | 26px | 700 | |
| H3 — dark strip | 25px | 700 | |
| H3 — feature / case card | 22px | 700 | |
| H3 — step card | 19px | 700 | |
| H3 — app feature | 18px | 800 | |
| H3 — AI feature | 17.5px | 700 | |
| H3 — role card | 17px | 700 | |
| FAQ question | 17px | 700 | `letter-spacing: -0.01em` |
| Body | 16–17px | 400 | `line-height: 1.6` |
| Eyebrow | 12px | 700 | `letter-spacing: 0.16em`, uppercase, blue |
| Stat number | 44px | 800 | blue, `letter-spacing: -0.03em` |
| Stat caption | 14px | 400 | ink muted |
| Case-study number | 52px | 400 | `#BFE5F8` |

Headline letter-spacing tightens as size grows (≈ `-0.025em` at 44–54px). Eyebrows are the **only** uppercase text on the page.

### 3.5 Radius, border and elevation

Radius ladder — each step means a different kind of object:

| Radius | Object |
|---|---|
| 8–10px | tiles inside a drawn interface |
| 12–13px | a drawn screen surface |
| 16px | standard content card |
| 18px | card image header (top corners only), and the glass bezel |
| 24px | feature card, console shell |
| 32px | phone body |
| 40px | full-width dark band |
| 100px | buttons, chips, tags |

Elevation ladder *(measured)* — shadows are wide, soft and tinted blue-black, never neutral grey:

| Level | Shadow |
|---|---|
| Flat card | `none`; 1px `#EAEAEA` border only |
| Feature card | `0 40px 24px -32px rgba(0,60,100,.22)` |
| Problem card | `0 -6px 20px -16px rgba(6,42,68,.10)` (paired) |
| Console shell | `0 30px 70px -40px rgba(0,40,70,.35)` |
| Screen inside shell | `0 26px 54px -30px rgba(0,40,70,.55)` |
| Chat / transcript card | `0 12px 30px -22px rgba(0,40,70,.6)` |
| Micro tile | `0 1px 2px rgba(13,27,46,.06)` |

Never use a flat `rgba(0,0,0,.1)` drop shadow — the blue tint is part of the identity.

### 3.6 Buttons and links

| Type | Spec *(measured)* |
|---|---|
| Primary | `#0083C8` fill, white text, `border-radius:100px`, `padding:14px 18px 14px 22px`, 14px/600, height 44–46, trailing arrow glyph |
| Secondary (light band) | `rgba(0,0,0,.07)` fill, ink text, same geometry |
| Secondary (on white card) | white fill, 1px `#EAEAEA`, ink text, same geometry |
| Inline link | blue, 12.5px/700, no underline, `padding-top:16px`, sits at the foot of a card ("See the view") |

Two buttons maximum per band, always primary then secondary.

### 3.7 Chips, tags and eyebrows

- **Capability chip** — white fill, 1px `#EAEAEA`, `radius:100px`, `padding:7px 14px`, 13px/600 ink-muted. A horizontal row under the hero copy naming the process verbs (Connect · Collect · Visualise · Predict · Act).
- **Step label** — uppercase 14.5px/700, `letter-spacing:0.16em`, `rgba(0,0,0,.7)`; used *inside* step cards (MONITOR / PREDICT / RESOLVE / REORDER), distinct from the blue band eyebrow.
- **Numbered marker** — `01`, `02`, `03`: used **only** where the content really is a sequence (the capability list, the four-fault problem list). Never on cards that are a set rather than a series.

---

## 4. Block library

Every block shares the same header contract unless noted:

```
EYEBROW (12px, blue, uppercase)
Headline that ends in a full stop.        ← H2 44/800, max 880px
One paragraph of lede, 16–17px, ink muted, ≤ 3 lines.
```

### B0 — Hero
*Two columns, `1.04fr 1fr`, gap 49px. Band `#FAFAFA`, `padding-top:115px`, `padding-bottom:0`.*

```
┌──────────────────────────────┬──────────────────────────┐
│ EYEBROW                      │                          │
│ H1, 54/800, blue phrase      │   inline-SVG line art    │
│ lede (bold clause inside)    │   + floating data chips  │
│ second, quieter paragraph    │                          │
│ [Primary] [Secondary]        │                          │
│ ( chip )( chip )( chip )     │                          │
└──────────────────────────────┴──────────────────────────┘
       ── edge-to-edge marquee of capability names ──
```

The right column is **always** drawn artwork — never a photograph, never a screenshot. Floating chips overlay the drawing with live-looking values (`85 Machine Availability`, `Alert Proactive`, `Case SLA On time`, `Spare part Ordered`): three or four, no more, each a white pill with a soft shadow.

The marquee below scrolls the module names with dot separators, list duplicated once for a seamless loop.

### B1 — Proof stats
*One row of 5 equal cells inside a single 16px-radius white card, 1px `#EAEAEA`, cells divided by hairlines with no gaps. Height ≈ 143px.*

Number 44/800 blue over a 14px caption. Five is the design count; four works, three looks thin. Percentages beat absolute numbers here.

### B2 — Partner logos
*Full-bleed strip, 125px tall. Left cell: eyebrow plus a two-line statement in a bordered box. Right: an infinite marquee of logos at 71 × 60, list duplicated for the loop.*

### B3 — Capabilities (3 cards with images)
*`repeat(3,1fr)`, gap 22px. Card: 24px radius, white, 1px `#EAEAEA`, `0 40px 24px -32px rgba(0,60,100,.22)`, 8px padding.*

The **only** photographic block on the page. Card = image header (4:3, 18px top corners) → `01` marker → H3 22/700 → paragraph → a wrapped list of feature chips.

### B4 — Audience / roles
*`repeat(3,1fr)`, gap 14px. Card 278px tall, same 24px-radius treatment.*

One card per persona: role name (H3 17/700) → what they see, written in second person → a blue inline link ("See the view"). Three roles is the pattern; it maps to the product's own permission model, so keep it at three.

### B5 — The problem
*Centred header. Then a lead diagram, then a `2 × 2` grid of 613px cards, gap 22px, 16px radius.*

Each card: a small drawn diagram of the failure (a shift timeline with a red stop; four inbound channels with no owner; an unsearchable manual; a repeated site visit) → `01`–`04` → H3 26/700 → one sentence naming the cost. This block earns its 12% of the page: it is the argument, and the diagrams do the arguing.

### B6 — The loop / how it works
*Band `#FFFFFF`. `repeat(4,1fr)`, gap 14px. Card: `#FAFAFA` fill, 16px radius, 1px `#EAEAEA`, `padding:26px 24px 28px`, 380px tall.*

Card = uppercase step label → H3 19/700 → explanation → a small outcome line in a tinted footer ("A connected asset — one record per machine"). The band eyebrow is the loop spelled out: `CONNECT, COLLECT, VISUALISE, PREDICT, ACT`.

### B7 — Product consoles
*Full-width 1248px shell, 24px radius, `0 30px 70px -40px rgba(0,40,70,.35)`.*

The signature block. A glass bezel (18px radius, `rgba(255,255,255,.26)` fill, `rgba(255,255,255,.85)` border, inset highlights) wraps a 13px-radius white screen holding a **rebuilt** dashboard — KPI tiles, a chart, a table, a selected row in `#EDF7FC`. A label row switches between named consoles (OEE Dashboard, Machine Uptime Analytics, Performance Insights, Service Desk, Order Parts).

Closes with a dark inset strip: `TAKE THE CONTROLS` + "Prefer to Drive Them Yourself?" + action.

State the honesty line in the lede: *"These are the iSERV screens, rebuilt here so you can read them before the demo."*

### B8 — Mobile app
*Two columns `1.05fr 1fr`, gap 58px, band `#FFFFFF`. Left: a drawn phone (32px radius, `#F4F6F8`) showing a real ticket list. Right: three feature rows, each a `44px 1fr` grid — icon, then title 18/800, then three bullet lines.*

### B9 — AI layer
*Same split as the hero (`1.04fr 1fr`, gap 49px). Left: a drawn chat transcript card (12px radius, `0 12px 30px -22px rgba(0,40,70,.6)`) showing question → answer → chart → two action buttons. Right: a 2 × 3 grid of feature titles (17.5/700) with one-line explanations.*

The transcript must carry a real question, an answer with a number in it, and buttons that name actions ("Raise 4 work orders", "Order the seal kits").

### B10 — Case studies (dark band)
*A 40px-radius `#0D1B2E` panel, `padding:96px 0`, inset from the page edges. Two cards side by side.*

Card: two category tags → H3 22/700 in white → summary paragraph → one outcome number at 52px in `#BFE5F8` with a caption → "Read the case study". Exactly one dark band per page, and this is it.

### B11 — FAQ
*Centred header. A native `<details>` list, 760px wide, each item `padding:20px 2px` with a 1px `#EAEAEA` bottom border, question 17/700.*

Ten or eleven questions, phrased as the buyer would ask them ("Will iSERV work with the ERP we already run?"), answered from what the product does today.

### B12 — Closing CTA
*Centred, 900px column, `padding-top:140px`, band `#FAFAFA`.*

Eyebrow `GET STARTED` → H2 52/800 → one paragraph offering something concrete ("Bring your own machines and a month of tickets") → primary and secondary button.

### Site chrome
- **Header** — `#181818`, 77px tall, logo 217 × 72 at the left, six text links at the right, blue "Contact Us" pill at the end.
- **Footer** — `#181818`, five equal columns, `padding:50px 0`, logo 236 × 78, social row, four link columns.

---

## 5. Data-representation patterns

| Pattern | Where it fits | Rule |
|---|---|---|
| **Percentage strip** | after the hero | 5 numbers, blue, each with a plain-language caption; keep them defensible |
| **KPI tile** | inside drawn consoles | number over a two-word label, 9px radius, hairline border |
| **Rebuilt dashboard** | product block | tables with a selected row, a small bar or pie chart, status pills — built in HTML/CSS |
| **Ticket / record list** | app and console blocks | `#67 Storing`, `#63 Storing` — real-looking IDs, repeated form, never lorem |
| **Chat transcript** | AI block | YOU → question, PRODUCT → answer containing a number, then the visual, then actions |
| **Timeline strip** | problem block | three shifts with one red stop and a `−6h 20m` loss label |
| **Numbered sequence** | capabilities, problem | `01`–`04`, only when the order is real |
| **Outcome figure** | case cards | one number per case, never a grid of them |
| **Accordion** | FAQ | native `<details>` |

Across all of them: **invent nothing vague**. Every mock carries a specific machine, part number and plant. That specificity is what makes the drawn interfaces read as real.

---

## 6. Motion

- Reveal on scroll: opacity plus a short upward translate, staggered across a row's children, gated behind `@media not (prefers-reduced-motion)` *(71 rules on the live page sit behind this gate)*.
- Two continuous marquees only: the hero capability ticker and the partner logo strip.
- Counters animate once, when the stat strip enters view.
- Hover: colour and border transitions only — no card lift on every hover.
- One page-load moment in the hero; everything below reveals quietly.

---

## 7. Imagery — what kind of picture, and when

The defining choice of this page: **33 `<img>` elements, and only three of them are photographs.** Everything else is inline SVG or HTML/CSS.

| Kind | Spec | Used for |
|---|---|---|
| **Inline SVG line art** | 1–1.5px strokes, brand blue on transparent, no fills except state dots | hero illustration, problem diagrams, icons |
| **HTML/CSS interface mockup** | built from the mock sub-palette in §3.3 | consoles, phone, chat, ticket lists |
| **Photograph** | `.webp`, 1200 × 900 (4:3), rendered ≈ 402 × 300, 18px top corners, as a card header | capability cards only — three per page |
| **Partner logo** | ≈ 71 × 60 box, transparent, uniform optical weight | logo marquee |
| **Brand logo** | 568 × 188 `.webp` | header 217 × 72, footer 236 × 78 |

Rules:

1. If the subject is the product, **draw it**. Screenshots date, crop badly and leak customer data; a rebuilt screen scales, themes, and stays legible at 400px wide.
2. Photographs appear only as card headers — never full-bleed, never behind text.
3. Every photograph is 4:3 and takes the 18px top-corner treatment. No other crop is in the system.
4. Alt text names the capability, not the picture ("Performance Monitoring and Predictive Maintenance").
5. No stock imagery of people in hard hats standing near servers.

---

## 8. Copy rules

- **Eyebrow** — 2–4 words, uppercase, naming the category (`THE CHALLENGE`, `ON THE SHOP FLOOR`, `IN THEIR POCKET`).
- **Headline** — a declarative sentence ending in a full stop, 4–9 words, written from the customer's side of the problem: "After the Machine Ships, You Go Blind." One phrase inside it may take brand blue.
- **Lede** — one paragraph, three lines maximum, adding a fact the headline only implies.
- **Card body** — one idea, one to three sentences, second person.
- **Buttons** — name the action and keep the name through the flow: "Schedule Demo", "See the consoles", "Read the case study", "Talk to the team".
- **Numbers** — always paired with what they mean ("41% Faster order delivery"), never floating.
- **Voice** — plain industrial English. No exclamation marks, no "revolutionary", no "seamless". The page is allowed to name the customer's failure bluntly, because that is the argument.

---

## 9. Order, and why it holds

```
Hero ─ what it is
  └ Stats ─ that it works
      └ Partners ─ that it is safe to buy
          └ Capabilities ─ what you get
              └ Roles ─ who it is for
                  └ Problem ─ why you need it          ← the turn
                      └ Loop ─ how it works
                          └ Consoles ─ what it looks like
                              └ App ─ where it lives
                                  └ AI ─ what is next
                                      └ Cases ─ who already did it
                                          └ FAQ ─ objections
                                              └ CTA ─ act
```

Proof (stats, partners) comes **before** the problem, so a reader who already knows the problem can skip to the product; the problem block then sits mid-page, where it converts a browser into a buyer. Do not move the dark case-study band — it is the visual full stop before the FAQ.

**Minimum viable page:** B0, B1, B3, B5, B7, B11, B12.

---

## 10. Responsive

Breakpoints in use *(measured from the live stylesheet)*: **1024px**, **767px**, **480px**.

| Element | ≤1024 | ≤767 |
|---|---|---|
| Hero | stack, art below copy | art may drop below the fold |
| 3-up and 4-up card grids | 2 columns | 1 column |
| 2 × 2 problem grid | 1 column | 1 column |
| Stat strip | 3 + 2 wrap | 2 columns; hairlines become borders |
| Console shell | horizontal scroll inside the bezel | scroll, bezel padding reduced |
| Section padding | 5.6vw → ≈56px | ≈40px |
| H1 / H2 | 40 / 34 | 32 / 27 |

Wide content — drawn dashboards, tables — scrolls **inside its own container**. The page body never scrolls horizontally.

---

## 11. Build checklist

- [ ] Content column is `min(1344px, 86.7vw)`; bands are full-bleed.
- [ ] Bands alternate `#FAFAFA` / `#FFFFFF`; exactly one `#0D1B2E` band.
- [ ] Every band opens eyebrow → headline-with-full-stop → lede.
- [ ] Blue appears as text, one button and one headline phrase — never as a background wash.
- [ ] Every card border is 1px `#EAEAEA`; every shadow is blue-tinted and wide.
- [ ] Radius matches the object's rung on the ladder (§3.5).
- [ ] Numbered markers only where the content is a real sequence.
- [ ] Product artwork is drawn or rebuilt, not screenshotted; photographs only as 4:3 card headers.
- [ ] Mock interfaces carry specific, plausible data.
- [ ] Motion respects `prefers-reduced-motion`; at most two continuous marquees.
- [ ] Buttons keep one name from click to confirmation.
- [ ] Uppercase is used for eyebrows and step labels only.

---

## 12. Related documents

- `ITHENA-Brand-Guidelines.md` — colour, type and component rules across all verticals. This blueprint is consistent with it and adds page-level structure.
- `ithena-landing-design-spec.md`, `dual-theme-landing-page-spec.md`, `fbb-design-spec.md` — earlier per-page specs; where they disagree with this file on structure, this file reflects what is currently live.
