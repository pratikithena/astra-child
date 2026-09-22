# Graph Report - 111-ai-htmls  (2026-09-02)

## Corpus Check
- Large corpus: 74 files · ~1,275,453 words. Semantic extraction will be expensive (many Claude tokens). Consider running on a subfolder.

## Summary
- 557 nodes · 684 edges · 45 communities (28 shown, 16 thin omitted)
- Extraction: 70% EXTRACTED · 29% INFERRED · 1% AMBIGUOUS · INFERRED: 198 edges (avg confidence: 0.88)
- Token cost: 1,001,649 input · 0 output

## Community Hubs (Navigation)
- iCRM Landing Page Scaffold
- Brand & Theme Design System
- iCRM Page Interaction Engine
- Industry Vertical Landing Pages
- PanelOps & IMEX Suites
- FactoryGPT Narrative Engine
- Aether & B2B Landing Pages
- Dual-Theme Page Spec
- iRDS & Regulated Verticals
- FactoryGPT Theming & Homepage v2
- iCRM Hub Scroll Choreography
- Header Mega-Menu Structure
- Feature Visual Image Plan
- Header Accordion Variants
- iCRM Product Positioning
- Scroll Counter Primitives
- iCRM Module Suite
- Theme Toggle Contract
- iCPQ & Deal Flow
- Formidable Form Adoption
- Why Section Accordion
- Forecast Scope Model
- Demo Popup Wiring
- Aether Panes & Roles
- Demo Popup Overlay
- Forecast Chart Tween
- Mobile Panel Toggle
- Header Scroll State
- Feature Image Generator
- Integration Wiring Diagram
- Button Systems
- Eyebrow Label Pattern
- Responsive Breakpoints
- Light/Dark Token System
- Typeface Stack
- Modal Close Handlers
- Mega Panel Hover
- Brand Colour Tokens
- Card & Lift System
- Impact Metrics Data
- Floor OEE Strip Data
- Corner Radius System
- Video CTA Banner
- Scroll Progress Handler

## God Nodes (most connected - your core abstractions)
1. `iCRM Landing Page (section#main-section)` - 12 edges
2. `iCRM Hub Standalone Landing Page` - 12 edges
3. `Shared Industry Landing Page Template` - 12 edges
4. `Industries Branch` - 12 edges
5. `Modules Track (#modules)` - 11 edges
6. `Shared Industry Landing Page Skeleton` - 11 edges
7. `17 Feature-Visual Image Slots` - 11 edges
8. `Modules Section (#modules) - Horizontal Pinned Track` - 10 edges
9. `Modules Section (#modules, 7-module track)` - 10 edges
10. `iCRM Landing Page` - 10 edges

## Surprising Connections (you probably didn't know these)
- `Mobile Accordion (expand / collapse / settle)` --semantically_similar_to--> `--m-std / --m-ease Motion Tokens`  [INFERRED] [semantically similar]
  wp-header-shortcode.php → b2b-ecommerce-solutions-v2.html
- `main.[page-slug] Scoping & Isolation` --semantically_similar_to--> `Widget Scoping & Isolation (section#main-section)`  [INFERRED] [semantically similar]
  dual-theme-landing-page-spec.md → fbb-design-spec.md
- `#icrm scoped iCRM landing page` --semantically_similar_to--> `#main-section iCRM hub page root`  [INFERRED] [semantically similar]
  new-icrm-webpage.html → icrm-hub-elementor.html
- `updateHeaderState (hero-height threshold variant)` --semantically_similar_to--> `updateHeaderState (solo variant)`  [AMBIGUOUS] [semantically similar]
  extracted-header-elementor.html → solo-header.html
- `bindToggle (b2b page)` --references--> `Theme Storage Key Divergence (ithena-theme vs fbb-theme)`  [AMBIGUOUS]
  b2b-ecommerce-solutions-v2.html → wp-header-shortcode.php

## Import Cycles
- None detected.

