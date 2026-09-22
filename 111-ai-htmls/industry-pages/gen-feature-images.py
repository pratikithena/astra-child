#!/usr/bin/env python3
"""Generate the 17 .feature-visual images for the industry landing pages.

Setup (both required):
    pip install google-genai pillow
    echo GEMINI_API_KEY=your-key >> ~/.claude/.env      # or export it

Run:
    python gen-feature-images.py            # all 17
    python gen-feature-images.py cair-1     # just one
    python gen-feature-images.py --dry-run  # print prompts, call nothing

Writes 3840x2160 .webp into ./generated/. Upload those to the WP media library in
2026/08 under the exact slug name; WP publishes them as <slug>-scaled.webp, which is
the URL already in the page markup.
"""
import os, sys
from pathlib import Path

OUT = Path(__file__).parent / "generated"
SIZE = (3840, 2160)  # 4K 16:9. Must exceed 2560px wide or WP won't add the -scaled suffix.
MODEL = "gemini-3-pro-image-preview"

STYLE = (
    "Clean modern SaaS dashboard illustration, 16:9, high detail. Light neutral background. "
    "Strict palette: #0083C8 primary blue, #123049 deep navy, #D7ECF6 pale blue, white. "
    "Flat vector UI with soft shadows, generous whitespace, crisp legible labels. "
    "No logos, no brand marks, no photoreal screenshot framing, no lorem ipsum. "
)

PROMPTS = {
 "cair-1":   "Asset health panel for a compressed-air system: three gauges (thermal, vibration, pressure) reading nominal, one amber anomaly card, a flat 24-hour trend line.",
 "cair-2":   "A support ticket card joined by a drawn connector to a telemetry spark-line that spiked; the ticket shows status pills reading Triggered, Assigned, Resolved.",
 "ctb-1":    "Drag-and-drop low-code canvas: a form builder on the left, connected workflow nodes on the right, a component palette down one side.",
 "ctb-2":    "Exploded 3D view of a die assembly beside a searchable parts list with thumbnails and part numbers.",
 "ind-1":    "Data platform diagram: many source icons converging into a central data store, then fanning out into three analytics panels.",
 "ind-2":    "Shopfloor tablet interface: a work order queue, station status tiles in green and amber, a shift progress bar.",
 "ind-3":    "Asset health matrix of machine tiles colour-coded by risk, beside a remaining-useful-life forecast curve.",
 "auto-1":   "Automotive production line schematic across the top, per-station OEE bars beneath, one bottleneck station highlighted.",
 "auto-2":   "Split view: an operator terminal raising a fault on the left, a supervisor ticket board on the right.",
 "pharma-1": "A deviation record with an immutable audit trail: timestamped signature entries, each row showing a lock icon.",
 "pharma-2": "Cleanroom floor plan with zone sensors, live temperature, humidity and particle-count readouts, one zone amber.",
 "energy-1": "Substation single-line diagram with a fault marker, feeding into a work order card with crew assignment.",
 "energy-2": "Electrical grid map with substation nodes, a load trend chart, and a transformer temperature panel.",
 "fin-1":    "A single customer record centre-screen with policies, claims and contact history radiating around it.",
 "fin-2":    "Underwriting risk score dial with contributing-factor bars and a portfolio distribution histogram.",
 "gov-1":    "A public service portal shown on desktop and phone side by side, large accessible type, a visible focus ring on one control.",
 "gov-2":    "Open data pipeline in three stages, ingestion then validation then publication, ending in a public dataset table.",
}


def load_key():
    if os.environ.get("GEMINI_API_KEY"):
        return os.environ["GEMINI_API_KEY"]
    for p in [Path.home()/".claude"/".env", Path.home()/".claude"/"skills"/".env"]:
        if p.exists():
            for line in p.read_text().splitlines():
                line = line.strip()
                if line.startswith("GEMINI_API_KEY=") and not line.startswith("#"):
                    return line.split("=", 1)[1].strip("\"'")
    return None


def main():
    args = [a for a in sys.argv[1:] if not a.startswith("-")]
    dry = "--dry-run" in sys.argv
    slugs = args or list(PROMPTS)
    bad = [s for s in slugs if s not in PROMPTS]
    if bad:
        sys.exit("unknown slug(s): %s\nvalid: %s" % (", ".join(bad), ", ".join(PROMPTS)))

    if dry:
        for s in slugs:
            print("\n--- %s ---\n%s%s" % (s, STYLE, PROMPTS[s]))
        print("\n%d prompt(s). No API calls made." % len(slugs))
        return

    key = load_key()
    if not key:
        sys.exit("GEMINI_API_KEY not found. Add it to ~/.claude/.env or export it.")

    from google import genai
    from google.genai import types
    from PIL import Image
    import io

    client = genai.Client(api_key=key)
    OUT.mkdir(exist_ok=True)

    for i, slug in enumerate(slugs, 1):
        print("[%d/%d] %s ..." % (i, len(slugs), slug), end=" ", flush=True)
        try:
            r = client.models.generate_content(
                model=MODEL,
                contents=STYLE + PROMPTS[slug],
                config=types.GenerateContentConfig(
                    response_modalities=["IMAGE"],
                    # 4K native. Without image_size the model defaults to 1K and the
                    # resize below would be a 3.75x upscale.
                    image_config=types.ImageConfig(aspect_ratio="16:9", image_size="4K"),
                ),
            )
            data = next(
                p.inline_data.data
                for p in r.candidates[0].content.parts
                if getattr(p, "inline_data", None)
            )
        except StopIteration:
            print("FAILED (model returned no image)")
            continue
        except Exception as e:
            print("FAILED (%s)" % e)
            continue

        im = Image.open(io.BytesIO(data)).convert("RGB")
        src = im.size
        if im.size != SIZE:
            im = im.resize(SIZE, Image.LANCZOS)
        dest = OUT / ("%s.webp" % slug)
        im.save(dest, "WEBP", quality=90, method=6)
        print("%dx%d -> %s (%.0f KB)" % (src[0], src[1], dest.name, dest.stat().st_size / 1024))

    print("\nDone. Upload %s/*.webp to WP media (2026/08), keeping these exact filenames." % OUT.name)


if __name__ == "__main__":
    main()
