<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>MediCare - Clinic Management System</title>
    <style>
        /* Reset and Base Styles */
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            line-height: 1.6;
            color: #333;
            background-color: #f9fafb;
        }

        a {
            text-decoration: none;
            color: #0070f3;
        }

        ul {
            list-style: none;
        }

        img {
            max-width: 100%;
        }

        .container {
            max-width: 1200px;
            margin: 0 auto;
            padding: 0 20px;
        }

        .btn {
            display: inline-block;
            padding: 12px 30px;
            background: #0070f3;
            color: white;
            border-radius: 5px;
            font-weight: 600;
            transition: all 0.3s ease;
            border: none;
            cursor: pointer;
        }

        .btn:hover {
            background: #005ad1;
            transform: translateY(-2px);
            box-shadow: 0 10px 25px rgba(0, 112, 243, 0.2);
        }

        .btn-secondary {
            background: white;
            color: #0070f3;
            border: 1px solid #0070f3;
        }

        .btn-secondary:hover {
            background: #f5f9ff;
            color: #005ad1;
        }

        .section {
            padding: 80px 0;
        }

        .section-title {
            text-align: center;
            margin-bottom: 60px;
            font-size: 2.5rem;
            color: #2d3748;
        }

        .section-subtitle {
            text-align: center;
            margin-bottom: 60px;
            font-size: 1.2rem;
            color: #718096;
            max-width: 700px;
            margin-left: auto;
            margin-right: auto;
        }

        /* Header */
        header {
            background-color: white;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.05);
            position: fixed;
            width: 100%;
            z-index: 100;
        }

        .header-container {
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding: 20px 0;
        }

        .logo {
            font-size: 1.8rem;
            font-weight: 700;
            color: #0070f3;
        }

        .logo span {
            color: #2d3748;
        }

        nav ul {
            display: flex;
        }

        nav ul li {
            margin-left: 30px;
        }

        nav ul li a {
            color: #4a5568;
            font-weight: 500;
            transition: color 0.3s ease;
        }

        nav ul li a:hover {
            color: #0070f3;
        }

        .mobile-menu-btn {
            display: none;
            background: none;
            border: none;
            font-size: 1.5rem;
            cursor: pointer;
            color: #4a5568;
        }

        /* Hero Section */
        .hero {
            padding: 160px 0 100px;
            background: linear-gradient(135deg, #f0f7ff 0%, #e6f0fd 100%);
            position: relative;
            overflow: hidden;
        }

        .hero-content {
            display: flex;
            align-items: center;
            justify-content: space-between;
        }

        .hero-text {
            flex: 1;
            max-width: 600px;
        }

        .hero-title {
            font-size: 3.5rem;
            font-weight: 800;
            line-height: 1.2;
            margin-bottom: 20px;
            color: #2d3748;
        }

        .hero-subtitle {
            font-size: 1.25rem;
            color: #4a5568;
            margin-bottom: 30px;
        }

        .hero-btns {
            display: flex;
            gap: 15px;
        }

        .hero-image {
            flex: 1;
            text-align: right;
        }

        .hero-image img {
            max-width: 90%;
            animation: float 6s ease-in-out infinite;
        }

        @keyframes float {
            0% { transform: translateY(0px); }
            50% { transform: translateY(-20px); }
            100% { transform: translateY(0px); }
        }

        /* Features Section */
        .features {
            background-color: white;
        }

        .features-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(300px, 1fr));
            gap: 40px;
        }

        .feature-card {
            background: white;
            border-radius: 10px;
            padding: 30px;
            box-shadow: 0 10px 30px rgba(0, 0, 0, 0.05);
            transition: all 0.3s ease;
        }

        .feature-card:hover {
            transform: translateY(-10px);
            box-shadow: 0 15px 35px rgba(0, 0, 0, 0.1);
        }

        .feature-icon {
            width: 70px;
            height: 70px;
            background: #ebf5ff;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            margin-bottom: 20px;
            color: #0070f3;
            font-size: 1.8rem;
        }

        .feature-title {
            font-size: 1.5rem;
            margin-bottom: 15px;
            color: #2d3748;
        }

        .feature-desc {
            color: #718096;
        }

        /* Benefits Section */
        .benefits {
            background-color: #f9fafb;
        }

        .benefit-item {
            display: flex;
            align-items: center;
            margin-bottom: 60px;
        }

        .benefit-item:last-child {
            margin-bottom: 0;
        }

        .benefit-item:nth-child(even) {
            flex-direction: row-reverse;
        }

        .benefit-content {
            flex: 1;
            padding: 0 40px;
        }

        .benefit-image {
            flex: 1;
            text-align: center;
        }

        .benefit-image img {
            max-width: 80%;
            border-radius: 10px;
            box-shadow: 0 20px 40px rgba(0, 0, 0, 0.1);
        }

        .benefit-title {
            font-size: 2rem;
            margin-bottom: 20px;
            color: #2d3748;
        }

        .benefit-desc {
            color: #718096;
            margin-bottom: 25px;
        }

        /* Testimonials Section */
        .testimonials {
            background-color: white;
        }

        .testimonials-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(300px, 1fr));
            gap: 30px;
        }

        .testimonial-card {
            background: #f9fafb;
            border-radius: 10px;
            padding: 30px;
            box-shadow: 0 5px 15px rgba(0, 0, 0, 0.05);
        }

        .testimonial-text {
            font-style: italic;
            color: #4a5568;
            margin-bottom: 20px;
            position: relative;
        }

        .testimonial-text::before {
            content: '"';
            font-size: 4rem;
            color: #e2e8f0;
            position: absolute;
            top: -20px;
            left: -15px;
            z-index: 0;
        }

        .testimonial-author {
            display: flex;
            align-items: center;
        }

        .testimonial-author-image {
            width: 50px;
            height: 50px;
            border-radius: 50%;
            overflow: hidden;
            margin-right: 15px;
        }

        .testimonial-author-name {
            font-weight: 600;
            color: #2d3748;
        }

        .testimonial-author-title {
            font-size: 0.9rem;
            color: #718096;
        }

        /* Pricing Section */
        .pricing {
            background-color: #f9fafb;
        }

        .pricing-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(300px, 1fr));
            gap: 30px;
        }

        .pricing-card {
            background: white;
            border-radius: 10px;
            padding: 40px 30px;
            box-shadow: 0 10px 30px rgba(0, 0, 0, 0.05);
            text-align: center;
            transition: all 0.3s ease;
            position: relative;
            overflow: hidden;
        }

        .pricing-card.popular {
            transform: scale(1.05);
            border: 2px solid #0070f3;
        }

        .pricing-card.popular::before {
            content: 'Most Popular';
            position: absolute;
            top: 15px;
            right: -35px;
            background: #0070f3;
            color: white;
            padding: 5px 40px;
            font-size: 0.8rem;
            transform: rotate(45deg);
        }

        .pricing-card:hover {
            transform: translateY(-10px);
            box-shadow: 0 15px 35px rgba(0, 0, 0, 0.1);
        }

        .pricing-card.popular:hover {
            transform: scale(1.05) translateY(-10px);
        }

        .pricing-title {
            font-size: 1.5rem;
            color: #2d3748;
            margin-bottom: 15px;
        }

        .pricing-price {
            font-size: 3rem;
            font-weight: 700;
            color: #0070f3;
            margin-bottom: 20px;
        }

        .pricing-price span {
            font-size: 1rem;
            font-weight: 400;
            color: #718096;
        }

        .pricing-features {
            margin-bottom: 30px;
        }

        .pricing-features li {
            padding: 10px 0;
            border-bottom: 1px solid #e2e8f0;
            color: #4a5568;
        }

        .pricing-features li:last-child {
            border-bottom: none;
        }

        /* CTA Section */
        .cta {
            background: linear-gradient(135deg, #0070f3 0%, #00a1ff 100%);
            color: white;
            text-align: center;
            padding: 100px 0;
        }

        .cta-title {
            font-size: 2.5rem;
            margin-bottom: 20px;
        }

        .cta-subtitle {
            font-size: 1.2rem;
            margin-bottom: 40px;
            max-width: 700px;
            margin-left: auto;
            margin-right: auto;
            opacity: 0.9;
        }

        .cta-btn {
            background: white;
            color: #0070f3;
            font-size: 1.1rem;
            padding: 15px 40px;
        }

        .cta-btn:hover {
            background: #f5f9ff;
        }

        /* Contact Section */
        .contact {
            background-color: white;
        }

        .contact-container {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(300px, 1fr));
            gap: 50px;
        }

        .contact-info h3 {
            font-size: 1.8rem;
            margin-bottom: 20px;
            color: #2d3748;
        }

        .contact-info p {
            color: #718096;
            margin-bottom: 30px;
        }

        .contact-details {
            margin-bottom: 30px;
        }

        .contact-details-item {
            display: flex;
            align-items: center;
            margin-bottom: 15px;
        }

        .contact-icon {
            width: 40px;
            height: 40px;
            background: #ebf5ff;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            margin-right: 15px;
            color: #0070f3;
        }

        .contact-form {
            background: #f9fafb;
            padding: 40px;
            border-radius: 10px;
        }

        .form-group {
            margin-bottom: 20px;
        }

        .form-label {
            display: block;
            margin-bottom: 8px;
            font-weight: 500;
            color: #4a5568;
        }

        .form-control {
            width: 100%;
            padding: 12px 15px;
            border: 1px solid #e2e8f0;
            border-radius: 5px;
            font-size: 1rem;
            transition: all 0.3s ease;
        }

        .form-control:focus {
            outline: none;
            border-color: #0070f3;
            box-shadow: 0 0 0 3px rgba(0, 112, 243, 0.2);
        }

        textarea.form-control {
            min-height: 120px;
            resize: vertical;
        }

        /* Footer */
        footer {
            background-color: #2d3748;
            color: white;
            padding: 80px 0 30px;
        }

        .footer-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(200px, 1fr));
            gap: 40px;
            margin-bottom: 60px;
        }

        .footer-col h4 {
            font-size: 1.2rem;
            margin-bottom: 25px;
            position: relative;
        }

        .footer-col h4::after {
            content: '';
            position: absolute;
            left: 0;
            bottom: -10px;
            width: 30px;
            height: 2px;
            background: #0070f3;
        }

        .footer-col ul li {
            margin-bottom: 12px;
        }

        .footer-col ul li a {
            color: #cbd5e0;
            transition: all 0.3s ease;
        }

        .footer-col ul li a:hover {
            color: white;
            padding-left: 5px;
        }

        .footer-bottom {
            text-align: center;
            padding-top: 30px;
            border-top: 1px solid #4a5568;
            color: #cbd5e0;
            font-size: 0.9rem;
        }

        .social-links {
            display: flex;
            gap: 15px;
            margin-top: 20px;
        }

        .social-link {
            width: 40px;
            height: 40px;
            background: #4a5568;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            color: white;
            transition: all 0.3s ease;
        }

        .social-link:hover {
            background: #0070f3;
            transform: translateY(-5px);
        }

        /* Responsive Styles */
        @media (max-width: 992px) {
            .hero-title {
                font-size: 2.8rem;
            }

            .section-title {
                font-size: 2.2rem;
            }

            .benefit-item, .benefit-item:nth-child(even) {
                flex-direction: column;
            }

            .benefit-content {
                padding: 0;
                margin-bottom: 40px;
            }

            .pricing-card.popular {
                transform: scale(1);
            }

            .pricing-card.popular:hover {
                transform: translateY(-10px);
            }
        }

        @media (max-width: 768px) {
            .header-container {
                padding: 15px 0;
            }

            nav {
                position: fixed;
                top: 70px;
                left: -100%;
                width: 80%;
                height: calc(100vh - 70px);
                background: white;
                flex-direction: column;
                transition: all 0.3s ease;
                box-shadow: 0 10px 30px rgba(0, 0, 0, 0.1);
            }

            nav.active {
                left: 0;
            }

            nav ul {
                flex-direction: column;
                padding: 30px;
            }

            nav ul li {
                margin: 15px 0;
            }

            .mobile-menu-btn {
                display: block;
            }

            .hero {
                padding: 130px 0 70px;
            }

            .hero-content {
                flex-direction: column;
                text-align: center;
            }

            .hero-text {
                margin-bottom: 50px;
            }

            .hero-btns {
                justify-content: center;
            }

            .hero-title {
                font-size: 2.5rem;
            }

            .section {
                padding: 60px 0;
            }

            .section-title {
                font-size: 2rem;
                margin-bottom: 40px;
            }

            .feature-card, .testimonial-card, .pricing-card {
                padding: 25px 20px;
            }
        }

        @media (max-width: 576px) {
            .hero-title {
                font-size: 2rem;
            }

            .hero-subtitle {
                font-size: 1.1rem;
            }

            .hero-btns {
                flex-direction: column;
                gap: 10px;
            }

            .section-title {
                font-size: 1.8rem;
            }

            .benefit-title {
                font-size: 1.6rem;
            }

            .contact-form {
                padding: 25px;
            }
        }
    </style>
