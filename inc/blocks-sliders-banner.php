<?php
/**
 * Custom Shortcode Blocks - sliders and banner
 * File: /inc/blocks-sliders-banner.php
 */

// Exit if accessed directly
if (!defined('ABSPATH')) exit;

// =========================
// Hero Slider - with Overlay Cards
// =========================
add_shortcode('hero_sliderwcards', function() {

    if (!get_field('enable_hero_slider_w_cards')) return;

    $slider_bottom_fade = get_field('hero_slide_w_cards_bottom_fade');
    $slider_bottom_fade_cls = "product_banner_white";
    if($slider_bottom_fade == 'grey'){
        $slider_bottom_fade_cls = "product_banner_grey";
    }

    $slide_title_color = get_field('hero_slide_w_cards_title_color');
    $slide_title_color_cls = 'text-ithena-white';
    if ($slide_title_color === 'grey') {
        $slide_title_color_cls = 'text-ithena-black';
    }

    $slide_desc_color = get_field('hero_slide_w_cards_description_text_color');
    $slide_desc_color_cls = 'text-ithena-white';
    if ($slide_desc_color === 'grey') {
        $slide_desc_color_cls = 'text-ithena-black';
    }

    $slides_data = get_field('hero_slider_w_cards_slides');
    $slides = [];

    // font size classes
    $title_size_cls = get_field('hero_slider_w_cards_title_fs');
    $desc_size_cls  = get_field('hero_slider_w_cards_desc_fs');

    for ($i = 1; $i <= 4; $i++) {
        $bgimg = $slides_data["hero_slidewcards_{$i}_bgimg"] ?? '';
        if ($bgimg) {
            $slides[] = [
                'bg_image' => esc_url($bgimg),
                'title' => wp_kses_post($slides_data["hero_slidewcards_{$i}_title"] ?? ''),
                'description' => wp_kses_post($slides_data["hero_slidewcards_{$i}_description"] ?? ''),
            ];
        }
    }

    ob_start();
    ?>

    <style>
        .hero-overlay-cards{
            position:absolute;
            left:50%;
            bottom:10%;
            transform:translateX(-50%);
            display:flex;
            gap:20px;
            z-index:30;
        }
        .hero-card{
            width:350px;
            padding:30px;
            color:#fff;
            border-radius:8px;
            backdrop-filter:blur(6px);
            cursor:pointer;
            transition:.3s;
            position:relative;
        }
        .hero-card:hover{transform:translateY(-6px)}
        .hero-card h3{font-size:20px;font-weight:700;margin-bottom:10px}
        .hero-card p{font-size:15px;line-height:1.5}
        .hero-card .arrow{
            position: absolute;
            bottom: 15px;
            right: 25px;
            font-size: 25px;
            text-decoration: none;
            color: #fff;
        }
        @media(max-width:1024px){
            .hero-overlay-cards{flex-direction:column;bottom:12%}
        }
    </style>

    <section id="hero_sliderwcards-id" class="hero_sliderwcards relative h-screen overflow-hidden <?= esc_attr($slider_bottom_fade_cls); ?>">

        <div class="sliderwcards-container relative w-full h-full">
            <?php foreach ($slides as $i => $slide): ?>
                <div class="slide absolute inset-0 transition-transform duration-1000 custom-slider-slide 
                    <?= $i === 0 ? 'translate-x-0' : 'translate-x-full'; ?> <?= esc_attr($slider_bottom_fade_cls); ?>"
                    style="background-image:url('<?= $slide['bg_image']; ?>');background-size:cover;background-position:center;">
                    <!-- <div class="absolute inset-0 custom-slider-overlay"></div> -->
                    
                    <div class="relative z-10 h-full flex items-center">
                        <div class="max-w-7xl mx-auto px-6 w-full">
                            <div class="max-w-2xl">
                                <h1 class="font-bold <?= esc_attr($title_size_cls); ?> <?= esc_attr($slide_title_color_cls); ?> mb-6">
                                    <?= wp_kses_post($slide['title']); ?>
                                </h1>
                                <div class="<?= esc_attr($desc_size_cls); ?> <?= esc_attr($slide_desc_color_cls); ?> mb-8">
                                    <?= wp_kses_post($slide['description']); ?>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
            <?php endforeach; ?>
        </div>
        
        <!-- hero-card -->
        <?php $olc_title_size_cls = get_field('olc_title_size_cls');
            $olc_desc_size_cls  = get_field('olc_desc_size_cls');

            $overlay_group = get_field('hero_overlay_cards');

            if (!empty($overlay_group)): ?>
            
            <div class="hero-overlay-cards">
                <?php for ($i = 1; $i <= 3; $i++): 
                    
                    $slide_index = $i - 1;

                    $title = $overlay_group["overlaycard{$i}_title"] ?? '';
                    $desc  = $overlay_group["overlaycard{$i}_desc"] ?? '';
                    $link  = $overlay_group["overlaycard{$i}_link"] ?? '';
                    $color = $overlay_group["overlaycard{$i}_color"] ?? '';

                    if (!$title && !$desc) continue;
                ?>
                    <div class="hero-card"  data-slide="<?= esc_attr($slide_index); ?>" style="background: <?= esc_attr($color); ?>">
                        
                        <?php if ($title): ?>
                            <h3 class="<?= esc_attr($olc_title_size_cls); ?>"><?= esc_html($title); ?></h3>
                        <?php endif; ?>

                        <?php if ($desc): ?>
                            <p class="<?= esc_attr($olc_desc_size_cls); ?>"><?= esc_html($desc); ?></p>
                        <?php endif; ?>

                        <?php if ($link): ?>
                            <a href="<?= esc_url($link); ?>" class="arrow">→</a>
                        <?php else: ?>
                            <span class="arrow">→</span>
                        <?php endif; ?>

                    </div>
                <?php endfor; ?>
            </div>
            <?php endif;     
        ?>

    </section>

    <script id="hero-sliderwcards-script">
        document.addEventListener('DOMContentLoaded', function() {
            const slides = document.querySelectorAll('.slide');
            //const dots = document.querySelectorAll('.dot');
            const sliderContainer = document.querySelector('.sliderwcards-container');
            let currentSlide = 0;
            let slideInterval;
            let touchStartX = 0;
            let touchEndX = 0;

            function showSlide(index) {
                slides.forEach((slide, i) => {
                    if (i === index) slide.style.transform = 'translateX(0)';
                    else if (i < index) slide.style.transform = 'translateX(-100%)';
                    else slide.style.transform = 'translateX(100%)';
                });
                //dots.forEach((dot, i) => dot.style.opacity = i === index ? '1' : '0.5');
                currentSlide = index;
            }

            function nextSlide() { showSlide((currentSlide + 1) % slides.length); }
            function prevSlide() { showSlide((currentSlide - 1 + slides.length) % slides.length); }

            function startSlideshow() { slideInterval = setInterval(nextSlide, 5000); }
            function stopSlideshow() { clearInterval(slideInterval); }

            function handleSwipe() {
                const diff = touchStartX - touchEndX;
                if (Math.abs(diff) > 50) {
                    diff > 0 ? nextSlide() : prevSlide();
                    stopSlideshow(); startSlideshow();
                }
            }

            sliderContainer.addEventListener('touchstart', e => touchStartX = e.changedTouches[0].screenX);
            sliderContainer.addEventListener('touchend', e => { touchEndX = e.changedTouches[0].screenX; handleSwipe(); });
            sliderContainer.addEventListener('mousedown', e => touchStartX = e.screenX);
            sliderContainer.addEventListener('mouseup', e => { touchEndX = e.screenX; handleSwipe(); });

            //dots.forEach((dot, index) => dot.addEventListener('click', () => { showSlide(index); stopSlideshow(); startSlideshow(); }));
            
            const overlayCards = document.querySelectorAll('.hero-card');
            overlayCards.forEach(card => {
                card.addEventListener('click', () => {
                    const slideIndex = parseInt(card.dataset.slide, 10);

                    if (!isNaN(slideIndex) && slides[slideIndex]) {
                        showSlide(slideIndex);
                        stopSlideshow();
                        startSlideshow();
                    }
                });
            });

            startSlideshow();
        });
    </script>

    <?php
    return ob_get_clean();
});

