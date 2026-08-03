<?php
/**
 * Custom Shortcode Blocks - animations
 * File: /inc/blocks-animations.php
 */

// Exit if accessed directly
if (!defined('ABSPATH')) exit;

// =========================
// USE CASES SECTION BLOCK (with slide-down animation)
// =========================
add_shortcode('use_cases_section', function() {

    // Enable check
    if (!get_field('enable_use_cases_section')) return;

    // Section meta
    $use_cases_section_class = get_field('use_cases_class');
    $use_cases_section_title = get_field('use_cases_title');
    $use_cases_section_highlight = get_field('use_cases_highlight');
    $use_cases_section_description = get_field('use_cases_description');

    // Cards group
    $is_animation = get_field('animate_use_case_cards');
    $use_case_cards = get_field('use_case_cards');
    $use_cases = [];

    for ($i = 1; $i <= 4; $i++) {
        $use_cases[] = [
            'image'       => $use_case_cards["use_case_{$i}_image"] ?? '',
            'title'       => $use_case_cards["use_case_{$i}_title"] ?? '',
            'description' => $use_case_cards["use_case_{$i}_description"] ?? '',
            'link'        => $use_case_cards["use_case_{$i}_link"] ?? '',
        ];
    }

    ob_start();
    ?>

    <?php if ($is_animation == 'yes'): ?>
        <!-- Animation Styles -->
        <style>
            .use-case-card {opacity: 0;transform: translateY(-50px);transition: opacity 0.6s ease, transform 1.0s ease;}
            .use-case-card.uc-visible {opacity: 1;transform: translateY(0);}
        </style>
    <?php endif; ?>

    <!-- Use Cases Section -->
    <section id="use-cases-section-id"
        class="custom-section py-10 bg-white-fade use_cases_section <?= esc_attr($use_cases_section_class); ?>">

        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">

            <!-- Section Header -->
            <div class="text-center mb-8">

                <?php if ($use_cases_section_title): ?>
                    <h2 class="section_title_fontsize pt-10 font-bold text-ithena-black mb-4">
                        <?= wp_kses_post($use_cases_section_title); ?>
                        <?php if ($use_cases_section_highlight): ?>
                            <span class="text-ithena-maroon">
                                <?= wp_kses_post($use_cases_section_highlight); ?>
                            </span>
                        <?php endif; ?>
                    </h2>
                <?php endif; ?>

                <?php if ($use_cases_section_description): ?>
                    <div class="section_desc_fontsize text-ithena-black mx-auto">
                        <?= wp_kses_post($use_cases_section_description); ?>
                    </div>
                <?php endif; ?>

            </div>

            <!-- Cards Grid -->
            <?php if (!empty($use_cases)): ?>
                <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-8">

                    <?php
                        $uc_card_title_size_cls = get_field('use_case_card_title_fs');
                        $uc_card_desc_size_cls  = get_field('use_case_card_desc_fs');

                        foreach ($use_cases as $case):
                            if (!$case['title'] && !$case['description']) continue;

                            $img   = $case['image'];
                            $title = $case['title'];
                            $desc  = $case['description'];
                            $link  = $case['link'];
                    ?>

                        <?php if ($link): ?>
                            <a href="<?= esc_url($link); ?>"
                               class="use-case-card bg-ithena-gray border-2 border-ithena-blue p-6 rounded-lg
                                      transition-all duration-300 hover:-translate-y-2 hover:shadow-xl">
                        <?php else: ?>
                            <div class="use-case-card bg-ithena-gray border-2 border-ithena-blue p-6 rounded-lg
                                        transition-all duration-300 hover:-translate-y-2 hover:shadow-xl">
                        <?php endif; ?>

                                <?php if ($img): ?>
                                    <div class="mb-6">
                                        <img src="<?= esc_url($img); ?>"
                                             alt="<?= esc_attr($title); ?>"
                                             class="w-full h-48 rounded-lg object-cover">
                                    </div>
                                <?php endif; ?>

                                <?php if ($title): ?>
                                    <h3 class="<?= esc_attr($uc_card_title_size_cls); ?> font-bold text-ithena-black mb-3">
                                        <?= wp_kses_post($title); ?>
                                    </h3>
                                <?php endif; ?>

                                <?php if ($desc): ?>
                                    <div class="<?= esc_attr($uc_card_desc_size_cls); ?> text-ithena-black">
                                        <?= wp_kses_post($desc); ?>
                                        <?php if ($link): ?>
                                            <span class="inline-block ml-2 text-ithena-blue">»</span>
                                        <?php endif; ?>
                                    </div>
                                <?php endif; ?>

                        <?php if ($link): ?>
                            </a>
                        <?php else: ?>
                            </div>
                        <?php endif; ?>

                    <?php endforeach; ?>
                </div>
            <?php endif; ?>

        </div>
    </section>
    
    <?php if ($is_animation == 'yes'): ?>
        <!-- Animation Script -->
        <script>
            document.addEventListener('DOMContentLoaded', function () {
                const cards = document.querySelectorAll('.use-case-card');
                if (!cards.length) return;
                const observer = new IntersectionObserver((entries, obs) => {
                    if (entries[0].isIntersecting) {
                        cards.forEach((card, index) => {
                            setTimeout(() => {
                                card.classList.add('uc-visible');
                            }, index * 150);
                        });
                        obs.disconnect();
                    }
                }, { threshold: 0.5 });
                observer.observe(cards[0]);
            });
        </script>
    <?php endif; ?>

    <?php
    return ob_get_clean();
});

