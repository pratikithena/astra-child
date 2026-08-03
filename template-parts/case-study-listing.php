<?php
    /*
    Template Name: Custom Case Study Listing
    */
?>

<head>
    
    <meta charset="<?php bloginfo('charset'); ?>">
    <?php $page_title = get_the_title(); ?>
    <title><?php echo esc_html( $page_title ? $page_title : get_bloginfo( 'name' ) ); ?></title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://cdn.tailwindcss.com/3.4.16"></script>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Pacifico&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/remixicon/4.6.0/remixicon.min.css">

    <script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>

    <!-- Custom Navbar -->
    <?php  
        wp_head();
        // wp_enqueue_script('jquery');
        echo child_theme_custom_headmenu();  
    ?>

    <!-- Bootstrap CDN -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.0/js/bootstrap.bundle.min.js"></script>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-icons/1.10.0/font/bootstrap-icons.min.css" rel="stylesheet">

    <!-- Font Awesome CDN for icons -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    
    <style>
        
        :where([class^="ri-"])::before { content: "\f3c2"; }
        :root{
            --color-black: #000;
            --color-white: #fff;
            --color-blue: #0082c8;
            --color-blue-dark: #005b94;
            --color-gray: #e7e6e6;
            --color-maroon: #c00000;
            --cust-primary: var(--color-blue);
            --cust-secondary: var(--color-blue-dark);
            --cust-gray: var(--color-gray);
        }
        
        .bg-ithena-white { background-color: var(--color-white); } 
        .banner-ht{ height: 560px; }


    /* Refactored & cleaned YMC filter styles */
        /* Utility / general */
        .ymc-smart-filter-container,
        .ymc-smart-filter-container .ymc-pagination,
        .ymc-smart-filter-container .pagination-numeric {
            margin: 0;
            padding: 0;
            list-style: none;
        }

        /* Filter header / "All" button */
        .ymc-smart-filter-container .filter-layout3 .btn-all {
            padding: 10px 40px !important;
            background-color: var(--color-blue) !important;
            color: var(--color-white) !important;
            text-align: center;
            border: var(--color-white);
            border-radius: 20px;
            margin-right: 100% !important;
        }

        /* Dropdown / menu active state */
        .ymc-smart-filter-container .filter-layout3 .dropdown-filter .menu-active {
            border: none !important;
            border-bottom: 2px solid var(--color-white) !important;
            padding: 10px 103px 10px 10px !important;
            width: 100% !important;
            background-color: var(--color-blue) !important;
            color: var(--color-white) !important;
            border-radius: 1rem !important;
            .original-tax-name{
                padding: 0 8px 0 8px !important;
            }
        }

        .ymc-smart-filter-container .filter-layout3 .dropdown-filter .menu-active .arrow {
            border: solid var(--color-white) !important;
            border-width: 0 3px 3px 0 !important;
            padding: 3px;
            transform: translateY(-50%) rotate(45deg);
            transition: .3s;
        }

        .your-default-image-class img{
            border-radius: 20px !important;
        }

        /* Dropdown passive (scrollable list) */
        .ymc-smart-filter-container .filter-layout3 .dropdown-filter .menu-passive {
            width: 250px;
            height: 350px;
            overflow: auto;
            background-color: var(--color-blue) !important;
            .btn-close{
                color: var(--color-white) !important;
                font-size: 18px !important;
                --bs-btn-close-bg: none !important;
                right: 10px;
                top: 10px;
            }
        }

        /* Filter layout spacing */
        .ymc-smart-filter-container .filter-layout3 .filter-entry {
            margin-bottom: 50px !important;
            width: 100% !important;
        }

        /* Pagination */
        .ymc-smart-filter-container .pagination-numeric {
            display: flex;
            justify-content: center;
            align-items: center;
            gap: .5rem;
        }

        .ymc-smart-filter-container .pagination-numeric li a {
            color: var(--color-black) !important;
        }

        .ymc-smart-filter-container .pagination-numeric li .current {
            color: var(--color-white);
            font-weight: 600;
            height: 35px !important;
            padding-top: .5em !important;
            background-color:var(--color-blue);
        }

        /* Posts container & items */
        .ymc-smart-filter-container .container-posts {
            /* layout may be overridden per layout type */
        }

        .ymc-smart-filter-container .container-posts .post-custom-layout .post-item {
            padding: 20px 10px;
            font-size: 14px;
            color: #222;
            border: 1px solid var(--color-gray);
            background: none;
            word-break: break-word;
            margin: 0 20px 50px !important;
            border-radius: 0;
        }

        /* Alternate dark layout used earlier in original file */
        @media (min-width: 1180px) {
            .ymc-smart-filter-container .container-posts .post-layout1 .ymc-post-layout1 {
                position: relative;
                padding: 0 !important;
                border: 0 !important;
                background-color: var(--color-black) !important;
                margin-right: 0;
                margin-bottom: 40px;
            }
        }

        /* Media images */
        .ymc-smart-filter-container .container-posts .post-layout1 .ymc-post-layout1 .media img {
            object-fit: contain !important;
            transition: .3s;
            width: 100%;
            height: auto;
        }

        /* Content headings and truncation */
        h2,
        .entry-content h2 {
            margin: 0 8px 10px 0 !important;
            font-family: 'Noto Sans', sans-serif !important;
            font-weight: 400 !important;
            font-size: 17px !important;
            display: -webkit-box;
            -webkit-box-orient: vertical;
            -webkit-line-clamp: 3;
            overflow: hidden;
        }

        .cs-content{
            margin-bottom: 25px;
        }

        .entry-content p {
            display: -webkit-box;
            -webkit-box-orient: vertical;
            -webkit-line-clamp: 3;
            overflow: hidden;
            font-family: 'Noto Sans', sans-serif;
        }

        /* Specific entry content styles */
        .entry-content p {
            font-size: 14px !important;
            line-height: 1.4;
            margin-bottom: 25px;
            color: var(--color-white) !important;
        }

        /* Title / subtitle sizes */
        .entry-content h3 {
            font-size: 11px !important;
            font-family: 'Noto Sans', sans-serif !important;
        }

        .entry-content h5 {
            font-size: 40px;
            margin-top: 20px;
            margin-bottom: 0;
            font-family: 'Noto Sans', sans-serif;
            font-weight: 200;
        }

        .entry-content h6 {
            font-family: 'Noto Sans', sans-serif !important;
            font-size: 15px;
            font-style: italic !important;
            font-weight: 200 !important;
        }

        /* Hide utility elements */
        .tags,
        .posts-found,
        .ymc-smart-filter-container .container-posts .post-layout1 .ymc-post-layout1 .date,
        .author,
        .date,
        .ymc-smart-filter-container .filter-layout3 .dropdown-filter .menu-passive__item .menu-link .count {
            display: none !important;
        }

        /* Small helpers */
        a.your-button-class {
            background-color: var(--color-blue);
            padding: 10px !important;
            text-decoration: none;
            color: var(--color-white);
            font-size: 13px;
            border-radius: 2px;
            display: inline;
        }

        /* Customers tag */
        .customers {
            border: 1px solid var(--color-blue);
            margin: 5px;
            padding: 5px;
        }

        /* Multiple menu-link font size */
        a.menu-link.multiple {
            font-size: 14px !important;
        }

        /* Remove excessive borders for custom layout items */
        .ymc-smart-filter-container .container-posts .post-custom-layout .post-item {
            border: none !important;
        }

        /* Scrollbar behavior (apply class .scrolling when active) */
        .container-posts.container-post-custom-layout.scrolling {
            scrollbar-width: auto;
        }

        /* Responsive layout adjustments */
        @media (min-width: 1200px) {
            .ymc-smart-filter-container {
                display: flex;
                gap: 2rem;
            }
            #filter-layout3-1 {
                width: 30%;
            }
        }

        h2.cs-title { 
            padding-top: 13px;
        }

        /* Larger screens tweaks */
        @media (min-width: 1440px) {
            .tags { height: 24%; }
            h2.cs-title { 
                height: 30%;
                line-height: 1.25; 
            }
            .entry-content p { height: 18%; }
        }

        /* Desktop (1024–1439) */
        @media (min-width: 1024px) and (max-width: 1439px) {
            h2.cs-title { 
                height: 14% !important; 
            }
            .entry-content p { height: 14% !important; }
        }

        /* Tablet (768–1023) */
        @media (min-width: 768px) and (max-width: 1023px) {
            h2.cs-title { height: 17% !important; }
            .entry-content p { height: 16% !important; }
        }

        /* Small tablets / large phones (480–767) */
        @media (min-width: 480px) and (max-width: 767px) {
            h2.cs-title { height: 18% !important; }
            .entry-content p { height: 14% !important; }
        }

        /* Mobile (≤479) */
        @media (max-width: 479px) {
            h2.cs-title { height: 18% !important; }
            .entry-content p { height: 14% !important; }

            /* Disable sticky / scrolling behaviors on small screens */
            #filter-layout3-1 { position: static; }
            .container-posts.container-post-custom-layout { overflow-y: hidden; }
        }

    </style>
    
    <script>
        tailwind.config = {
            theme: {
                extend: {
                    colors: {
                        primary: '#0082c8',
                        secondary: '#005b94',
                        customGray: '#e7e6e6',
                        customMaroon: '#c00000'
                    },
                    borderRadius: {
                        'none': '0px',
                        'sm': '4px',
                        DEFAULT: '8px',
                        'md': '12px',
                        'lg': '16px',
                        'xl': '20px',
                        '2xl': '24px',
                        '3xl': '32px',
                        'full': '9999px',
                        'button': '8px'
                    }
                }
            }
        };
    </script>

</head>

<body <?php body_class('custom-block-page'); ?>>
    
    <main id="main-content" class="w-full">
        <div class="w-full bg-ithena-white">            
            <?php 
                $banner_image = "http://dev-website.ithena.app/wp-content/uploads/2024/04/use-case-banner-1.jpg"; 
            ?>
            <div class="relative overflow-hidden banner-ht" 
                style="background-image: url('<?php echo esc_url($banner_image); ?>'); background-size: cover; background-position: center;">
                <div class="relative z-10 flex items-center h-full max-w-7xl mx-auto px-6">
                    <div class="w-full">
                        <h1 class="text-5xl font-bold text-white mb-4">Case Studies</h1>
                        <p class="text-xl text-white font-medium">Driving Digital Change with Proven Solutions</p>
                    </div>
                </div>
            </div>

            <div class="max-w-7xl mx-auto px-6 py-12">
                <div class="flex gap-8">
                    <?php echo do_shortcode('[ymc_filter id="52646"]'); ?>
                </div>
            </div>

        </div>
    </main>

    <?php  
        wp_footer(); 
        echo child_theme_custom_footer();  
    ?>

</body>
