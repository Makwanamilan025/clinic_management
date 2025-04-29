<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>MediCare - Clinic Management System</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <style>
        /* Global Styles */
        :root {
            --primary-color: #2c7be5;
            --secondary-color: #00d97e;
            --dark-color: #12263f;
            --light-color: #f9fbfd;
            --danger-color: #e63757;
        }

        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
        }

        body {
            background-color: var(--light-color);
            color: var(--dark-color);
            line-height: 1.6;
        }

        .container {
            max-width: 1200px;
            margin: 0 auto;
            padding: 0 20px;
        }

        .btn {
            display: inline-block;
            background: var(--primary-color);
            color: white;
            padding: 10px 20px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            text-decoration: none;
            font-size: 16px;
            transition: all 0.3s ease;
        }

        .btn:hover {
            background: #1a68d1;
            transform: translateY(-2px);
        }

        .btn-secondary {
            background: var(--secondary-color);
        }

        .btn-secondary:hover {
            background: #00c571;
        }

        .text-center {
            text-align: center;
        }

        /* Header */
        header {
            background-color: white;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
            position: fixed;
            width: 100%;
            z-index: 100;
        }

        .navbar {
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding: 20px 0;
        }

        .logo {
            font-size: 24px;
            font-weight: 700;
            color: var(--primary-color);
            text-decoration: none;
        }

        .logo span {
            color: var(--secondary-color);
        }

        .nav-links {
            display: flex;
            list-style: none;
        }

        .nav-links li {
            margin-left: 30px;
        }

        .nav-links a {
            text-decoration: none;
            color: var(--dark-color);
            font-weight: 500;
            transition: color 0.3s ease;
        }

        .nav-links a:hover {
            color: var(--primary-color);
        }

        .mobile-menu {
            display: none;
            font-size: 24px;
            cursor: pointer;
        }

        /* Hero Section */
        .hero {
            padding: 150px 0 100px;
            background: linear-gradient(135deg, #f5f9ff 0%, #e8f4ff 100%);
        }

        .hero-content {
            display: flex;
            align-items: center;
            justify-content: space-between;
        }

        .hero-text {
            flex: 1;
            padding-right: 50px;
        }

        .hero-text h1 {
            font-size: 48px;
            margin-bottom: 20px;
            color: var(--dark-color);
        }

        .hero-text p {
            font-size: 18px;
            margin-bottom: 30px;
            color: #6e84a3;
        }

        .hero-buttons {
            display: flex;
            gap: 15px;
        }

        .hero-image {
            flex: 1;
        }

        .hero-image img {
            width: 100%;
            border-radius: 10px;
            box-shadow: 0 20px 40px rgba(0, 0, 0, 0.1);
            animation: float 3s ease-in-out infinite;
        }

        @keyframes float {
            0% { transform: translateY(0px); }
            50% { transform: translateY(-20px); }
            100% { transform: translateY(0px); }
        }

        /* Features Section */
        .features {
            padding: 100px 0;
            background-color: white;
        }

        .section-title {
            text-align: center;
            margin-bottom: 60px;
        }

        .section-title h2 {
            font-size: 36px;
            color: var(--dark-color);
            margin-bottom: 15px;
        }

        .section-title p {
            color: #6e84a3;
            max-width: 600px;
            margin: 0 auto;
        }

        .features-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(300px, 1fr));
            gap: 30px;
        }

        .feature-card {
            background: white;
            border-radius: 10px;
            padding: 30px;
            box-shadow: 0 5px 15px rgba(0, 0, 0, 0.05);
            transition: transform 0.3s ease, box-shadow 0.3s ease;
        }

        .feature-card:hover {
            transform: translateY(-10px);
            box-shadow: 0 15px 30px rgba(0, 0, 0, 0.1);
        }

        .feature-icon {
            font-size: 40px;
            color: var(--primary-color);
            margin-bottom: 20px;
        }

        .feature-card h3 {
            font-size: 22px;
            margin-bottom: 15px;
            color: var(--dark-color);
        }

        .feature-card p {
            color: #6e84a3;
        }

        /* How It Works */
        .how-it-works {
            padding: 100px 0;
            background: linear-gradient(135deg, #f5f9ff 0%, #e8f4ff 100%);
        }

        .steps {
            display: flex;
            justify-content: space-between;
            margin-top: 50px;
            position: relative;
        }

        .step {
            flex: 1;
            text-align: center;
            padding: 0 20px;
            position: relative;
            z-index: 1;
        }

        .step-number {
            width: 60px;
            height: 60px;
            background: var(--primary-color);
            color: white;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 24px;
            font-weight: bold;
            margin: 0 auto 20px;
        }

        .step h3 {
            margin-bottom: 15px;
            color: var(--dark-color);
        }

        .step p {
            color: #6e84a3;
        }

        .steps::before {
            content: '';
            position: absolute;
            top: 30px;
            left: 0;
            right: 0;
            height: 2px;
            background: var(--primary-color);
            z-index: 0;
        }

        /* Testimonials */
        .testimonials {
            padding: 100px 0;
            background-color: white;
        }

        .testimonial-slider {
            max-width: 800px;
            margin: 0 auto;
            position: relative;
        }

        .testimonial {
            background: white;
            padding: 40px;
            border-radius: 10px;
            box-shadow: 0 5px 15px rgba(0, 0, 0, 0.05);
            text-align: center;
            display: none;
        }

        .testimonial.active {
            display: block;
            animation: fadeIn 0.5s ease;
        }

        @keyframes fadeIn {
            from { opacity: 0; }
            to { opacity: 1; }
        }

        .testimonial img {
            width: 80px;
            height: 80px;
            border-radius: 50%;
            object-fit: cover;
            margin-bottom: 20px;
            border: 3px solid var(--primary-color);
        }

        .testimonial p {
            font-style: italic;
            margin-bottom: 20px;
            color: #6e84a3;
        }

        .testimonial h4 {
            color: var(--dark-color);
            margin-bottom: 5px;
        }

        .testimonial .role {
            color: var(--primary-color);
            font-size: 14px;
        }

        .slider-controls {
            display: flex;
            justify-content: center;
            margin-top: 30px;
        }

        .slider-dot {
            width: 12px;
            height: 12px;
            background: #d1d7e0;
            border-radius: 50%;
            margin: 0 5px;
            cursor: pointer;
            transition: background 0.3s ease;
        }

        .slider-dot.active {
            background: var(--primary-color);
        }

        /* Pricing */
        .pricing {
            padding: 100px 0;
            background: linear-gradient(135deg, #f5f9ff 0%, #e8f4ff 100%);
        }

        .pricing-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(300px, 1fr));
            gap: 30px;
            margin-top: 50px;
        }

        .pricing-card {
            background: white;
            border-radius: 10px;
            padding: 40px 30px;
            box-shadow: 0 5px 15px rgba(0, 0, 0, 0.05);
            text-align: center;
            transition: transform 0.3s ease;
        }

        .pricing-card:hover {
            transform: translateY(-10px);
        }

        .pricing-card.popular {
            border: 2px solid var(--primary-color);
            position: relative;
        }

        .popular-tag {
            position: absolute;
            top: -15px;
            right: 20px;
            background: var(--primary-color);
            color: white;
            padding: 5px 15px;
            border-radius: 20px;
            font-size: 12px;
            font-weight: bold;
        }

        .pricing-card h3 {
            font-size: 24px;
            margin-bottom: 20px;
            color: var(--dark-color);
        }

        .price {
            font-size: 48px;
            font-weight: bold;
            color: var(--primary-color);
            margin-bottom: 20px;
        }

        .price span {
            font-size: 16px;
            color: #6e84a3;
        }

        .pricing-features {
            list-style: none;
            margin-bottom: 30px;
        }

        .pricing-features li {
            padding: 10px 0;
            border-bottom: 1px solid #f0f4f9;
            color: #6e84a3;
        }

        /* CTA Section */
        .cta {
            padding: 100px 0;
            background: var(--primary-color);
            color: white;
            text-align: center;
        }

        .cta h2 {
            font-size: 36px;
            margin-bottom: 20px;
        }

        .cta p {
            max-width: 600px;
            margin: 0 auto 30px;
            opacity: 0.9;
        }

        /* Footer */
        footer {
            background: var(--dark-color);
            color: white;
            padding: 80px 0 30px;
        }

        .footer-content {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(200px, 1fr));
            gap: 40px;
            margin-bottom: 50px;
        }

        .footer-column h3 {
            font-size: 18px;
            margin-bottom: 20px;
            position: relative;
            padding-bottom: 10px;
        }

        .footer-column h3::after {
            content: '';
            position: absolute;
            left: 0;
            bottom: 0;
            width: 40px;
            height: 2px;
            background: var(--primary-color);
        }

        .footer-column ul {
            list-style: none;
        }

        .footer-column ul li {
            margin-bottom: 10px;
        }

        .footer-column ul li a {
            color: #a7b8d1;
            text-decoration: none;
            transition: color 0.3s ease;
        }

        .footer-column ul li a:hover {
            color: white;
        }

        .social-links {
            display: flex;
            gap: 15px;
        }

        .social-links a {
            color: white;
            background: rgba(255, 255, 255, 0.1);
            width: 40px;
            height: 40px;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            transition: background 0.3s ease;
        }

        .social-links a:hover {
            background: var(--primary-color);
        }

        .footer-bottom {
            text-align: center;
            padding-top: 30px;
            border-top: 1px solid rgba(255, 255, 255, 0.1);
            color: #a7b8d1;
            font-size: 14px;
        }

        /* Responsive Design */
        @media (max-width: 992px) {
            .hero-content {
                flex-direction: column;
            }

            .hero-text {
                padding-right: 0;
                margin-bottom: 50px;
                text-align: center;
            }

            .hero-buttons {
                justify-content: center;
            }

            .steps {
                flex-direction: column;
            }

            .step {
                margin-bottom: 40px;
            }

            .steps::before {
                display: none;
            }
        }

        @media (max-width: 768px) {
            .nav-links {
                display: none;
                position: absolute;
                top: 80px;
                left: 0;
                right: 0;
                background: white;
                flex-direction: column;
                padding: 20px;
                box-shadow: 0 5px 10px rgba(0, 0, 0, 0.1);
            }

            .nav-links.active {
                display: flex;
            }

            .nav-links li {
                margin: 10px 0;
            }

            .mobile-menu {
                display: block;
            }

            .hero-text h1 {
                font-size: 36px;
            }

            .section-title h2 {
                font-size: 30px;
            }
        }
    </style>