## Hyperedges (group relationships)
- **iCRM Seven-Module Suite Sharing One Record Model** — icrm_webpage_module_pipeline, icrm_webpage_module_quotes, icrm_webpage_module_accounts, icrm_webpage_module_leads, icrm_webpage_module_tasks, icrm_webpage_module_mail, icrm_webpage_module_forecast, icrm_webpage_one_record [EXTRACTED 1.00]
- **Scroll-Driven Choreography System (pin, stack, scrub, reveal)** — icrm_webpage_onscroll, icrm_webpage_onstax, icrm_webpage_glide, icrm_webpage_mode, icrm_webpage_measure, icrm_webpage_doctop [INFERRED 0.85]
- **Demo Booking Conversion Flow** — icrm_webpage_sec_demo, icrm_webpage_openpopup, icrm_webpage_closepopup, icrm_webpage_adoptform, icrm_webpage_form_adoption_pattern [EXTRACTED 1.00]
- **Scroll-driven choreography system (rAF-throttled, IntersectionObserver-armed)** — 111_ai_htmls_01_icrm_hub_standalone_onscroll, 111_ai_htmls_01_icrm_hub_standalone_onscrub, 111_ai_htmls_01_icrm_hub_standalone_onstax, 111_ai_htmls_01_icrm_hub_standalone_glide, 111_ai_htmls_01_icrm_hub_standalone_odometer, 111_ai_htmls_01_icrm_hub_standalone_light, 111_ai_htmls_01_icrm_hub_standalone_sweep [EXTRACTED 1.00]
- **Demo modal flow (CTA to host-form adoption)** — 111_ai_htmls_01_icrm_hub_standalone_sec_demo, 111_ai_htmls_01_icrm_hub_standalone_opendemopopup, 111_ai_htmls_01_icrm_hub_standalone_closedemopopup, 111_ai_htmls_01_icrm_hub_standalone_adoptdemoform, 111_ai_htmls_01_icrm_hub_standalone_formidable_adoption [EXTRACTED 1.00]
- **One-deal lifecycle narrative: gate to action to quote to project** — 111_ai_htmls_01_icrm_hub_standalone_pipeline_gate, 111_ai_htmls_01_icrm_hub_standalone_action_items, 111_ai_htmls_01_icrm_hub_standalone_icpq, 111_ai_htmls_01_icrm_hub_standalone_delivery_handoff, 111_ai_htmls_01_icrm_hub_standalone_halcyon_deal [EXTRACTED 1.00]
- **iCRM Module Suite (shared records, permissions, audit trail)** — 111_ai_htmls_icrm_landing_module_pipeline, 111_ai_htmls_icrm_landing_module_quotes, 111_ai_htmls_icrm_landing_module_accounts, 111_ai_htmls_icrm_landing_module_leads, 111_ai_htmls_icrm_landing_module_tasks, 111_ai_htmls_icrm_landing_module_mail, 111_ai_htmls_icrm_landing_module_forecast [EXTRACTED 1.00]
- **Deal Lifecycle Narrative (Prospect to Close)** — 111_ai_htmls_icrm_landing_deal_stage_prospect, 111_ai_htmls_icrm_landing_deal_stage_analyse, 111_ai_htmls_icrm_landing_deal_stage_quote, 111_ai_htmls_icrm_landing_deal_stage_close, 111_ai_htmls_icrm_landing_halcyon_deal [EXTRACTED 1.00]
- **Scroll Choreography Engine (sticky pin, rAF throttle, IO fallback)** — 111_ai_htmls_icrm_landing_onscroll, 111_ai_htmls_icrm_landing_onstax, 111_ai_htmls_icrm_landing_mode, 111_ai_htmls_icrm_landing_column, 111_ai_htmls_icrm_landing_measure_stax, 111_ai_htmls_icrm_landing_doctop_stax, 111_ai_htmls_icrm_landing_pintop [INFERRED 0.85]
- **Demo popup adopt-open-close flow** — 111_ai_htmls_icrm_hub_elementor_adoptdemoform, 111_ai_htmls_icrm_hub_elementor_opendemopopup, 111_ai_htmls_icrm_hub_elementor_closedemopopup, 111_ai_htmls_icrm_hub_elementor_demopopupoverlay [EXTRACTED 1.00]
- **Scroll-driven pinned storytelling system** — 111_ai_htmls_icrm_hub_elementor_onstax, 111_ai_htmls_icrm_hub_elementor_pintop, 111_ai_htmls_icrm_hub_elementor_mtrack_glide, 111_ai_htmls_icrm_hub_elementor_mode, 111_ai_htmls_icrm_hub_elementor_light [INFERRED 0.85]
- **WordPress sticky-positioning repair overrides** — 111_ai_htmls_icrm_page_fix_body_overflow_fix, 111_ai_htmls_icrm_page_fix_header_h_pins, 111_ai_htmls_icrm_page_fix_text_default, 111_ai_htmls_icrm_hub_elementor_header_h_fallback [EXTRACTED 1.00]
- **FactoryGPT Scenario Player (four-act autoplay)** — 111_ai_htmls_factorygpt_sc, 111_ai_htmls_factorygpt_acts, 111_ai_htmls_factorygpt_renderact, 111_ai_htmls_factorygpt_go, 111_ai_htmls_factorygpt_advance, 111_ai_htmls_factorygpt_arm, 111_ai_htmls_factorygpt_setplay, 111_ai_htmls_factorygpt_countup [EXTRACTED 1.00]
- **Four Bots Bound to Eleven Systems** — 111_ai_htmls_factorygpt_plant_brain, 111_ai_htmls_factorygpt_src, 111_ai_htmls_factorygpt_ppl, 111_ai_htmls_factorygpt_fn, 111_ai_htmls_factorygpt_seats, 111_ai_htmls_factorygpt_draworg, 111_ai_htmls_factorygpt_signal_map [EXTRACTED 1.00]
- **Formidable/Elementor Live-Form Adoption Across Prototype Pages** — 111_ai_htmls_factorygpt_adoptdemoform, 111_ai_htmls_factorygpt_formidable_adoption, 111_ai_htmls_ithena_homepage_v2_adoptrealform, 111_ai_htmls_ithena_homepage_v2_openmodal, 111_ai_htmls_neww_ithena_homepage_openmodal [INFERRED 0.85]
- **Mobile mega-menu accordion animation flow** — new_header_panelbody, new_header_settle, new_header_expand, new_header_collapse, new_header_openmobile, new_header_closemobile [EXTRACTED 1.00]
- **Three header variants sharing one markup/JS lineage** — new_header_ithena_header_component, solo_header_header_component, extracted_header_elementor_wrapper, menu_hierarchy_menu_tree [INFERRED 0.95]
- **Dark/light theme toggle and persistence flow** — new_header_theme_init_script, new_header_settogglelabel, new_header_theme_persistence, extracted_header_elementor_dark_selector_strategy [INFERRED 0.85]
- **Shared Landing-Page Design System (theme root, reveal, motion tokens, demo modal)** — 111_ai_htmls_b2b_ecommerce_solutions_v2_page, 111_ai_htmls_our_platform_landing_page, 111_ai_htmls_aether_landing_page, 111_ai_htmls__ae_page, 111_ai_htmls__ph_page, 111_ai_htmls_b2b_ecommerce_solutions_v2_rv_scroll_reveal, 111_ai_htmls_b2b_ecommerce_solutions_v2_motion_tokens, 111_ai_htmls_b2b_ecommerce_solutions_v2_schedule_demo_modal, 111_ai_htmls_b2b_ecommerce_solutions_v2_main_section_theme_root [INFERRED 0.95]
- **Cross-Page Theme Toggle Flow (header plugin to page body)** — 111_ai_htmls_wp_header_shortcode_ithena_header_theme_preinit, 111_ai_htmls_wp_header_shortcode_theme_flash_prevention, 111_ai_htmls_wp_header_shortcode_theme_key_divergence, 111_ai_htmls_b2b_ecommerce_solutions_v2_settheme, 111_ai_htmls_b2b_ecommerce_solutions_v2_bindtoggle, 111_ai_htmls_b2b_ecommerce_solutions_v2_main_section_theme_root, 111_ai_htmls_our_platform_landing_settheme, 111_ai_htmls_aether_landing_settheme [EXTRACTED 1.00]
- **Schedule-Demo Formidable Adoption Flow** — 111_ai_htmls_b2b_ecommerce_solutions_v2_openschedulepopup, 111_ai_htmls_b2b_ecommerce_solutions_v2_closeschedulepopup, 111_ai_htmls_b2b_ecommerce_solutions_v2_onschedulekeydown, 111_ai_htmls_b2b_ecommerce_solutions_v2_adoptscheduleform, 111_ai_htmls_our_platform_landing_adoptscheduleform, 111_ai_htmls_b2b_ecommerce_solutions_v2_schedule_demo_modal [EXTRACTED 1.00]
- **PanelOps Landing Page Variant Family** — live_panelops_page, panelops_page_internalcss_page, panelops_page_internalcss_panelops, panelops_page_internalcss_tco_comparison [INFERRED 0.95]
- **IMEX Four-Module Suite (Ops, FactoryGPT, CMMS, MSB)** — manufacturing_excellence_imex, manufacturing_excellence_factorygpt, manufacturing_excellence_cmms, manufacturing_excellence_msb, manufacturing_excellence_1_module_tabs [EXTRACTED 1.00]
- **WordPress Scoped Drop-In Block Pattern** — live_panelops_ierp_landing_scope, panelops_page_internalcss_isolation_boundary, manufacturing_excellence_page, manufacturing_excellence_elementor_widget_split [INFERRED 0.85]
- **Shared six-section industry landing skeleton (hero, stats, challenges, features, value, banner CTA)** — industry_pages_template_s_hero, industry_pages_template_s_stats, industry_pages_template_s_challenges, industry_pages_template_s_feature, industry_pages_template_s_value, industry_pages_template_s_banner, industry_pages_industry_landing_template [EXTRACTED 1.00]
- **Per-industry vertical landing page family built from one template** — industry_pages_industrial_defense_landing_page, industry_pages_packaging_landing_page, industry_pages_automotive_discrete_manufacturing_landing_page, industry_pages_tool_die_landing_page, industry_pages_food_beverage_bakery_oem_page, industry_pages_industry_landing_template [INFERRED 0.95]
- **ITHENA product portfolio recombined per vertical (iSERV, iRDS, FactoryGPT, PanelOps, Digital Twin, Predictive Maintenance, Digital Shopfloor)** — industry_pages_product_iserv, industry_pages_product_irds, industry_pages_product_factorygpt, industry_pages_product_panelops, industry_pages_product_digital_twin, industry_pages_product_predictive_maintenance, industry_pages_product_digital_shopfloor [INFERRED 0.85]
- **Six industry landing pages instantiating one prefixed template** — industry_pages_government_landing_page, industry_pages_pharma_manufacturing_landing_page, industry_pages_compressed_air_landing_page, industry_pages_energy_utility_landing_page, industry_pages_fintech_insurtech_landing_page, industry_pages_retail_cpg_landing_page, industry_pages_government_landing_shared_landing_skeleton [INFERRED 0.95]
- **iSERV ticketing/dispatch solution across pharma, energy and compressed air** — industry_pages_pharma_manufacturing_landing_iserv, industry_pages_pharma_manufacturing_landing_iserv_validated_ticketing, industry_pages_energy_utility_landing_iserv_validated_ticketing, industry_pages_compressed_air_landing_iserv_remote_diagnostics [EXTRACTED 1.00]
- **iRDS governed-data-platform pitch across government, fintech and retail** — industry_pages_government_landing_irds, industry_pages_government_landing_irds_public_sector_transparency, industry_pages_fintech_insurtech_landing_irds_customer_intelligence, industry_pages_retail_cpg_landing_irds_unified_retail_data, industry_pages_fintech_insurtech_landing_unified_customer_record [EXTRACTED 1.00]
- **Dual light/dark theme mechanism across specs and live pages** — 111_ai_htmls_ithena_brand_guidelines_dual_mode_requirement, 111_ai_htmls_fbb_design_spec_theme_architecture, 111_ai_htmls_dual_theme_landing_page_spec_theme_architecture, 111_ai_htmls_ithena_landing_design_spec_window_ithena_theme, 111_ai_htmls_dual_theme_landing_page_spec_theme_toggle_button [INFERRED 0.85]
- **Formidable form modal-adoption flow** — 111_ai_htmls_fbb_design_spec_demo_modal, 111_ai_htmls_fbb_design_spec_schedule_modal, 111_ai_htmls_fbb_design_spec_adopt_schedule_form, 111_ai_htmls_fbb_design_spec_adopt_fbb_form, 111_ai_htmls_ithena_landing_design_spec_adopt_demo_form, 111_ai_htmls_ithena_landing_design_spec_formidable_form_119, 111_ai_htmls_fbb_design_spec_hidden_attribute_gotcha, 111_ai_htmls_fbb_design_spec_modal_zindex_convention [EXTRACTED 1.00]
- **Reusable industry landing page skeleton** — 111_ai_htmls_ithena_brand_guidelines_seven_section_rhythm, 111_ai_htmls_fbb_design_spec_section_sequence, 111_ai_htmls_dual_theme_landing_page_spec_section_sequence, 111_ai_htmls_pkng_page_prompt_packaging_landing_brief, 111_ai_htmls_ithena_brand_guidelines_industry_extension_rules, 111_ai_htmls_industry_pages_feature_visual_image_spec_image_slots [INFERRED 0.85]