// =========================
// FEATURE + VISUAL LAYOUT SECTION BLOCK
// =========================
add_shortcode('feature_visual_section', function() {

    if (!get_field('enable_feature_visual_section')) return;

    $feature_visual_section_class  = get_field('feature_visual_section_class');
    $feature_visual_section_title  = get_field('feature_visual_section_title');
    $feature_visual_section_title_maroon  = get_field('feature_visual_section_title_maroon');

    $feature_visual_block_choose_media  = get_field('feature_visual_block_choose_media');
    $media_type = strtolower($feature_visual_block_choose_media);

    if ($media_type === 'image') {
        $is_animation = get_field('animate_visual_image');

        $image_url  = get_field('feature_visual_image');
        $image_alt  = get_field('feature_visual_image_alt');
        $floating_top_label    = get_field('feature_visual_floating_top_label');
        $floating_bottom_label = get_field('feature_visual_floating_bottom_label');
    }

    if ($media_type === 'video') {
        $video_url  = get_field('feature_visual_video');
        $video_alt  = get_field('feature_visual_video_alt');
    }

    $feature_visual_block_content_type = get_field('feature_visual_block_content_type');
    
    if ($feature_visual_block_content_type === 'text') {
        $feature_text = get_field('feature_visual_block_content_text');
        $feature_text_fs = get_field('feature_visual_block_content_text_fs');
    } else {
        $features_block = get_field('feature_visual_features');
        $features_block_list_textfs = get_field('features_block_list_textfs');
        $features_block_list_descfs = get_field('features_block_list_descfs');
        
        $features = [];

        if ($features_block && is_array($features_block)) {
            for ($i = 1; $i <= 4; $i++) {
                $icon = $features_block["feature_visual_feature_{$i}_icon"] ?? '';
                $text = $features_block["feature_visual_feature_{$i}_text"] ?? '';
                $desc = $features_block["feature_visual_feature_{$i}_description"] ?? '';

                if (!empty($text)) {
                    $features[] = compact('icon', 'text', 'desc');
                }
            }
        }
    }

    ob_start();
    ?>

    <section id="feature-visual-section-id"
        class="py-10 bg-gray-fade feature_visual_section <?php echo esc_attr($feature_visual_section_class); ?>">

        <div class="max-w-7xl mx-auto px-6">
            <div class="grid md:grid-cols-2 gap-16 items-center">

                <!-- Left Content -->
                <div class="space-y-8 feature_visual_content">

                    <?php if ($feature_visual_section_title) : ?>
                        <h2 class="section_title_fontsize pt-10 font-bold text-ithena-black mb-6">
                            <?= wp_kses_post($feature_visual_section_title); ?>
                            <?php if ($feature_visual_section_title_maroon) : ?>
                                <span class="text-ithena-maroon">
                                    <?= wp_kses_post($feature_visual_section_title_maroon); ?>
                                </span>
                            <?php endif; ?>
                        </h2>
                    <?php endif; ?>

                    <?php if (!empty($feature_text)) : ?>
                        <div class="feature-text <?= esc_attr($feature_text_fs); ?> space-y-6"><?= wp_kses_post($feature_text); ?></div>
                    <?php endif; ?>

                    <?php if (!empty($features)) : ?>
                        <div class="feature-list space-y-6">
                            <?php foreach ($features as $feature) : ?>
                                <div class="flex items-start space-x-4">
                                    <div class="w-6 h-6 flex items-center justify-center bg-ithena-blue/10 rounded-full mt-1">
                                        <?php if ($feature['icon']) : ?>
                                            <img src="<?= esc_url($feature['icon']); ?>"
                                                 alt="<?= esc_attr($feature['text']); ?>"
                                                 class="h-[28px]">
                                        <?php endif; ?>
                                    </div>
                                    <div>
                                        <h3 class="<?= esc_attr($features_block_list_textfs); ?> font-semibold text-ithena-black mb-2"><?= wp_kses_post($feature['text']); ?></h3>
                                        <?php if ($feature['desc']) : ?>
                                            <div class="<?= esc_attr($features_block_list_descfs); ?> text-ithena-black"><?= wp_kses_post($feature['desc']); ?></div>
                                        <?php endif; ?>
                                    </div>
                                </div>
                            <?php endforeach; ?>
                        </div>
                    <?php endif; ?>

                </div>

                <!-- Right Visual -->
                <div class="relative">

                    <div class="bg-ithena-white rounded-2xl p-8 feature_visual_content-media">

                        <?php if ($media_type === 'image') : ?>
                            <img src="<?= esc_url($image_url); ?>"
                                 alt="<?= esc_attr($image_alt); ?>"
                                 class="w-full h-auto rounded-lg shadow-lg object-cover feature-visual-img">
                        <?php endif; ?>

                        <?php if ($media_type === 'video') : ?>
                            <video autoplay loop muted playsinline controlslist="nodownload"
                                   src="<?= esc_url($video_url); ?>"
                                   alt="<?= esc_attr($video_alt); ?>"></video>
                        <?php endif; ?>

                    </div>

                    <?php if ($media_type === 'image') : ?>
                        <div class="absolute -top-4 -right-4 bg-ithena-white rounded-lg shadow-lg p-4 border">
                            <div class="flex items-center space-x-2">
                                <div class="w-3 h-3 bg-ithena-blue rounded-full"></div>
                                <span class="text-sm font-medium text-ithena-blue">
                                    <?= esc_html($floating_top_label); ?>
                                </span>
                            </div>
                        </div>

                        <div class="absolute -bottom-4 -left-4 bg-ithena-white rounded-lg shadow-lg p-4 border">
                            <div class="flex items-center space-x-2">
                                <div class="w-3 h-3 bg-ithena-maroon rounded-full"></div>
                                <span class="text-sm font-medium text-ithena-maroon">
                                    <?= esc_html($floating_bottom_label); ?>
                                </span>
                            </div>
                        </div>
                    <?php endif; ?>

                </div>

            </div>
        </div>
    </section>

    <?php if ($is_animation == 'yes'): ?>
        <!-- Zoom-in animation -->
        <style>
            .feature-visual-img {opacity: 0; transform: scale(0.92);transition: opacity 0.6s ease-out, transform 1s ease-out; will-change: transform, opacity;}
            .feature-visual-img.is-visible {opacity: 1;transform: scale(1);}
        </style>

        <script>
            document.addEventListener('DOMContentLoaded', function () {
                const imgs = document.querySelectorAll('.feature-visual-img');

                const observer = new IntersectionObserver(entries => {
                    entries.forEach(entry => {
                        if (entry.isIntersecting) {
                            entry.target.classList.add('is-visible');
                            observer.unobserve(entry.target);
                        }
                    });
                }, { threshold: 0.3 });

                imgs.forEach(img => observer.observe(img));
            });
        </script>
        <?php endif; ?>

    <?php
    return ob_get_clean();
});

