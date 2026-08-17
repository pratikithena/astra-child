# astra-child

Astra child theme (WordPress). Git root = this directory. Working branch: `14aug-astra-child`.

## Structure

- `functions.php` - theme bootstrap. Requires `includes/custom-navbar.php`, `includes/custom-footer.php`, `includes/custom-headmenu.php`, `inc/blocks*.php`.
- `includes/` - shortcode-style feature files (`custom-headmenu.php` = old header shortcode `[custom_headmenu]`, `custom-navbar.php`, `custom-footer.php`).
- `inc/` - Elementor block registrations (`blocks.php`, `blocks-sliders-banner.php`, `blocks-animations.php`).
- `template-parts/` - page templates (ai-homepage variants, case studies, etc).
- `111-ai-htmls/` - scratch/staging area: dozens of standalone prototype HTML pages (design references, landing page drafts) plus active plugin dev files. Not auto-loaded by WordPress; content gets hand-copied into real theme files/plugins when finalized.
- `ITH-MediaManager/`, `assets/`, `css/`, `js/`, `vendor/` - static assets / dependencies.

## New dynamic header (in progress)

Replaces the old hardcoded-menu header (`includes/custom-headmenu.php`, shortcode `[custom_headmenu]`) with a menu-driven one.

- Canonical source: `111-ai-htmls/wp-header-shortcode.php` (single-file WP plugin, shortcode `[new_ithena_header]`).
- Deployed as a standalone plugin via `ITHENA Custom Header Shortcode.zip` at repo root (upload through wp-admin's plugin uploader) - rebuild the zip after editing the source file, it does not auto-sync.
- Also copied to `includes/wp-header-shortcode.php` but **not required in `functions.php`** - currently inert there unless wired in.
- Menu source: WP menu `new-ithena-menu` (Appearance > Menus), built into a tree via `wp_get_nav_menu_items()`. Column/group/item vs. flat-card mega-panel layout is inferred from tree shape (branch vs. leaf), not hardcoded.
- Column/item subtitles come from the ACF field `menu_subtitle` on each menu item (falls back to native WP menu-item Description if ACF is off or empty).
- Reference design (colors, mega-menu structure, mobile accordion, dark theme) lives in `111-ai-htmls/ithena-homepage_4_2.html`.
- Theme toggle icons use Font Awesome via CSS `content` glyphs (`\f185`/`\f186`), matching the pattern already used in `includes/custom-headmenu.php`'s nav chevron - FA is loaded site-wide, not bundled separately.
- Contact modal: placeholder demo form ships by default; any page element tagged `data-ithena-contact-form` (e.g. a future Formidable Forms Elementor widget) is auto-adopted into the modal in its place. Public JS API: `window.ithenaContactModal.{open,close,setContent}`.

## Notes

- No PHP CLI available in the dev environment used to build this - syntax was verified with a custom brace/paren/PHP-tag balance checker and Node's `Function()` parser on the `<script>` blocks, not an actual PHP run. Verify on a real WP install before trusting a change is bug-free.
- The rest of the theme (`aether-ai.php`, `iSERV-ai.php`, `our-platform-ai.php`, Stripe pages, etc.) has not been audited - this file only documents what's been directly worked on.