## Communities (45 total, 16 thin omitted)

### Community 0 - "iCRM Landing Page Scaffold"
Cohesion: 0.05
Nodes (49): adoptForm, Body overflow:visible Override for Sticky, closePopup, column, countTo, Deal Stage: Analyse, Deal Stage: Close, Deal Stage: Prospect (+41 more)

### Community 1 - "Brand & Theme Design System"
Cohesion: 0.05
Nodes (45): Dual-Theme Accessibility Rules, Reveal & Keyframe Animation System, CSS Architecture Checklist, Even-Pixel Font Size Rule, Hero Pattern with Ecosystem Visual, main.[page-slug] Scoping & Isolation, nth-of-type Section Gradient Alternation, FBB Accessibility Implementation (+37 more)

### Community 2 - "iCRM Page Interaction Engine"
Cohesion: 0.06
Nodes (44): adoptForm (adopt Formidable/Elementor form into modal slot), closePopup (demo modal close + focus restore), column (IntersectionObserver fallback for module cards), countTo (eased numeric tween), docTop (absolute document offset of element), FORECAST Scope Dataset (own / team / all), External Form Adoption Pattern (placeholder replaced by live WP form), glide (scope pill indicator / module lane transform) (+36 more)

### Community 3 - "Industry Vertical Landing Pages"
Cohesion: 0.08
Nodes (37): AI Agents for the Production Floor, Automotive & Discrete Manufacturing Landing Page, Automotive Pain Points: razor-thin timelines, costly line stops, defect surges & vendor compliance, Field Support AI Pattern (faster first-response diagnostics, fewer engineering escalations), Automated Ticketing from Live Telemetry, Food & Beverage / Bakery OEM Landing Page, Bakery OEM Pain Points: strict hygiene standards, tight batch margins, high-heat operations, Industrial & Defense Manufacturing Landing Page (+29 more)

