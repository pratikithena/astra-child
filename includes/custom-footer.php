<?php
    
    // Prevent direct access
    if (!defined('ABSPATH')) {
        exit;
    }

    // Function to output your custom navbar
    function child_theme_custom_footer() {
        ob_start();
        global $post;

?>  

    <style>
        :root {
            --header-height: 80px;
            --primary-color: var(--color-blue);
            --color-speechred: var(--color-speechred);
            --shadow-color: rgba(0, 0, 0, 0.1);
            --transition-speed: 0.3s;
        }

        /* Custom CSS to match design */
        .custom-footer{
            font-size: 11px;
            font-weight: 500;
        }
        .custom-footer .hover-primary:hover {
            color: var(--color-gray, #e7e6e6); /* Bootstrap primary color */
        }

        .custom-footer .col-heading, .custom-footer .col-heading a, .social-media-links a {
            color: var(--color-white, #fff); /* Custom heading color */
        }

        .custom-footer a, .footer-note, .text-grayy{
            color: var(--color-gray, #e7e6e6); /* Custom text color */
        }

        .list-unstyled{
            margin-left:0;
        }
        
        /* Ensure proper spacing on mobile */
        @media (max-width: 767.98px) {
            .custom-footer .row.g-4 > [class^="col-"] {
                margin-bottom: 1.5rem;
            }
        }

        /* Self-contained grid + utilities (Bootstrap values) so the footer renders the same with or without Bootstrap */
        .custom-footer, .custom-footer *, .custom-footer *::before, .custom-footer *::after { box-sizing: border-box; }
        .custom-footer.py-5 { padding-top: 3rem; padding-bottom: 3rem; }
        .custom-footer.bg-ithena-black { background-color: var(--color-black, #000); }
        .custom-footer .text-ithena-white { color: var(--color-white, #fff); }
        .custom-footer .cs-container { width: 100%; margin: 0 auto; padding: 0 12px; }
        .custom-footer .row { display: flex; flex-wrap: wrap; margin: 0 -12px; }
        .custom-footer .row.g-4 { margin-top: -1.5rem; }
        .custom-footer .row > * { flex-shrink: 0; width: 100%; max-width: 100%; padding: 0 12px; }
        .custom-footer .row.g-4 > * { margin-top: 1.5rem; }
        .custom-footer .col-6 { flex: 0 0 auto; width: 50%; }
        .custom-footer .d-flex { display: flex; }
        .custom-footer .d-inline-block { display: inline-block; }
        .custom-footer .flex-column { flex-direction: column; }
        .custom-footer .align-items-center { align-items: center; }
        .custom-footer .justify-content-center { justify-content: center; }
        .custom-footer .justify-content-between { justify-content: space-between; }
        .custom-footer .gap-2 { gap: .5rem; }
        .custom-footer .gap-4 { gap: 1.5rem; }
        .custom-footer .mb-1 { margin-bottom: .25rem; }
        .custom-footer .mb-2 { margin-bottom: .5rem; }
        .custom-footer .mb-3 { margin-bottom: 1rem; }
        .custom-footer .mb-4 { margin-bottom: 1.5rem; }
        .custom-footer .mt-4 { margin-top: 1.5rem; }
        .custom-footer .pt-4 { padding-top: 1.5rem; }
        .custom-footer .list-unstyled { list-style: none; padding-left: 0; }
        .custom-footer .img-fluid { max-width: 100%; height: auto; }
        .custom-footer .rounded-circle { border-radius: 50%; }
        .custom-footer .text-decoration-none { text-decoration: none; }
        .custom-footer .small { font-size: .875em; }
        .custom-footer .border-top { border-top: 1px solid #6c757d; }
        .custom-footer .border-secondary { border-color: #6c757d; }
        .custom-footer .bg-secondary { background-color: #6c757d; }
        .custom-footer .text-white { color: #fff; }
        @media (min-width: 576px) { .custom-footer .cs-container { max-width: 540px; } }
        @media (min-width: 768px) { .custom-footer .cs-container { max-width: 720px; } .custom-footer .col-md-6 { flex: 0 0 auto; width: 50%; } .custom-footer .col-md-4 { flex: 0 0 auto; width: 33.333333%; } .custom-footer .mb-md-0 { margin-bottom: 0; } .custom-footer .flex-md-row { flex-direction: row; } }
        @media (min-width: 992px) { .custom-footer .cs-container { max-width: 960px; } .custom-footer .col-lg-3 { flex: 0 0 auto; width: 25%; } .custom-footer .col-lg-2 { flex: 0 0 auto; width: 16.666667%; } }
        @media (min-width: 1200px) { .custom-footer .cs-container { max-width: 1140px; } }
        @media (min-width: 1400px) { .custom-footer .cs-container { max-width: 1320px; } }

    </style>

    <?php
        $footer_menu_name = 'custom-footer-menu';
        $locations = get_nav_menu_locations();
        $footer_menu = wp_get_nav_menu_object($footer_menu_name);

        if ($footer_menu) {

            $main_menu_id = $footer_menu->term_id;
            $footer_menu_items = wp_get_nav_menu_items($footer_menu->term_id);
            
            // Initialize arrays
            $footer_menu_structure = array();
            $children_verification = array();
            $processed_items = array();
            
            // First pass - find all top-level items
            foreach ($footer_menu_items as $item) {
                if (!$item->menu_item_parent) {
                    $footer_menu_structure[$item->ID] = array(
                        'title' => $item->title,
                        'url' => $item->url,
                        'children' => array(),
                        'node_type' => "top-parent"
                    );
                    $processed_items[$item->ID] = true;
                }
            }
            
            // Second pass - find sub-parents and children
            foreach ($footer_menu_items as $item) {
                if ($item->menu_item_parent && !isset($processed_items[$item->ID])) {
                    $parent_id = $item->menu_item_parent;
                    
                    // If parent exists in our structure
                    if (isset($footer_menu_structure[$parent_id])) {
                        $footer_menu_structure[$parent_id]['children'][$item->ID] = array(
                            'title' => $item->title,
                            'url' => $item->url,
                            'node_type' => "child"
                        );
                        $children_verification[$parent_id][] = $item->ID;
                        $processed_items[$item->ID] = true;
                    }
                }
            }
            
        }
    ?>
        
    <?php $footer_menu_field = get_fields($footer_menu); // ACF fields ?>

    <!-- Footer - currently static but will be dynamic via WP menu -->
    <footer class="bg-ithena-black py-5 custom-footer">
        
        <div class="cs-container">
            <div class="row g-4">
                
                <!-- Logo and Description Column -->
                <div class="col-md-6 col-lg-3">
                    
                    <div class="mb-1">
                        <a href="https://dev-website.ithena.app/" class="d-inline-block" target="_blank">
                            <img src="https://dev-website.ithena.app/wp-content/uploads/2023/03/Ithena-Logo-new.webp" alt="Ithena Logo" 
                            class="img-fluid" style="height: 65px;">
                        </a>
                    </div>
                    
                    <p class="mb-4 footer-note" style="line-height: 1.6;">
                        <?= $footer_menu_field['description_text'] ?>
                    </p>

                    <div class="social-media-links d-flex gap-2">

                        <a href="<?= $footer_menu_field['linkedin_url'] ?>" target="_blank" rel="noopener noreferrer" class="d-flex align-items-center justify-content-center rounded-circle bg-secondary text-white text-decoration-none" style="width: 40px; height: 40px;">
                            <i class="fab fa-linkedin-in text-ithena-white"></i>
                        </a>
                        <a href="<?= $footer_menu_field['x_url'] ?>" target="_blank" rel="noopener noreferrer" class="d-flex align-items-center justify-content-center rounded-circle bg-secondary text-white text-decoration-none" style="width: 40px; height: 40px;">
                            <i class="fa-brands fa-x text-ithena-white"></i>
                        </a>
                        <a href="<?= $footer_menu_field['facebook_url'] ?>" target="_blank" rel="noopener noreferrer" class="d-flex align-items-center justify-content-center rounded-circle bg-secondary text-white text-decoration-none" style="width: 40px; height: 40px;">
                            <i class="fab fa-facebook-f text-ithena-white"></i>
                        </a>
                        <a href="<?= $footer_menu_field['youtube_url'] ?>" target="_blank" rel="noopener noreferrer" class="d-flex align-items-center justify-content-center rounded-circle bg-secondary text-white text-decoration-none" style="width: 40px; height: 40px;">
                            <i class="fab fa-youtube text-ithena-white"></i>
                        </a>

                    </div>

                </div>

                <?php 
                    // Loop through all top-level menu items
                    foreach ($footer_menu_structure as $menu_item): ?>
                     
                    <div class="col-6 col-md-4 col-lg-2">
                        <h5 class="mb-3 col-heading">
                            <a class="text-white text-decoration-none"><?= $menu_item['title'] ?></a>
                        </h5>
                        <?php 
                            if(!empty($menu_item['children'])){
                                echo '<ul class="list-unstyled">';
                                foreach($menu_item['children'] as $child){ 
                                    // Generate class from title
                                    $link_class = strtolower(str_replace(' ', '-', $child['title']));
                                ?>
                                    <li class="mb-2">
                                        <a href="<?= $child['url'] ?>" class="<?= $link_class ?> text-decoration-none hover-primary" target="_blank"><?= $child['title'] ?></a>
                                    </li>
                                <?php }
                                echo '</ul>';
                            } 
                        ?>
                    </div>
                    
                <?php endforeach; ?>
            </div>

            <!-- Copyright Section -->
            <div class="border-top border-secondary mt-4 pt-4 d-flex flex-column flex-md-row justify-content-between align-items-center">
                <p class="small mb-3 mb-md-0 text-grayy">
                    <?= $footer_menu_field['copyright_text'] ?>
                </p>
                <div class="d-flex gap-4">
                    <a href="/privacy-policy/" class=" small text-decoration-none hover-primary" target="_blank">Privacy Policy</a>
                </div>
            </div>
            
        </div>
    
    </footer>
    
<?php

    return ob_get_clean();
}

// Register shortcode
add_shortcode('custom_footer', 'child_theme_custom_footer');