</head>
<body>
    <!-- Header -->
    <header>
        <div class="container">
            <nav class="navbar">
                <a href="#" class="logo">Medi<span>Care</span></a>
                <ul class="nav-links">
                    <li><a href="#features">Features</a></li>
                    <li><a href="#how-it-works">How It Works</a></li>
                    <li><a href="#testimonials">Testimonials</a></li>
                    <li><a href="#pricing">Pricing</a></li>
                    <li><a href="#contact">Contact</a></li>
                </ul>
                <div class="mobile-menu">
                    <i class="fas fa-bars"></i>
                </div>
            </nav>
        </div>
    </header>

    <!-- Hero Section -->
    <section class="hero">
        <div class="container">
            <div class="hero-content">
                <div class="hero-text">
                    <h1>Streamline Your Clinic Operations</h1>
                    <p>MediCare is a comprehensive clinic management system that helps you manage appointments, patients, billing, and more with ease.</p>
                    <div class="hero-buttons">
                        <a href="#" class="btn">Get Started</a>
                        <a href="#" class="btn btn-secondary">Demo</a>
                    </div>
                </div>
                <div class="hero-image">
                    <img src="https://images.unsplash.com/photo-1579684385127-1ef15d508118?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=880&q=80" alt="Clinic Management Dashboard">
                </div>
            </div>
        </div>
    </section>

    <!-- Features Section -->
    <section class="features" id="features">
        <div class="container">
            <div class="section-title">
                <h2>Powerful Features</h2>
                <p>Designed to simplify clinic management and improve patient care</p>
            </div>
            <div class="features-grid">
                <div class="feature-card">
                    <div class="feature-icon">
                        <i class="fas fa-calendar-check"></i>
                    </div>
                    <h3>Appointment Scheduling</h3>
                    <p>Easily manage patient appointments with our intuitive calendar system that reduces no-shows and optimizes your schedule.</p>
                </div>
                <div class="feature-card">
                    <div class="feature-icon">
                        <i class="fas fa-user-injured"></i>
                    </div>
                    <h3>Patient Management</h3>
                    <p>Comprehensive patient records with medical history, prescriptions, and treatment plans all in one place.</p>
                </div>
                <div class="feature-card">
                    <div class="feature-icon">
                        <i class="fas fa-file-invoice-dollar"></i>
                    </div>
                    <h3>Billing & Invoicing</h3>
                    <p>Automated billing system that integrates with insurance providers and generates invoices with just a few clicks.</p>
                </div>
                <div class="feature-card">
                    <div class="feature-icon">
                        <i class="fas fa-pills"></i>
                    </div>
                    <h3>Inventory Management</h3>
                    <p>Track medical supplies, medications, and equipment with automated alerts for low stock levels.</p>
                </div>
                <div class="feature-card">
                    <div class="feature-icon">
                        <i class="fas fa-chart-line"></i>
                    </div>
                    <h3>Reporting & Analytics</h3>
                    <p>Generate detailed reports on clinic performance, patient statistics, and financial metrics.</p>
                </div>
                <div class="feature-card">
                    <div class="feature-icon">
                        <i class="fas fa-mobile-alt"></i>
                    </div>
                    <h3>Mobile Access</h3>
                    <p>Access your clinic data anytime, anywhere with our fully responsive mobile-friendly interface.</p>
                </div>
            </div>
        </div>
    </section>

    <!-- How It Works -->
    <section class="how-it-works" id="how-it-works">
        <div class="container">
            <div class="section-title">
                <h2>How It Works</h2>
                <p>Get started with MediCare in just a few simple steps</p>
            </div>
            <div class="steps">
                <div class="step">
                    <div class="step-number">1</div>
                    <h3>Sign Up</h3>
                    <p>Create your account and set up your clinic profile with basic information.</p>
                </div>
                <div class="step">
                    <div class="step-number">2</div>
                    <h3>Customize</h3>
                    <p>Configure the system to match your clinic's workflow and preferences.</p>
                </div>
                <div class="step">
                    <div class="step-number">3</div>
                    <h3>Import Data</h3>
                    <p>Easily import your existing patient records and clinic data.</p>
                </div>
                <div class="step">
                    <div class="step-number">4</div>
                    <h3>Go Live</h3>
                    <p>Start using MediCare to manage your clinic operations efficiently.</p>
                </div>
            </div>
        </div>
    </section>

    <!-- Testimonials -->
    <section class="testimonials" id="testimonials">
        <div class="container">
            <div class="section-title">
                <h2>What Our Clients Say</h2>
                <p>Hear from healthcare professionals who transformed their clinics with MediCare</p>
            </div>
            <div class="testimonial-slider">
                <div class="testimonial active">
                    <img src="https://randomuser.me/api/portraits/women/45.jpg" alt="Dr. Sarah Johnson">
                    <p>"Since implementing MediCare, our clinic's efficiency has improved by 40%. The appointment scheduling system alone has reduced our no-show rate significantly."</p>
                    <h4>Dr. Sarah Johnson</h4>
                    <div class="role">Family Physician</div>
                </div>
                <div class="testimonial">
                    <img src="https://randomuser.me/api/portraits/men/32.jpg" alt="Dr. Michael Chen">
                    <p>"The billing module has saved us countless hours each week. Integration with insurance providers is seamless, and our revenue cycle has improved dramatically."</p>
                    <h4>Dr. Michael Chen</h4>
                    <div class="role">Dental Surgeon</div>
                </div>
                <div class="testimonial">
                    <img src="https://randomuser.me/api/portraits/women/68.jpg" alt="Nurse Emily Rodriguez">
                    <p>"As a nurse, I appreciate how easy it is to access patient records and update treatment plans. The mobile access has been a game-changer for our busy practice."</p>
                    <h4>Nurse Emily Rodriguez</h4>
                    <div class="role">Pediatric Clinic</div>
                </div>
                <div class="slider-controls">
                    <div class="slider-dot active" data-slide="0"></div>
                    <div class="slider-dot" data-slide="1"></div>
                    <div class="slider-dot" data-slide="2"></div>
                </div>
            </div>
        </div>
    </section>

    <!-- Pricing -->
    <section class="pricing" id="pricing">
        <div class="container">
            <div class="section-title">
                <h2>Simple, Transparent Pricing</h2>
                <p>Choose the plan that fits your clinic's needs</p>
            </div>
            <div class="pricing-grid">
                <div class="pricing-card">
                    <h3>Basic</h3>
                    <div class="price">$49<span>/month</span></div>
                    <ul class="pricing-features">
                        <li>Up to 5 staff users</li>
                        <li>Appointment scheduling</li>
                        <li>Patient records</li>
                        <li>Basic reporting</li>
                        <li>Email support</li>
                    </ul>
                    <a href="#" class="btn">Get Started</a>
                </div>
                <div class="pricing-card popular">
                    <div class="popular-tag">Most Popular</div>
                    <h3>Professional</h3>
                    <div class="price">$99<span>/month</span></div>
                    <ul class="pricing-features">
                        <li>Up to 15 staff users</li>
                        <li>Advanced scheduling</li>
                        <li>Billing & invoicing</li>
                        <li>Inventory management</li>
                        <li>Priority support</li>
                    </ul>
                    <a href="#" class="btn">Get Started</a>
                </div>
                <div class="pricing-card">
                    <h3>Enterprise</h3>
                    <div class="price">$199<span>/month</span></div>
                    <ul class="pricing-features">
                        <li>Unlimited staff users</li>
                        <li>Multi-location support</li>
                        <li>Custom reporting</li>
                        <li>API access</li>
                        <li>24/7 dedicated support</li>
                    </ul>
                    <a href="#" class="btn">Get Started</a>
                </div>
            </div>
        </div>
    </section>

    <!-- CTA Section -->
    <section class="cta">
        <div class="container">
            <h2>Ready to Transform Your Clinic?</h2>
            <p>Join thousands of healthcare professionals who trust MediCare to streamline their operations and provide better patient care.</p>
            <a href="#" class="btn btn-secondary">Start Your Free Trial</a>
        </div>
    </section>

    <!-- Footer -->
    <footer id="contact">
        <div class="container">
            <div class="footer-content">
                <div class="footer-column">
                    <h3>MediCare</h3>
                    <p>Comprehensive clinic management software designed to simplify healthcare administration and improve patient care.</p>
                    <div class="social-links">
                        <a href="#"><i class="fab fa-facebook-f"></i></a>
                        <a href="#"><i class="fab fa-twitter"></i></a>
                        <a href="#"><i class="fab fa-linkedin-in"></i></a>
                        <a href="#"><i class="fab fa-instagram"></i></a>
                    </div>
                </div>
                <div class="footer-column">
                    <h3>Quick Links</h3>
                    <ul>
                        <li><a href="#features">Features</a></li>
                        <li><a href="#how-it-works">How It Works</a></li>
                        <li><a href="#pricing">Pricing</a></li>
                        <li><a href="#testimonials">Testimonials</a></li>
                    </ul>
                </div>
                <div class="footer-column">
                    <h3>Resources</h3>
                    <ul>
                        <li><a href="#">Blog</a></li>
                        <li><a href="#">Help Center</a></li>
                        <li><a href="#">API Documentation</a></li>
                        <li><a href="#">Status</a></li>
                    </ul>
                </div>
                <div class="footer-column">
                    <h3>Contact Us</h3>
                    <ul>
                        <li><i class="fas fa-map-marker-alt"></i> 123 Healthcare St, Medical City</li>
                        <li><i class="fas fa-phone"></i> (123) 456-7890</li>
                        <li><i class="fas fa-envelope"></i> info@medicare.com</li>
                    </ul>
                </div>
            </div>
            <div class="footer-bottom">
                <p>&copy; 2023 MediCare Clinic Management System. All rights reserved.</p>
            </div>
        </div>
    </footer>

    <script>
        // Mobile Menu Toggle
        const mobileMenuBtn = document.querySelector('.mobile-menu');
        const navLinks = document.querySelector('.nav-links');

        mobileMenuBtn.addEventListener('click', () => {
            navLinks.classList.toggle('active');
        });

        // Smooth Scrolling for Anchor Links
        document.querySelectorAll('a[href^="#"]').forEach(anchor => {
            anchor.addEventListener('click', function(e) {
                e.preventDefault();

                const targetId = this.getAttribute('href');
                if (targetId === '#') return;

                const targetElement = document.querySelector(targetId);
                if (targetElement) {
                    // Close mobile menu if open
                    navLinks.classList.remove('active');

                    window.scrollTo({
                        top: targetElement.offsetTop - 80,
                        behavior: 'smooth'
                    });
                }
            });
        });

        // Testimonial Slider
        const testimonials = document.querySelectorAll('.testimonial');
        const dots = document.querySelectorAll('.slider-dot');
        let currentSlide = 0;

        function showSlide(index) {
            testimonials.forEach(testimonial => testimonial.classList.remove('active'));
            dots.forEach(dot => dot.classList.remove('active'));

            testimonials[index].classList.add('active');
            dots[index].classList.add('active');
            currentSlide = index;
        }

        dots.forEach((dot, index) => {
            dot.addEventListener('click', () => showSlide(index));
        });

        // Auto slide change
        setInterval(() => {
            let nextSlide = (currentSlide + 1) % testimonials.length;
            showSlide(nextSlide);
        }, 5000);

        // Sticky Header on Scroll
        window.addEventListener('scroll', () => {
            const header = document.querySelector('header');
            header.classList.toggle('sticky', window.scrollY > 0);
        });
    </script>
</body>
</html>