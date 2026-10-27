# astra-child

Astra child theme (WordPress). Git root = this directory. Working branch: `14aug-astra-child`.

## Structure

- `functions.php` - theme bootstrap. Requires `includes/custom-navbar.php`, `includes/custom-footer.php`, `includes/custom-headmenu.php`, `inc/blocks*.php`.
- `includes/` - shortcode-style feature files (`custom-headmenu.php` = old header shortcode `[custom_headmenu]`, `custom-navbar.php`, `custom-footer.php`).
- `inc/` - Elementor block registrations (`blocks.php`, `blocks-sliders-banner.php`, `blocks-animations.php`).
- `template-parts/` - page templates (ai-homepage variants, case studies, etc).
- `111-ai-htmls/` - scratch/staging area: dozens of standalone prototype HTML pages (design references, landing page drafts) plus active plugin dev files. Not auto-loaded by WordPress; content gets hand-copied into real theme files/plugins when finalized.
- `ITH-MediaManager/`, `assets/`, `css/`, `js/`, `vendor/` - static assets / dependencies.

## Header: ITH Header plugin

Menu-driven header, shortcode `[new_ithena_header]`. Replaces the old hardcoded `includes/custom-headmenu.php` (`[custom_headmenu]`).

- Source: `ith-header/` (plugin "ITH Header") - `ith-header.php` (PHP builders + markup), `assets/header.css`, `assets/header.js`. CSS/JS are printed inline from those files on purpose (Airlift etc. delay external/inline CSS; the header must paint styled).
- Deploy: zip the `ith-header/` folder (forward-slash paths; PowerShell 5.1 `Compress-Archive` writes backslashes) and upload via wp-admin > Plugins > Add New, or edit single files in the Plugin File Editor. Bump `Version`/`ITH_HEADER_VER` on releases.
- Installed and active on dev (2026-10-13). The theme no longer loads a header file; the old `includes/wp-header-shortcode.php` require was removed from dev's `functions.php` (mirrored in `dev-ith-custom-functions.php`). The file itself still sits on the dev server, unused.
- The shortcode is registered on `init` priority 20, so it overrides any theme copy that registers the same tag.
- Menu source: WP menu `new-ithena-menu`; layout (columns/groups/cards) inferred from tree shape. ACF per item: `menu_subtitle` (falls back to Description), `menu_icon` (image; no icon shown when empty - there are no default icons).
- Header stays hidden (inline `opacity:0;visibility:hidden`) until the script runs and logo + fonts are ready (2.5s cap); `<noscript>` shows it without JS. Since 1.1.5 (2026-10-27) it appears at once (the 0.3s fade was removed), and the `imenu-in` stagger on mega-panel and mobile-panel items is gone; panels still open with their own slide/height transition.
- Theme: `data-theme` on `section#imenu-root`, `localStorage` key `fbb-theme`, dark default, mirrored to `section#main-section`.
- Menu ink (1.0.5, 2026-10-21): fixed per theme and bar state; nothing detects the backdrop. In the light theme, top-level links are white on the transparent bar and black on the scrolled (white) bar. In the dark theme they are white in both states. 1.0.3 set `data-over` from the colour behind the bar; the user asked for fixed colours, so that logic was removed from `header.css`/`header.js`.
- 1.2.0 (v2 full-width mega menu from `includes/wp-header-sample-v2.html`) went live on 2026-10-26 and was rolled back to 1.1.2 the same day at the user's request. The 1.2.0 port is not kept in the repo.
- 1.1.3 (2026-10-26, live on dev): the 1.1.2 layout (groups still collapse) with a full-width mega panel and roomier spacing. It is one override block at the end of `assets/header.css`. The panel is `position:absolute; top:100%` off the bar (`.imenu-item` is static), it sits flush under the bar, and the bar turns solid while a panel is open (`:has(.imenu-item.is-open)`).
- Full width (1.1.4, 2026-10-27, live on dev): header and footer have no 1280px cap. Both use the same fluid edge gutter `--ith-gut: clamp(16px,4vw,64px)` (on `section#imenu-root` and `#ithf4`), so the header logo, mega panel content and footer logo share one left edge at every width. The burger menu now takes over at 1240px (was 980px; the full nav needs ~1200px and overflowed at 981-1200). The burger panel is `min(420px,100%)` wide (was 100vw, which was cut off by a desktop scrollbar). `footer.css` also removes the padding on the footer's Elementor widget wrap, which added 10px on tablet.
- Footer: shortcode `[new_ithena_footer]` in `ith-header/footer.php` (required from `ith-header.php`), with `assets/footer.css` and `assets/footer.js`, printed inline the same way. Converted from `111-ai-htmls/footer/ithena-footer-v4.html`. 1.1.1 (installed on dev 2026-10-23; not placed on any page yet) builds the nav from `new-ithena-menu` via the header's cached `ith_hdr_menu_tree()`: the first top-level item with children (Solutions) is the wide row, with subtitles shown as tags; the other sections form the trio; top-level items with no children (Our Platform) become arrow links in the Solutions heading. The brand panel (logo, socials, email, addresses) stays hardcoded. The theme follows the header.
- 1.1.2 (2026-10-26, live on dev): the footer reads WP menu `footer-menu-v2` (id 389, a copy of `new-ithena-menu` whose Solutions children are the 3 showcase pages) via `ith_hdr_menu_tree('footer-menu-v2')`; the function now takes a menu slug (default `new-ithena-menu`) and caches per slug. In the wide row, a Solutions child with no children renders as a linked chip (`a.aud`). The footer now shows site-wide.
- Footer responsive (2026-10-26, live on dev): at 1081-1366px the brand column is slimmer (260px). At 1080px and below the brand block comes first, showing the logo, email, Contact CTA and addresses (tagline and socials are hidden), with the menu links below. The copyright and privacy link sit in a full-width red (#c00000) `.strip` at the bottom of the footer, outside `.split`: Privacy policy on the left, copyright on the right, wrapping to two lines on phones. `ith_ftr_ul()` lists the children of any item that still has children, so Services shows its pages, not group names. Elementor footer template 75165 sets its column to 18% at 768-1024px; `footer.css` overrides it with `.elementor-column:has(#ithf4){width:100%}`.
- Older drafts: `111-ai-htmls/wp-header-shortcode.php`, `includes/oldwp-header-shortcode.php`, `includes/wp-header-menu.php` (`[ithena_header]`), `includes/bkp/`.

## Blog v2 template: Gutenberg mode

`template-parts/blog-v2.php` switches to Gutenberg mode once a post's content has blocks (`has_blocks()`). In that mode the ACF section fields are ignored and the ACF sample fallbacks are turned off.
- Each top-level block is a section. The sub nav label is the section's Eyebrow paragraph, or else its first H2. A top-level block with the class `bl-hidden` is not rendered. A Cover block with the "CTA banner" style is rendered below the article column.
- Hero: a Cover block with the "Blog hero" style (first block in every post since 2026-10-21; `blHero()` in `blog-to-blocks.js`). The template reads its image, Eyebrow paragraph, H1, plain paragraph (deck) and "Hero meta" paragraph (`Author | Source`) into the same hero markup. Date and read time stay automatic. Anything missing falls back to the ACF hero fields, then the excerpt and featured image. FAQ schema is built from Details blocks.
- Block styles (Eyebrow, Lede, Hero meta, Checklist, Takeaways, Card, CTA banner, Blog hero) are registered at the end of `functions.php`. All the CSS lives in the template under `.bl-content`.
- All 10 blog posts on dev were migrated on 2026-10-21. 84817 was converted by hand from `111-ai-htmls/erp-custom-mfg-blocks.html`; the other 9 with `111-ai-htmls/blog-to-blocks.js`, which rebuilds blocks from the live ACF render and diffs words, images and links (all 9 matched exactly). ACF meta was left in place: clear a post's content to fall back to ACF mode.
- Editor: the end of `functions.php` makes the block-editor canvas light for `blog-post` and `case-study-test` (`block_editor_settings_all`), because Astra's dark palette made it white-on-black, and previews the block styles. The `admin_head` line lightens the frame around the canvas.

## Case study template: Gutenberg mode

`template-parts/case-study-v2.php` (post type `case-study-test`) switches to Gutenberg mode once the content has a Group or Cover block. A stray paragraph in post_content does not count, because the template never showed post_content.
- Cover "Case study hero": video background, Hero meta paragraph = credit, Eyebrow, H1, plain paragraph = deck, Buttons (1st = Download modal, 2nd = expert modal), Table = facts (caption + Label | Text rows, max 5), Image = video poster. These fill `$GLOBALS['cs_gbv']`, which `cs_f()` reads first, so the existing hero/CTA markup is reused unchanged.
- One Group per section: HTML anchor = section id (impact/client/words/challenge/howitworks/solution/console/shift get their `cs-*` class), block name in List View = sub nav label. `cs_gb_block()` renders inner blocks back to the original markup: h4 Columns = stat counters, h3 Columns = solution cards, Group `cs-gaps` = challenge list, Custom HTML = `.cons-embed`.
- Cover "CTA banner": video, H2, paragraph, Buttons (1st opens the expert form), Image = poster. Rail caption/footer and modal titles still come from ACF.
- Demo copy (`$GLOBALS['cs_demo']`) now only fills generic labels and media when `$cs_nodemo` is set (Gutenberg posts, and `?cs_nodemo=1` for editors). Until 2026-10-21, 33 legacy posts showed forklift sample text through it. The user chose to drop that text in the migration.
- All 52 case studies were migrated on 2026-10-21 with `111-ai-htmls/cs-to-blocks.js` (reads the `?cs_nodemo=1` view and diffs the Gutenberg render against it). All matched exactly, except 67607, which lost a stray visible "&lt;/ul" typo. Old post_content is kept in a hidden `bl-hidden` group (64665, 67000, 79801). The CPT has no revisions; ACF meta is untouched, so emptying a post's content reverts it to ACF mode.
- Six posts (67850, 68644, 68645, 68679, 68761, 68772) have the forklift texts saved as real ACF values (field defaults): hero deck, impact title and lede, and CTA title. These were kept and still need real copy.
- Hero offset (2026-10-21): the template's `syncHdr()` measures `#imenu-bar`, the fixed ITH header, as `--cs-hdr`. Before 2026-10-21 it read `<header>` and always got 0px, so the hero text sat under the header. Until the script runs (Airlift delays inline JS until the first interaction), `--cs-hdr-fb` provides 89px, or 93px at ≤960px. `template-parts/blog-v2.php` has the same `syncHdr()` pattern and has not been changed.
- Facts panel colours follow the theme: white card and dark text in the light theme, the dark card in the dark theme. The rest of the hero stays dark in both themes.
- WP 7.1's `core/html` saves via `null` with a `role:"local"` content attribute, so `wp.blocks.serialize()` writes an empty `<!-- wp:html /-->`. The editor's own save is fine. `functions.php` adds a `blocks.registerBlockType` filter restoring `source: raw` so the editor parses existing Custom HTML blocks. `cs-to-blocks.js` writes those blocks by hand.

## Partnerships template: Partners CPT

`template-parts/partnerships.php` ("Partnerships (Partners CPT)") is assigned to page 84339 /company/partnerships/ (2026-10-27). It is the page's Elementor HTML widget as it was on 2026-10-27, with the "Find a partner" grid built from the `partners` CPT. The Elementor data is still on the page but unused; set the page template back to Default to return to it.
- CPT `partners`, taxonomy `partner_type` and field group "Partner" are ACF UI items (imported via ACF > Tools). Featured image = logo, title, content = description, ACF `partner_link` (empty shows "Partner page coming soon"), ACF `partner_logo_light` (white logo, inverted on the light theme). `partner_type` terms `tech` / `channel` drive the filter tabs and counts; any other term (e.g. "Gold System Integrator") shows as a gradient tag. Order = page attribute Order (`menu_order`).
- Paging: 8 per page. `?pg=N#find` renders that page server-side (works before Airlift releases the script); the page script then pages the filtered/searched set itself and rebuilds `#ptPager`.
- Search keys = title, slug and term names (the old hand-written subtitles like "cloud & bi" are gone).
- WP's theme editor only edits existing files. To create this file on dev, a temporary `admin_init` `touch()` was added to the ith-custom-functions plugin and removed right after.

## Partner pages: Gutenberg template

`template-parts/partner-v2.php` ("Partner (Gutenberg)") renders a page's blocks as full-width sections with the partnerships page's tokens, dual theme (`fbb-theme`). Live on dev 2026-10-27: rockwell-automation-partnership-v2 85159, ptc-partnership-v2 85160, partner-ignition-v2 85161 (the old Elementor pages 66198/66888/69308 are untouched).
- Every top-level block is a section. Block styles (end of `functions.php`): Cover "Partner hero" (logo Image, Eyebrow, H1, deck, Buttons), Group "Tinted section", Group "Partner about" (dark band, white logo), Columns "Icon cards" (no frame, faded gradient dividers between cards, brand gradient on hover), Media & Text "CTA split" (full-width brand-blue closing band, same in both themes: copy left, looping video right; the template swaps `<video controls` for muted autoplay). Plain Media & Text = product block; images show as-is (no frame, radius or crop) with a per-theme `drop-shadow` (`--shi`). Section titles are kept to two lines. Buttons: hero and closing band use `ith-btn-brand` (1st, brand blue) + `ith-btn-inverse` (2nd, white with blue text); every other button uses `ith-cta-btn` (red #C00000). An Eyebrow as the first block of an icon card sits on the icon line as the card title (no dash). A Column with class `ic-<name>` gets an icon from `ith_pv_icons()`.
- Content source: `111-ai-htmls/partnership/partner-v2-pages.py` writes approximate block markup; it was normalized in the editor (`wp.blocks.parse` > `createBlock` > `serialize`) before the REST POST so every block validates.
- Editor canvas for pages on this template is light with icon/style previews (`block_editor_settings_all`).

## Notes

- No PHP CLI available in the dev environment used to build this - syntax was verified with a custom brace/paren/PHP-tag balance checker and Node's `Function()` parser on the `<script>` blocks, not an actual PHP run. Verify on a real WP install before trusting a change is bug-free.
- The rest of the theme (`aether-ai.php`, `iSERV-ai.php`, `our-platform-ai.php`, Stripe pages, etc.) has not been audited - this file only documents what's been directly worked on.