### Community 4 - "PanelOps & IMEX Suites"
Cohesion: 0.08
Nodes (35): iERP Hub Schematic (ierpHubGrad), .ierp-landing WP Reset Scope, PanelOps Landing (inline-style WP build), Inline onclick Theme Toggle, Zero-Defect AI Vision Quality Inspection, iGEMBA (Digital Gemba Walks), Four-View Module Tab Switcher (ops/gpt/cmms/msb), Manufacturing Excellence (tabbed .me-root build) (+27 more)

### Community 5 - "FactoryGPT Narrative Engine"
Cohesion: 0.08
Nodes (34): ACTS (four-act narrative: saw / connected / told / saved), advance, arm, ask, CADENCE (channel firing rate scale), Steel to Amber to Mint Colour Arc, Control Room at 03:14 (single visual world), countUp (+26 more)

### Community 6 - "Aether & B2B Landing Pages"
Cohesion: 0.08
Nodes (33): Aether Landing Draft (.ae.html), Platform Landing Draft (.ph.html), CSV to Board-Ready Dashboard Without SQL, Aether Landing Page, paintSteps (four-step autoplay walkthrough), runCounters (stat counter animation), stepsPlay / stepsStop (autoplay pin control), adoptScheduleForm (b2b page) (+25 more)

