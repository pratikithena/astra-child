<?php
if (!defined('ABSPATH')) exit;

function child_theme_custom_headmenu() {

    ob_start();

    $menu = wp_get_nav_menu_object('custom-menu');
    if (!$menu) return '';

    $menu_items = wp_get_nav_menu_items($menu->term_id);
    if (!$menu_items) return '';

    /* ========= BUILD TREE ========= */

    $refs = [];
    $tree = [];

    foreach ($menu_items as $item) {
        $item->children = [];
        $refs[$item->ID] = $item;
    }

    foreach ($menu_items as $item) {
        if ($item->menu_item_parent == 0) {
            $tree[$item->ID] = $item;
        } elseif (isset($refs[$item->menu_item_parent])) {
            $refs[$item->menu_item_parent]->children[$item->ID] = $item;
        }
    }
?>

<style name="custom-headmenu-styles">
    :root {
        --ith-header-height: 80px;
        --ith-transition: .3s ease;
    }

    header.dark-mode{
        --color-black: #ffffff; /* light text */
        --color-white: #000000; /* dark bg */
        --text-ithena-white: #000000;
        --text-ithena-black: #ffffff;
    }

    /* HEADER */
    #ith-header-wrapper {
        position: fixed;
        top: 0;
        left: 0;
        right: 0;
        height: var(--ith-header-height);
        background: var(--color-white);
        /* border-bottom: 1px solid #eee; */
        z-index: 9999;
    }
    
    #ith-header-wrapper .ith-header-inner {
        display: flex;
        align-items: center;
        justify-content: space-between;
        height: 100%;
        padding: 0 20px;
    }

    .ith-logo-img { height: 70px; }

    /* NAVIGATION */
    .ith-nav-container {
        display: flex;
        list-style: none;
        margin-left: auto;
        gap: 10px;
    }

    .ith-nav-node { position: relative; }

    .ith-nav-link {
        text-decoration: none;
        font-size: 14px;
        color: var(--color-black);
        padding: 10px 15px;
        display: flex;
        align-items: center;
        gap: 6px;
    }

    .ith-nav-link:hover { color: var(--color-blue); font-weight: 600; }

    .ith-nav-node.ith-has-mega > .ith-nav-link::after {
        content: "\f107";
        font-family: "Font Awesome 6 Free";
        font-weight: 900;
    }

    /* MEGA MENU */
    .ith-mega-panel {
        position: fixed;
        left: 0;
        right: 0;
        top: var(--ith-header-height);
        background: var(--color-white);
        opacity: 0;
        visibility: hidden;
        transform: translateY(-10px);
        transition: var(--ith-transition);
    }

    .ith-nav-node:hover > .ith-mega-panel {
        opacity: 1;
        visibility: visible;
        transform: translateY(0);
    }

    .ith-mega-inner {
        max-width: 1200px;
        margin: auto;
        padding: 30px;
    }

    .ith-mega-grid {
        display: grid;
        grid-template-columns: repeat(4,1fr);
        gap: 30px;
    }

    .ith-mega-column-title {
        font-weight: 600;
        color: var(--color-blue);
        padding-bottom: 10px;
        margin-bottom: 10px;
        border-bottom: 1px solid var(--color-maroon);
    }

    .ith-mega-link {
        display: block;
        padding: 6px 0;
        text-decoration: none;
        color: var(--color-black);
        cursor: pointer;
    }

    .ith-mega-link:hover { color: var(--color-blue); }

    /* LEVEL 4 */
    .ith-has-sub > .ith-sub-toggle::after {
        content: "\f105";
        font-family: "Font Awesome 6 Free";
        font-weight: 900;
        margin-left: 6px;
    }
    .ith-sub-toggle{ color: var(--color-maroon); font-weight: 600;}
    .ith-sub-panel { display: none; padding-left: 15px; margin-top: 6px;}
    .ith-sub-link {
        display: block;
        padding: 4px 0;
        font-size: 16px;
        text-decoration: none;
        color: var(--color-black);
    }

    .ith-sub-link:hover { color: var(--color-blue); }

    @media(min-width:769px){
        .ith-has-sub:hover > .ith-sub-panel { display: block; }
    }

    /* SPECIAL LAYOUT */
    .ith-special-layout { display: grid; grid-template-columns: 1fr 1fr; gap: 30px; }
    .ith-special-right { color: var(--color-black); border-left: 1px solid var(--color-black); padding-left: 30px; }

    /* MOBILE */
    .ith-mobile-toggle { display: none; flex-direction: column; cursor: pointer; }
    .ith-mobile-toggle span { height: 3px; width: 25px; background: var(--color-black); margin: 4px 0;}

    @media(max-width:768px){

        button#themeToggle { margin-left: 20%; }
        .ith-mobile-toggle { display: flex; }
        .ith-nav-container {
            position: fixed;
            top: var(--ith-header-height);
            left: -100%;
            width: 100%;
            height: 100vh;
            background: var(--color-white);
            flex-direction: column;
            padding: 30px;
            transition: var(--ith-transition);
        }
        .ith-nav-container.ith-open { left: 0; }
        .ith-mega-panel {
            position: static;
            opacity: 1;
            visibility: visible;
            transform: none;
            display: none;
        }
        .ith-mega-grid, .ith-special-layout { grid-template-columns: 1fr; }
        .ith-special-right { display:none; }

        .ith-nav-node.ith-open > .ith-mega-panel, 
        .ith-has-sub.ith-open > .ith-sub-panel { display: block; }
    }
