# Feature-visual image spec — 8 industry pages

The `.feature-visual` CSS mockups on the 8 pages below are now `<img>` tags following the
packaging page pattern. **The 17 images referenced do not exist yet** — this spec is what to
produce and where to put it.

## Upload rules (non-negotiable, or the URLs 404)

- Export at **3840 × 2160** (4K, 16:9).
- Upload to the WP media library in **August 2026** so the path is `/wp-content/uploads/2026/08/`.
- Name the file exactly `<slug>.webp` (no `-scaled`). WordPress downsizes anything wider than
  2560px and publishes it as `<slug>-scaled.webp` — that is the URL already in the markup.
  **If you upload narrower than 2560px WP does not add `-scaled` and the image will 404.**
- Final served size is 2560 × 1440, which matches the packaging reference images
  (`pkgng-1-scaled.webp` is 2560 × 1429).

## Art direction

The packaging page uses **real screenshots of the ITHENA app** (OEE Availability drill-down,
Analyzer trend chart) — real logo, real chrome, real data. That is the bar. Prefer real captures
for anything ITHENA actually ships.

Where you generate instead of capture, generate in the *illustration* register — the style of
`img-assets/perf-moni.webp`: a stylised device with an abstract UI, no ITHENA logo, no specific
metric values. Do not generate a photoreal fake of the ITHENA product UI with the logo and
invented OEE numbers on it; on a marketing page a reader takes that as evidence of what the
software does.

Shared constraints for every image:

- Palette locked to the page tokens — primary `#0083C8`, deep navy `#123049`, pale blue `#D7ECF6`,
  white `#FFFFFF`. Red `#C00000` for alert states only, sparingly.
- Light background. These sit on `--bg-section-a` (#FFFFFF) and `--bg-section-b` (#D7ECF6), and
  the pages have a dark theme — keep the image bright and low-contrast at the edges so it does
  not punch a white hole in dark mode.
- 16:9, subject centred with margin; the image is cropped on neither side at 900px breakpoint.
- No lorem text, no fake company names, no gibberish labels. Legible real words or no words.

## The 17 slots

| Page | Slug | Subject |
|---|---|---|
| `/compressed-air/` | `cair-1` | Predictive maintenance — compressor thermal load, vibration, anomaly alerts |
| | `cair-2` | Service ticket opened automatically from a live telemetry alert |
| `/custom-tool-builders/` | `ctb-1` | Low-code builder configuring a custom tool & die workflow |
| | `ctb-2` | Digital twin parts and documentation portal |
| `/industrial/` | `ind-1` | iRDS enterprise data management and AI platform |
| | `ind-2` | Low-code smart manufacturing shopfloor app |
| | `ind-3` | Predictive asset and maintenance intelligence |
| `/discrete-automotive/` | `auto-1` | iSERV line performance monitoring, automotive line |
| | `auto-2` | Digital shopfloor execution and service ticketing |
| `/pharmaceutical/` | `pharma-1` | Audit-ready incident tracking, validated ticketing |
| | `pharma-2` | Cleanroom environmental monitoring by zone |
| `/energy-utilities/` | `energy-1` | Grid fault converted into a tracked, auditable work order |
| | `energy-2` | Substation and feeder asset monitoring |
| `/fintech-insurance/` | `fin-1` | Unified policyholder view (iRDS customer intelligence) |
| | `fin-2` | Predictive underwriting, scoring and reporting analytics |
| `/government/` | `gov-1` | Accessible service portal, desktop + mobile |
| | `gov-2` | Open data transparency pipeline |

Alt text is already written into each `<img>` and matches the subject above.

## Generation prompts

Prefix every prompt with:

> Clean modern SaaS dashboard illustration, 16:9, 4K. Light neutral background. Strict palette:
> #0083C8 primary blue, #123049 deep navy, #D7ECF6 pale blue, white. Flat vector UI with soft
> shadows, generous whitespace, crisp legible labels. No logos, no brand marks, no photoreal
> screenshot framing.

Then per slot:

- **cair-1** — asset health panel for a compressed-air system: three gauges (thermal, vibration, pressure) reading nominal, one amber anomaly card, a 24-hour trend line trending flat.
- **cair-2** — a support ticket card connected by a drawn line to a telemetry spark-line that spiked; ticket shows status pills moving Triggered → Assigned → Resolved.
- **ctb-1** — drag-and-drop low-code canvas: a form builder on the left, connected workflow nodes on the right, a component palette down one side.
- **ctb-2** — exploded 3D view of a die assembly beside a searchable parts list with thumbnails and part numbers.
- **ind-1** — data platform diagram: many source icons converging into a central store, fanning out into three analytics panels.
- **ind-2** — shopfloor tablet UI: work order queue, station status tiles in green/amber, a shift progress bar.
- **ind-3** — asset health matrix of machine tiles colour-coded by risk, with a remaining-useful-life forecast curve beside it.
- **auto-1** — automotive line schematic across the top, per-station OEE bars beneath, one bottleneck station highlighted.
- **auto-2** — split view: operator terminal raising a fault on the left, supervisor ticket board on the right.
- **pharma-1** — deviation record with an immutable audit trail: timestamped signature entries, each row locked.
- **pharma-2** — cleanroom floor plan with zone sensors, live temperature/humidity/particle readouts, one zone amber.
- **energy-1** — substation single-line diagram with a fault marker, feeding a work order card with crew assignment.
- **energy-2** — grid map with substation nodes, load trend chart, transformer temperature panel.
- **fin-1** — single customer record centre-screen with policies, claims and contact history radiating around it.
- **fin-2** — underwriting risk score dial with contributing-factor bars and a portfolio distribution histogram.
- **gov-1** — public service portal shown on desktop and phone side by side, large accessible type, visible focus ring.
- **gov-2** — open data pipeline: ingestion → validation → publication stages, ending in a public dataset table.