### Community 7 - "Dual-Theme Page Spec"
Cohesion: 0.07
Nodes (31): Dual-Theme Colour Token Set, Eight-Section Page Sequence, Dual-Theme Token Architecture, Fixed Theme Toggle Button, adoptScheduleForm(), Request a Demo Modal ([data-demo-cta]), [hidden] Broken by Scoped Reset, 999999 Modal Stacking Convention (+23 more)

### Community 8 - "iRDS & Regulated Verticals"
Cohesion: 0.11
Nodes (31): Industrial IoT & Predictive Maintenance Platform, Remote Diagnostic & Service Management (iSERV), Compressed Air OEM Landing Page, Grid IoT & Substation Asset Monitoring, iSERV Validated Performance & Ticketing System (Grid), NERC CIP & Safety Compliance, Energy & Utility Operations Landing Page, Original .feature-visual Dashboard Mockup Markup (+23 more)

### Community 9 - "FactoryGPT Theming & Homepage v2"
Cohesion: 0.09
Nodes (26): draw (ECG canvas), Night Shift / Day Shift Dual Palette, FactoryGPT Landing Page, readCols, Section-to-Section Background Blend, setTheme, Static / Reduced-Motion Escape Hatch, WCAG Contrast Lift on --ink-3 (+18 more)

