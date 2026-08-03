<?php 

    // Prevent direct access
    if (!defined('ABSPATH')) {
        exit;
    }

    // Function to output your custom navbar
    function child_theme_custom_headmenu() {
        
        ob_start();

        $menu_name = 'custom-menu';
        $locations = get_nav_menu_locations();
        $menu = wp_get_nav_menu_object($menu_name);

        if ($menu) {
            $main_menu_id = $menu->term_id;
            $menu_items = wp_get_nav_menu_items($menu->term_id);
            // echo "<pre>"; print_r($menu_items); echo "</pre>";
            // Initialize arrays
            $menu_structure = array();
            $children_verification = array();
            $processed_items = array();
            
            // First pass - find all top-level items
            foreach ($menu_items as $item) {
                if (!$item->menu_item_parent) {
                    $menu_structure[$item->ID] = array(
                        'title' => $item->title, 'url' => $item->url, 'children' => array(), 'node_type' => "top-parent"
                    );
                    $processed_items[$item->ID] = true;
                }
            }
            
            // Second pass - find sub-parents and children
            foreach ($menu_items as $item) {
                if ($item->menu_item_parent && !isset($processed_items[$item->ID])) {
                    $parent_id = $item->menu_item_parent;
                    
                    // If parent exists in our structure
                    if (isset($menu_structure[$parent_id])) {
                        $menu_structure[$parent_id]['children'][$item->ID] = array(
                            'title' => $item->title, 'url' => $item->url, 'children' => array(), 'node_type' => "mid-parent"
                        );
                        $children_verification[$parent_id][] = $item->ID;
                        $processed_items[$item->ID] = true;
                    }
                    // Else check if it's a child of a sub-parent
                    else {
                        foreach ($menu_structure as &$parent) {
                            if (isset($parent['children'][$parent_id])) {
                                $parent['children'][$parent_id]['children'][$item->ID] = array(
                                    'title' => $item->title, 'url' => $item->url, 'node_type' => "last_child"
                                );
                                $children_verification[$parent_id][] = $item->ID;
                                $processed_items[$item->ID] = true;
                                break;
                            }
                        }
                    }
                }
            }
            
        }

?>

    <style>
        :root {
            --text-dark: #000000;
            --color-gray: #e7e6e6;
            --color-white: #ffffff;
            --header-height: 80px;
            --primary-color: #0082c8;
            --color-maroon: #c00000;
            --shadow-color: rgba(0, 0, 0, 0.1);
            --transition-speed: 0.3s;
        }
        
        * { margin: 0; padding: 0; box-sizing: border-box; }

        .ith-logo-class {
            width: auto;
            height: 70px; 
            /* Desktop default */

            /* Tablet (portrait and landscape) */
            @media (max-width: 1024px) {
                height: 60px;
            }

            /* Mobile (small screens) */
            @media (max-width: 768px) {
                height: 50px;
            }

            /* Extra small (very compact devices) */
            @media (max-width: 480px) {
                height: 40px;
            }
        }

        #custom-ithena-header {
            &.custom-header {
                position: fixed;
                top: 0;
                left: 0;
                right: 0;
                height: var(--header-height);
                background: var(--color-white);
                backdrop-filter: blur(10px);
                border-bottom: 1px solid rgba(226, 232, 240, 0.8);
                z-index: 1000;
                transition: all var(--transition-speed) ease;

                &.scrolled {
                    background: var(--color-white);
                    /* box-shadow: 0 2px 20px #000000; */
                }
            }

            .header-container {
                /* max-width: 1330px; */
                margin: 0 auto;
                padding: 0 20px;
                height: 100%;
                display: flex;
                align-items: center;
                justify-content: space-between;
            }

            .nav-menu {
                gap: 10px;
                list-style: none;
                margin-right: 10px;
                margin-left: auto;
                display: flex;
                justify-content: flex-end;
                align-items: center;
            }

            .nav-item {
                position: relative;
            }

            .nav-link {
                text-decoration: none;
                color: var(--text-dark);
                font-weight: 400;
                font-size: 13px;
                padding: 10px 15px;
                border-radius: 8px;
                line-height: 0.7px;
                position: relative;
                overflow: hidden;
                display: flex;
                align-items: center;
                gap: 5px;

                &:hover {
                    color: var(--primary-color);
                }

                &::after {
                    content: '';
                    font-family: 'Font Awesome 6 Free';
                    font-weight: 900;
                    margin-left: 5px;
                    transition: transform var(--transition-speed) ease;
                }
            }

            .nav-item.has-dropdown {
                .nav-link::after {
                    content: '\f107';
                }

                &:hover .nav-link::after {
                    transform: rotate(180deg);
                }
            }

            .mega-dropdown {
                position: fixed;
                top: var(--header-height);
                left: 0;
                right: 0;
                width: 100vw;
                background: var(--color-white);
                backdrop-filter: blur(10px);
                opacity: 0;
                visibility: hidden;
                transform: translateY(-10px);
                transition: all var(--transition-speed) ease;
                z-index: 999;

                .nav-item:hover & {
                    opacity: 1;
                    visibility: visible;
                    transform: translateY(0);
                }
            }

            .mega-dropdown-content {
                max-width: 1200px;
                margin: 0 auto;
                padding: 30px 20px;
            }

            .dropdown-grid {
                display: grid;
                grid-template-columns: repeat(4, 1fr);
                gap: 40px;
                max-width: 100%;
            }

            .dropdown-column {
                display: flex;
                flex-direction: column;
            }

            .column-title {
                font-weight: 500;
                color: var(--primary-color);
                font-size: 16px;
                margin-bottom: 15px;
                padding-bottom: 8px;
                border-bottom: 1px solid var(--color-maroon);
            }

            .dropdown-item {
                display: block;
                padding: 10px;
                color: var(--text-dark);
                text-decoration: none;
                font-size: 14px;
                transition: all 0.2s ease;
                cursor: pointer;
                border-radius: 8px;
                border-left: 3px solid transparent;

                &:hover {
                    color: var(--primary-color);
                    text-decoration: none;
                }
            }

            .mobile-menu-toggle {
                display: none;
                flex-direction: column;
                cursor: pointer;
                padding: 5px;
                border-radius: 4px;
                transition: all var(--transition-speed) ease;

                &:hover {
                    background: rgba(59, 130, 246, 0.1);
                }

                span {
                    width: 25px;
                    height: 3px;
                    background: var(--text-dark);
                    margin: 3px 0;
                    transition: var(--transition-speed);
                    border-radius: 2px;
                }

                &.active {
                    span {
                        &:nth-child(1) {
                            transform: rotate(-45deg) translate(-5px, 6px);
                        }

                        &:nth-child(2) {
                            opacity: 0;
                        }

                        &:nth-child(3) {
                            transform: rotate(45deg) translate(-5px, -6px);
                        }
                    }
                }
            }

            @media (max-width: 768px) {
                .nav-menu {
                    position: fixed;
                    top: var(--header-height);
                    left: -100%;
                    width: 100%;
                    height: 120vh;
                    background: var(--color-white);
                    backdrop-filter: blur(10px);
                    flex-direction: column;
                    justify-content: flex-start;
                    align-items: stretch;
                    padding: 20px 0;
                    gap: 0;
                    transition: left var(--transition-speed) ease;
                    overflow-y: auto;

                    &.active {
                        left: 0;
                        padding: 40px 75px;
                    }
                }

                .nav-item {
                    width: 100%;

                    &.active {
                        .nav-link::after {
                            transform: rotate(180deg);
                        }

                        .mega-dropdown {
                            max-height: 500px;
                        }
                    }
                }

                .nav-link {
                    font-size: 16px;
                    padding: 25px 20px;
                    justify-content: space-between;
                    border-radius: 0;
                }

                .mega-dropdown {
                    position: static;
                    width: 100%;
                    transform: none;
                    opacity: 1;
                    visibility: visible;
                    background: var(--color-white);
                    border: none;
                    box-shadow: inset 0 2px 10px rgba(0, 0, 0, 0.05);
                    max-height: 0;
                    overflow: hidden;
                    transition: max-height var(--transition-speed) ease;
                }

                .mega-dropdown-content {
                    padding: 15px !important;
                }

                .dropdown-grid {
                    grid-template-columns: 1fr;
                    gap: 15px;
                }

                .dropdown-column {
                    gap: 5px;
                }

                .column-title {
                    font-size: 12px;
                    margin-bottom: 0;
                    padding-bottom: 5px;
                    border-bottom: 1px solid var(--color-maroon);
                }

                .dropdown-item {
                    padding: 2px 0;
                    font-size: 12px;
                }

                .mobile-menu-toggle {
                    display: flex;
                }

                .nav-menu:not(.active) .mega-dropdown {
                    display: none;
                }
            }

            @media (max-width: 1200px) {
                .nav-menu {
                    gap: 0;
                }

                .nav-link {
                    gap: 0;
                }

                .mega-dropdown-content {
                    max-width: 95%;
                    padding: 20px;
                }
            }

            @media (max-width: 992px) {
                .dropdown-grid {
                    grid-template-columns: 1fr;
                    gap: 15px;
                }
            }
        }

        /* =====================================================
        SPECIAL LAYOUT FOR 'Resources' & 'About Us'
        ===================================================== */
        .dropdown-two-column {
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 32px;
            padding: 20px;
            background: var(--color-white);
        }

        .dropdown-lhs ul.special-menu-list {
            list-style: none;
            padding: 0;
            margin: 0;
        }

        .dropdown-lhs ul.special-menu-list li {
            margin-bottom: 10px;
        }

        .dropdown-lhs ul.special-menu-list a {
            color: var(--text-dark);
            text-decoration: none;
            font-size: 14px;
            padding-left: 10px;
        }

        .dropdown-lhs ul.special-menu-list a:hover { color: var(--primary-color); }

        /* RHS section */
        .dropdown-rhs {
            display: flex;
            align-items: flex-start;
            justify-content: center;
            flex-direction: column;
            border-left: 1px solid #eee;
            padding-left: 30px;
        }

        .dropdown-rhs .rhs-text { max-width: 400px; }

        .dropdown-rhs p {
            color: var(--text-dark);
            margin-bottom: 10px;
            font-size: 22px;
        }

        .dropdown-rhs ul.rhs-links {
            list-style: none;
            margin: 0;
            padding: 0;
        }

        .dropdown-rhs ul.rhs-links li {
            margin-bottom: 8px;
        }

        .dropdown-rhs ul.rhs-links i {
            margin-right: 6px;
            color: var(--primary-color);
        }

        .dropdown-rhs ul.rhs-links a {
            text-decoration: none;
            color: var(--text-dark);
            font-size: 14px;
        }

        .dropdown-rhs ul.rhs-links a:hover {
            color: var(--primary-color);
        }

        /* Mobile responsive - hide RHS */
        @media (max-width: 768px) {
            .dropdown-two-column {
                grid-template-columns: 1fr;
            }

            .dropdown-rhs {
                display: none;
            }
        }

    </style>

    <!-- Header -->
    <header class="custom-header" id="custom-ithena-header">
        
        <div class="header-container">
            
            <a href="<?= site_url() ?>" target="_blank">
                <img src="https://ithena.ai/wp-content/uploads/2023/03/Ithena-Logo.png" alt="ithena" class="ith-logo-class" />
            </a>

            <?php if(!empty($menu_structure)): ?>

                <nav class="nav-menu custom-headmenu" id="navMenu">

                    <?php 
                        // echo "<pre>";
                        // Loop through all top-level menu items
                        foreach ($menu_structure as $menu_item) {

                            $lower = strtolower($menu_item['title']); // lowercase title for comparison

                            // CASE 1: Simple link (no children)
                            if (count($menu_item['children']) == 0 && $menu_item['node_type'] == 'top-parent') { ?>
                                
                                <li class="nav-item">
                                    <a href="<?= esc_url($menu_item['url']); ?>" class="nav-link" target="_blank">
                                        <?= esc_html($menu_item['title']); ?>
                                    </a>
                                </li>

                            <?php 
                            // CASE 2: Menu with children - handle differently for specific menus
                            } elseif (count($menu_item['children']) >= 1 && $menu_item['node_type'] == 'top-parent') { ?>

                                <li class="nav-item has-dropdown" data-menu="<?= esc_attr($menu_item['title']); ?>">

                                    <?php 
                                        // Determine if it's Resources or About Us
                                        $is_special_menu = in_array($lower, ['resources', 'about us']);

                                        // For "Solutions", "Services", "resources" => no direct link
                                        if (in_array($lower, ['solutions', 'services', 'resources'])): ?>
                                            <a class="nav-link" child_cnt="<?= count($menu_item['children']); ?>"> <?= esc_html($menu_item['title']); ?> </a>
                                        <?php 
                                        else: ?>
                                            <a href="<?= esc_url($menu_item['url']); ?>" class="nav-link" child_cnt="<?= count($menu_item['children']); ?>" target="_blank"> <?= esc_html($menu_item['title']); ?> </a>
                                        <?php endif; 
                                    ?>

                                    <div class="mega-dropdown">
                                        <div class="mega-dropdown-content">

                                            <?php if ($is_special_menu): ?>
                                                <!-- =====================================================
                                                    SPECIAL LAYOUT for Resources / About Us
                                                    ===================================================== -->
                                                <div class="dropdown-two-column">
                                                    <!-- LHS: Menu List -->
                                                    <div class="dropdown-lhs">
                                                        <ul class="special-menu-list">
                                                            <?php foreach ($menu_item['children'] as $child): ?>
                                                                <li>
                                                                    <i class="fa fa-angle-double-right text-ithena-blue"></i>
                                                                    <a href="<?= esc_url($child['url']); ?>" target="_blank"> <?= esc_html($child['title']); ?> </a>
                                                                </li>
                                                            <?php endforeach; ?>
                                                        </ul>
                                                    </div>

                                                    <!-- RHS: Static Info Block -->
                                                    <div class="dropdown-rhs">
                                                        <div class="rhs-text">
                                                            <p>
                                                                <?php
                                                                    // Determine text based on menu type
                                                                    $all_field = get_fields($menu);
                                                                    $rhs_text = "Get to know ITHENA's culture."; // default

                                                                    if ($lower === 'resources') {
                                                                        if (!empty($all_field)) {
                                                                            $rhs_text = $all_field['resource_section_text'];
                                                                        }
                                                                    } elseif ($lower === 'about us') {
                                                                        if (!empty($all_field)) {
                                                                            $rhs_text = $all_field['about_us_section_text'];
                                                                        }
                                                                    }
                                                                ?>
                                                                <strong><?= wp_kses_post($rhs_text); ?></strong>
                                                            </p>
                                                        </div>
                                                    </div>

                                                </div>

                                            <?php else: ?>
                                                <!-- =====================================================
                                                    DEFAULT LAYOUT for all other menus
                                                    ===================================================== -->
                                                <div class="dropdown-grid">
                                                    <?php 
                                                        $children_nodes = $menu_item['children'];
                                                        if (count($children_nodes) >= 1):
                                                            foreach ($children_nodes as $children_node): ?>
                                                                <div class="dropdown-column">
                                                                    <div class="column-title" child_cnt="<?= count($children_node['children']); ?>"><?= esc_html($children_node['title']); ?></div>
                                                                    <?php if (count($children_node['children']) >= 1): ?>
                                                                        <?php foreach ($children_node['children'] as $last_child_node): ?>
                                                                            <a href="<?= esc_url($last_child_node['url']); ?>" class="dropdown-item" target="_blank"> <?= esc_html($last_child_node['title']); ?> </a>
                                                                        <?php endforeach; ?>
                                                                    <?php endif; ?>
                                                                </div>
                                                            <?php endforeach;
                                                        endif;
                                                    ?>
                                                </div>
                                            <?php endif; ?>

                                        </div>
                                    </div>

                                </li>
                            <?php }
                        }
                        // echo "</pre>";
                    ?>

                </nav>

                <div style="display: flex; align-items: center;">
                    <div class="mobile-menu-toggle" id="mobileMenuToggle">
                        <span></span>
                        <span></span>
                        <span></span>
                    </div>
                </div>
            
            <?php endif; ?>
            
        </div>

    </header>

    <script>
        
        // Header scroll effect
        window.addEventListener('scroll', function() {
            const header = document.getElementById('custom-ithena-header');
            if (window.scrollY > 50) {
                header.classList.add('scrolled');
            } else {
                header.classList.remove('scrolled');
            }
        });

        // Mobile menu toggle
        document.getElementById('mobileMenuToggle').addEventListener('click', function() {
            this.classList.toggle('active');
            document.getElementById('navMenu').classList.toggle('active');
            
            // Close all open dropdowns when closing mobile menu
            if (!document.getElementById('navMenu').classList.contains('active')) {
                document.querySelectorAll('.nav-item.has-dropdown').forEach(item => {
                    item.classList.remove('active');
                });
            }
        });

        // Mobile dropdown toggle functionality
        function initMobileDropdowns() {
            const dropdownItems = document.querySelectorAll('.nav-item.has-dropdown');
            
            dropdownItems.forEach(item => {
                const link = item.querySelector('.nav-link');
                
                link.addEventListener('click', function(e) {
                    // Only prevent default and toggle on mobile
                    if (window.innerWidth <= 768) {
                        e.preventDefault();
                        
                        // Toggle current item
                        item.classList.toggle('active');
                        
                        // Close other dropdowns
                        dropdownItems.forEach(otherItem => {
                            if (otherItem !== item) {
                                otherItem.classList.remove('active');
                            }
                        });
                    }
                });
            });
        }

        // Initialize mobile dropdowns
        initMobileDropdowns();

        // Re-initialize on window resize
        window.addEventListener('resize', function() {
            if (window.innerWidth > 768) {
                // Close mobile menu and dropdowns on desktop
                document.getElementById('mobileMenuToggle').classList.remove('active');
                document.getElementById('navMenu').classList.remove('active');
                document.querySelectorAll('.nav-item.has-dropdown').forEach(item => {
                    item.classList.remove('active');
                });
            }
        });

        // Close mobile menu when clicking on a regular nav link (without dropdown)
        document.querySelectorAll('.nav-item:not(.has-dropdown) .nav-link').forEach(link => {
            link.addEventListener('click', function() {
                document.getElementById('mobileMenuToggle').classList.remove('active');
                document.getElementById('navMenu').classList.remove('active');
            });
        });

        // Close mobile menu when clicking on dropdown items
        document.querySelectorAll('.dropdown-item').forEach(item => {
            item.addEventListener('click', function() {
                document.getElementById('mobileMenuToggle').classList.remove('active');
                document.getElementById('navMenu').classList.remove('active');
                document.querySelectorAll('.nav-item.has-dropdown').forEach(navItem => {
                    navItem.classList.remove('active');
                });
            });
        });

    </script>

    <?php
    return ob_get_clean();
}

// Register shortcode
add_shortcode('custom_headmenu', 'child_theme_custom_headmenu');