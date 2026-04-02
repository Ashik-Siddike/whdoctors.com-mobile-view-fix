<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Company Portal</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        :root {
            --primary-green: #84d670;
            --light-green: rgba(132, 214, 112, 0.48);
            --dark-text: #000000;
            --white: #ffffff;
        }

        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: "Times New Roman", serif;
            background: linear-gradient(135deg, #f8f9fa 0%, #e9ecef 100%);
            min-height: 100vh;
            color: var(--dark-text);
        }

        .main-wrapper {
            max-width: 1400px;
            margin: 0 auto;
            padding: 20px;
        }

        .portal-container {
            background: var(--white);
            border-radius: 20px;
            box-shadow: 0 10px 30px rgba(0, 0, 0, 0.1);
            overflow: hidden;
            min-height: 80vh;
        }

        /* Sidebar Styles */
        .portal-sidebar {
            background: linear-gradient(180deg, var(--primary-green) 0%, var(--light-green) 100%);
            padding: 40px 25px;
            height: 100%;
            position: relative;
            overflow: hidden;
        }

        .portal-sidebar::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            background: url('data:image/svg+xml,<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 100 100" opacity="0.1"><circle cx="50" cy="50" r="2" fill="%23000"/></svg>');
            background-size: 50px 50px;
        }

        .company-branding {
            text-align: center;
            margin-bottom: 40px;
            position: relative;
            z-index: 2;
        }

        .main-logo {
            max-width: 180px;
            height: auto;
            margin-bottom: 15px;
            filter: drop-shadow(0 4px 8px rgba(0, 0, 0, 0.1));
        }

        .partner-logo {
            max-width: 120px;
            height: auto;
            opacity: 0.9;
        }

        .portal-nav {
            display: flex;
            flex-direction: column;
            gap: 12px;
            position: relative;
            z-index: 2;
        }

        .nav-item {
            background: rgba(255, 255, 255, 0.2);
            border: none;
            border-radius: 12px;
            padding: 16px 20px;
            color: var(--dark-text);
            font-weight: bold;
            font-size: 16px;
            text-align: left;
            transition: all 0.3s ease;
            cursor: pointer;
            backdrop-filter: blur(10px);
            border: 1px solid rgba(255, 255, 255, 0.3);
        }

        .nav-item:hover {
            background: rgba(255, 255, 255, 0.4);
            transform: translateX(5px);
        }

        .nav-item.active {
            background: var(--white);
            box-shadow: 0 5px 15px rgba(0, 0, 0, 0.1);
            transform: translateX(8px);
        }

        /* Content Area Styles */
        .portal-content {
            padding: 40px;
            background: var(--white);
            height: 100%;
            min-height: 80vh;
        }

        .content-section {
            display: none;
            animation: fadeIn 0.5s ease-in;
        }

        .content-section.active {
            display: block;
        }

        @keyframes fadeIn {
            from { opacity: 0; transform: translateY(20px); }
            to { opacity: 1; transform: translateY(0); }
        }

        .section-header {
            margin-bottom: 30px;
            padding-bottom: 20px;
            border-bottom: 3px solid var(--light-green);
        }

        .section-title {
            font-size: 2.2rem;
            font-weight: bold;
            color: var(--dark-text);
            margin-bottom: 8px;
        }

        .section-subtitle {
            font-size: 1.2rem;
            color: var(--dark-text);
            opacity: 0.8;
            font-style: italic;
        }

        .section-body {
            font-size: 1.1rem;
            line-height: 1.7;
            color: var(--dark-text);
        }

        /* Employee Cards */
        .employee-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(300px, 1fr));
            gap: 25px;
            margin-top: 30px;
        }

        .employee-card {
            background: linear-gradient(135deg, var(--white) 0%, #f8f9fa 100%);
            border-radius: 15px;
            padding: 25px;
            text-align: center;
            box-shadow: 0 5px 15px rgba(0, 0, 0, 0.08);
            transition: all 0.3s ease;
            border: 1px solid rgba(132, 214, 112, 0.2);
        }

        .employee-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 10px 25px rgba(0, 0, 0, 0.15);
        }

        .employee-avatar {
            width: 100px;
            height: 100px;
            border-radius: 50%;
            object-fit: cover;
            border: 4px solid var(--light-green);
            margin: 0 auto 15px;
            background: linear-gradient(45deg, var(--light-green), var(--primary-green));
        }

        .employee-name {
            font-size: 1.3rem;
            font-weight: bold;
            margin-bottom: 8px;
            color: var(--dark-text);
        }

        .employee-designation {
            color: var(--primary-green);
            font-weight: bold;
            margin-bottom: 12px;
        }

        .employee-contact {
            text-align: left;
            margin-top: 15px;
        }

        .contact-item {
            display: flex;
            align-items: center;
            margin-bottom: 8px;
            font-size: 0.95rem;
        }

        .contact-item i {
            width: 20px;
            margin-right: 10px;
            color: var(--primary-green);
        }

        /* Service Points */
        .service-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(350px, 1fr));
            gap: 25px;
            margin-top: 30px;
        }

        .service-card {
            background: linear-gradient(135deg, var(--light-green) 0%, rgba(132, 214, 112, 0.3) 100%);
            border-radius: 15px;
            padding: 30px;
            transition: all 0.3s ease;
            border: 1px solid rgba(132, 214, 112, 0.3);
        }

        .service-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 10px 25px rgba(132, 214, 112, 0.2);
        }

        .service-title {
            font-size: 1.4rem;
            font-weight: bold;
            margin-bottom: 15px;
            color: var(--dark-text);
        }

        .service-description {
            line-height: 1.6;
            color: var(--dark-text);
        }

        /* Contact Section */
        .contact-info {
            background: linear-gradient(135deg, var(--light-green) 0%, rgba(132, 214, 112, 0.2) 100%);
            border-radius: 15px;
            padding: 30px;
            margin-bottom: 30px;
        }

        .contact-details {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(250px, 1fr));
            gap: 20px;
            margin-top: 20px;
        }

        .contact-method {
            display: flex;
            align-items: center;
            padding: 15px;
            background: rgba(255, 255, 255, 0.5);
            border-radius: 10px;
        }

        .contact-icon {
            width: 50px;
            height: 50px;
            background: var(--primary-green);
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            margin-right: 15px;
            color: var(--white);
            font-size: 1.2rem;
        }

        /* Responsive Design */
        @media (max-width: 768px) {
            .portal-container {
                flex-direction: column;
            }

            .portal-sidebar {
                padding: 25px 20px;
            }

            .portal-content {
                padding: 25px;
            }

            .section-title {
                font-size: 1.8rem;
            }

            .employee-grid,
            .service-grid {
                grid-template-columns: 1fr;
            }

            .nav-item {
                padding: 14px 18px;
                font-size: 15px;
            }
        }

        @media (max-width: 480px) {
            .main-wrapper {
                padding: 10px;
            }

            .portal-sidebar,
            .portal-content {
                padding: 20px 15px;
            }

            .section-title {
                font-size: 1.5rem;
            }
        }
    </style>
