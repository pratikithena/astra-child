<?php
    /* Template Name: Signup Form Page */

    // Get the 'source' parameter from the query string if it exists
    $source = isset($_GET['source']) ? htmlspecialchars($_GET['source']) : 'iserv';
?>
    
    <head>
        
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Ithena - Sign Up / Login</title>
        <link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.0/css/bootstrap.min.css" rel="stylesheet">
        <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" rel="stylesheet">
        
        <style>
            :root {
                --primary-gradient: linear-gradient(135deg, #667eea 0%, #0082C8 100%);
                --secondary-gradient: linear-gradient(135deg, #f093fb 0%, #f5576c 100%);
                --google-red: #ea4335;
                --google-hover: #d93025;
                --text-dark: #2d3748;
                --text-light: #718096;
                --border-light: #e2e8f0;
                --shadow-soft: 0 10px 25px rgba(0, 0, 0, 0.1);
                --shadow-hover: 0 20px 40px rgba(0, 0, 0, 0.15);
                --header-height: 80px;
                --success-color: #48bb78;
                --error-color: #f56565;
            }

            * {
                margin: 0;
                padding: 0;
                box-sizing: border-box;
            }

            body {
                font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
                background: linear-gradient(135deg, #f5f7fa 0%, #c3cfe2 100%);
                min-height: 100vh;
                padding-top: var(--header-height);
                position: relative;
            }
            
            .main-content {
                display: flex;
                align-items: center;
                justify-content: center;
                min-height: calc(100vh - var(--header-height));
                padding: 20px;
            }

            .signup-container {
                background: white;
                border-radius: 20px;
                box-shadow: var(--shadow-soft);
                padding: 40px;
                width: 80%;
                max-width: 650px;
                position: relative;
                overflow: hidden;
                transition: all 0.3s ease;
            }

            .signup-container:hover {
                box-shadow: var(--shadow-hover);
                transform: translateY(-5px);
            }

            .signup-container::before {
                content: '';
                position: absolute;
                top: 0;
                left: 0;
                right: 0;
                height: 4px;
                background: var(--primary-gradient);
            }

            /* Mode Toggle Styles */
            .mode-toggle {
                display: flex;
                background: #f8f9fa;
                border-radius: 12px;
                padding: 4px;
                margin-bottom: 30px;
                position: relative;
            }

            .toggle-btn {
                flex: 1;
                padding: 12px 20px;
                background: transparent;
                border: none;
                border-radius: 8px;
                font-weight: 600;
                font-size: 14px;
                color: var(--text-light);
                cursor: pointer;
                transition: all 0.3s ease;
                position: relative;
                z-index: 2;
            }

            .toggle-btn.active {
                color: white;
                background: var(--primary-gradient);
                box-shadow: 0 4px 12px rgba(102, 126, 234, 0.3);
            }

            .google-signin {
                margin-bottom: 30px;
            }

            .google-btn {
                width: 100%;
                padding: 15px 20px;
                border: 2px solid var(--border-light);
                border-radius: 12px;
                background: white;
                color: var(--text-dark);
                font-weight: 500;
                font-size: 16px;
                display: flex;
                align-items: center;
                justify-content: center;
                gap: 12px;
                transition: all 0.3s ease;
                text-decoration: none;
                position: relative;
                overflow: hidden;
            }

            .google-btn:hover {
                border-color: var(--google-red);
                color: var(--google-red);
                transform: translateY(-2px);
                box-shadow: 0 8px 20px rgba(234, 67, 53, 0.2);
            }

            .google-btn::before {
                content: '';
                position: absolute;
                top: 0;
                left: -100%;
                width: 100%;
                height: 100%;
                background: linear-gradient(90deg, transparent, rgba(234, 67, 53, 0.1), transparent);
                transition: left 0.5s;
            }

            .google-btn:hover::before {
                left: 100%;
            }

            .google-icon {
                width: 20px;
                height: 20px;
            }

            .work-note {
                background: #f8f9ff;
                border: 1px solid #e6e8ff;
                border-radius: 8px;
                padding: 10px 15px;
                margin-top: 10px;
                font-size: 13px;
                color: var(--text-light);
            }

            .divider-section {
                margin: 35px 0;
                position: relative;
            }

            .divider {
                height: 1px;
                background: linear-gradient(90deg, transparent, var(--border-light), transparent);
                position: relative;
            }

            .divider-text {
                position: absolute;
                top: 50%;
                left: 50%;
                transform: translate(-50%, -50%);
                background: white;
                padding: 0 20px;
                color: var(--text-light);
                font-size: 14px;
                font-weight: 500;
            }

            .form-section {
                background: #fafbfc;
                border-radius: 16px;
                padding: 30px;
                margin-top: 20px;
                border: 1px solid #f0f2f5;
                position: relative;
                overflow: hidden;
            }

            .form-container {
                position: relative;
                transition: all 0.4s ease;
            }

            .form-view {
                transition: all 0.4s ease;
                opacity: 1;
                transform: translateX(0);
            }

            .form-view.hidden {
                opacity: 0;
                transform: translateX(20px);
                position: absolute;
                top: 0;
                left: 0;
                right: 0;
                pointer-events: none;
            }

            .form-title {
                color: var(--text-dark);
                font-size: 24px;
                font-weight: 600;
                margin-bottom: 8px;
                text-align: left;
            }

            .form-subtitle {
                color: var(--text-light);
                font-size: 16px;
                margin-bottom: 25px;
                text-align: left;
            }

            .form-group {
                margin-bottom: 20px;
            }

            .form-label {
                display: block;
                margin-bottom: 8px;
                color: var(--text-dark);
                font-weight: 500;
                font-size: 14px;
            }

            .form-control {
                width: 100%;
                padding: 15px 16px;
                border: 2px solid var(--border-light);
                border-radius: 10px;
                font-size: 16px;
                transition: all 0.3s ease;
                background: white;
            }

            .form-control:focus {
                outline: none;
                border-color: #667eea;
                box-shadow: 0 0 0 3px rgba(102, 126, 234, 0.1);
                transform: translateY(-1px);
            }

            .form-control::placeholder {
                color: #a0aec0;
            }

            .submit-btn {
                width: 100%;
                padding: 16px;
                background: var(--primary-gradient);
                border: none;
                border-radius: 12px;
                color: white;
                font-size: 16px;
                font-weight: 600;
                cursor: pointer;
                transition: all 0.3s ease;
                position: relative;
                overflow: hidden;
            }

            .submit-btn:hover {
                transform: translateY(-2px);
                box-shadow: 0 10px 25px rgba(102, 126, 234, 0.3);
            }

            .submit-btn:active {
                transform: translateY(0);
            }

            .submit-btn::before {
                content: '';
                position: absolute;
                top: 0;
                left: -100%;
                width: 100%;
                height: 100%;
                background: linear-gradient(90deg, transparent, rgba(255, 255, 255, 0.2), transparent);
                transition: left 0.5s;
            }

            .submit-btn:hover::before {
                left: 100%;
            }

            /* Message Styles */
            .message-container {
                margin-bottom: 20px;
            }

            .message {
                padding: 12px 16px;
                border-radius: 8px;
                font-size: 14px;
                font-weight: 500;
                display: flex;
                align-items: center;
                gap: 10px;
                margin-bottom: 10px;
                opacity: 0;
                transform: translateY(-10px);
                transition: all 0.3s ease;
            }

            .message.show {
                opacity: 1;
                transform: translateY(0);
            }

            .message.success {
                background: rgba(72, 187, 120, 0.1);
                color: var(--success-color);
                border: 1px solid rgba(72, 187, 120, 0.2);
            }

            .message.error {
                background: rgba(245, 101, 101, 0.1);
                color: var(--error-color);
                border: 1px solid rgba(245, 101, 101, 0.2);
            }

            .floating-shapes {
                position: fixed;
                top: 0;
                left: 0;
                width: 100%;
                height: 100%;
                pointer-events: none;
                z-index: -1;
            }

            .shape {
                position: absolute;
                border-radius: 50%;
                opacity: 0.1;
                animation: float 6s ease-in-out infinite;
            }

            .shape:nth-child(1) {
                width: 80px;
                height: 80px;
                background: var(--primary-gradient);
                top: 20%;
                left: 10%;
                animation-delay: 0s;
            }

            .shape:nth-child(2) {
                width: 60px;
                height: 60px;
                background: var(--secondary-gradient);
                top: 60%;
                right: 15%;
                animation-delay: 2s;
            }

            .shape:nth-child(3) {
                width: 100px;
                height: 100px;
                background: var(--primary-gradient);
                bottom: 20%;
                left: 20%;
                animation-delay: 4s;
            }

            @keyframes float {
                0%, 100% { transform: translateY(0px) rotate(0deg); }
                50% { transform: translateY(-20px) rotate(180deg); }
            }

            @media (max-width: 768px) {
                .signup-container {
                    padding: 30px 25px;
                    margin: 20px;
                }

                .form-section {
                    padding: 25px 20px;
                }

                .form-title {
                    font-size: 22px;
                }

                .google-btn {
                    padding: 12px 16px;
                    font-size: 15px;
                }

                .form-control {
                    padding: 12px 14px;
                    font-size: 15px;
                }

                .submit-btn {
                    padding: 14px;
                    font-size: 15px;
                }

                .toggle-btn {
                    padding: 10px 16px;
                    font-size: 13px;
                }
            }

            @media (max-width: 480px) {
                .signup-container {
                    padding: 25px 20px;
                }

                .form-section {
                    padding: 20px 15px;
                }
            }
        </style>

    </head>

    <body>
        
        <!-- Custom Navbar -->
        <?php echo child_theme_custom_navbar(); ?>

        <div class="floating-shapes">
            <div class="shape"></div>
            <div class="shape"></div>
            <div class="shape"></div>
        </div>

        <main class="main-content">
            
            <div class="signup-container">
                <!-- Mode Toggle -->
                <div class="mode-toggle">
                    <button class="toggle-btn active" data-mode="signup">
                        <i class="fas fa-user-plus me-2"></i>Sign Up
                    </button>
                    <button class="toggle-btn" data-mode="login">
                        <i class="fas fa-sign-in-alt me-2"></i>Login
                    </button>
                </div>

                <div class="google-signin">
                    <a href="#" class="google-btn" id="googleSignIn">
                        <svg class="google-icon" viewBox="0 0 24 24">
                            <path fill="#4285F4" d="M22.56 12.25c0-.78-.07-1.53-.2-2.25H12v4.26h5.92c-.26 1.37-1.04 2.53-2.21 3.31v2.77h3.57c2.08-1.92 3.28-4.74 3.28-8.09z"/>
                            <path fill="#34A853" d="M12 23c2.97 0 5.46-.98 7.28-2.66l-3.57-2.77c-.98.66-2.23 1.06-3.71 1.06-2.86 0-5.29-1.93-6.16-4.53H2.18v2.84C3.99 20.53 7.7 23 12 23z"/>
                            <path fill="#FBBC05" d="M5.84 14.09c-.22-.66-.35-1.36-.35-2.09s.13-1.43.35-2.09V7.07H2.18C1.43 8.55 1 10.22 1 12s.43 3.45 1.18 4.93l2.85-2.22.81-.62z"/>
                            <path fill="#EA4335" d="M12 5.38c1.62 0 3.06.56 4.21 1.64l3.15-3.15C17.45 2.09 14.97 1 12 1 7.7 1 3.99 3.47 2.18 7.07l3.66 2.84c.87-2.6 3.3-4.53 6.16-4.53z"/>
                        </svg>
                        <span id="googleBtnText">Continue with Google</span>
                    </a>
                    <div class="work-note">
                        <i class="fas fa-info-circle me-2"></i>
                        Currently under work - Google sign-in functionality
                    </div>
                </div>

                <div class="divider-section">
                    <div class="divider"></div>
                    <div class="divider-text" id="dividerText">Or continue with email</div>
                </div>

                <div class="form-section">
                    
                    <div class="message-container" id="messageContainer"></div>
                    
                    <div class="form-container">
                        <!-- Signup Form -->
                        <div class="form-view" id="signupView">
                            <h2 class="form-title">Please fill this form</h2>
                            <p class="form-subtitle">Create your account to get started</p>
                            
                            <form id="signupForm" name="signupForm" method="post">
                                <!-- <?php wp_nonce_field('signup_form_nonce', 'signup_nonce'); ?> -->
                                <input type="hidden" name="signup_submit" value="true">
                                <input type="hidden" name="source" value="<?= $source ?? ''; ?>">

                                <div class="form-group">
                                    <label class="form-label" for="signupFullName">Full Name</label>
                                    <input type="text" class="form-control" id="signupFullName" name="signupFullName" placeholder="Enter your full name" required>
                                </div>

                                <div class="form-group">
                                    <label class="form-label" for="signupEmail">Email</label>
                                    <input type="email" class="form-control" id="signupEmail" name="signupEmail" placeholder="Enter your email address" required>
                                </div>

                                <div class="form-group">
                                    <label class="form-label" for="signupPassword">Password</label>
                                    <input type="password" class="form-control" id="signupPassword" name="signupPassword" placeholder="Create a strong password" required>
                                </div>

                                <div class="form-group">
                                    <label class="form-label" for="signupCompany">Company</label>
                                    <input type="text" class="form-control" id="signupCompany" name="signupCompany" placeholder="Enter your company name" required>
                                </div>

                                <button type="submit" class="submit-btn" id="signupSubmitBtn">
                                    <i class="fas fa-user-plus me-2"></i>
                                    Create Account
                                </button>
                            </form>
                        </div>

                        <!-- Login Form -->
                        <div class="form-view hidden" id="loginView">
                            <h2 class="form-title">Welcome back</h2>
                            <p class="form-subtitle">Sign in to your account</p>
                            
                            <form id="loginForm" name="loginForm" method="post">
                                <?php //wp_nonce_field('login_form_nonce', 'login_nonce'); ?>
                                <input type="hidden" name="login_submit" value="true">
                                <input type="hidden" name="source" value="<?= $source ?? ''; ?>">

                                <div class="form-group">
                                    <label class="form-label" for="loginEmail">Email</label>
                                    <input type="email" class="form-control" id="loginEmail" name="email" placeholder="Enter your email address" required>
                                </div>

                                <div class="form-group">
                                    <label class="form-label" for="loginPassword">Password</label>
                                    <input type="password" class="form-control" id="loginPassword" name="password" placeholder="Enter your password" required>
                                </div>

                                <button type="submit" class="submit-btn" id="loginSubmitBtn">
                                    <i class="fas fa-sign-in-alt me-2"></i>
                                    Sign In
                                </button>
                            </form>
                        </div>
                    </div>

                </div>
            </div>
        </main>

        <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.0/js/bootstrap.bundle.min.js"></script>
        
        <script>
            // Global variables
            let currentMode = 'signup';

            // Initialize the app
            document.addEventListener('DOMContentLoaded', function() {
                initializeApp();
            });

            function initializeApp() {
                setupModeToggle();
                setupFormHandlers();
                setupGoogleSignIn();
                setupInputEffects();
                setupEntranceAnimation();
            }

            // Mode Toggle Functionality
            function setupModeToggle() {
                const toggleBtns = document.querySelectorAll('.toggle-btn');
                
                toggleBtns.forEach(btn => {
                    btn.addEventListener('click', function() {
                        const mode = this.getAttribute('data-mode');
                        switchMode(mode);
                    });
                });
            }

            function switchMode(mode) {
                if (currentMode === mode) return;
                
                currentMode = mode;
                
                // Update toggle buttons
                document.querySelectorAll('.toggle-btn').forEach(btn => {
                    btn.classList.toggle('active', btn.getAttribute('data-mode') === mode);
                });
                
                // Update views
                const signupView = document.getElementById('signupView');
                const loginView = document.getElementById('loginView');
                
                if (mode === 'signup') {
                    signupView.classList.remove('hidden');
                    loginView.classList.add('hidden');
                    updateUIForMode('signup');
                } else {
                    loginView.classList.remove('hidden');
                    signupView.classList.add('hidden');
                    updateUIForMode('login');
                }
                
                // Clear messages and reset forms
                clearMessages();
                resetForms();
            }

            function updateUIForMode(mode) {
                const googleBtnText = document.getElementById('googleBtnText');
                const dividerText = document.getElementById('dividerText');
                
                if (mode === 'signup') {
                    googleBtnText.textContent = 'Continue with Google';
                    dividerText.textContent = 'Or continue with email';
                } else {
                    googleBtnText.textContent = 'Sign in with Google';
                    dividerText.textContent = 'Or sign in with email';
                }
            }

            // Form Handlers
            function setupFormHandlers() {
                // Signup form handler
                document.getElementById('signupForm').addEventListener('submit', function(e) {
                    e.preventDefault();
                    handleFormSubmission('signup', this);
                });
                
                // Login form handler
                document.getElementById('loginForm').addEventListener('submit', function(e) {
                    e.preventDefault();
                    handleFormSubmission('login', this);
                });
            }

            function handleFormSubmission(type, form) {
                const submitBtn = form.querySelector('.submit-btn');
                const originalText = submitBtn.innerHTML;
                
                // Show loading state
                if (type === 'signup') {
                    submitBtn.innerHTML = '<i class="fas fa-spinner fa-spin me-2"></i>Creating Account...';
                } else {
                    submitBtn.innerHTML = '<i class="fas fa-spinner fa-spin me-2"></i>Signing In...';
                }
                submitBtn.disabled = true;
                
                // Clear previous messages
                clearMessages();
                
                // Get form data
                const formData = getFormData(type, form);

                let fullName = ""; let email = ""; let password = ""; let company = "";
                let source = "";

                // Get form values
                if (type === 'signup') {
                    fullName = document.getElementById('signupFullName').value.trim();
                    email = document.getElementById('signupEmail').value.trim();
                    password = document.getElementById('signupPassword').value;
                    company = document.getElementById('signupCompany').value.trim();
                    source = document.querySelector('input[name="source"]').value;
                }else {
                    email = document.getElementById('loginEmail').value.trim();
                    password = document.getElementById('loginPassword').value;
                    source = document.querySelector('input[name="source"]').value;
                }

                console.log('Form Data:', formData);
                console.log(type, fullName, email, password, company, source);

                // Make AJAX request
                const action = type === 'signup' ? 'handle_signup' : 'handle_login';
                
                fetch('<?= admin_url("admin-ajax.php") ?>', {
                    method: 'POST',
                    headers: {
                        'Content-Type': 'application/x-www-form-urlencoded',
                    },
                    body: new URLSearchParams({
                        action: action,
                        fullName, email,
                        password, company,
                        source: source, // Include the source parameter
                    }).toString()
                })
                .then(response => response.json())
                .then(data => {
                    if (data.success) {
                        showMessage(data.data.message, 'success');
                        
                        if (type === 'signup') {
                            // Reset form
                            form.reset();
                            
                            // Redirect after short delay
                            setTimeout(() => {
                                window.location.href = data.data.redirect_url;
                            }, 1500);
                            
                        } else {
                            // Login successful - redirect immediately
                            setTimeout(() => {
                                window.location.href = data.data.redirect_url || '/dashboard';
                            }, 1000);
                        }
                    } else {
                        showMessage(data.data.message, 'error');
                    }
                })
                .catch(error => {
                    console.error('Error:', error);
                    showMessage('An error occurred. Please check your details and try again.', 'error');
                })
                .finally(() => {
                    // Reset button
                    submitBtn.innerHTML = originalText;
                    submitBtn.disabled = false;
                });
            }

            function getFormData(type, form) {
                if (type === 'signup') {
                    return {
                        fullName: form.querySelector('#signupFullName').value.trim(),
                        email: form.querySelector('#signupEmail').value.trim(),
                        password: form.querySelector('#signupPassword').value,
                        company: form.querySelector('#signupCompany').value.trim(),
                        source: form.querySelector('input[name="source"]').value,
                        // signup_nonce: form.querySelector('input[name="signup_nonce"]').value
                    };
                } else {
                    return {
                        email: form.querySelector('#loginEmail').value.trim(),
                        password: form.querySelector('#loginPassword').value,
                        source: form.querySelector('input[name="source"]').value,
                        // login_nonce: form.querySelector('input[name="login_nonce"]').value
                    };
                }
            }

            // Message Functions
            function showMessage(message, type = 'success') {
                const container = document.getElementById('messageContainer');
                
                const messageEl = document.createElement('div');
                messageEl.className = `message ${type}`;
                
                const icon = type === 'success' ? 'fas fa-check-circle' : 'fas fa-exclamation-triangle';
                messageEl.innerHTML = `<i class="${icon}"></i><span>${message}</span>`;
                
                container.appendChild(messageEl);
                
                // Trigger animation
                setTimeout(() => {
                    messageEl.classList.add('show');
                }, 100);
                
                // Auto-remove after 5 seconds for non-success messages
                if (type !== 'success') {
                    setTimeout(() => {
                        removeMessage(messageEl);
                    }, 5000);
                }
            }

            function removeMessage(messageEl) {
                messageEl.classList.remove('show');
                setTimeout(() => {
                    if (messageEl.parentNode) {
                        messageEl.parentNode.removeChild(messageEl);
                    }
                }, 300);
            }

            function clearMessages() {
                const container = document.getElementById('messageContainer');
                container.innerHTML = '';
            }

            function resetForms() {
                document.getElementById('signupForm').reset();
                document.getElementById('loginForm').reset();
            }

            // Google Sign-in Handler
            function setupGoogleSignIn() {
                document.getElementById('googleSignIn').addEventListener('click', function(e) {
                    e.preventDefault();
                    const message = currentMode === 'signup' 
                        ? 'Google Sign-up is currently under development. Please use the email form below.'
                        : 'Google Sign-in is currently under development. Please use the email form below.';
                    alert(message);
                });
            }

            // Input Effects
            function setupInputEffects() {
                document.querySelectorAll('.form-control').forEach(input => {
                    input.addEventListener('focus', function() {
                        this.parentElement.classList.add('focused');
                    });
                    
                    input.addEventListener('blur', function() {
                        this.parentElement.classList.remove('focused');
                    });
                });
            }

            // Entrance Animation
            function setupEntranceAnimation() {
                const container = document.querySelector('.signup-container');
                container.style.opacity = '0';
                container.style.transform = 'translateY(30px)';
                
                setTimeout(() => {
                    container.style.transition = 'all 0.6s ease';
                    container.style.opacity = '1';
                    container.style.transform = 'translateY(0)';
                }, 100);
            }
        
        </script>

    </body>