</style>

<header id="ith-header-wrapper">
    <div class="ith-header-inner">
        <a href="<?= esc_url(home_url()); ?>">
            <img src="https://ithena.ai/wp-content/uploads/2023/03/Ithena-Logo.png" class="ith-logo-img" alt="ithena">
        </a>
        
        <nav class="ith-nav-container" id="ithNav">
            <?php 
            foreach ($tree as $parent):
                $has_children = !empty($parent->children);
                $lower = strtolower($parent->title);
            ?>

            <li class="ith-nav-node <?= $has_children ? 'ith-has-mega' : ''; ?>">
                <?php if (!$has_children): ?>
                    <a href="<?= esc_url($parent->url); ?>" class="ith-nav-link">
                        <?= esc_html($parent->title); ?>
                    </a>
                <?php else: ?>
                    <a class="ith-nav-link"><?= esc_html($parent->title); ?></a>
                    <div class="ith-mega-panel">
                        <div class="ith-mega-inner">

                            <?php if (in_array($lower, ['resources','about us'])):
                                $acf = get_fields('nav_menu_' . $menu->term_id);
                                $rhs_text = $lower == 'resources'
                                    ? ($acf['resource_section_text'] ?? '')
                                    : ($acf['about_us_section_text'] ?? '');
                            ?>
                                <div class="ith-special-layout">
                                    <div>
                                        <?php foreach ($parent->children as $child): ?>
                                            <a href="<?= esc_url($child->url); ?>" class="ith-mega-link">
                                                <?= esc_html($child->title); ?>
                                            </a>
                                        <?php endforeach; ?>
                                    </div>
                                    <div class="ith-special-right">
                                        <strong><?= esc_html($rhs_text); ?></strong>
                                    </div>
                                </div>

                            <?php else: ?>

                                <div class="ith-mega-grid">
                                    <?php foreach ($parent->children as $child): ?>
                                    <div>
                                        <div class="ith-mega-column-title"><?= esc_html($child->title); ?></div>

                                            <?php if (!empty($child->children)):
                                                foreach ($child->children as $sub):
                                                    $has_sub = !empty($sub->children);
                                                    ?>
                                                    <?php if (!$has_sub): ?>
                                                    <a href="<?= esc_url($sub->url); ?>" class="ith-mega-link"> <?= esc_html($sub->title); ?> </a>
                                                    <?php else: ?>

                                                    <div class="ith-mega-link ith-has-sub">
                                                        <span class="ith-sub-toggle"><?= esc_html($sub->title); ?></span>
                                                        <div class="ith-sub-panel">
                                                            <?php foreach ($sub->children as $level4): ?>
                                                                <a href="<?= esc_url($level4->url); ?>" class="ith-sub-link">
                                                                    <?= esc_html($level4->title); ?>
                                                                </a>
                                                            <?php endforeach; ?>
                                                        </div>
                                                    </div>

                                                <?php endif; ?>

                                                <?php endforeach; 
                                            
                                            endif; ?>

                                        </div>
                                    <?php endforeach; ?>
                                </div>
                            <?php endif; ?>

                        </div>
                    </div>

                <?php endif; ?>

            </li>
            
            <?php 
            endforeach; ?>
        </nav>

        <button id="themeToggle" class="custom-btn px-3 py-2"> 🌙 </button>

        <div class="ith-mobile-toggle" id="ithMobileToggle">
            <span></span><span></span><span></span>
        </div>

    </div>
</header>

<script>
    document.getElementById('ithMobileToggle').addEventListener('click',function(){
        this.classList.toggle('ith-open');
        document.getElementById('ithNav').classList.toggle('ith-open');
    });

    document.querySelectorAll('.ith-nav-node.ith-has-mega > .ith-nav-link')
    .forEach(function(link){
        link.addEventListener('click',function(e){
            if(window.innerWidth <= 768){
                e.preventDefault();
                this.parentElement.classList.toggle('ith-open');
            }
        });
    });

    document.querySelectorAll('.ith-has-sub > .ith-sub-toggle')
    .forEach(function(toggle){
        toggle.addEventListener('click', function(e){
            if(window.innerWidth <= 768){
                e.preventDefault();
                this.parentElement.classList.toggle('ith-open');
            }
        });
    });
</script>


<?php
return ob_get_clean();
}

add_shortcode('custom_headmenu','child_theme_custom_headmenu');