</head>
<body>
<div class="main-wrapper">
    <div class="portal-container d-flex flex-column flex-lg-row">
        <!-- Sidebar -->
        <div class="portal-sidebar col-lg-4">
            <div class="company-branding">
                <img src="{{asset('images/wh%20logo%404x-600w.png')}}" alt="Company Logo" class="main-logo">
                <img src="{{asset('images/external/l2-200h.png')}}" alt="Partner Logo" class="partner-logo">
            </div>

            <nav class="portal-nav">
                <button class="nav-item active" data-target="about">
                    ABOUT
                </button>
                <button class="nav-item" data-target="team">
                    EMPLOYEE TEAM
                </button>
                <button class="nav-item" data-target="services">
                    SERVICE POINT
                </button>
                <button class="nav-item" data-target="contact">
                    CONTACTS
                </button>
            </nav>
        </div>

        <!-- Main Content -->
        <div class="portal-content col-lg-8">
            <!-- About Section -->
            <div id="about" class="content-section active">
                <div class="section-header">
                    <h1 class="section-title">About Our Company</h1>
                    <div class="section-subtitle">Excellence in every service we provide</div>
                </div>

                <div class="section-body">
                    <p>Welcome to our company, where innovation meets excellence. With years of experience in the industry, we have established ourselves as a trusted partner for businesses worldwide.</p>

                    <p class="mt-4">Our commitment to quality and customer satisfaction drives everything we do. We believe in building long-term relationships with our clients by delivering exceptional value and outstanding results.</p>

                    <div class="row mt-4">
                        <div class="col-md-6">
                            <h5>Our Mission</h5>
                            <p>To deliver innovative solutions that drive our clients' success while maintaining the highest standards of integrity and professionalism.</p>
                        </div>
                        <div class="col-md-6">
                            <h5>Our Vision</h5>
                            <p>To be the leading provider of exceptional services, recognized for our commitment to excellence and customer satisfaction.</p>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Team Section -->
            <div id="team" class="content-section">
                <div class="section-header">
                    <h1 class="section-title">Our Expert Team</h1>
                    <div class="section-subtitle">Meet the professionals behind our success</div>
                </div>

                <div class="employee-grid">
                    <!-- Team Member 1 -->
                    <div class="employee-card">
                        <img src="https://via.placeholder.com/100x100/84d670/ffffff?text=JS" alt="John Smith" class="employee-avatar">
                        <h3 class="employee-name">John Smith</h3>
                        <div class="employee-designation">CEO & Founder</div>
                        <div class="employee-contact">
                            <div class="contact-item">
                                <i>📧</i>
                                <span>john.smith@company.com</span>
                            </div>
                            <div class="contact-item">
                                <i>📱</i>
                                <span>+1 (555) 123-4567</span>
                            </div>
                        </div>
                    </div>

                    <!-- Team Member 2 -->
                    <div class="employee-card">
                        <img src="https://via.placeholder.com/100x100/84d670/ffffff?text=SJ" alt="Sarah Johnson" class="employee-avatar">
                        <h3 class="employee-name">Sarah Johnson</h3>
                        <div class="employee-designation">Operations Director</div>
                        <div class="employee-contact">
                            <div class="contact-item">
                                <i>📧</i>
                                <span>sarah.j@company.com</span>
                            </div>
                            <div class="contact-item">
                                <i>📱</i>
                                <span>+1 (555) 123-4568</span>
                            </div>
                        </div>
                    </div>

                    <!-- Team Member 3 -->
                    <div class="employee-card">
                        <img src="https://via.placeholder.com/100x100/84d670/ffffff?text=MW" alt="Mike Wilson" class="employee-avatar">
                        <h3 class="employee-name">Mike Wilson</h3>
                        <div class="employee-designation">Technical Lead</div>
                        <div class="employee-contact">
                            <div class="contact-item">
                                <i>📧</i>
                                <span>mike.wilson@company.com</span>
                            </div>
                            <div class="contact-item">
                                <i>📱</i>
                                <span>+1 (555) 123-4569</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Services Section -->
            <div id="services" class="content-section">
                <div class="section-header">
                    <h1 class="section-title">Our Services</h1>
                    <div class="section-subtitle">Comprehensive solutions for your business needs</div>
                </div>

                <div class="service-grid">
                    <!-- Service 1 -->
                    <div class="service-card">
                        <h3 class="service-title">Consulting Services</h3>
                        <div class="service-description">
                            <p>Strategic business consulting to help you navigate challenges and capitalize on opportunities. Our experts provide tailored solutions for sustainable growth.</p>
                            <ul class="mt-3">
                                <li>Business Strategy</li>
                                <li>Market Analysis</li>
                                <li>Process Optimization</li>
                            </ul>
                        </div>
                    </div>

                    <!-- Service 2 -->
                    <div class="service-card">
                        <h3 class="service-title">Technical Solutions</h3>
                        <div class="service-description">
                            <p>Cutting-edge technical solutions designed to streamline your operations and drive innovation. We leverage the latest technologies to deliver exceptional results.</p>
                            <ul class="mt-3">
                                <li>Software Development</li>
                                <li>System Integration</li>
                                <li>Cloud Solutions</li>
                            </ul>
                        </div>
                    </div>

                    <!-- Service 3 -->
                    <div class="service-card">
                        <h3 class="service-title">Support & Maintenance</h3>
                        <div class="service-description">
                            <p>Comprehensive support and maintenance services to ensure your systems run smoothly. Our dedicated team is available 24/7 to address your needs.</p>
                            <ul class="mt-3">
                                <li>24/7 Technical Support</li>
                                <li>System Maintenance</li>
                                <li>Performance Optimization</li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Contact Section -->
            <div id="contact" class="content-section">
                <div class="section-header">
                    <h1 class="section-title">Contact Us</h1>
                    <div class="section-subtitle">Get in touch with our team</div>
                </div>

                <div class="contact-info">
                    <h4>Headquarters</h4>
                    <div class="contact-details">
                        <div class="contact-method">
                            <div class="contact-icon">📍</div>
                            <div>
                                <strong>Address</strong><br>
                                123 Business Avenue<br>
                                Suite 500, New York, NY 10001
                            </div>
                        </div>

                        <div class="contact-method">
                            <div class="contact-icon">📞</div>
                            <div>
                                <strong>Phone</strong><br>
                                +1 (555) 123-4567
                            </div>
                        </div>

                        <div class="contact-method">
                            <div class="contact-icon">📧</div>
                            <div>
                                <strong>Email</strong><br>
                                info@company.com
                            </div>
                        </div>

                        <div class="contact-method">
                            <div class="contact-icon">🕒</div>
                            <div>
                                <strong>Business Hours</strong><br>
                                Mon-Fri: 9AM-6PM<br>
                                Sat: 10AM-2PM
                            </div>
                        </div>
                    </div>
                </div>

                <div class="mt-4">
                    <h4>Send us a Message</h4>
                    <form class="mt-3">
                        <div class="row g-3">
                            <div class="col-md-6">
                                <input type="text" class="form-control" placeholder="Your Name" style="padding: 12px; border: 2px solid var(--light-green); border-radius: 8px;">
                            </div>
                            <div class="col-md-6">
                                <input type="email" class="form-control" placeholder="Your Email" style="padding: 12px; border: 2px solid var(--light-green); border-radius: 8px;">
                            </div>
                            <div class="col-12">
                                <input type="text" class="form-control" placeholder="Subject" style="padding: 12px; border: 2px solid var(--light-green); border-radius: 8px;">
                            </div>
                            <div class="col-12">
                                <textarea class="form-control" rows="5" placeholder="Your Message" style="padding: 12px; border: 2px solid var(--light-green); border-radius: 8px;"></textarea>
                            </div>
                            <div class="col-12">
                                <button type="submit" class="btn" style="background: var(--primary-green); color: var(--dark-text); padding: 12px 30px; border-radius: 8px; font-weight: bold;">
                                    Send Message
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
    // Tab Navigation Functionality
    document.addEventListener('DOMContentLoaded', function() {
        const navItems = document.querySelectorAll('.nav-item');
        const contentSections = document.querySelectorAll('.content-section');

        navItems.forEach(item => {
            item.addEventListener('click', function() {
                const targetId = this.getAttribute('data-target');

                // Remove active class from all nav items and sections
                navItems.forEach(nav => nav.classList.remove('active'));
                contentSections.forEach(section => section.classList.remove('active'));

                // Add active class to clicked nav item and target section
                this.classList.add('active');
                document.getElementById(targetId).classList.add('active');
            });
        });
    });
</script>
</body>
</html>