### Community 10 - "iCRM Hub Scroll Choreography"
Cohesion: 0.10
Nodes (22): column IntersectionObserver fallback mode, --header-h measured fallback, light module card replay, #main-section iCRM hub page root, mode pinned-vs-column switch, glide modules horizontal lane scrubber, odometer, onScroll progress bar (+14 more)

### Community 11 - "Header Mega-Menu Structure"
Cohesion: 0.13
Nodes (22): Dual dark-mode selector :is(html.dark, body.dark, .dark) for host-theme compatibility, Mega panel markup grammar (.mega-sol-cols / .mega-sol-group / .mega-sol-item / .mega-feat-grid), Mobile accordion id scheme (m-sol-*, m-ind-*, m-services, m-company), setToggleLabel (Elementor variant), Theme init IIFE (Elementor variant), #ithena-header-wrapper (Elementor Custom HTML widget block), Case Studies (plain link, no panel), Company Mega-Menu (flat card panel: Who We Are, Blogs, Announcements, Partnerships, Careers) (+14 more)

### Community 12 - "Feature Visual Image Plan"
Cohesion: 0.18
Nodes (17): FBB Design Token Set, Feature Visual Art Direction, 17 Feature-Visual Image Slots, WordPress -scaled Upload Rules, Dashboard Mock Visual, Zigzag Feature Panels, Compressed Air Industry Page, Custom Tool Builder Industry Page (+9 more)