// =========================
// tab and panel block
// =========================
add_shortcode('tab_panel_section', function () {

    // Enable Check
    if (!get_field('enable_tab_panel_section')) return '';

    // Section Meta
    $tabs_block_section_class  = get_field('tab_panel_section_class');
    $tabs_block_section_title  = get_field('tab_panel_title');
    $tabs_block_section_title_maroon  = get_field('tab_panel_title_maroon');
    $tabs_block_section_subtitle = get_field('tab_panel_description');

    // === Tabs (Static 6) ===
    $tabs = [];
    $tabs_group = get_field('tabshead');

    if ($tabs_group && is_array($tabs_group)) {
        for ($i = 1; $i <= 6; $i++) {
            $tabs[] = [
                'icon'     => $tabs_group["tab_{$i}_icon"] ?? '',
                'title'    => $tabs_group["tab_{$i}_title"] ?? '',
                'subtitle' => $tabs_group["tab_{$i}_subtitle"] ?? '',
            ];
        }
    }

    // === Panels (Static 6) ===
    $panels = [];
    $is_animation = get_field('animate_tabpanel_images');
    $tabpanel_group = get_field('tabpanelcards');
    if ($tabpanel_group && is_array($tabpanel_group)) {
        for ($i = 1; $i <= 6; $i++) {
            $panels[] = [
                'image'     => $tabpanel_group["panel_{$i}_image"] ?? '',
                'title'     => $tabpanel_group["panel_{$i}_title"] ?? '',
                'desc'      => $tabpanel_group["panel_{$i}_desc"] ?? '',
                'list1'     => $tabpanel_group["panel_{$i}_list1"] ?? '',
                'list2'     => $tabpanel_group["panel_{$i}_list2"] ?? '',
                'list3'     => $tabpanel_group["panel_{$i}_list3"] ?? '',
                'list4'     => $tabpanel_group["panel_{$i}_list4"] ?? '',
                'cta_text'  => $tabpanel_group["panel_{$i}_cta_text"] ?? '',
                'cta_type'  => $tabpanel_group["panel_{$i}_cta_type"] ?? '',
                'cta_link'  => $tabpanel_group["panel_{$i}_cta_link"] ?? '',
                'cta_shortcode' => $tabpanel_group["panel_{$i}_cta_shortcode"] ?? '',
            ];
        }
    }

    ob_start();
    ?>

    <?php if ($is_animation == 'yes'): ?>
        <!-- Animation styles -->
        <style>
            .panel-img img {opacity: 0; transform: translateX(80px);}
            .panel-img img.slide-in {animation: panelImgSlideIn 0.6s ease-out forwards;}
            @keyframes panelImgSlideIn {
                from {opacity: 0;transform: translateX(80px);}
                to { opacity: 1; transform: translateX(0); }
            }
        </style>
    <?php endif; ?>

    <!-- Tabs and Panel Section -->
    <section id="tab-panel-section-id"
        class="custom-section py-10 bg-white-fade tab_panel_section <?= esc_attr($tabs_block_section_class); ?>">

        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">

            <div class="text-center mb-8">
                <?php if ($tabs_block_section_title): ?>
                    <h2 class="section_title_fontsize  pt-10 font-bold text-ithena-black mb-4">
                        <?= nl2br(wp_kses_post($tabs_block_section_title)); ?>
                        <?php if ($tabs_block_section_title_maroon): ?>
                            <span class="text-ithena-maroon">
                                <?= nl2br(wp_kses_post($tabs_block_section_title_maroon)); ?>
                            </span>
                        <?php endif; ?>
                    </h2>
                <?php endif; ?>

                <?php if ($tabs_block_section_subtitle): ?>
                    <div class="section_desc_fontsize text-ithena-black max-w-3xl mx-auto"><?= wp_kses_post($tabs_block_section_subtitle); ?></div>
                <?php endif; ?>
            </div>

            <!-- Tab Navigation -->
            <div class="flex justify-center mb-12">
                <div class="flex flex-col md:flex-row gap-8 md:gap-12">
                    <?php 
                        $tab_title_class         = get_field('tab_title_class');
                        $tab_subtitle_class      = get_field('tab_subtitle_class');

                        foreach ($tabs as $tab): 
                            if (!$tab['title']) continue;
                            $slug = strtolower(str_replace(' ', '_', $tab['title']));
                        ?>
                            <button class="tab-btn flex flex-col items-center px-6 py-6 border-b-4 border-transparent"
                                data-tab="<?= esc_attr($slug); ?>">
                                <?php if ($tab['icon']): ?>
                                    <img src="<?= esc_url($tab['icon']); ?>" alt="<?= esc_attr($tab['title']); ?>" class="h-20 mb-4">
                                <?php endif; ?>
                                <span class="<?= esc_attr($tab_title_class); ?> font-bold"><?= wp_kses_post($tab['title']); ?></span>
                                <span class="<?= esc_attr($tab_subtitle_class); ?> text-sm font-semibold"><?= wp_kses_post($tab['subtitle']); ?></span>
                            </button>
                    <?php 
                        endforeach; ?>
                </div>
            </div>

            <!-- Panels -->
            <div class="tab-panels">
                <?php 
                    $panel_title_class       = get_field('panel_title_class');
                    $panel_desc_class        = get_field('panel_desc_class');
                    $panel_list_class        = get_field('panel_list_class');
                    $panel_cta_class         = get_field('panel_cta_class');
                
                    foreach ($panels as $index => $panel):
                    if (!$panel['title']) continue;
                    $tab_title = $tabs[$index]['title'] ?? '';
                    $panel_slug = strtolower(str_replace(' ', '_', $tab_title));
                ?>
                    <div class="tab-panel hidden" id="<?= esc_attr($panel_slug); ?>-panel">
                        <div class="grid grid-cols-1 lg:grid-cols-2 gap-12 items-center">

                            <div class="panel-text">
                                <h3 class="<?= esc_attr($panel_title_class); ?> font-bold text-ithena-maroon mb-6"><?= wp_kses_post($panel['title']); ?></h3>
                                <div class="<?= esc_attr($panel_desc_class); ?> mb-6"><?= wp_kses_post($panel['desc']); ?></div>

                                <ul class="space-y-4">
                                    <?php for ($i = 1; $i <= 4; $i++):
                                        $item = $panel["list{$i}"];
                                        if (!$item) continue;
                                    ?>
                                        <li class="flex items-start">
                                            <i class="ri-check-line mr-3"></i>
                                            <p class="<?= esc_attr($panel_list_class); ?> m-0"><?= wp_kses_post($item); ?></p>
                                        </li>
                                    <?php endfor; ?>
                                </ul>
                            </div>

                            <div class="panel-img">
                                <?php if ($panel['image']): ?>
                                    <img src="<?= esc_url($panel['image']); ?>"
                                        alt="<?= esc_attr($panel['title']); ?>"
                                        class="h-[338px] w-full object-cover rounded-lg shadow-lg">
                                <?php endif; ?>
                            </div>

                        </div>
                    </div>
                <?php endforeach; ?>
            </div>

        </div>
    </section>

    <script>
        document.addEventListener('DOMContentLoaded', function () {
            const buttons = document.querySelectorAll('.tab-btn');
            const panels  = document.querySelectorAll('.tab-panel');
            
            function resetImages() {
                document.querySelectorAll('.panel-img img').forEach(img => {
                    img.classList.remove('slide-in');
                    <?php if ($is_animation == 'yes'): ?>
                        img.style.opacity = '0';
                    <?php endif; ?>
                });
            }

            function showTab(slug) {
                buttons.forEach(btn => {
                    btn.classList.remove('active');
                    btn.style.borderBottomColor = 'transparent';
                });
                panels.forEach(panel => {
                    panel.classList.add('hidden');
                });
                resetImages();
                const btn = document.querySelector(`[data-tab="${slug}"]`);
                const panel = document.getElementById(`${slug}-panel`);

                if (!btn || !panel) return;

                btn.classList.add('active');
                btn.style.borderBottomColor = '#0082C8';
                panel.classList.remove('hidden');
                
                const img = panel.querySelector('.panel-img img');
                if (img) {
                    void img.offsetWidth;
                    img.classList.add('slide-in');
                }
            }

            buttons.forEach(btn => {
                btn.addEventListener('click', () => {
                    showTab(btn.dataset.tab);
                });
            });

            // Activate FIRST tab on load
            <?php
                $first_title = $tabs[0]['title'] ?? '';
                $first_slug  = strtolower(str_replace(' ', '_', $first_title));
            ?>
            showTab('<?= esc_js($first_slug); ?>');
        });
    </script>

    <?php
    return ob_get_clean();
});