// =========================
// Hero Slider block
// =========================
add_shortcode('hero_slider', function() {
    
    // Check if block is enabled
    if (!get_field('enable_hero_slider')) return;
    
    // 1️⃣ Slider Settings
    $slider_bottom_fade = get_field('hero_slide_bottom_fade');
    $slider_bottom_fade_cls = "product_banner_white";
    if($slider_bottom_fade == 'grey'){
        $slider_bottom_fade_cls = "product_banner_grey";
    }

    $slide_title_color         = get_field('slide_title_color');
    echo "slide_title_color: " . $slide_title_color;
    $slide_title_color_cls = "text-ithena-black";
    if($slide_title_color == 'white'){
        $slide_title_color_cls = "text-ithena-white";
    }

    $slide_desc_color         = get_field('slide_desc_color');
    echo "slide_desc_color: " . $slide_desc_color;
    $slide_desc_color_cls = "text-ithena-black";
    if($slide_desc_color == 'white'){
        $slide_desc_color_cls = "text-ithena-white";
    }

    // 2️⃣ Slides (ACF repeater: group name "hero_slides")
    $slides_data = get_field('hero_slides');

    // font size classes
    $title_size_cls = get_field('hero_slider_title_fs');
    $desc_size_cls  = get_field('hero_slider_desc_fs');

    $slides = [];
    for ($i = 1; $i <= 5; $i++) {

        $bgimg = $slides_data["hero_slide_{$i}_bgimg"];
        $title = $slides_data["hero_slide_{$i}_title"];
        $description = $slides_data["hero_slide_{$i}_description"];
        $button_text = $slides_data["hero_slide_{$i}_button_text"];
        $button_type = $slides_data["hero_slide_{$i}_button_type"];
        $button_link = $slides_data["hero_slide_{$i}_button_link"];
        $button_shortcode = $slides_data["hero_slide_{$i}_form_shortcode"];

        // Only include if at least image exists
        if ($bgimg) {
            $slides[] = [
                'bg_image'    => esc_url($bgimg),
                'title'       => esc_html($title),
                'description' => esc_html($description),
                'button_text' => esc_html($button_text),
                'button_type' => esc_html($button_type),
                'button_link' => esc_html($button_link),
                'button_shortcode' => esc_html($button_shortcode),
            ];
        }
    }

    // 3️⃣ Start Output Buffer
    ob_start();
    ?>

    <!-- Hero Slider -->
    <section id="hero_slider-id" class="hero_slider relative h-screen overflow-hidden <?= esc_attr($slider_bottom_fade_cls); ?>">
        <div class="slider-container relative w-full h-full">
            <?php foreach ($slides as $i => $slide): ?>
                <div class="slide absolute inset-0 transition-transform duration-1000 custom-slider-slide
                    <?= $i === 0 ? 'translate-x-0' : 'translate-x-full'; ?> <?= $slider_bottom_fade_cls ?>"
                    style="background-image: url('<?= $slide['bg_image']; ?>'); background-size: cover; background-position: center;">
                    <div class="absolute inset-0 custom-slider-overlay"></div>
                    <div class="relative z-10 h-full flex items-center">
                        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 w-full">
                            <div class="max-w-2xl">
                                
                                <h1 class="<?= esc_attr($title_size_cls) ?> lg:text-6xl font-bold <?= $slide_title_color_cls ?> mb-6">
                                    <?php  $section_title = $slide['title'];
                                        echo wp_kses_post($section_title);  ?>
                                </h1>
                                <div class="<?= esc_attr($desc_size_cls) ?> sm:text-xl <?= $slide_desc_color_cls ?> mb-8">
                                    <?php $section_description = $slide['description'];
                                        echo wp_kses_post($section_description); ?>
                                </div>
                                
                                <?php if ($slide['button_text']): 
                                    
                                    $button_type  = $slide['button_type'];
                                    $button_link = ""; $button_form_shortcode = "";
                                    $slider_button_class = "inactive_link";

                                    if($button_type == 'redirection'){
                                        $button_link = $slide['button_link'];
                                        $slider_button_class = "active_link";
                                    }
                                    if($button_type == 'popup-form'){
                                        $button_form_shortcode  = $slide['button_shortcode'];
                                        $slider_button_class = "active_link";
                                    }
                                ?>
                                    
                                    <a  <?php if (!empty($button_link)) : ?>
                                            href="<?= $button_link; ?>"
                                        <?php endif; ?>
                                        <?php if (!empty($button_form_shortcode)) : ?>
                                            data-form_shortcode="<?= $button_form_shortcode; ?>"
                                        <?php endif; ?>
                                        class="<?= $slider_button_class; ?> text-xl bg-ithena-blue text-ithena-white p-3 !rounded-button custom-btn">
                                        <?= esc_html($slide['button_text']); ?>
                                    </a>

                                <?php endif; ?>


                            </div>
                        </div>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>

    </section>

    <script id="hero-slider">
        document.addEventListener('DOMContentLoaded', function() {
            const slides = document.querySelectorAll('.slide');
            //const dots = document.querySelectorAll('.dot');
            const sliderContainer = document.querySelector('.slider-container');
            let currentSlide = 0;
            let slideInterval;
            let touchStartX = 0;
            let touchEndX = 0;

            function showSlide(index) {
                slides.forEach((slide, i) => {
                    if (i === index) slide.style.transform = 'translateX(0)';
                    else if (i < index) slide.style.transform = 'translateX(-100%)';
                    else slide.style.transform = 'translateX(100%)';
                });
                //dots.forEach((dot, i) => dot.style.opacity = i === index ? '1' : '0.5');
                currentSlide = index;
            }

            function nextSlide() { showSlide((currentSlide + 1) % slides.length); }
            function prevSlide() { showSlide((currentSlide - 1 + slides.length) % slides.length); }

            function startSlideshow() { slideInterval = setInterval(nextSlide, 5000); }
            function stopSlideshow() { clearInterval(slideInterval); }

            function handleSwipe() {
                const diff = touchStartX - touchEndX;
                if (Math.abs(diff) > 50) {
                    diff > 0 ? nextSlide() : prevSlide();
                    stopSlideshow(); startSlideshow();
                }
            }

            sliderContainer.addEventListener('touchstart', e => touchStartX = e.changedTouches[0].screenX);
            sliderContainer.addEventListener('touchend', e => { touchEndX = e.changedTouches[0].screenX; handleSwipe(); });
            sliderContainer.addEventListener('mousedown', e => touchStartX = e.screenX);
            sliderContainer.addEventListener('mouseup', e => { touchEndX = e.screenX; handleSwipe(); });

            //dots.forEach((dot, index) => dot.addEventListener('click', () => { showSlide(index); stopSlideshow(); startSlideshow(); }));
            startSlideshow();
        });
    </script>

    <?php
    return ob_get_clean();
});

