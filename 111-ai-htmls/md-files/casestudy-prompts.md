`case_study_name`, `case_study_heading`, `heading_banner_image_`, `key_challenges`, `key_challenges_image`, `solution_description`, `solution_image`,  `case_study_pdf`


Map - `impact_symbol_1`, `impact_value_1`, `impact_text_1`, `impact_value_2`, `impact_symbol_2`, `impact_text_2`, `impact_value_3`, `impact_text_3`, `impact_symbol_3`, - these in "Impact" field group for relevant field or fields.
Map -  `quote` in Testimonial field group for relevant field or fields
Map - `solution_description`,`solution_1_heading`, `solution_1_description`, `solution_1_icon`, `solution_2_heading`, `solution_2_description`, `solution_2_icon`, `solution_3_heading`, `solution_3_description`, `solution_3_icon`, `solution_4_heading`, `solution_4_description`, `solution_4_icon`, `solution_5_heading`, `solution_5_description`, `solution_5_icon` - these in "Solution" field group for relevant field or fields.
Map - `about_client`, `about_us_counter_value_`, `about_client_image_impact_value`, `about_client_impact_text` - these in "About client" field group for relevant field or fields.

Map - `case_study_pdf` - these in "Form Popups" field group for relevant field or fields. Add this field if not there.

in "dashboard-cms-modernization-wcag-aria.html"
Assign different values to all "crit" make sure they are not same for all
Replace title "Responsive preview" with something else like "Responsive grphs" or "chat support" and WRT change the "screen"

edit "industry-pages/food-beverage-bakery-landing.html" - 
Take ref from - https://dev-website.ithena.app/iserv-smart-service-for-oems-ads-page/ -> "Integrated modules"

Add bullets points to cards - ul - max 4 bullet points with 1 line desc

Add section which is contextual as "The page currently present Performance Management, Ticketing, and E-commerce as separate/disconnected capabilities. We need to establish upfront that these are three core modules delivered through the same customer portal. OEMs can purchase each module independently or combine them into one platform. This core value proposition should be clearly communicated on every sub-industry page, rather than having the sections feel like unrelated features."
Use color scheme and element placement - make sure data will be relevant to solution only and use text WRT it 



Write down - "Engagement at a glance" for the following links - make sure you read and study the case study and then list out them into text file + create dashboard animation html block, ref from "dashboard-system-mapping-visualization-automotive-software.html". Use color scheme and element placement - make sure data will be relevant to case study only + make sure all dashboard and data wont be the same, change values + graphs + presentation and use text WRT case study.
https://ithena.ai/case-study/icrm-sales-pipeline-management/
https://ithena.ai/case-study/manufacturing-downtime-reduction-case-study/
https://ithena.ai/case-study/agentic-ai-oem-service-case-study/
https://ithena.ai/case-study/ai-aftermarket-service-case-study/
https://ithena.ai/case-study/ai-spare-parts-commerce-case-study/
https://ithena.ai/case-study/panelops-for-a-leading-industrial-automation-firm/


Change content "What customers say"
Enterprise

add following css changes in the better way
.with_frm_style .frm_form_fields > fieldset - bg color - #fff
.frm_forms[class*=frm_style_] input:not([type=checkbox],[type=radio],[type=submit],[type=hidden],[type=file]), .frm_forms[class*=frm_style_] select, .frm_forms[class*=frm_style_] textarea - background: #ffffff none !importan & border: 1px solid #c7c7c7 !important;


In light theme  - keep the banner in the dark as same as "\template-parts\blog-v2.php" 
Maintain proper margins/padding from bottom and top fro hero content as it should not get overlapped by header menu.

modify: D:\dev-ithena\astra-child\template-parts\case-study-v2.php
In light theme - only Hero section - "hero facts" must be black + on hover "fact" it should be version of balck used in dark theme


hide fgroup which contains class "customers", show it when query string has "#customers"


https://dev-website.ithena.app/wp-admin/nav-menus.php - "new-ithena-menu"
/our-platform/ exists on dev, as the first menu item. Fix: add it back to the menu.
Shift case studies under "Company" -> "News & insights".
Shift to "Careers" to "About ITHENA" and remove "Work With Us".