// =========================
// ACCORDION SECTION BLOCK
// =========================
add_shortcode('custom_accordian_section', function() {
    
    if (!get_field('enable_accordian')) return;

    $accordian_title   = get_field('accordian_title');
    $accordian_title_maroon   = get_field('accordian_title_maroon');
    $accordian_subtitle = get_field('accordian_subtitle');
    $custom_accordian_section_class   = get_field('custom_accordian_section_class');

    // Get all accordion fields from the group
    $accordian_group = get_field('accordiancards');
    $is_animation = get_field('animate_accordion_images');
    
    // Initialize array
    $accordiancards = [];

    if ($accordian_group && is_array($accordian_group)) {

        // Determine total number of accordion sets dynamically
        $total = 0;
        foreach ($accordian_group as $key => $value) {
            if (strpos($key, '_title') !== false) {
                $total++;
            }
        }

        // Loop through each accordion card
        for ($i = 1; $i <= $total; $i++) {
            $accordiancards[] = [
                'title'       => $accordian_group["accordiancards_{$i}_title"] ?? '',
                'description' => $accordian_group["accordiancards_{$i}_description"] ?? '',
                'img'         => $accordian_group["accordiancards_{$i}_img"] ?? '',
                'imgtitle'    => $accordian_group["accordiancards_{$i}_imgtitle"] ?? '',
                'imgdescp'    => $accordian_group["accordiancards_{$i}_imgdescp"] ?? '',
            ];
        }
    }
    ob_start(); 
    ?>

    <?php if ($is_animation == 'yes'): ?>
        <!-- Animation styles -->
        <style>
            @keyframes accordionSlideIn {from {opacity: 0; transform: translateX(120px);} to {opacity: 1; transform: translateX(0);}} 
            .accordion-image-animate {animation: accordionSlideIn 1s ease-out;}
        </style>
    <?php endif; ?>

    <!-- Accordion Section -->
     <section id="accordion-section-id" class="custom-section py-10 bg-gray-fade custom_accordian_section <?php echo esc_attr($custom_accordian_section_class); ?>">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            
            <!-- Section Header -->
            <div class="text-center mb-8">
                <?php if ($accordian_title): ?>
                    <h2 class="section_title_fontsize  pt-10  font-bold mb-4 text-ithena-black">
                        <?= wp_kses_post($accordian_title); ?>
                        <?php if ($accordian_title_maroon): ?>
                            <span class="text-ithena-maroon"><?= wp_kses_post($accordian_title_maroon); ?></span>
                        <?php endif; ?>
                    </h2>
                <?php endif; ?>
                <?php if ($accordian_subtitle): ?>
                    <div class="section_desc_fontsize max-w-3xl mx-auto text-ithena-black"><?= wp_kses_post($accordian_subtitle); ?></div>
                <?php endif; ?>
            </div>

            <!-- Accordion Content -->
            <?php if (!empty($accordiancards)): ?>
                <div class="grid grid-cols-1 lg:grid-cols-2 gap-12 items-start">
                    
                    <!-- Left Side: Accordion List -->
                    <div class="space-y-4">
                        <?php 
                        
                        $accordian_tab_title_fs = get_field('accordian_tab_title_fs');
                        $accordian_tab_desc_fs  = get_field('accordian_tab_desc_fs');
                        
                        foreach ($accordiancards as $index => $card): 
                            $id = 'accordian_' . $index;
                            if (!$card['title'] && !$card['description']) continue;
                        ?>
                            <div class="accordion-items bg-ithena-white rounded-lg shadow-sm">
                                <button class="text-xl accordion-header w-full p-3 px-4 text-left flex items-center justify-between hover:bg-ithena-gray transition-colors" data-accordion="<?php echo esc_attr($id); ?>">
                                    <div class="accordion-tab-title">
                                        <h3 class="<?= esc_attr($accordian_tab_title_fs); ?> text-ithena-blue font-bold mb-2"><?= wp_kses_post($card['title']); ?></h3>
                                    </div>
                                    <i class="ri-arrow-down-s-line text-2xl transition-transform duration-300 text-ithena-blue"></i>
                                </button>
                                <div class="accordion-content max-h-0 overflow-hidden transition-all duration-300">
                                    <div class="<?= esc_attr($accordian_tab_desc_fs); ?> px-6 pb-6"><?= wp_kses_post($card['description']); ?></div>
                                </div>
                            </div>
                        <?php endforeach; ?>
                    </div>

                    <!-- Right Side: Dynamic Image Display -->
                    <div class="lg:sticky lg:top-8 accordion-image-div">
                        <?php $first_card = $accordiancards[0]; ?>
                        <div class="bg-ithena-white rounded-lg shadow-lg p-4">
                            <?php if ($first_card['img']): ?>
                                <img id="accordion-image" 
                                    src="<?= esc_url($first_card['img']); ?>" 
                                    alt="<?= esc_attr($first_card['imgtitle']); ?>" 
                                    class="h-[338px] object-cover object-top rounded-lg w-full">
                            <?php endif; ?>
                            <div class="mt-3">
                                <h4 id="accordion-image-title" class="text-xl font-bold mb-2">
                                    <?= wp_kses_post($first_card['imgtitle']); ?>
                                </h4>
                                <p id="accordion-image-description" class="text-ithena-black mb-0">
                                    <?= wp_kses_post($first_card['imgdescp']); ?>
                                </p>
                            </div>
                        </div>
                    </div>

                </div>
            <?php endif; ?>
        </div>
    </section>

    <!-- Accordion Functionality -->
    <script id="accordion-functionality">
        document.addEventListener('DOMContentLoaded', function() {
            
            const accordionHeaders = document.querySelectorAll('.accordion-header');
            const accordionImage = document.getElementById('accordion-image');
            const imageTitle = document.getElementById('accordion-image-title');
            const imageDescription = document.getElementById('accordion-image-description');

            const imageData = {
                <?php foreach ($accordiancards as $index => $card): 
                    $id = 'accordian_' . $index;
                    if (!$card['img']) continue;
                ?>
                '<?php echo esc_js($id); ?>': {
                    src: '<?php echo esc_url($card['img']); ?>',
                    title: '<?php echo esc_js($card['imgtitle']); ?>',
                    description: '<?php echo esc_js($card['imgdescp']); ?>'
                },
                <?php endforeach; ?>
            };

            function updateImage(key) {
                const data = imageData[key];
                if (!data) return;

                const imageWrapper = document.querySelector('.accordion-image-div');

                // Reset animation
                imageWrapper.classList.remove('accordion-image-animate');
                void imageWrapper.offsetWidth; // force reflow

                // Update content
                accordionImage.src = data.src;
                accordionImage.alt = data.title;
                imageTitle.textContent = data.title;
                imageDescription.textContent = data.description;
                
                <?php if ($is_animation == 'yes'): ?>
                // Trigger slide-in animation
                imageWrapper.classList.add('accordion-image-animate');
                <?php endif; ?>
            }


            function toggleAccordion(header) {
                const content = header.nextElementSibling;
                const icon = header.querySelector('i');
                const isActive = content.style.maxHeight && content.style.maxHeight !== '0px';

                accordionHeaders.forEach(other => {
                    const c = other.nextElementSibling;
                    const i = other.querySelector('i');
                    c.style.maxHeight = '0px';
                    i.style.transform = 'rotate(0deg)';
                    i.classList.remove('ri-arrow-up-s-line');
                    i.classList.add('ri-arrow-down-s-line');
                });

                if (!isActive) {
                    content.style.maxHeight = content.scrollHeight + 'px';
                    icon.style.transform = 'rotate(180deg)';
                    icon.classList.remove('ri-arrow-down-s-line');
                    icon.classList.add('ri-arrow-up-s-line');
                    updateImage(header.dataset.accordion);
                }
            }

            accordionHeaders.forEach(header => {
                header.addEventListener('click', function() {
                    toggleAccordion(this);
                });
            });
            
            //updateImage('accordian_0');

             // 🔹 Open the first accordion by default
            if (accordionHeaders.length > 0) {
                const firstHeader = accordionHeaders[0];
                const firstContent = firstHeader.nextElementSibling;
                const firstIcon = firstHeader.querySelector('i');
                firstContent.style.maxHeight = firstContent.scrollHeight + 'px';
                firstIcon.style.transform = 'rotate(180deg)';
                firstIcon.classList.remove('ri-arrow-down-s-line');
                firstIcon.classList.add('ri-arrow-up-s-line');
                updateImage(firstHeader.dataset.accordion);
            }

        });
    </script>

    <?php
    return ob_get_clean();
});

