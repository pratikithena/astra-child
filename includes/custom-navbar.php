<?php
    
    // Prevent direct access
    if (!defined('ABSPATH')) {
        exit;
    }

    // Function to output your custom navbar
    function child_theme_custom_navbar() {
        ob_start();
    
    ?>

    <!-- Bootstrap CSS -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.0/css/bootstrap.min.css" rel="stylesheet">
    <!-- Bootstrap Icons -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-icons/1.10.0/font/bootstrap-icons.min.css" rel="stylesheet">

    <!-- Font Awesome CDN for icons -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    
    <style>
        :root {
            --text-dark: #2d3748;
            --text-light: #718096;
            --header-height: 70px;
            --primary-color: #0082C8;
        }

        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: -apple-system, BlinkMacSystemFont, 'Noto Sans', sans-serif;
            padding-top: var(--header-height);
        }

        /* Header Styles */
        #custom-ithena-header.custom-header {
            position: fixed;
            top: 0;
            left: 0;
            right: 0;
            height: var(--header-height);
            background: rgba(255, 255, 255, 0.95);
            backdrop-filter: blur(10px);
            border-bottom: 1px solid rgba(226, 232, 240, 0.8);
            z-index: 1000;
            transition: all 0.3s ease;
        }

        #custom-ithena-header.custom-header.scrolled {
            background: rgba(255, 255, 255, 0.98);
            box-shadow: 0 2px 20px rgba(0, 0, 0, 0.1);
        }

        #custom-ithena-header .header-container {
            max-width: 1330px;
            margin: 0 auto;
            padding: 0 20px;
            height: 100%;
            display: flex;
            align-items: center;
            justify-content: space-between;
        }

        #custom-ithena-header .nav-menu {
            display: flex;
            align-items: center;
            /* gap: 10px; */
            list-style: none;
            margin: 0;
            padding: 0;
        }

        #custom-ithena-header .nav-item {
            position: relative;
        }

        #custom-ithena-header .nav-link {
            text-decoration: none;
            color: var(--text-dark);
            font-weight: 400;
            font-size: 13px;
            padding: 10px 15px;
            border-radius: 8px;
            line-height: 0.7px;
            /* transition: all 0.3s ease; */
            position: relative;
            overflow: hidden;
            display: flex;
            align-items: center;
            gap: 5px;
        }

        #custom-ithena-header .nav-link:hover {
            color: var(--primary-color);
            /* transform: translateY(-1px); */
        }

        #custom-ithena-header .nav-link::after {
            content: '';
            font-family: 'Font Awesome 6 Free';
            font-weight: 900;
            margin-left: 5px;
            transition: transform 0.3s ease;
        }

        #custom-ithena-header .nav-item.has-dropdown .nav-link::after {
            content: '\f107'; /* Font Awesome chevron-down */
        }

        #custom-ithena-header .nav-item.has-dropdown:hover .nav-link::after {
            transform: rotate(180deg);
        }

        /* Full Width Mega Dropdown Styles */
        #custom-ithena-header .mega-dropdown {
            position: fixed;
            top: var(--header-height);
            left: 0;
            right: 0;
            width: 100vw;
            background: rgba(255, 255, 255, 0.98);
            backdrop-filter: blur(10px);
            border-bottom: 1px solid rgba(226, 232, 240, 0.8);
            box-shadow: 0 10px 40px rgba(0, 0, 0, 0.1);
            opacity: 0;
            visibility: hidden;
            transform: translateY(-10px);
            transition: all 0.3s ease;
            z-index: 999;
        }

        #custom-ithena-header .nav-item:hover .mega-dropdown {
            opacity: 1;
            visibility: visible;
            transform: translateY(0);
        }

        #custom-ithena-header .mega-dropdown-content {
            max-width: 1200px;
            margin: 0 auto;
            padding: 30px 20px;
        }

        #custom-ithena-header .dropdown-grid {
            display: grid;
            grid-template-columns: 1fr 1fr 1fr;
            gap: 40px;
            max-width: 100%;
        }

        #custom-ithena-header .dropdown-column {
            display: flex;
            flex-direction: column;
            /* gap: 8px; */
        }

        #custom-ithena-header .column-title {
            font-weight: 500;
            color: var(--primary-color);
            font-size: 16px;
            margin-bottom: 15px;
            padding-bottom: 8px;
            border-bottom: 2px solid rgba(0, 130, 200, 0.2);
        }

        #custom-ithena-header .dropdown-item {
            display: block;
            padding: 10px 10px;
            color: var(--text-dark);
            text-decoration: none;
            font-size: 14px;
            /* font-weight: 500; */
            transition: all 0.2s ease;
            cursor: pointer;
            border-radius: 8px;
            border-left: 3px solid transparent;
        }

        #custom-ithena-header .dropdown-item:hover {
            /* background: rgba(0, 130, 200, 0.1); */
            color: var(--primary-color);
            /* border-left-color: var(--primary-color); */
            /* transform: translateX(5px); */
            text-decoration: none;
        }

        /* User Profile Styles */
        #custom-ithena-header .user-profile {
            position: relative;
            margin-left: 20px;
        }

        #custom-ithena-header .profile-image {
            width: 40px;
            height: 40px;
            border-radius: 50%;
            cursor: pointer;
            border: 2px solid #e2e8f0;
            transition: all 0.3s ease;
            object-fit: cover;
        }

        #custom-ithena-header .profile-image:hover {
            border-color: var(--primary-color);
            transform: scale(1.05);
        }

        #custom-ithena-header .profile-dropdown {
            position: absolute;
            top: 100%;
            right: 0;
            background: white;
            border-radius: 12px;
            box-shadow: 0 10px 40px rgba(0, 0, 0, 0.15);
            padding: 12px 0;
            min-width: 180px;
            opacity: 0;
            visibility: hidden;
            transform: translateY(-10px);
            transition: all 0.3s ease;
            border: 1px solid rgba(226, 232, 240, 0.8);
            z-index: 1001;
        }

        #custom-ithena-header .profile-dropdown.active {
            opacity: 1;
            visibility: visible;
            transform: translateY(0);
        }

        #custom-ithena-header .profile-dropdown::before {
            content: '';
            position: absolute;
            top: -8px;
            right: 20px;
            width: 16px;
            height: 16px;
            background: white;
            border: 1px solid rgba(226, 232, 240, 0.8);
            border-bottom: none;
            border-right: none;
            transform: rotate(45deg);
        }

        #custom-ithena-header .dropdown-header {
            padding: 5px 15px;
        }

        #custom-ithena-header .user-name {
            font-weight: 600;
            color: var(--text-dark);
            font-size: 16px;
            margin: 0;
        }

        #custom-ithena-header .logout-item {
            color: #dc3545;
            border-top: 1px solid #e2e8f0;
            margin-top: 8px;
            padding-top: 12px;
        }

        #custom-ithena-header .logout-item:hover {
            background: rgba(220, 53, 69, 0.1);
            color: #dc3545;
        }

        #custom-ithena-header .mobile-menu-toggle {
            display: none;
            flex-direction: column;
            cursor: pointer;
            padding: 5px;
            border-radius: 4px;
            transition: all 0.3s ease;
        }

        #custom-ithena-header .mobile-menu-toggle:hover {
            background: rgba(59, 130, 246, 0.1);
        }

        #custom-ithena-header .mobile-menu-toggle span {
            width: 25px;
            height: 3px;
            background: var(--text-dark);
            margin: 3px 0;
            transition: 0.3s;
            border-radius: 2px;
        }

        /* Demo content styles */
        .demo-content {
            padding: 50px 20px;
            text-align: center;
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            color: white;
            min-height: 500px;
            display: flex;
            align-items: center;
            justify-content: center;
            flex-direction: column;
        }

        /* Mobile Styles */
        @media (max-width: 768px) {
            
            #custom-ithena-header .nav-menu {
                position: fixed;
                top: var(--header-height);
                left: -100%;
                width: 100%;
                height: calc(100vh - var(--header-height));
                background: rgba(255, 255, 255, 0.98);
                backdrop-filter: blur(10px);
                flex-direction: column;
                justify-content: flex-start;
                align-items: stretch;
                padding: 20px 0;
                gap: 0;
                transition: left 0.3s ease;
                overflow-y: auto;
            }

            #custom-ithena-header .nav-menu.active {
                left: 0;
            }

            #custom-ithena-header .nav-item {
                width: 100%;
            }

            #custom-ithena-header .nav-link {
                font-size: 16px;
                padding: 15px 20px;
                justify-content: space-between;
                border-radius: 0;
                border-bottom: 1px solid rgba(226, 232, 240, 0.5);
            }

            #custom-ithena-header .nav-item.has-dropdown .nav-link::after {
                content: '\f107';
                transition: transform 0.3s ease;
            }

            #custom-ithena-header .nav-item.active .nav-link::after {
                transform: rotate(180deg);
            }

            #custom-ithena-header .mega-dropdown {
                position: static;
                width: 100%;
                transform: none;
                opacity: 1;
                visibility: visible;
                background: rgba(240, 245, 251, 0.8);
                border: none;
                box-shadow: inset 0 2px 10px rgba(0, 0, 0, 0.05);
                max-height: 0;
                overflow: hidden;
                transition: max-height 0.3s ease;
            }

            #custom-ithena-header .nav-item.active .mega-dropdown {
                max-height: 500px;
            }

            #custom-ithena-header .mega-dropdown-content {
                padding: 20px;
            }

            #custom-ithena-header .dropdown-grid {
                grid-template-columns: 1fr;
                gap: 20px;
            }

            #custom-ithena-header .dropdown-column {
                gap: 5px;
            }

            #custom-ithena-header .dropdown-item {
                padding: 12px 20px;
                font-size: 15px;
                border-left: none;
                border-radius: 6px;
            }

            #custom-ithena-header .dropdown-item:hover {
                transform: none;
            }

            #custom-ithena-header .mobile-menu-toggle {
                display: flex;
            }

            #custom-ithena-header .mobile-menu-toggle.active span:nth-child(1) {
                transform: rotate(-45deg) translate(-5px, 6px);
            }

            #custom-ithena-header .mobile-menu-toggle.active span:nth-child(2) {
                opacity: 0;
            }

            #custom-ithena-header .mobile-menu-toggle.active span:nth-child(3) {
                transform: rotate(45deg) translate(-5px, -6px);
            }

            #custom-ithena-header .user-profile {
            margin-left: 10px;
            }

            #custom-ithena-header .profile-dropdown {
            right: -10px;
            min-width: 160px;
            }

            #custom-ithena-header .profile-dropdown::before {
            right: 25px;
            }

            /* Hide mega dropdowns on mobile when menu is closed */
            #custom-ithena-header .nav-menu:not(.active) .mega-dropdown {
                display: none;
            }
        }

        /* Additional responsive adjustments */
        @media (max-width: 1200px) {
            #custom-ithena-header .mega-dropdown-content {
            max-width: 95%;
            padding: 20px 20px;
            }
        }

        @media (max-width: 992px) {
            #custom-ithena-header .dropdown-grid {
            grid-template-columns: 1fr;
            gap: 25px;
            }
        }
    </style>
    
    <!-- Header -->
    <header class="custom-header" id="custom-ithena-header">
        <div class="header-container">
            
            <a href="https://dev.ithena.io/" target="_blank">
                <img src="https://ithena.ai/wp-content/uploads/2023/03/Ithena-Logo.png" alt="ithena" style="width: auto;height: 45px;" />
            </a>
            
            <nav class="nav-menu" id="navMenu">

                <!-- Our Platform Menu (No dropdown) -->
                <li class="nav-item">
                    <a href="https://dev.ithena.io/our-platform-ai" class="nav-link" target="_blank">Our Platform</a>
                </li>

                <!-- Solutions Menu -->
                <li class="nav-item has-dropdown" data-menu="Solutions">
                    <a href="https://dev.ithena.io/solutions" class="nav-link" target="_blank">Solutions</a>
                    <div class="mega-dropdown">
                        <div class="mega-dropdown-content">
                            <div class="dropdown-grid">
                                <div class="dropdown-column">
                                    <div class="column-title">Manufacturing End Users</div>
                                        <a href="https://ithena.ai/digital-shopfloor-igemba/" class="dropdown-item" target="_blank">Digital Shopfloor</a>
                                        <a href="#" class="dropdown-item" target="_blank">Manufacturing Excellence</a>
                                        <a href="#" class="dropdown-item" target="_blank">Energy Management</a>
                                    </div>
                                <div class="dropdown-column">
                                    <div class="column-title">Machine Builders & OEMs</div>
                                    <a href="https://dev.ithena.io/iserv/" class="dropdown-item" target="_blank">Smart Service</a>
                                    <a href="#" class="dropdown-item" target="_blank">B2B eCommerce</a>
                                    <a href="https://dev.ithena.io/aether-ai" class="dropdown-item" target="_blank">Aether AI</a>
                                </div>
                                <div class="dropdown-column">
                                    <div class="column-title">Smart Infrastructure</div>
                                    <a href="#" class="dropdown-item" target="_blank">Smart Asset Tracking</a>
                                    <a href="#" class="dropdown-item" target="_blank">Smart EV Charging</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </li>

                <!-- Services Menu -->
                <li class="nav-item has-dropdown" data-menu="Services">
                    <a href="https://dev.ithena.io/services/" class="nav-link" target="_blank">Services</a>
                    <div class="mega-dropdown">
                        <div class="mega-dropdown-content">
                            <div class="dropdown-grid">
                                <div class="dropdown-column">
                                    <div class="column-title">Business transformation</div>
                                    <a href="#" class="dropdown-item" target="_blank">Interactive Dashboard</a>
                                    <a href="#" class="dropdown-item" target="_blank">API Integration</a>
                                </div>
                                <div class="dropdown-column">
                                    <div class="column-title">Manufacturing Integration</div>
                                    <a href="#" class="dropdown-item" target="_blank">Manufacturing Execution</a>
                                    <a href="#" class="dropdown-item" target="_blank">Industries IoT</a>
                                </div>
                                <div class="dropdown-column">
                                    <div class="column-title">Data Management</div>
                                    <a href="#" class="dropdown-item" target="_blank">Big Data & Analytics</a>
                                    <a href="#" class="dropdown-item" target="_blank">AI|ML and Data Science</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </li>

                <!-- Case Studies Us (No dropdown) -->
                <li class="nav-item">
                    <a href="https://dev.ithena.io/case-studies/" class="nav-link" target="_blank">Case Studies</a>
                </li>

                <!-- About Us (No dropdown) -->
                <li class="nav-item">
                    <a href="https://dev.ithena.io/about-us/" class="nav-link" target="_blank">About Us</a>
                </li>

                <!-- Contact Us (No dropdown) -->
                <li class="nav-item">
                    <a href="https://dev.ithena.io/contact-us/" class="nav-link" target="_blank">Contact Us</a>
                </li>

            </nav>

            <div style="display: flex; align-items: center;">
            
                <?php
                    session_start();
                    $sso_user = get_current_sso_user();
                    if ($sso_user) {
                        $email = $sso_user['data']['email'];
                            // Check if a user exists with this email
                            // $user = get_user_by('email', $email);
                            // if ($user) {
                            //     // Get avatar URL (full-size)
                            //     $avatar_url = get_avatar_url($user->ID);
                            // }
                        $avatar_url = 'https://secure.gravatar.com/avatar/cfe169f639cd2db7363cd9cd155fef789a01fc61a1b1610c5fcbb324f0f97749?s=96&d=mm&r=g';
                ?>

                <!-- User Profile Section (Demo) -->
                <div class="user-profile" id="userProfile">
                    <img src="https://secure.gravatar.com/avatar/cfe169f639cd2db7363cd9cd155fef789a01fc61a1b1610c5fcbb324f0f97749?s=96&d=mm&r=g" alt="User Profile" class="profile-image" id="profileImage">
                    
                    <div class="profile-dropdown" id="profileDropdown">
                        <div class="dropdown-header">
                            <p class="user-name" id="userName"><?= $email ?></p>
                        </div>
                        <a href="#" class="dropdown-item logout-item" id="logoutBtn" target="_blank">Logout</a>
                    </div>
                </div>
                
                <?php }else{  ?>
                    <!-- User Profile Section (Demo) -->
                    <a href="#" class="dropdown-item login-item" id="loginbtn" data-bs-toggle="modal" data-bs-target="#signupLoginModal">Login</a>
            
                <?php } ?>

                <!-- Mobile Menu Toggle -->
                <div class="mobile-menu-toggle" id="mobileMenuToggle">
                    <span></span>
                    <span></span>
                    <span></span>
                </div>

            </div>
            
        </div>
    </header>

    <script>
        
        // Header scroll effect
        window.addEventListener('scroll', function() {
            const header = document.getElementById('custom-header');
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

        // Profile dropdown functionality
        const profileImage = document.getElementById('profileImage');
        const profileDropdown = document.getElementById('profileDropdown');
        const logoutBtn = document.getElementById('logoutBtn');

        if (profileImage && profileDropdown) {
            // Toggle dropdown
            profileImage.addEventListener('click', function(e) {
                e.stopPropagation();
                profileDropdown.classList.toggle('active');
            });

            // Close dropdown when clicking outside
            document.addEventListener('click', function(e) {
                if (!document.getElementById('userProfile').contains(e.target)) {
                    profileDropdown.classList.remove('active');
                }
            });
        }

        // Demo logout functionality
        // Logout functionality (demo)
        logoutBtn.addEventListener('click', function(e) {
            e.preventDefault();
            // In WordPress, this would be handled by PHP
            //alert('Logout clicked - In WordPress, this will clear sessions and redirect');
            // window.location.href = 'https://dev.ithena.io/iserv-ai/';

            fetch('<?= admin_url("admin-ajax.php") ?>', {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/x-www-form-urlencoded',
                },
                body: new URLSearchParams({
                    action: 'handle_logout'
                }).toString()
            })
            .then(response => response.json())
            .then(data => {
                if (data.success) {
                    // Login successful - redirect immediately
                    setTimeout(() => {
                        window.location.href = data.data.redirect_url;
                    }, 1000);
                } else {
                    showMessage(data.data.message, 'error');
                }
            })
            .catch(error => {
                console.error('Error:', error);
                showMessage('An error occurred. Please try again.', 'error');
            })
            .finally(() => {
            });

        });

    </script>

<?php
    return ob_get_clean();
}

// Register shortcode
add_shortcode('custom_navbar', 'child_theme_custom_navbar');