</head>
<body>
    <!-- Header -->
    <header>
        <div class="container header-container">
            <a href="#" class="logo">Medi<span>Care</span></a>
            <nav>
                <ul>
                    <li><a href="#features">Features</a></li>
                    <li><a href="#benefits">Benefits</a></li>
                    <li><a href="#pricing">Pricing</a></li>
                    <li><a href="#contact">Contact</a></li>
                </ul>
            </nav>
            <button class="mobile-menu-btn">☰</button>
        </div>
    </header>

    <!-- Hero Section -->
    <section class="hero" id="home">
        <div class="container hero-content">
            <div class="hero-text">
                <h1 class="hero-title">Streamline Your Clinic Management</h1>
                <p class="hero-subtitle">MediCare is an all-in-one clinic management system that helps healthcare providers manage appointments, patient records, billing, and more.</p>
                <div class="hero-btns">
                    <a href="#contact" class="btn">Get Started</a>
                    <a href="#features" class="btn btn-secondary">Learn More</a>
                </div>
            </div>
            <div class="hero-image">
                <img src="/placeholder.svg?height=400&width=500" alt="Clinic Management Dashboard">
            </div>
        </div>
    </section>

    <!-- Features Section -->
    <section class="section features" id="features">
        <div class="container">
            <h2 class="section-title">Powerful Features</h2>
            <p class="section-subtitle">Our comprehensive clinic management system offers everything you need to run your practice efficiently.</p>

            <div class="features-grid">
                <div class="feature-card">
                    <div class="feature-icon">📅</div>
                    <h3 class="feature-title">Appointment Scheduling</h3>
                    <p class="feature-desc">Easily manage appointments with an intuitive calendar interface. Reduce no-shows with automated reminders.</p>
                </div>

                <div class="feature-card">
                    <div class="feature-icon">📋</div>
                    <h3 class="feature-title">Patient Records</h3>
                    <p class="feature-desc">Securely store and access patient information, medical history, and treatment plans in one place.</p>
                </div>

                <div class="feature-card">
                    <div class="feature-icon">💰</div>
                    <h3 class="feature-title">Billing & Invoicing</h3>
                    <p class="feature-desc">Generate invoices, process payments, and manage insurance claims with ease.</p>
                </div>

                <div class="feature-card">
                    <div class="feature-icon">📊</div>
                    <h3 class="feature-title">Reports & Analytics</h3>
                    <p class="feature-desc">Gain insights into your practice with detailed reports on patient flow, revenue, and more.</p>
                </div>

                <div class="feature-card">
                    <div class="feature-icon">📱</div>
                    <h3 class="feature-title">Patient Portal</h3>
                    <p class="feature-desc">Allow patients to book appointments, view records, and communicate with your staff online.</p>
                </div>

                <div class="feature-card">
                    <div class="feature-icon">🔔</div>
                    <h3 class="feature-title">Notifications</h3>
                    <p class="feature-desc">Automated SMS and email reminders for appointments, follow-ups, and medication.</p>
                </div>
            </div>
        </div>
    </section>

    <!-- Benefits Section -->
    <section class="section benefits" id="benefits">
        <div class="container">
            <h2 class="section-title">Why Choose MediCare</h2>

            <div class="benefit-item">
                <div class="benefit-content">
                    <h3 class="benefit-title">Save Time & Increase Efficiency</h3>
                    <p class="benefit-desc">Automate routine tasks and streamline workflows to free up more time for patient care. Our system reduces administrative burden by up to 40%.</p>
                    <a href="#" class="btn">Learn More</a>
                </div>
                <div class="benefit-image">
                    <img src="/placeholder.svg?height=350&width=450" alt="Time Saving Illustration">
                </div>
            </div>

            <div class="benefit-item">
                <div class="benefit-content">
                    <h3 class="benefit-title">Enhance Patient Experience</h3>
                    <p class="benefit-desc">Provide a seamless experience for your patients with online booking, digital forms, and easy communication. Happy patients mean a thriving practice.</p>
                    <a href="#" class="btn">Learn More</a>
                </div>
                <div class="benefit-image">
                    <img src="/placeholder.svg?height=350&width=450" alt="Patient Experience Illustration">
                </div>
            </div>

            <div class="benefit-item">
                <div class="benefit-content">
                    <h3 class="benefit-title">Secure & Compliant</h3>
                    <p class="benefit-desc">Rest easy knowing your data is protected with bank-level security. Our system is fully HIPAA compliant and regularly updated to meet the latest regulations.</p>
                    <a href="#" class="btn">Learn More</a>
                </div>
                <div class="benefit-image">
                    <img src="/placeholder.svg?height=350&width=450" alt="Security Illustration">
                </div>
            </div>
        </div>
    </section>

    <!-- Testimonials Section -->
    <section class="section testimonials">
        <div class="container">
            <h2 class="section-title">What Our Clients Say</h2>

            <div class="testimonials-grid">
                <div class="testimonial-card">
                    <p class="testimonial-text">MediCare has transformed how we run our clinic. The scheduling system alone has saved us countless hours and reduced no-shows by 30%.</p>
                    <div class="testimonial-author">
                        <div class="testimonial-author-image">
                            <img src="/placeholder.svg?height=50&width=50" alt="Dr. Sarah Johnson">
                        </div>
                        <div>
                            <div class="testimonial-author-name">Dr. Sarah Johnson</div>
                            <div class="testimonial-author-title">Family Practice, NYC</div>
                        </div>
                    </div>
                </div>

                <div class="testimonial-card">
                    <p class="testimonial-text">The patient portal has been a game-changer for our practice. Our patients love the convenience, and it's significantly reduced phone calls to our front desk.</p>
                    <div class="testimonial-author">
                        <div class="testimonial-author-image">
                            <img src="/placeholder.svg?height=50&width=50" alt="Dr. Michael Chen">
                        </div>
                        <div>
                            <div class="testimonial-author-name">Dr. Michael Chen</div>
                            <div class="testimonial-author-title">Pediatric Clinic, Chicago</div>
                        </div>
                    </div>
                </div>

                <div class="testimonial-card">
                    <p class="testimonial-text">The billing and insurance claims management in MediCare has improved our cash flow dramatically. We're getting paid faster and with fewer rejections.</p>
                    <div class="testimonial-author">
                        <div class="testimonial-author-image">
                            <img src="/placeholder.svg?height=50&width=50" alt="Lisa Rodriguez">
                        </div>
                        <div>
                            <div class="testimonial-author-name">Lisa Rodriguez</div>
                            <div class="testimonial-author-title">Practice Manager, Austin</div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Pricing Section -->
    <section class="section pricing" id="pricing">
        <div class="container">
            <h2 class="section-title">Simple, Transparent Pricing</h2>
            <p class="section-subtitle">Choose the plan that fits your practice size and needs. All plans include our core features.</p>

            <div class="pricing-grid">
                <div class="pricing-card">
                    <h3 class="pricing-title">Basic</h3>
                    <div class="pricing-price">$99<span>/month</span></div>
                    <ul class="pricing-features">
                        <li>Up to 2 providers</li>
                        <li>Appointment scheduling</li>
                        <li>Patient records</li>
                        <li>Basic reporting</li>
                        <li>Email support</li>
                    </ul>
                    <a href="#contact" class="btn">Get Started</a>
                </div>

                <div class="pricing-card popular">
                    <h3 class="pricing-title">Professional</h3>
                    <div class="pricing-price">$199<span>/month</span></div>
                    <ul class="pricing-features">
                        <li>Up to 5 providers</li>
                        <li>All Basic features</li>
                        <li>Billing & invoicing</li>
                        <li>Patient portal</li>
                        <li>SMS reminders</li>
                        <li>Priority support</li>
                    </ul>
                    <a href="#contact" class="btn">Get Started</a>
                </div>

                <div class="pricing-card">
                    <h3 class="pricing-title">Enterprise</h3>
                    <div class="pricing-price">$349<span>/month</span></div>
                    <ul class="pricing-features">
                        <li>Unlimited providers</li>
                        <li>All Professional features</li>
                        <li>Advanced analytics</li>
                        <li>Custom integrations</li>
                        <li>Dedicated account manager</li>
                        <li>24/7 premium support</li>
                    </ul>
                    <a href="#contact" class="btn">Get Started</a>
                </div>
            </div>
        </div>
    </section>

    <!-- CTA Section -->
    <section class="cta">
        <div class="container">
            <h2 class="cta-title">Ready to Transform Your Practice?</h2>
            <p class="cta-subtitle">Join thousands of healthcare providers who have streamlined their operations with MediCare.</p>
            <a href="#contact" class="btn cta-btn">Schedule a Free Demo</a>
        </div>
    </section>

    <!-- Contact Section -->
    <section class="section contact" id="contact">
        <div class="container">
            <h2 class="section-title">Get in Touch</h2>

            <div class="contact-container">
                <div class="contact-info">
                    <h3>We'd Love to Hear From You</h3>
                    <p>Have questions about our clinic management system? Our team is here to help you find the perfect solution for your practice.</p>

                    <div class="contact-details">
                        <div class="contact-details-item">
                            <div class="contact-icon">📍</div>
                            <div>123 Medical Plaza, Suite 500<br>San Francisco, CA 94103</div>
                        </div>

                        <div class="contact-details-item">
                            <div class="contact-icon">📞</div>
                            <div>(800) 123-4567</div>
                        </div>

                        <div class="contact-details-item">
                            <div class="contact-icon">✉️</div>
                            <div>info@medicare-system.com</div>
                        </div>
                    </div>

                    <div class="social-links">
                        <a href="#" class="social-link">FB</a>
                        <a href="#" class="social-link">TW</a>
                        <a href="#" class="social-link">IG</a>
                        <a href="#" class="social-link">LI</a>
                    </div>
                </div>

                <div class="contact-form">
                    <form action="#" method="POST">
                        <div class="form-group">
                            <label for="name" class="form-label">Your Name</label>
                            <input type="text" id="name" class="form-control" required>
                        </div>

                        <div class="form-group">
                            <label for="email" class="form-label">Email Address</label>
                            <input type="email" id="email" class="form-control" required>
                        </div>

                        <div class="form-group">
                            <label for="phone" class="form-label">Phone Number</label>
                            <input type="tel" id="phone" class="form-control">
                        </div>

                        <div class="form-group">
                            <label for="practice" class="form-label">Practice Type</label>
                            <select id="practice" class="form-control">
                                <option value="">Select Practice Type</option>
                                <option value="family">Family Practice</option>
                                <option value="dental">Dental Clinic</option>
                                <option value="pediatric">Pediatric</option>
                                <option value="specialist">Specialist</option>
                                <option value="other">Other</option>
                            </select>
                        </div>

                        <div class="form-group">
                            <label for="message" class="form-label">Your Message</label>
                            <textarea id="message" class="form-control" required></textarea>
                        </div>

                        <button type="submit" class="btn">Send Message</button>
                    </form>
                </div>
            </div>
        </div>
    </section>

    <!-- Footer -->
    <footer>
        <div class="container">
            <div class="footer-grid">
                <div class="footer-col">
                    <h4>MediCare</h4>
                    <ul>
                        <li><a href="#home">Home</a></li>
                        <li><a href="#features">Features</a></li>
                        <li><a href="#benefits">Benefits</a></li>
                        <li><a href="#pricing">Pricing</a></li>
                        <li><a href="#contact">Contact</a></li>
                    </ul>
                </div>

                <div class="footer-col">
                    <h4>Features</h4>
                    <ul>
                        <li><a href="#">Appointment Scheduling</a></li>
                        <li><a href="#">Patient Records</a></li>
                        <li><a href="#">Billing & Invoicing</a></li>
                        <li><a href="#">Reports & Analytics</a></li>
                        <li><a href="#">Patient Portal</a></li>
                    </ul>
                </div>

                <div class="footer-col">
                    <h4>Resources</h4>
                    <ul>
                        <li><a href="#">Blog</a></li>
                        <li><a href="#">Help Center</a></li>
                        <li><a href="#">Case Studies</a></li>
                        <li><a href="#">Webinars</a></li>
                        <li><a href="#">API Documentation</a></li>
                    </ul>
                </div>

                <div class="footer-col">
                    <h4>Legal</h4>
                    <ul>
                        <li><a href="#">Privacy Policy</a></li>
                        <li><a href="#">Terms of Service</a></li>
                        <li><a href="#">HIPAA Compliance</a></li>
                        <li><a href="#">Security</a></li>
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
        const mobileMenuBtn = document.querySelector('.mobile-menu-btn');
        const nav = document.querySelector('nav');

        mobileMenuBtn.addEventListener('click', () => {
            nav.classList.toggle('active');
        });

        // Smooth Scrolling for Anchor Links
        document.querySelectorAll('a[href^="#"]').forEach(anchor => {
            anchor.addEventListener('click', function(e) {
                e.preventDefault();

                const targetId = this.getAttribute('href');
                if (targetId === '#') return;

                const targetElement = document.querySelector(targetId);
                if (targetElement) {
                    window.scrollTo({
                        top: targetElement.offsetTop - 80,
                        behavior: 'smooth'
                    });

                    // Close mobile menu if open
                    if (nav.classList.contains('active')) {
                        nav.classList.remove('active');
                    }
                }
            });
        });
    </script>
</body>
</html>