// =========================
// OVERVIEW BLOCK (Animated Cards)
// =========================
add_shortcode('overview_section', function() {

    if (!get_field('enable_overview_section')) return;

    // General fields
    $overview_section_class   = get_field('overview_section_class');
    $overview_section_title   = get_field('overview_title');
    $overview_title_maroon    = get_field('overview_title_maroon');
    $overview_section_content = get_field('overview_content');

    // Cards
    $cards = [];
    $overview_cards = get_field('overview_cards');
    $is_animation = get_field('animate_overview_cards');

    if ($overview_cards && is_array($overview_cards)) {
        $total = 0;
        foreach ($overview_cards as $key => $value) {
            if (strpos($key, '_title') !== false) $total++;
        }

        for ($i = 1; $i <= $total; $i++) {
            $icon  = $overview_cards["overview_cards_{$i}_icon"] ?? '';
            $title = $overview_cards["overview_cards_{$i}_title"] ?? '';
            $descp = $overview_cards["overview_cards_{$i}_descp"] ?? '';

            if ($icon || $title || $descp) {
                $cards[] = compact('icon', 'title', 'descp');
            }
        }
    }

    ob_start(); ?>

    <?php if ($is_animation === 'yes'): ?>
    <!-- Animation Styles -->
    <style>
        .overview-card {
            opacity: 0;
            transform: translateX(60px);
            transition: opacity .6s ease, transform 1.0s ease;
        }
        .overview-card.is-visible {
            opacity: 1;
            transform: translateX(0);
        }
    </style>
    <?php endif; ?>

    <!-- Platform Overview Section -->
    <section id="overview-section-id" class="custom-section py-10 bg-white-fade overview_section <?= esc_attr($overview_section_class); ?>">
        <div class="max-w-7xl mx-auto px-6 lg:px-8">
            <?php if ($overview_section_title): ?>
                <h2 class="section_title_fontsize pt-10 font-bold mb-12 text-center">
                    <?= nl2br(wp_kses_post($overview_section_title)); ?>
                    <?php if ($overview_title_maroon): ?>
                        <span class="text-ithena-maroon"><?= nl2br(wp_kses_post($overview_title_maroon)); ?></span>
                    <?php endif; ?>
                </h2>
            <?php endif; ?>

            <div class="grid lg:grid-cols-2 gap-16 items-start">

                <!-- Left Content -->
                <?php if ($overview_section_content):
                    $overview_section_content_fs = get_field('overview_section_content_fs'); ?>
                    <div class="<?= esc_attr($overview_section_content_fs); ?> leading-relaxed"><?= wp_kses_post($overview_section_content); ?></div>
                <?php endif; ?>

                <!-- Right Cards -->
                <?php if (!empty($cards)):
                    $card_title_fs = get_field('overview_card_title_fs');
                    $card_descp_fs = get_field('overview_card_descp_fs'); ?>
                    
                    <div class="space-y-8 overview-cards-wrapper">
                        <?php foreach ($cards as $index => $card):
                            $style = ($is_animation === 'yes') ? 'style="transition-delay:' . esc_attr( $index * 120 ) . 'ms;"' : ''; ?>

                            <div class="overview-card bg-ithena-gray p-8 rounded-2xl text-center hover:shadow-xl hover:-translate-y-2 transition-all duration-300" <?= $style; ?>>
                                <?php if ($card['icon']): ?>
                                    <div class="w-16 h-16 mx-auto mb-6 bg-ithena-white rounded-2xl flex items-center justify-center">
                                        <img src="<?= esc_url($card['icon']); ?>" alt="<?= esc_attr($card['title']); ?>" class="h-[28px]">
                                    </div>
                                <?php endif; ?>
                                <?php if ($card['title']): ?>
                                    <h3 class="<?= esc_attr($card_title_fs); ?> font-semibold mb-4"><?= wp_kses_post($card['title']); ?></h3>
                                <?php endif; ?>
                                <?php if ($card['descp']): ?>
                                    <div class="<?= esc_attr($card_descp_fs); ?>"><?= wp_kses_post($card['descp']); ?></div>
                                <?php endif; ?>
                            </div>

                        <?php endforeach; ?>
                    </div>

                <?php endif; ?>
            </div>
        </div>
    </section>

    <?php if ($is_animation === 'yes'): ?>
    <!-- Animation Script -->
    <script>
        document.addEventListener('DOMContentLoaded', function () {
            const cards = document.querySelectorAll('.overview-card');
            const observer = new IntersectionObserver(entries => {
                entries.forEach(entry => {
                    if (entry.isIntersecting) {
                        entry.target.classList.add('is-visible');
                        observer.unobserve(entry.target);
                    }
                });
            }, { threshold: 0.5 });
            cards.forEach(card => observer.observe(card));
        });
    </script>
    <?php endif; ?>

    <?php
    return ob_get_clean();
});