### Community 13 - "Header Accordion Variants"
Cohesion: 0.21
Nodes (13): collapse (Elementor variant accordion), expand (Elementor variant accordion), panelBody (Elementor variant), settle (Elementor variant), Native <details>/<summary> accordion with JS height animation and reduced-motion opt-out, collapse (animated <details> close), expand (animated <details> open), panelBody (accordion body lookup) (+5 more)

### Community 14 - "iCRM Product Positioning"
Cohesion: 0.20
Nodes (12): ERP-adjacent, not an ERP replacement, ITHENA iCRM (manufacturing CRM product), Manufacturing-native positioning (MES/CMMS team, plants and assets as first-class records), iCRM Hub Standalone Landing Page, #main-section scoped !important CSS (WordPress/Elementor embed isolation), FAQ Section (Before you book the call), Hero Section (The CRM built for how manufacturers sell), Testimonials Section (what partners say about ITHENA) (+4 more)

### Community 15 - "Scroll Counter Primitives"
Cohesion: 0.28
Nodes (9): countTo, glide (scope pill / module lane slider), odometer, onScroll (progress bar + sticky header), onScrub (scroll-armed stat band), onStax (pinned panel stack driver), prefers-reduced-motion graceful degradation, runBand (token-guarded counter tween) (+1 more)