// =========================
// CB - Banner Block
// =========================
add_shortcode('product_banner', function() {
    // Check if block is enabled
    if (!get_field('enable_product_banner')) return;

    $banner_image      = get_field('banner_image');
    // $banner_overlay_color = get_field('banner_overlay_color') ?: '#ffffffe8';
    $banner_bottom_fade = get_field('banner_bottom_fade');
    $banner_bottom_fade_cls = "product_banner_white";
    
    if($banner_bottom_fade == 'white'){
        $banner_bottom_fade_cls = "product_banner_white";
    } 
    if($banner_bottom_fade == 'grey'){
        $banner_bottom_fade_cls = "product_banner_grey";
    }

    $banner_title_text         = get_field('banner_title_text');
    $banner_title_color         = get_field('banner_title_color');
    $banner_title_color_cls = "text-ithena-black";
    if($banner_title_color == 'white'){
        $banner_title_color_cls = "text-ithena-white";
    }

    $banner_subtitle_text      = get_field('banner_subtitle_text');
    $banner_subtitle_text_color      = get_field('banner_subtitle_text_color');
    $banner_subtitle_color_cls = "text-ithena-black";
    if($banner_subtitle_text_color == 'white'){
        $banner_subtitle_color_cls = "text-ithena-white";
    }
    
    $banner_description_text   = get_field('banner_description_text');
    $banner_description_text_color   = get_field('banner_description_text_color');
    $banner_description_color_cls = "text-ithena-black";
    if($banner_description_text_color == 'white'){
        $banner_description_color_cls = "text-ithena-white";
    }
    
    $banner_button_text   = get_field('banner_button_text');
    // $icon_class    = get_field('product_icon_class') ?: 'ri-map-pin-2-line';

    ob_start(); ?>

     <section id="product-banner-id" class="<?= $banner_bottom_fade_cls ?> product_banner relative min-h-screen w-full overflow-hidden"
        <?php if ($banner_image): ?>
            style="background-image:url('<?= esc_url($banner_image['url']); ?>');background-size:cover;background-designation:center;"
        <?php endif; ?>
    >
        <div class="relative z-20 w-full min-h-screen flex items-center">
            <div class="w-full max-w-7xl mx-auto px-6 lg:px-8">
                <div class="flex items-center justify-between">
                    <div class="flex-1">

                        <?php if ($banner_title_text): 
                            $banner_title_fs = get_field('banner_title_fs');    
                        ?>
                            <h1 class="<?= esc_attr($banner_title_fs); ?> lg:text-7xl font-bold mb-4 leading-tight <?= $banner_title_color_cls ?> ">
                                <?= wp_kses_post($banner_title_text); ?>
                            </h1>
                        <?php endif; ?>

                        <?php if ($banner_subtitle_text): 
                            $banner_subtitle_fs = get_field('banner_subtitle_fs'); 
                        ?>
                            <div class="<?= esc_attr($banner_subtitle_fs); ?> font-[600] lg:text-3xl <?= $banner_subtitle_color_cls ?>">
                                <?= wp_kses_post($banner_subtitle_text); ?></div>
                        <?php endif; ?>

                        <?php if ($banner_description_text): 
                            $banner_description_fs = get_field('banner_description_fs');
                        ?>
                            <div class="<?= esc_attr($banner_description_fs); ?> mt-6 max-w-lg <?= $banner_description_color_cls ?>">
                                <?= wp_kses_post($banner_description_text); ?>
                            </div>
                        <?php endif; ?>

                        <?php if (!empty($banner_button_text)) : 
                            $banner_button_link_type   = get_field('banner_button_link_type');
                            $banner_button_link = ""; $banner_button_form_shortcode = "";
                            $banner_button_class = "inactive_link";

                            if($banner_button_link_type == 'redirection'){
                                $banner_button_link   = get_field('banner_button_link');
                                $banner_button_class = "active_link";
                            }
                            if($banner_button_link_type == 'popup-form'){
                                $banner_button_form_shortcode  = get_field('banner_button_form_shortcode');
                                $banner_button_class = "active_link";
                            }
                        ?>
                            <a  <?php if (!empty($banner_button_link)) : ?> href="<?= esc_url($banner_button_link); ?>"
                                <?php endif; ?>
                                <?php if (!empty($banner_button_form_shortcode)) : ?>
                                    data-form_shortcode="<?= $banner_button_form_shortcode; ?>"
                                <?php endif; ?>
                                class="<?= $banner_button_class; ?> custom-btn text-xl bg-ithena-maroon text-ithena-white p-3 !rounded-button inline-block mt-4">
                                <?= wp_kses_post($banner_button_text); ?>
                            </a>
                        <?php endif; ?>

                    </div>
                </div>
            </div>
        </div>
    </section>

    <?php
    return ob_get_clean();
});
// =========================