// ========================================
// SHORTCODE: success_story_block
// ========================================
add_shortcode('success_story_block', function () {
    
    if (!get_field('enable_success_story')) return;

    // Get ACF fields
    $success_story_section_class = get_field('success_story_section_class');
    $success_story_block_title  = get_field('success_story_title');
    $success_story_title_maroon  = get_field('success_story_title_maroon');
    $success_story_block_subtitle = get_field('success_story_subtitle');
    ob_start();
    ?>
    
    <!-- Success Stories Section -->
    <section id="success-stories-section-id" class="custom-section py-10 bg-gray-fade success_story_block <?php echo esc_attr($success_story_section_class); ?>">
        <div class="px-6 lg:px-8">  
            
            <div class="text-center mb-8">
                <h2 class="section_title_fontsize pt-10 font-bold text-ithena-black mb-4">
                    <?= nl2br(wp_kses_post($success_story_block_title)); ?>
                    <?php if ($success_story_title_maroon): ?>
                        <span class="text-ithena-maroon"><?= nl2br(wp_kses_post($success_story_title_maroon)); ?></span>
                    <?php endif; ?>
                </h2>
                <div class="section_desc_fontsize text-ithena-black"><?= wp_kses_post($success_story_block_subtitle); ?></div>
            </div>
            </div>

            <?php
                $is_animation = get_field('animate_success_stories');
                $story_group = get_field('success_story_cards');
                $slides = [];

                for ($i = 1; $i <= 5; $i++) {
                    if (!empty($story_group["story{$i}_title"])) {
                        $slides[] = [
                            'title' => $story_group["story{$i}_title"] ?? '',
                            'desc'  => $story_group["story{$i}_desc"] ?? '',
                            'highlight_val' => $story_group["story{$i}_highlight_val"] ?? '',
                            'highlight_val_label' => $story_group["story{$i}_highlight_val_label"] ?? '',
                            'image' => $story_group["story{$i}_image"] ?? '',
                        ];
                    }
                }
            ?>

            <?php if (!empty($slides)) : ?>
            <div class="relative flex items-center px-4 max-w-7xl mx-auto">
                
                <button class="slider-prev w-12 h-12 rounded-full bg-ithena-white hover:bg-gray-100 flex items-center justify-center text-gray-700 mr-4 shadow-lg z-10">
                    <i class="ri-arrow-left-s-line ri-xl"></i>
                </button>

                <div class="flex-1 overflow-hidden">
                    <div class="slider-wrapper transition-transform duration-500 ease-in-out flex">
                        <?php 
                            $slide_title_fs = get_field('slide_title_fs');
                            $slide_desc_fs = get_field('slide_desc_fs');
                            $slide_highlight_val_fs = get_field('slide_hl_val_fs');
                            $slide_highlight_val_label_fs = get_field('slide_hl_val_label_fs');

                            foreach ($slides as $slide): ?>
                            <div class="slider-slide w-full flex-shrink-0 px-1 md:px-2">
                                <div class="bg-ithena-white rounded-2xl p-6 md:p-12 md:mx-4">
                                    <div class="grid lg:grid-cols-2 gap-6 md:gap-12 items-center">
                                        
                                        <div class="slide-content">
                                            <?php if ($slide['title']): ?>
                                                <h3 class="<?= esc_attr($slide_title_fs); ?> font-semibold mb-4 md:mb-6 text-ithena-black"><?= wp_kses_post($slide['title']); ?></h3>
                                            <?php endif; ?>

                                            <?php if ($slide['desc']): ?>
                                                <div class="<?= esc_attr($slide_desc_fs); ?> leading-relaxed mb-4 md:mb-8"><?= wp_kses_post($slide['desc']); ?></div>
                                            <?php endif; ?>

                                            <?php if ($slide['highlight_val'] || $slide['highlight_val_label']): ?>
                                                <div class="flex items-center">
                                                    <?php if ($slide['highlight_val']): ?>
                                                        <div class="<?= esc_attr($slide_highlight_val_fs); ?> font-bold text-ithena-maroon mr-2 md:mr-4">
                                                            <?= esc_html($slide['highlight_val']); ?>
                                                        </div>
                                                    <?php endif; ?>
                                                    <?php if ($slide['highlight_val_label']): ?>
                                                        <div class="<?= esc_attr($slide_highlight_val_label_fs); ?> md:text-base italic ml-2 text-ithena-maroon">
                                                            <?= esc_html($slide['highlight_val_label']); ?>
                                                        </div>
                                                    <?php endif; ?>
                                                </div>
                                            <?php endif; ?>
                                        </div>

                                        <?php if ($slide['image']): ?>
                                            <div class="relative">
                                                <img src="<?= esc_url($slide['image']); ?>" alt="<?= esc_attr($slide['title']); ?>" 
                                                    class="w-full h-[200px] md:h-[400px] object-cover rounded-xl shadow-2xl">
                                            </div>
                                        <?php endif; ?>

                                    </div>
                                </div>
                            </div>
                        <?php endforeach; ?>
                    </div>
                </div>

                <button class="slider-next w-12 h-12 rounded-full bg-ithena-white flex items-center justify-center text-gray-700 ml-4 shadow-lg z-10">
                    <i class="ri-arrow-right-s-line ri-xl"></i>
                </button>

            </div>
            <?php endif; ?>
        </div>
    </section>

    <?php if ($is_animation == 'yes'): ?>
        <!-- ADDED: slide-up animation -->
        <style>
            .slide-content {opacity: 0;transform: translateY(80px);}
            .slide-content.animate-in {animation: slideUpFade 1.25s ease-out forwards;}
            @keyframes slideUpFade {
                from {opacity: 0;transform: translateY(80px);}
                to {opacity: 1;transform: translateY(0);}
            }
        </style>
    <?php endif; ?>

    <script>
        document.addEventListener('DOMContentLoaded', function () {
            const sliderWrapper = document.querySelector('.slider-wrapper');
            const slides = document.querySelectorAll('.slider-slide');
            const prevBtn = document.querySelector('.slider-prev');
            const nextBtn = document.querySelector('.slider-next');
            let currentSlide = 0;

            function animateContent() {
                document.querySelectorAll('.slide-content').forEach(el => {
                    el.classList.remove('animate-in');
                });
                const activeSlide = slides[currentSlide];
                const content = activeSlide.querySelector('.slide-content');
                if (content) {
                    void content.offsetWidth; // force reflow
                    content.classList.add('animate-in');
                }
            }

            function updateSlider() {
                sliderWrapper.style.transform = `translateX(-${currentSlide * 100}%)`;
                animateContent(); // ADDED
            }

            prevBtn.addEventListener('click', () => {
                currentSlide = (currentSlide - 1 + slides.length) % slides.length;
                updateSlider();
            });

            nextBtn.addEventListener('click', () => {
                currentSlide = (currentSlide + 1) % slides.length;
                updateSlider();
            });

            updateSlider(); // initial animation
        });
    </script>

    <?php
    return ob_get_clean();
});

// ========================================
// SHORTCODE: Explore Block
// ========================================
add_shortcode('explore_block', function () {
    
    if (!get_field('enable_explore_block')) return;

    // Section-level fields
    $explore_block_class = get_field('explore_section_class');
    $explore_block_title = get_field('explore_section_title');
    $explore_block_title_maroon = get_field('explore_block_title_maroon');
    $explore_block_desc  = get_field('explore_section_desc');

    // Card-level fields
    $eb_card_group = get_field('eb_card_group');
    $is_animation = get_field('animate_explore_cards');

    ob_start();
    ?>

    <?php if ($is_animation == 'yes'): ?>
        <!-- Animation Styles -->
        <style>
            .explore-card { opacity: 0; transform: translateY(-60px); transition: opacity .6s ease, transform 1.0s ease; }
            .explore-card.is-visible { opacity: 1; transform: translateY(0);}
        </style>
    <?php endif; ?>

    <!-- Explore Section -->
    <section id="explore-section-id" class="custom-section py-10 bg-white-fade explore_block <?php echo esc_attr($explore_block_class); ?>">
        <div class="max-w-7xl mx-auto px-6">

            <!-- Section Header -->
            <?php if ($explore_block_title || $explore_block_desc): ?>
                <div class="text-center mb-8">
                    <h2 class="section_title_fontsize  pt-10  font-bold mb-4">
                        <?php if ($explore_block_title):
                            echo wp_kses_post($explore_block_title); 
                        endif; ?>
                        <?php if ($explore_block_title_maroon): ?>
                            <span class="text-ithena-maroon">
                                <?= wp_kses_post($explore_block_title_maroon); ?>
                            </span>
                        <?php endif; ?>
                    </h2>
                    <?php if ($explore_block_desc): ?>
                        <div class="section_desc_fontsize max-w-3xl mx-auto"><?= wp_kses_post($explore_block_desc); ?></div>
                    <?php endif; ?>
                </div>
            <?php endif; ?>

            <!-- Explore Cards (3 total) -->
            <div class="grid md:grid-cols-3 gap-6">
                <?php
                // Loop through 3 cards using counter
                for ($i = 1; $i <= 3; $i++) :
                    $card_icon     = $eb_card_group["eb_card{$i}_icon"];
                    $card_title    = $eb_card_group["eb_card{$i}_title"];
                    $card_subtitle = $eb_card_group["eb_card{$i}_subtitle"];
                ?>
                    <div class="explore-card bg-ithena-white rounded-2xl p-6 border-2 border-ithena-blue hover:shadow-xl hover:-translate-y-2 transition-all duration-300 cursor-pointer">
                        <?php if ($card_icon): ?>
                            <div class="bg-ithena-blue h-16 mb-4 mx-auto p-2 rounded-2xl w-16">
                                <img src="<?php echo esc_url( $card_icon ); ?>" alt="<?php echo esc_attr( $card_title); ?>" 
                                    class="explore_card_icon h-auto" />
                            </div>
                        <?php endif; ?>

                        <?php if ($card_title): 
                            $explore_card_title_fs = get_field('explore_card_title_fs');    
                        ?>
                            <h3 class="<?= esc_attr($explore_card_title_fs); ?> font-semibold mb-3 text-center text-ithena-black"><?= wp_kses_post($card_title); ?></h3>
                        <?php endif; ?>

                        <?php if ($card_subtitle): 
                            $explore_card_subtitle_fs = get_field('explore_card_subtitle_fs');        
                        ?>
                            <div class="<?= esc_attr($explore_card_subtitle_fs); ?> mb-4 text-center"><?= wp_kses_post($card_subtitle); ?></div>
                        <?php endif; ?>

                        <!-- Bullet Points (4 per card) -->
                        <div class="space-y-2 eb-bullet-points">
                        <?php $explore_block_list_fs = get_field('explore_block_list_fs');
                            $eb_card_bullets_group = $eb_card_group["eb_card{$i}_bullets_group"];

                            for ($b = 1; $b <= 4; $b++) :
                                $bullet_icon = $eb_card_bullets_group["bulletpt{$b}_icon"];
                                $bullet_text = $eb_card_bullets_group["bulletpt{$b}_text"];
                                if (!$bullet_icon && !$bullet_text) continue;
                            ?>
                                <div class="flex items-center space-x-3">
                                    <div class="w-8 h-8 flex items-center justify-center">
                                        <?php if ($bullet_icon): ?>
                                            <i class="<?php //echo esc_attr($bullet_icon); ?> eb-bullet-icon"></i>
                                            <img src="<?php echo esc_url( $bullet_icon ); ?>" 
                                                alt="<?php echo esc_attr( $bullet_text); ?>" 
                                                class="explore_card_bullet_icon h-5"
                                            />
                                        <?php endif; ?>
                                    </div>
                                    <?php if ($bullet_text): ?>
                                        <span class="<?= esc_attr($explore_block_list_fs); ?> eb-bullet-text"><?= wp_kses_post($bullet_text); ?></span>
                                    <?php endif; ?>
                                </div>
                            <?php endfor; ?>
                        </div>
                    </div>

                <?php endfor; ?>
            </div>
        </div>
    </section>

    <?php if ($is_animation == 'yes'): ?>
        <!-- Animation Script -->
        <script>
            document.addEventListener('DOMContentLoaded', function () {
                const cards = document.querySelectorAll('.explore-card');
                const observer = new IntersectionObserver(entries => {
                    entries.forEach(entry => {
                        if (entry.isIntersecting) {
                            entry.target.classList.add('is-visible');
                            observer.unobserve(entry.target);
                        }
                    });
                }, { threshold: 0.6 });
                cards.forEach(card => observer.observe(card));
            });
        </script>
    <?php endif; ?>

    <?php
    return ob_get_clean();
});