### Community 16 - "iCRM Module Suite"
Cohesion: 0.25
Nodes (8): Chrome Inbox Extension (Gmail + Outlook sidebar), Module: Accounts, Module: Leads, Module: Mail, Module: Pipeline, Module: Quotes, Inbox Section (#inbox, meet reps in the inbox), Modules Section (#modules, 7-module track)

### Community 17 - "Theme Toggle Contract"
Cohesion: 0.32
Nodes (8): setTheme (aether page), bindToggle (b2b page), #main-section data-theme Contract, setTheme (b2b page), setTheme (platform page), ithena_header_theme_preinit, Pre-Paint Theme Init (FOUC prevention), Theme Storage Key Divergence (ithena-theme vs fbb-theme)

### Community 18 - "iCPQ & Deal Flow"
Cohesion: 0.38
Nodes (7): Action Items (scored book of work with visible reasoning chips), Closed Won becomes a project (scope drawer handoff), Halcyon Compressors $312,000 retrofit (worked example deal), iCPQ (seven-step quote builder), Module: Tasks, Gated Pipeline (a pipeline allowed to say no), Flow Section (#flow, pinned stax narrative)

### Community 19 - "Formidable Form Adoption"
Cohesion: 0.38
Nodes (7): adoptDemoForm, closeDemoPopup, Formidable Live-Form Auto-Adopt Pattern (7.8), openDemoPopup, adoptRealForm (v2), openModal (v2), openModal

### Community 20 - "Why Section Accordion"
Cohesion: 0.33
Nodes (6): column (IntersectionObserver fallback layout mode), light (activate one module card), mode (pinned vs column responsive switch), Why Section (#why, problem accordion), sweep (gauge fill animation), whyShow (accordion row + spotlight card sync)

### Community 21 - "Forecast Scope Model"
Cohesion: 0.40
Nodes (6): FORECAST dataset (own/team/all scope scenarios), Interactive Forecast Chart (one number, three audiences), Module: Forecast, paint (forecast chart renderer), Scope Model (own / team / all as a security boundary), Shared records, permissions and audit trail across modules

### Community 22 - "Demo Popup Wiring"
Cohesion: 0.40
Nodes (5): adoptDemoForm, closeDemoPopup, Formidable Forms / Elementor shortcode adoption into the demo modal, openDemoPopup, Demo Section (#demo, Book a demo CTA)

### Community 23 - "Aether Panes & Roles"
Cohesion: 0.67
Nodes (4): Four-Pane Capability Model (find / ask / viz / act), Role Lens (exec / ops / sales / marketing), showPane (capability pane switcher), showRole (role tab switcher)

### Community 24 - "Demo Popup Overlay"
Cohesion: 0.67
Nodes (4): adoptDemoForm, closeDemoPopup, demoPopupOverlay element, openDemoPopup

### Community 25 - "Forecast Chart Tween"
Cohesion: 0.50
Nodes (4): countTo tween, FORECAST dataset, glide forecast scope pill indicator, paint forecast chart

### Community 26 - "Mobile Panel Toggle"
Cohesion: 0.50
Nodes (4): openMobile (Elementor variant), closeMobile, openMobile (mobile panel + scrim), openMobile (solo variant)

### Community 27 - "Header Scroll State"
Cohesion: 0.67
Nodes (4): updateHeaderState (hero-height threshold variant), syncHeaderHeight, updateHeaderState (scroll-driven .scrolled class), updateHeaderState (solo variant)

## Ambiguous Edges - Review These
- `updateHeaderState (solo variant)` → `updateHeaderState (hero-height threshold variant)`  [AMBIGUOUS]
  extracted-header-elementor.html · relation: semantically_similar_to
- `bindToggle (b2b page)` → `Theme Storage Key Divergence (ithena-theme vs fbb-theme)`  [AMBIGUOUS]
  b2b-ecommerce-solutions-v2.html · relation: references
- `Retail & CPG Landing Page` → `Original .feature-visual Dashboard Mockup Markup`  [AMBIGUOUS]
  industry-pages/feature-visual-original-markup.bak.txt · relation: references
- `Dual Light/Dark Mode Brand Rule` → `Accents Re-picked Per Theme`  [AMBIGUOUS]
  ithena-landing-design-spec.md · relation: conceptually_related_to

## Knowledge Gaps
- **137 isolated node(s):** `Hero Section`, `Partner Testimonials Section`, `FAQ Section - Before You Book The Call`, `Module: Pipeline`, `Module: Accounts` (+132 more)
  These have ≤1 connection - possible missing edges or undocumented components. (Counts symbols only; 175 node(s) total have ≤1 connection when file, concept and rationale nodes are included.)
- **16 thin communities (<3 nodes) omitted from report** — run `graphify query` to explore isolated nodes.

## Suggested Questions
_Questions this graph is uniquely positioned to answer:_

- **What is the exact relationship between `updateHeaderState (solo variant)` and `updateHeaderState (hero-height threshold variant)`?**
  _Edge tagged AMBIGUOUS (relation: semantically_similar_to) - confidence is low._
- **What is the exact relationship between `bindToggle (b2b page)` and `Theme Storage Key Divergence (ithena-theme vs fbb-theme)`?**
  _Edge tagged AMBIGUOUS (relation: references) - confidence is low._
- **What is the exact relationship between `Retail & CPG Landing Page` and `Original .feature-visual Dashboard Mockup Markup`?**
  _Edge tagged AMBIGUOUS (relation: references) - confidence is low._
- **What is the exact relationship between `Dual Light/Dark Mode Brand Rule` and `Accents Re-picked Per Theme`?**
  _Edge tagged AMBIGUOUS (relation: conceptually_related_to) - confidence is low._
- **Why does `Packaging Landing Page Brief` connect `Brand & Theme Design System` to `Feature Visual Image Plan`?**
  _High betweenness centrality (0.011) - this node is a cross-community bridge._
- **Why does `Industries Branch` connect `Feature Visual Image Plan` to `Brand & Theme Design System`, `Dual-Theme Page Spec`?**
  _High betweenness centrality (0.008) - this node is a cross-community bridge._
- **Are the 6 inferred relationships involving `Shared Industry Landing Page Template` (e.g. with `Automotive & Discrete Manufacturing Landing Page` and `Food & Beverage / Bakery OEM Landing Page`) actually correct?**
  _`Shared Industry Landing Page Template` has 6 INFERRED edges - model-reasoned connections that need verification._