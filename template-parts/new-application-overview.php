<?php
/**
 * Template Name: New App Overview page
 * Description: A custom page template for displaying application overview with a video background and other applications.
 */
    session_start();
    $sso_user = get_current_sso_user();
    $source = '';
    
    if ($sso_user) {
        $source = $sso_user['data']['source'];
    }

    // Get slug from query string
    $slug = isset($_GET['slug']) ? sanitize_title($_GET['slug']) : '';
    if(empty($slug)) {
        $slug = $source ? $source : '';
    }

?>

    <head>
        
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Application Overview</title>

        <style>
            :root {
                --primary-color: #0082C8;
                --primary-dark: #006BA6;
                --light-grey: #f8f9fa;
                --text-dark: #2c3e50;
                --text-light: #6c757d;
                --border-light: #e9ecef;
                --bg-primary: #ffffff;
                --bg-secondary: #f8f9fa;
                --shadow-color: rgba(0, 130, 200, 0.1);
                --card-bg: #ffffff;
                --navbar-bg: #ffffff;
            }

            [data-theme="dark"] {
                --light-grey: #1a1a1a;
                --text-dark: #e0e6ed;
                --text-light: #a8b2c7;
                --border-light: #2d3748;
                --bg-primary: #0f1419;
                --bg-secondary: #1a1a1a;
                --shadow-color: rgba(0, 130, 200, 0.2);
                --card-bg: #1e293b;
                --navbar-bg: #1a1a1a;
            }

            * {
                margin: 0;
                padding: 0;
                box-sizing: border-box;
            }

            body {
                /* font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif; */
                line-height: 1.6;
                color: var(--text-dark);
                background: var(--bg-primary);
                transition: background-color 0.3s ease, color 0.3s ease;
            }

            /* WordPress compatibility classes */
            .wp-block-group,
            .wp-site-blocks,
            .wp-block-post-content {
                all: unset;
            }

            /* Theme Toggle Button */
            .theme-toggle {
                position: relative;
                width: 50px;
                height: 28px;
                background: var(--border-light);
                border-radius: 14px;
                cursor: pointer;
                transition: all 0.3s ease;
                margin-left: 1rem;
                margin-right: 1rem;
                border: 2px solid var(--border-light);
            }

            .theme-toggle::before {
                content: '';
                position: absolute;
                top: 2px;
                left: 2px;
                width: 20px;
                height: 20px;
                background: var(--primary-color);
                border-radius: 50%;
                transition: all 0.3s ease;
                box-shadow: 0 2px 4px rgba(0, 0, 0, 0.2);
            }

            [data-theme="dark"] .theme-toggle::before {
                transform: translateX(20px);
                background: #fbbf24;
            }

            .theme-toggle-icon {
                position: absolute;
                top: 50%;
                transform: translateY(-50%);
                font-size: 0.8rem;
                transition: all 0.3s ease;
            }

            .theme-toggle .sun-icon {
                left: 6px;
                color: #fbbf24;
                opacity: 0;
            }

            .theme-toggle .moon-icon {
                right: 6px;
                color: #6366f1;
                opacity: 1;
            }

            [data-theme="dark"] .theme-toggle .sun-icon {
                opacity: 1;
            }

            [data-theme="dark"] .theme-toggle .moon-icon {
                opacity: 0;
            }

            /* Banner Section */
            .banner-section {
                background-image: url('https://dev.ithena.io/wp-content/uploads/2025/08/iSERV-2.jpg');
                background-size: cover;
                background-position: center;
                background-attachment: fixed;
                min-height: 70vh;
                padding: 2rem 0;
                position: relative;
                overflow: hidden;
                display: flex;
                align-items: center;
            }

            /* [data-theme="dark"] .banner-section::before {
                background: 
                    radial-gradient(circle at 20% 30%, rgba(0, 130, 200, 0.15) 0%, transparent 50%),
                    radial-gradient(circle at 80% 70%, rgba(0, 130, 200, 0.12) 0%, transparent 50%),
                    radial-gradient(circle at 60% 20%, rgba(0, 0, 0, 0.4) 0%, transparent 40%);
            } */

            .banner-content {
                position: relative;
                z-index: 2;
            }

            .banner-title {
                font-size: 3.5rem;
                font-weight: 700;
                color: var(--bg-primary);
                margin-bottom: 1.5rem;
                line-height: 1.2;
            }

            .banner-subtitle {
                font-size: 18px;
                color: var(--light-grey);
                font-weight: 400;
                margin-bottom: 2rem;
                line-height: 1.5;
            }

            .video-container {
                background: var(--card-bg);
                border-radius: 20px;
                padding: 3rem 2rem;
                border: 2px solid var(--border-light);
                position: relative;
                height: 350px;
                display: flex;
                align-items: center;
                justify-content: center;
                color: var(--text-light);
                font-size: 1.2rem;
                font-weight: 500;
                cursor: pointer;
                transition: all 0.3s ease;
                box-shadow: 0 10px 30px var(--shadow-color);
                backdrop-filter: blur(10px);
                z-index: 2;
            }

            .video-container:hover {
                transform: translateY(-5px);
                box-shadow: 0 20px 40px rgba(0, 130, 200, 0.15);
                border-color: var(--primary-color);
            }

            .video-container::before {
                content: '';
                position: absolute;
                width: 80px;
                height: 80px;
                background: var(--primary-color);
                border-radius: 50%;
                display: flex;
                align-items: center;
                justify-content: center;
                color: white;
                font-size: 2rem;
                margin-bottom: 1rem;
            }

            /* .video-container::after {
                content: '▶';
                position: absolute;
                color: white;
                font-size: 1.8rem;
                margin: 10px 10px 25px 15px;
            } */

            /* Applications Section */
            .applications-section {
                padding: 2rem 0;
                background: var(--bg-primary);
            }

            .other-apps-section{
                padding: 2rem 0;
            }

            .section-title {
                font-size: 2.5rem;
                font-weight: 600;
                color: var(--text-dark);
                margin-bottom: 3rem;
                text-align: center;
                position: relative;
            }

            .section-title::after {
                content: '';
                position: absolute;
                bottom: -10px;
                left: 50%;
                transform: translateX(-50%);
                width: 60px;
                height: 3px;
                background: var(--primary-color);
                border-radius: 2px;
            }

            .app-card,
            .feature-card {
                background: var(--card-bg);
                border: 1px solid var(--border-light);
                border-radius: 15px;
                padding: 2rem;
                height: 100%;
                transition: all 0.4s cubic-bezier(0.25, 0.8, 0.25, 1);
                position: relative;
                overflow: hidden;
                transform: translateY(0);
                box-shadow: 0 4px 15px var(--shadow-color);
            }

            .app-card::before,
            .feature-card::before {
                content: '';
                position: absolute;
                top: 0;
                left: 0;
                right: 0;
                height: 4px;
                background: linear-gradient(90deg, var(--primary-color), var(--primary-dark));
                transform: translateX(-100%);
                transition: transform 0.4s ease;
            }

            .app-card:hover::before,
            .feature-card:hover::before {
                transform: translateX(0);
            }

            .app-card:hover,
            .feature-card:hover {
                transform: translateY(-12px) scale(1.02);
                box-shadow: 0 25px 50px rgba(0, 130, 200, 0.2);
                /* background-color: var(--primary-color); */
                border-color: var(--primary-color);
            }

            .app-card::after,
            .feature-card::after {
                content: '';
                position: absolute;
                top: 50%;
                left: 50%;
                width: 0;
                height: 0;
                background: radial-gradient(circle, rgba(0, 130, 200, 0.1) 0%, transparent 70%);
                transform: translate(-50%, -50%);
                transition: all 0.6s ease;
                border-radius: 50%;
            }

            .app-card:hover::after,
            .feature-card:hover::after {
                width: 300px;
                height: 300px;
            }

            .app-card-icon {
                width: 60px;
                height: 60px;
                background: rgba(0, 130, 200, 0.1);
                border-radius: 12px;
                display: flex;
                align-items: center;
                justify-content: center;
                margin-bottom: 1.5rem;
                color: var(--primary-color);
                font-size: 1.5rem;
            }

            .app-card-title {
                font-size: 1.25rem;
                font-weight: 600;
                color: var(--text-dark);
                margin-bottom: 1rem;
            }

            .app-card-text {
                color: var(--text-light);
                line-height: 1.6;
                font-size: 0.95rem;
            }

            .app-card-meta {
                font-size: 0.85rem;
                color: var(--primary-color);
                font-weight: 500;
                margin-bottom: 0.5rem;
            }

            /* Features Section */
            .features-section {
                background: var(--bg-secondary);
                padding: 2rem 0;
            }

            .feature-card {
                background: var(--card-bg);
                border-radius: 12px;
                padding: 2.5rem 2rem;
                text-align: center;
                border: 1px solid var(--border-light);
                transition: all 0.4s cubic-bezier(0.25, 0.8, 0.25, 1);
                height: 100%;
                position: relative;
                overflow: hidden;
                transform: translateY(0);
                box-shadow: 0 4px 15px var(--shadow-color);
            }

            .feature-card:hover {
                transform: translateY(-5px);
                box-shadow: 0 15px 30px var(--shadow-color);
                border-color: rgba(0, 130, 200, 0.3);
            }

            .feature-icon {
                width: 70px;
                height: 70px;
                background: var(--primary-color);
                border-radius: 50%;
                display: flex;
                align-items: center;
                justify-content: center;
                margin: 0 auto 1.5rem;
                color: white;
                font-size: 1.5rem;
            }

            .feature-title {
                font-size: 18px;
                font-weight: 600;
                color: var(--text-dark);
                margin-bottom: 1rem;
            }

            .feature-text {
                color: var(--text-light);
                line-height: 1.6;
                font-size: 14px;
            }

            /* Banner animations */
            @keyframes backgroundMove {
                0%, 100% {
                    transform: translateX(0) translateY(0);
                }
                25% {
                    transform: translateX(-10px) translateY(-5px);
                }
                50% {
                    transform: translateX(5px) translateY(10px);
                }
                75% {
                    transform: translateX(10px) translateY(-10px);
                }
            }

            @keyframes patternMove {
                0% {
                    transform: translate(-50%, -50%) rotate(0deg);
                }
                100% {
                    transform: translate(-50%, -50%) rotate(360deg);
                }
            }
            .fade-in-up {
                opacity: 0;
                transform: translateY(30px);
                transition: all 0.6s ease;
            }

            .fade-in-up.animate {
                opacity: 1;
                transform: translateY(0);
            }

            /* Responsive adjustments */
            @media (max-width: 768px) {
                .banner-title {
                    font-size: 2.5rem;
                }
                
                .banner-subtitle {
                    font-size: 1.2rem;
                }
                
                .video-container {
                    height: 250px;
                    margin-top: 2rem;
                }
                
                .section-title {
                    font-size: 2rem;
                }
                
                .theme-toggle {
                    margin-left: 0.5rem;
                }
            }

            @media (max-width: 576px) {
                .banner-title {
                    font-size: 2rem;
                }
                
                .banner-subtitle {
                    font-size: 1.1rem;
                }
                
                .app-card,
                .feature-card {
                    padding: 1.5rem;
                }
            }

            /* WordPress specific styles */
            .wp-block-group__inner-container {
                max-width: none !important;
            }

            /* Utility classes for WordPress */
            .ithena-section {
                position: relative;
            }

            .ithena-container {
                max-width: 1200px;
                margin: 0 auto;
            }

            /* Dark theme specific adjustments */
            [data-theme="dark"] .navbar-toggler {
                border-color: var(--border-light);
            }

            [data-theme="dark"] .navbar-toggler-icon {
                background-image: url("data:image/svg+xml,%3csvg xmlns='http://www.w3.org/2000/svg' viewBox='0 0 30 30'%3e%3cpath stroke='rgba%28224, 230, 237, 0.75%29' stroke-linecap='round' stroke-miterlimit='10' stroke-width='2' d='M4 7h22M4 15h22M4 23h22'/%3e%3c/svg%3e");
            }
        </style>
    
    </head>

    <body>

        <!-- Custom Navbar -->
        <?php echo child_theme_custom_navbar(); 

            // Fetch post using the slug
            $post = get_page_by_path($slug, OBJECT, 'application_overview');
            
            if ($post) {
                
                $post_id = $post->ID;

                // Get post title, content, and any meta
                $post_title = get_the_title($post_id);
                $post_content = apply_filters('the_content', $post->post_content);

                // Example: Fetch custom meta (adjust keys as needed)
                $main_title = get_post_meta($post_id, 'main_title', true);
                $sub_title = get_post_meta($post_id, 'sub_title', true);
                $feature_img = get_post_meta($post_id, 'feature_img', true);
                $banner_img = get_post_meta($post_id, 'banner_img', true);            
                $banner_overview_text = get_post_meta($post_id, 'banner_overview_text', true);
                
                if(!empty($banner_img)) {
                    $banner_img_url = wp_get_attachment_image_url($banner_img, 'full');
                }
                
                // Fetch features
                $features = array();
                for ($i = 1; $i <= 4; $i++) {
                    $features[$i] = array(
                        'title' => get_post_meta($post_id, 'feature' . $i . '-title', true),
                        'text'  => get_post_meta($post_id, 'feature' . $i . '-text', true)
                    );
                }

            } else {
                // Handle missing post
                $post_title = 'Application Not Found';
                $post_content = '<p>The requested application could not be found.</p>';
                $app_synopsis = '';
                $banner_image = '';
            }

        ?>

        <!-- Banner Section -->
        <section class="banner-section ithena-section" id="home">
            <div class="container">
                <div class="row align-items-center" style="min-height: 50vh; padding-top: 70px;">
                    <div class="col-lg-6 col-md-12">
                        <div class="banner-content fade-in-up">
                            <h1 class="fw-bold app-overview-user text-white"> Hello, <?php echo $sso_user['data']['full_name'] ? $sso_user['data']['full_name'] : "Guest User";  ?></h1>
                            
                            <?php if(!empty($sso_user)) { ?>
                                <h1 class="banner-title">Welcome to <?= $main_title ?></h1>
                                <h3 class="banner-subtitle"><?= $banner_overview_text ?></h3>
                            <?php } ?>

                        </div>
                        
                        <?php if(!empty($sso_user)) { ?>
                            <!-- CTA Button -->
                            <a href="#" class="btn btn-primary px-4 py-2" onclick="alert('On clicking this, the user will be redirected to the application platform, where their application user account will be created. They can then continue their execution within that platform.'); return false;"> 
                                Continue with <?= $main_title ?> 
                                <i class="bi bi-arrow-right ms-2"></i>
                            </a>
                        <?php }  ?>

                    </div>
                    <div class="col-lg-6 col-md-12">
                        <div class="video-container fade-in-up">
                            <video autoplay="" loop="" muted="" playsinline="" src="https://polymer-media-uploads-development.s3.us-east-2.amazonaws.com/website/Seamless+Integration.mp4" 
                            style="width:70%; height:auto;"></video>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <!-- Features Section -->
        <section class="features-section ithena-section" id="features">
            <div class="container">
                <div class="row">
                    <div class="col-12">
                        <h2 class="section-title fade-in-up">Features</h2>
                    </div>
                </div>
                
                <div class="row g-4">

                    <?php
                    // Loop through features and display them   
                    foreach ($features as $index => $feature) { ?>

                        <!-- App Card 1 -->
                        <div class="col-xl-3 col-lg-4 col-md-6 col-sm-12">
                            <div class="app-card fade-in-up">
                                <div class="app-card-icon">
                                    <i class="bi bi-graph-up"></i>
                                </div>
                                <h4 class="app-card-title"><?= $feature['title'] ?></h4>
                                <p class="app-card-text"><?= $feature['text'] ?></p>
                            </div>
                        </div>

                    <?php } ?>
   
                    
                    <!-- App Card 3 -->
                    <!-- <div class="col-xl-3 col-lg-4 col-md-6 col-sm-12">
                        <div class="app-card fade-in-up">
                            <div class="app-card-icon">
                                <i class="bi bi-robot"></i>
                            </div>
                            <div class="app-card-meta">(3/4 of grid)</div>
                            <h4 class="app-card-title">Process Automation</h4>
                            <p class="app-card-text">Automate repetitive tasks and streamline workflows with intelligent process automation and workflow management.</p>
                        </div>
                    </div> -->
                    
                    <!-- App Card 4 -->
                    <!-- <div class="col-xl-3 col-lg-4 col-md-6 col-sm-12">
                        <div class="app-card fade-in-up">
                            <div class="app-card-icon">
                                <i class="bi bi-phone"></i>
                            </div>
                            <div class="app-card-meta">(4/4 of grid)</div>
                            <h4 class="app-card-title">Mobile Solutions</h4>
                            <p class="app-card-text">Reach customers anywhere with responsive mobile applications built for optimal performance across all devices.</p>
                        </div>
                    </div> -->

                </div>
            </div>
        </section>

        <!-- Applications Section -->
        <section class="applications-section ithena-section" id="applications">
            <div class="container">
                <div class="row">
                    <div class="col-12">
                        <h2 class="section-title fade-in-up">Our Other Applications</h2>
                    </div>
                </div>

                <?php 
                // Fetch all applications
                 $other_apps = new WP_Query(array(
                        'post_type' => 'application_overview',
                        'posts_per_page' => -1, // Get all posts
                        'post__not_in' => $post_id ? array($post_id) : array(),
                        'orderby' => 'title',
                        'order' => 'ASC'
                    ));
                ?>

                <div class="row g-4">

                <?php 
                    if ($other_apps->have_posts()) :     
                        while ($other_apps->have_posts()) : 
                            $other_apps->the_post(); 
                            $app_main_title = get_post_meta(get_the_ID(), 'main_title', true) ?: get_the_title();
                            $feature_img_id = get_post_meta(get_the_ID(), 'feature_img', true);
                            $overview_text = get_post_meta(get_the_ID(), 'banner_overview_text', true);

                            $post_slug = $post->post_name;
                            $app_url = esc_url(site_url('/application-overview/?slug=' . $post_slug));
                ?>
                    <div class="col-lg-4 col-md-6 col-sm-12">
                        <div class="feature-card fade-in-up">
                            <div class="feature-icon">
                                <i class="bi bi-shield-check"></i>
                            </div>
                            <h4 class="feature-title"><?= $app_main_title ?></h4>
                            <p class="feature-text"><?= $overview_text ?></p>
                            
                            <!-- CTA Button -->
                            <a href="#" class="btn btn-secondary px-4 py-2 disabled">
                                Continue with <?= $app_main_title ?> 
                                <i class="bi bi-arrow-right ms-2"></i>
                            </a>
                            <span style="display: flex;font-size: small;" class="text-black-50">* discuss in the meeting before proceeding with conceptualization</span>

                        </div>
                    </div>

                <?php  
                        endwhile; 
                        wp_reset_postdata(); 
                    endif;
                ?>
                    
                    <!-- <div class="col-lg-4 col-md-6 col-sm-12">
                        <div class="feature-card fade-in-up">
                            <div class="feature-icon">
                                <i class="bi bi-speedometer2"></i>
                            </div>
                            <h4 class="feature-title">Performance Optimization</h4>
                            <p class="feature-text">Maximize application performance with advanced caching, CDN integration, and performance monitoring tools.</p>
                        </div>
                    </div>
                    
                    <div class="col-lg-4 col-md-6 col-sm-12">
                        <div class="feature-card fade-in-up">
                            <div class="feature-icon">
                                <i class="bi bi-people"></i>
                            </div>
                            <h4 class="feature-title">24/7 Support</h4>
                            <p class="feature-text">Get round-the-clock technical support from our expert team with guaranteed response times and priority assistance.</p>
                        </div>
                    </div> -->

                </div>

            </div>
        </section>

        <!-- Custom Navbar -->
	    <?php echo child_theme_custom_footer(); ?>
  
        <script>
            // WordPress compatibility - ensure scripts run after DOM is ready
            document.addEventListener('DOMContentLoaded', function() {
                
                // Theme toggle functionality
                const themeToggle = document.getElementById('themeToggle');
                const html = document.documentElement;
                
                // Check for saved theme preference or default to light mode
                const currentTheme = localStorage.getItem('theme') || 'light';
                html.setAttribute('data-theme', currentTheme);
                
                // themeToggle.addEventListener('click', function() {
                //     const currentTheme = html.getAttribute('data-theme');
                //     const newTheme = currentTheme === 'dark' ? 'light' : 'dark';
                    
                //     // Add transition class for smooth theme change
                //     document.body.style.transition = 'background-color 0.3s ease, color 0.3s ease';
                    
                //     html.setAttribute('data-theme', newTheme);
                //     localStorage.setItem('theme', newTheme);
                    
                //     // Remove transition after animation completes
                //     setTimeout(() => {
                //         document.body.style.transition = '';
                //     }, 300);
                    
                //     // Optional: Trigger custom event for theme change
                //     const themeChangeEvent = new CustomEvent('themeChange', {
                //         detail: { theme: newTheme }
                //     });
                //     document.dispatchEvent(themeChangeEvent);
                // });
                
                // Smooth scrolling for navigation links
                document.querySelectorAll('a[href^="#"]').forEach(anchor => {
                    anchor.addEventListener('click', function (e) {
                        e.preventDefault();
                        const target = document.querySelector(this.getAttribute('href'));
                        if (target) {
                            const offsetTop = target.offsetTop - 80; // Account for fixed navbar
                            window.scrollTo({
                                top: offsetTop,
                                behavior: 'smooth'
                            });
                        }
                    });
                });

                // Navbar scroll effect
                window.addEventListener('scroll', function() {
                    const navbar = document.querySelector('.navbar');
                    if (window.scrollY > 50) {
                        navbar.classList.add('scrolled');
                    } else {
                        navbar.classList.remove('scrolled');
                    }
                });

                // Scroll animations using Intersection Observer
                const observerOptions = {
                    threshold: 0.1,
                    rootMargin: '0px 0px -50px 0px'
                };

                const observer = new IntersectionObserver((entries) => {
                    entries.forEach((entry, index) => {
                        if (entry.isIntersecting) {
                            setTimeout(() => {
                                entry.target.classList.add('animate');
                            }, index * 100); // Stagger animation
                        }
                    });
                }, observerOptions);

                // Observe all fade-in elements
                document.querySelectorAll('.fade-in-up').forEach(el => {
                    observer.observe(el);
                });

                // User profile dropdown functionality
                const userProfile = document.getElementById('userProfile');
                const userDropdown = document.getElementById('userDropdown');
                
                userProfile.addEventListener('click', function(e) {
                    e.stopPropagation();
                    userDropdown.classList.toggle('show');
                });

                // Close dropdown when clicking outside
                document.addEventListener('click', function(e) {
                    if (!userProfile.contains(e.target)) {
                        userDropdown.classList.remove('show');
                    }
                });

                // Handle dropdown item clicks
                document.querySelectorAll('.user-dropdown-item').forEach(item => {
                    item.addEventListener('click', function(e) {
                        e.preventDefault();
                        const action = this.textContent.trim();
                        
                        if (action === 'Visit Profile') {
                            alert('Redirecting to user profile...');
                            // window.location.href = '/wp-admin/profile.php';
                        } else if (action === 'Logout') {
                            if (confirm('Are you sure you want to logout?')) {
                                alert('Logging out...');
                                // window.location.href = '/wp-login.php?action=logout';
                            }
                        }
                        
                        userDropdown.classList.remove('show');
                    });
                });
                
                // Active navigation link highlighting
                window.addEventListener('scroll', function() {
                    const sections = document.querySelectorAll('section[id]');
                    const navLinks = document.querySelectorAll('.navbar-nav .nav-link');
                    
                    let currentSection = '';
                    sections.forEach(section => {
                        const sectionTop = section.offsetTop - 100;
                        const sectionHeight = section.clientHeight;
                        
                        if (window.scrollY >= sectionTop && window.scrollY < sectionTop + sectionHeight) {
                            currentSection = section.getAttribute('id');
                        }
                    });
                    
                    navLinks.forEach(link => {
                        link.classList.remove('active');
                        if (link.getAttribute('href') === `#${currentSection}`) {
                            link.classList.add('active');
                        }
                    });
                });

                // Video container interaction
                document.querySelector('.video-container').addEventListener('click', function() {
                    this.innerHTML = '<div class="d-flex align-items-center"><i class="bi bi-play-circle me-2" style="font-size: 2rem;"></i><span>Loading video...</span></div>';
                    this.style.backgroundColor = 'var(--bg-secondary)';
                    
                    // Simulate video loading
                    setTimeout(() => {
                        this.innerHTML = '<div class="text-center"><i class="bi bi-camera-video" style="font-size: 3rem; color: var(--primary-color);"></i><br><span class="mt-2 d-block">Video Player Would Load Here</span></div>';
                    }, 1000);
                });

                // Theme change event listener (for external integrations)
                document.addEventListener('themeChange', function(e) {
                    console.log('Theme changed to:', e.detail.theme);
                    
                    // Update any theme-dependent elements
                    const metaThemeColor = document.querySelector('meta[name="theme-color"]');
                    if (metaThemeColor) {
                        metaThemeColor.content = e.detail.theme === 'dark' ? '#0f1419' : '#ffffff';
                    }
                });

                // Keyboard accessibility for theme toggle
                themeToggle.addEventListener('keydown', function(e) {
                    if (e.key === 'Enter' || e.key === ' ') {
                        e.preventDefault();
                        this.click();
                    }
                });

                // Add tab index for keyboard navigation
                themeToggle.setAttribute('tabindex', '0');

                // WordPress hook for additional initialization
                if (typeof wp !== 'undefined' && wp.hooks) {
                    wp.hooks.doAction('ithena_theme_loaded');
                }
            });

            // WordPress AJAX compatibility
            function iThenaAjaxHandler(action, data, callback) {
                if (typeof ajaxurl !== 'undefined') {
                    fetch(ajaxurl, {
                        method: 'POST',
                        headers: {
                            'Content-Type': 'application/x-www-form-urlencoded',
                        },
                        body: new URLSearchParams({
                            action: action,
                            ...data
                        })
                    })
                    .then(response => response.json())
                    .then(callback)
                    .catch(error => console.error('Ajax Error:', error));
                }
            }

            // Get current theme function
            function getCurrentTheme() {
                return document.documentElement.getAttribute('data-theme') || 'light';
            }

            // Set theme function (for external use)
            function setTheme(theme) {
                const html = document.documentElement;
                const validThemes = ['light', 'dark'];
                
                if (validThemes.includes(theme)) {
                    html.setAttribute('data-theme', theme);
                    localStorage.setItem('theme', theme);
                    
                    const themeChangeEvent = new CustomEvent('themeChange', {
                        detail: { theme: theme }
                    });
                    document.dispatchEvent(themeChangeEvent);
                }
            }

            // Make functions available globally for WordPress
            window.iThena = {
                ajaxHandler: iThenaAjaxHandler,
                getCurrentTheme: getCurrentTheme,
                setTheme: setTheme
            };

            // Detect system preference and set initial theme if no saved preference
            if (!localStorage.getItem('theme')) {
                const prefersDarkScheme = window.matchMedia('(prefers-color-scheme: dark)');
                const initialTheme = prefersDarkScheme.matches ? 'dark' : 'light';
                setTheme(initialTheme);
                
                // Listen for system theme changes
                prefersDarkScheme.addEventListener('change', function(e) {
                    if (!localStorage.getItem('theme')) {
                        setTheme(e.matches ? 'dark' : 'light');
                    }
                });
            }
        </script>

    </body>