// ========================================
// SHORTCODE: four_thumbanils_block
// ========================================
add_shortcode('four_thumbanils_block', function () {
    // Enable check
    $enable = get_field('enable_four_thumbanils_block');
    if (!$enable) {
        return '';
    }

    // Section-level fields
    $four_thumbanils_block_class         = get_field('four_thumbanils_block_class');
    $four_thumbanils_block_title         = get_field('four_thumbanils_block_title');
    $four_thumbanils_block_title_maroon  = get_field('four_thumbanils_block_title_maroon');
    $four_thumbanils_block_subtitle      = get_field('four_thumbanils_block_subtitle');

    $block_cta_text = get_field('cta_text');
    $block_cta_type = get_field('cta_type');

    // Thumbnails (4 static entries)
    $thumbnails = [];
    // Card group (3 explore cards)
    $is_animation = get_field('animate_four_thumbnails');
    $thumbnails_cards = get_field('thumbnails_cards');

    for ($i = 1; $i <= 4; $i++) {
        $thumbnails[] = [
            'img'   => $thumbnails_cards["thumbnail{$i}_image"],
            'title' => $thumbnails_cards["thumbnail{$i}_title"],
            'text'  => $thumbnails_cards["thumbnail{$i}_text"],
        ];
    }

    ob_start();
    ?>

    <?php if ($is_animation == 'yes'): ?>
        <!-- Animation Styles -->
        <style>
            .thumbnail-card { opacity: 0; transform: translateY(-60px); transition: opacity .6s ease, transform 1.0s ease;}
            .thumbnail-card.is-visible { opacity: 1; transform: translateY(0);}
        </style>
    <?php endif; ?>

    <!-- Industry Solutions Section -->
     <section id="four-thumbanils-section-id" class="custom-section py-10 bg-white-fade four_thumbanils_block <?= esc_attr($four_thumbanils_block_class); ?>">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 blue-version">
            <div class="grid grid-cols-1 lg:grid-cols-2 gap-16 items-center">

                <!-- Left Content -->
                <div class="lhs-content">
                    
                    <?php if ($four_thumbanils_block_title): ?>
                        <h2 class="section_title_fontsize  pt-10 font-bold text-ithena-black mb-3">
                            <?= wp_kses_post($four_thumbanils_block_title); ?>
                            <?php if ($four_thumbanils_block_title_maroon): ?>
                                <span class="text-ithena-maroon">
                                    <?= nl2br(wp_kses_post($four_thumbanils_block_title_maroon)); ?>
                                </span>
                            <?php endif; ?>
                        </h2>
                    <?php endif; ?>

                    <?php if ($four_thumbanils_block_subtitle): ?>
                        <div class="section_desc_fontsize text-ithena-black mb-8"><?= wp_kses_post($four_thumbanils_block_subtitle); ?></div>
                    <?php endif; ?>

                    <?php if ($block_cta_text):                     
                        $block_cta_link = ""; $block_cta_shortcode = "";
                        $block_cta_class = "inactive_link";
                        if($block_cta_type == 'redirection'){
                            $banner_button_link   = get_field('cta_link');
                            $block_cta_class = "active_link";
                        }
                        if($block_cta_type == 'popup-form'){
                            $block_cta_shortcode  = get_field('cta_shortcode');
                            $block_cta_class = "active_link";
                        }
                    ?>
                        <a  <?php if (!empty($block_cta_link)) : ?>
                                href="<?= esc_url($block_cta_link); ?>"
                            <?php endif; ?>
                            <?php if (!empty($block_cta_shortcode)) : ?>
                                data-form_shortcode="<?= $block_cta_shortcode; ?>"
                            <?php endif; ?>
                            class="custom-btn <?= $block_cta_class; ?> !rounded-button bg-ithena-blue inline-block p-3 text-ithena-white">
                            <?= esc_html($block_cta_text); ?>
                        </a>
                    <?php endif; ?>

                </div>

                <!-- Right Thumbnails Grid -->
                <div class="grid grid-cols-2 gap-8 rhs-content">
                    <?php 
                    $counter = 1;
                    
                    $thumb_card_title_fs = get_field('thumb_card_title_fs');
                    $thumb_card_text_fs  = get_field('thumb_card_text_fs');

                    foreach ($thumbnails as $thumb):
                        if ($thumb['img'] || $thumb['title'] || $thumb['text']):
                    ?>
                        <div class="text-center thumbnail-card">
                            <?php if ($thumb['img']): ?>
                                <div class="mb-3 thumbnail-card-icon">
                                    <img src="<?= esc_url($thumb['img']); ?>" alt="<?= esc_attr($thumb['title']); ?>" class="w-16 h-16 mx-auto object-contain">
                                </div>
                            <?php endif; ?>

                            <?php if ($thumb['title']): ?>
                                <h3 class="thumbnail-card-title <?= esc_attr($thumb_card_title_fs); ?> font-bold text-ithena-black"><?= esc_html($thumb['title']); ?></h3>
                            <?php endif; ?>

                            <?php if ($thumb['text']): ?>
                                <div class="thumbnail-card-text <?= esc_attr($thumb_card_text_fs); ?> text-ithena-black"><?= esc_html($thumb['text']); ?></div>
                            <?php endif; ?>
                        </div>
                    <?php 
                        endif;
                        $counter++;
                    endforeach; 
                    ?>
                </div>

            </div>
        </div>
    </section>

    <?php if ($is_animation == 'yes'): ?>
        <!-- Animation Script -->
        <script>
            document.addEventListener('DOMContentLoaded', function () {
                const cards = document.querySelectorAll('.thumbnail-card');
                const observer = new IntersectionObserver(entries => {
                    entries.forEach(entry => {
                        if (entry.isIntersecting) {
                            entry.target.classList.add('is-visible');
                            observer.unobserve(entry.target);
                        }
                    });
                }, { threshold: 0.6 });
                cards.forEach(card => observer.observe(card));
            });
        </script>
    <?php endif; ?>

    <?php
    return ob_get_clean();
});

// =========================
// Testimonial section block
// =========================
add_shortcode('testimonials_section', function() {

    // Check if section is enabled
    if (!get_field('enable_testimonials_section')) return;

    // Section-level fields
    $testimonials_section_class = get_field('testimonials_section_class');
    $testimonials_section_title = get_field('testimonials_title');
    $testimonials_title_maroon = get_field('testimonials_title_maroon');
    $testimonials_section_description = get_field('testimonials_description');

    // Top features (3 items max)
    $features = [];
    $features_block = get_field('testimonials_features');
    $feature_block_title_fs = get_field('feature_block_title_fs');
    $feature_block_desc_fs = get_field('feature_block_desc_fs');  

    if ($features_block && is_array($features_block)) {
        for ($i = 1; $i <= 3; $i++) {
            $icon  = $features_block["testimonials_feature_{$i}_icon"] ?? '';
            $title = $features_block["testimonials_feature_{$i}_title"] ?? '';
            $desc  = $features_block["testimonials_feature_{$i}_description"] ?? '';
            if (!empty($title)) {
                $features[] = [ 'icon' => $icon, 'title' => $title, 'description' => $desc, ];
            }
        }
    }

    // Testimonials (4 items max)
    $testimonials = [];
    $testimonials_block = get_field('testimonials_cards');
    $testi_block_title_fs = get_field('testi_block_name_fs');
    $testi_block_desc_fs = get_field('testi_block_desc_fs');  

    if ($testimonials_block && is_array($testimonials_block)) {
        for ($i = 1; $i <= 4; $i++) {
            $image    = $testimonials_block["testimonial_card_{$i}_image"] ?? '';
            $name     = $testimonials_block["testimonial_card_{$i}_name"] ?? '';
            $designation = $testimonials_block["testimonial_card_{$i}_designation"] ?? '';
            $content  = $testimonials_block["testimonial_card_{$i}_content"] ?? '';
            if (!empty($content)) {
                $testimonials[] = [ 'image' => $image, 'name' => $name, 'designation' => $designation, 'content' => $content, ];
            }
        }
    }

    // Output
    ob_start(); ?>

     <section id="testimonials-section-id" class="custom-section py-10 bg-white-fade testimonials_section <?= esc_attr($testimonials_section_class); ?>">
        <div class="max-w-7xl mx-auto px-6 lg:px-8">
            
            <div class="text-center">
                <h2 class="section_title_fontsize  pt-10 font-bold text-ithena-black mb-4">
                    <?= wp_kses_post($testimonials_section_title); ?>
                    <?php if ($testimonials_title_maroon): ?>
                        <span class="text-ithena-maroon"><?= wp_kses_post($testimonials_title_maroon); ?></span>
                    <?php endif; ?>
                </h2>
                <div class="section_desc_fontsize text-ithena-black"><?= wp_kses_post($testimonials_section_description); ?></div>
            </div>

            <?php if (!empty($features)) : ?>
                <div class="max-w-7xl mx-auto px-6 lg:px-8 py-10">
                    <div class="grid md:grid-cols-3 gap-12">
                        <?php foreach ($features as $feature) : ?>
                            <div class="text-center group">
                                <div class="w-16 h-16 mx-auto mb-6 bg-ithena-blue rounded-2xl flex items-center justify-center transition-colors">
                                    <?php if (!empty($feature['icon'])) : ?>
                                        <i class="<?php //echo esc_attr($feature['icon']); ?> ri-2x text-ithena-white"></i>
                                        <img src="<?= esc_url( $feature['icon'] ); ?>" alt="<?= esc_attr( $feature['title']); ?>" 
                                            class="testimonial_card_feature_icon h-[28px]" />
                                    <?php endif; ?>
                                </div>
                                <h3 class="<?= esc_attr($feature_block_title_fs) ?> font-bold text-ithena-black mb-4"><?= wp_kses_post($feature['title']); ?></h3>
                                <div class="<?= esc_attr($feature_block_desc_fs) ?> text-ithena-black leading-relaxed"><?= wp_kses_post($feature['description']); ?></div>
                            </div>
                        <?php endforeach; ?>
                    </div>
                </div>
            <?php endif; ?>

            <?php if (!empty($testimonials)) : ?>
                <div class="grid md:grid-cols-2 gap-8 mb-10">
                    <?php foreach ($testimonials as $t) : ?>
                        <div class="bg-ithena-white border-2 border-ithena-blue p-8 rounded-2xl hover:shadow-xl hover:-translate-y-2 animate-slide-down">
                            <div class="flex items-center mb-6">
                                <?php if (!empty($t['image'])) : ?>
                                    <img src="<?= esc_url($t['image']); ?>" alt="<?= esc_attr($t['name']); ?>" 
                                        class="border-2 border-ithena-blue h-16 mr-4 object-cover rounded-full w-16">
                                <?php endif; ?>
                                <div>
                                    <h4 class="<?= esc_attr($testimonial_card_name_fs) ?> font-semibold text-ithena-black">
                                        <?= esc_html($t['name']); ?>, <?= esc_html($t['designation']); ?>
                                    </h4>
                                </div>
                            </div>
                            <div class="leading-relaxed <?= esc_attr($testimonial_card_content_fs) ?>"> <?= wp_kses_post($t['content']); ?> </div>
                        </div>
                    <?php endforeach; ?>
                </div>
            <?php endif; ?>

        </div>
    </section>

    <?php $is_animate = get_field('enable_testimonial_animations'); ?>
    <?php if ($is_animate): ?> 
        <style>
            .animate-slide-down{opacity:0;transform:translateY(-60px);transition:opacity 0.6s ease,transform 1s ease;will-change:opacity,transform;}
            .animate-slide-down.is-visible{opacity:1;transform:translateY(0);}
        </style>

        <script>
            document.addEventListener('DOMContentLoaded', () => {
                const cards = document.querySelectorAll('.animate-slide-down');
                const observer = new IntersectionObserver(entries => {
                    entries.forEach(entry => {
                        if (entry.isIntersecting) {
                            entry.target.classList.add('is-visible');
                            observer.unobserve(entry.target);
                        }
                    });
                }, { threshold: 0.5 });
                cards.forEach(card => observer.observe(card));
            });
        </script>
    <?php endif; ?>
    
    <?php
    return ob_get_clean();
});
