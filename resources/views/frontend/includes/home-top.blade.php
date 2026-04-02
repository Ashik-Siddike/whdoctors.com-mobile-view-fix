  <style>




        /* Navigation */
        .ccs-pillNav {
            position: sticky;
            top: 20px;
            margin: 0 auto 40px;
            width: fit-content;
            display: flex;
            gap: 8px;
            padding: 8px;
            border-radius: 18px;
            border: 2px solid rgba(0,0,0,.10);
            background: #dc4d01;
            box-shadow: 0 10px 30px rgba(0,0,0,.08);
            z-index: 100;
            flex-wrap: wrap;
            justify-content: center;
        }

        .ccs-pillItem {
            text-decoration: none;
            color: rgba(11,16,32,.75);
            font-weight: 700;
            padding: 10px 20px;
            border-radius: 14px;
            transition: all 0.3s ease;
            font-size: 14px;
            text-align: center;
            white-space: nowrap;
        }

        .ccs-pillItem:hover {
            background: rgba(220, 77, 1, 0.1);
            transform: translateY(-2px);
        }

        .ccs-pillItem.active {
            color: white;
            background: #dc4d01;
            box-shadow: 0 4px 12px rgba(220, 77, 1, 0.3);
        }

        /* Header/Hero Section */
        .hero {
            background: linear-gradient(135deg, #dc4d01 0%, #ff6b2c 100%);
            color: white;
            padding: 80px 20px;
            text-align: center;
            border-radius: 0 0 30px 30px;
            margin-bottom: 60px;
        }

        .hero h1 {
            font-size: 2.8rem;
            margin-bottom: 20px;
            font-weight: 800;
        }

        .hero p {
            font-size: 1.2rem;
            max-width: 800px;
            margin: 0 auto 30px;
            opacity: 0.9;
        }

        .cta-button {
            display: inline-block;
            background: white;
            color: #dc4d01;
            padding: 15px 35px;
            border-radius: 30px;
            text-decoration: none;
            font-weight: 700;
            font-size: 1.1rem;
            transition: all 0.3s ease;
            box-shadow: 0 5px 20px rgba(0,0,0,0.1);
        }

        .cta-button:hover {
            transform: translateY(-3px);
            box-shadow: 0 8px 25px rgba(0,0,0,0.15);
        }

        /* Content Sections */
        .content-section {
            display: none;
            padding: 60px 0;
            animation: fadeIn 0.5s ease;
        }

        .content-section.active {
            display: block;
        }

        @keyframes fadeIn {
            from { opacity: 0; transform: translateY(20px); }
            to { opacity: 1; transform: translateY(0); }
        }

        .section-header {
            text-align: center;
            margin-bottom: 50px;
        }

        .section-header h2 {
            font-size: 2.5rem;
            color: #dc4d01;
            margin-bottom: 15px;
            position: relative;
            display: inline-block;
        }

        .section-header h2:after {
            content: '';
            position: absolute;
            bottom: -10px;
            left: 50%;
            transform: translateX(-50%);
            width: 80px;
            height: 4px;
            background: #dc4d01;
            border-radius: 2px;
        }

        .section-header span {
            font-size: 1.2rem;
            color: #666;
            font-weight: 500;
        }

        .section-content {
            background: #dc4d01;
            {{--background-image: url('{{ asset('images/wbg.png') }}');--}}
            padding: 40px;
            border-radius: 20px;
            box-shadow: 0 10px 30px rgba(0,0,0,0.05);
            margin-top: 30px;
        }

        /* About Section */
        .services-grid {
            display: grid;
            grid-template-columns: repeat(auto-fill, minmax(300px, 1fr));
            gap: 30px;
            margin-top: 40px;
        }

        .service-card {
            background: white;
            padding: 30px;
            border-radius: 15px;
            box-shadow: 0 5px 20px rgba(0,0,0,0.05);
            transition: all 0.3s ease;
            border-top: 4px solid #dc4d01;
        }

        .service-card:hover {
            transform: translateY(-10px);
            box-shadow: 0 15px 30px rgba(0,0,0,0.1);
        }

        .service-card i {
            font-size: 2.5rem;
            color: #dc4d01;
            margin-bottom: 20px;
        }

        .service-card h3 {
            font-size: 1.5rem;
            margin-bottom: 15px;
            color: #333;
        }

        .service-card p {
            color: #666;
        }

        /* Team Section */
        .team-grid {
            display: grid;
            grid-template-columns: repeat(auto-fill, minmax(250px, 1fr));
            gap: 30px;
            margin-top: 40px;
        }

        .team-card {
            background: white;
            border-radius: 15px;
            overflow: hidden;
            box-shadow: 0 5px 20px rgba(0,0,0,0.05);
            transition: all 0.3s ease;
            text-align: center;
        }

        .team-card:hover {
            transform: translateY(-10px);
            box-shadow: 0 15px 30px rgba(0,0,0,0.1);
        }

        .team-img {
            height: 200px;
            background: linear-gradient(135deg, #dc4d01, #ff6b2c);
            display: flex;
            align-items: center;
            justify-content: center;
        }

        .team-img i {
            font-size: 5rem;
            color: rgba(255,255,255,0.9);
        }

        .team-info {
            padding: 25px;
        }

        .team-info h3 {
            font-size: 1.3rem;
            margin-bottom: 5px;
            color: #333;
        }

        .team-info p {
            color: #dc4d01;
            font-weight: 600;
            margin-bottom: 15px;
        }
        .container1{
            padding-top: 0.5%;
        }

        /* Contact Section */
        .contact-container {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(300px, 1fr));
            gap: 40px;
            margin-top: 40px;
        }

        .contact-info {
            background: #dc4d01;
            color: white;
            padding: 40px;
            border-radius: 20px;
        }

        .contact-info h3 {
            font-size: 1.8rem;
            margin-bottom: 25px;
        }

        .contact-detail {
            display: flex;
            align-items: flex-start;
            margin-bottom: 25px;
        }

        .contact-detail i {
            font-size: 1.5rem;
            margin-right: 15px;
            margin-top: 5px;
        }

        .contact-form {
            background: white;
            padding: 40px;
            border-radius: 20px;
            box-shadow: 0 10px 30px rgba(0,0,0,0.05);
        }

        .form-group {
            margin-bottom: 20px;
        }

        .form-group label {
            display: block;
            margin-bottom: 8px;
            font-weight: 600;
            color: #333;
        }

        .form-group input,
        .form-group textarea,
        .form-group select {
            width: 100%;
            padding: 15px;
            border: 1px solid #ddd;
            border-radius: 10px;
            font-family: inherit;
            font-size: 1rem;
            transition: all 0.3s ease;
        }

        .form-group input:focus,
        .form-group textarea:focus,
        .form-group select:focus {
            outline: none;
            border-color: #dc4d01;
            box-shadow: 0 0 0 3px rgba(220, 77, 1, 0.1);
        }

        .submit-btn {
            background: #dc4d01;
            color: white;
            border: none;
            padding: 15px 30px;
            border-radius: 10px;
            font-size: 1rem;
            font-weight: 600;
            cursor: pointer;
            transition: all 0.3s ease;
            width: 100%;
        }

        .submit-btn:hover {
            background: #c04501;
            transform: translateY(-2px);
        }

        /* Footer */
        footer {
            background: #222;
            color: white;
            padding: 50px 0 20px;
            margin-top: 60px;
            text-align: center;
        }

        .footer-content {
            max-width: 800px;
            margin: 0 auto;
        }

        .social-icons {
            display: flex;
            justify-content: center;
            gap: 20px;
            margin: 30px 0;
        }

        .social-icons a {
            display: inline-flex;
            align-items: center;
            justify-content: center;
            width: 50px;
            height: 50px;
            background: rgba(255,255,255,0.1);
            border-radius: 50%;
            color: white;
            font-size: 1.2rem;
            transition: all 0.3s ease;
        }

        .social-icons a:hover {
            background: #dc4d01;
            transform: translateY(-3px);
        }

        .copyright {
            margin-top: 30px;
            padding-top: 20px;
            border-top: 1px solid rgba(255,255,255,0.1);
            color: #aaa;
            font-size: 0.9rem;
        }
        /* Content Sections */
        .content-section {
            display: none;
            padding: 60px 0;
            animation: fadeIn 0.5s ease;
        }

        .content-section.active {
            display: block !important; /* Force display block */
        }

        /* About Section - remove any inline display property if exists */
        #about {
            /* No special display property here */
        }
        @media (max-width: 400px) {
            .ccs-pillNav {
                top: 10px;
                padding: 6px;
                gap: 6px;
                border-radius: 14px;
                margin-bottom: 20px;
            }

            .ccs-pillItem {
                padding: 8px 14px;
                font-size: 12px;
                border-radius: 12px;
                font-weight: 600;
            }
        }


        /* Responsive Design */
        @media (max-width: 768px) {
            .hero h1 {
                font-size: 2.2rem;
            }

            .section-header h2 {
                font-size: 2rem;
            }

            .ccs-pillNav {
                position: relative;
                top: 0;
                margin-bottom: 30px;
            }

            .content-section {
                padding: 40px 0;
            }

            .section-content {
                padding: 25px;
            }
        }

        @media (max-width: 480px) {
            .hero {
                padding: 60px 20px;
            }

            .hero h1 {
                font-size: 1.8rem;
            }

            .ccs-pillItem {
                padding: 8px 16px;
                font-size: 13px;
            }

            .services-grid,
            .team-grid {
                grid-template-columns: 1fr;
            }
        }
    </style>

<!-- Navigation -->
<div class="container1">
    <nav class="ccs-pillNav">

        <a class="ccs-pillItem active" href="#about">ABOUT US</a>
        <a class="ccs-pillItem" href="#services">OUR SERVICES</a>
        <a class="ccs-pillItem" href="#team">OUR TEAM</a>
        <a class="ccs-pillItem" href="#contact">CONTACT US</a>
    </nav>
</div>


<!-- About Section -->
  @foreach($aboutSections as $aboutSection)
    <section class="content-section active" id="about" style="padding-top: 0px" >
        <div class="container">
            <div class="section-header">
                <h2 class="text-dark"> {{ $aboutSection->title }}</h2>
                <h2 class="text-dark"> {{ $aboutSection->subtitle }}</h2>
            </div>
            <div class="section-content">
               <p class="text-dark">
                   {!! $aboutSection->description !!}
               </p>
            </div>
        </div>
    </section>
  @endforeach

<!-- Services Section -->
<section class="content-section" id="services">
    <div class="container">
        <div class="section-header">
            <h2>Our Services</h2>
            <span>Comprehensive Support for Your Study Abroad Journey</span>
        </div>
        <div class="section-content">
            <div class="services-grid">
                <div class="service-card">
                    <i class="fas fa-comments"></i>
                    <h3>Free Education Counseling</h3>
                    <p>Personalized guidance to help you choose the right country, university, and program based on your profile and aspirations.</p>
                </div>

                <div class="service-card">
                    <i class="fas fa-file-alt"></i>
                    <h3>Application Processing</h3>
                    <p>End-to-end support with university applications, document preparation, and submission to ensure your application stands out.</p>
                </div>

                <div class="service-card">
                    <i class="fas fa-search"></i>
                    <h3>Scholarship Guidance</h3>
                    <p>Assistance in identifying and applying for scholarships, grants, and financial aid opportunities across Europe.</p>
                </div>

                <div class="service-card">
                    <i class="fas fa-plane"></i>
                    <h3>Pre-Departure Briefing</h3>
                    <p>Comprehensive orientation covering travel, accommodation, cultural adjustment, and essential preparations before you leave.</p>
                </div>

                <div class="service-card">
                    <i class="fas fa-briefcase"></i>
                    <h3>Career Counseling</h3>
                    <p>Guidance on career pathways, internship opportunities, and post-study work options in Europe.</p>
                </div>

                <div class="service-card">
                    <i class="fas fa-language"></i>
                    <h3>Language Support</h3>
                    <p>Resources and recommendations for language courses to help you meet language requirements for your chosen program.</p>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Team Section -->
<section class="content-section" id="team">
    <div class="container">
        <div class="section-header">
            <h2>Our Expert Team</h2>
            <span>Meet the professionals dedicated to your success</span>
        </div>
        <div class="section-content">
            <div class="team-grid">
                <div class="team-card">
                    <div class="team-img">
                        <i class="fas fa-user-tie"></i>
                    </div>
                    <div class="team-info">
                        <h3>Sarah Johnson</h3>
                        <p>Director & UK Education Expert</p>
                        <p>Former international student in the UK with 12+ years of experience in education consultancy.</p>
                    </div>
                </div>

                <div class="team-card">
                    <div class="team-img">
                        <i class="fas fa-user-graduate"></i>
                    </div>
                    <div class="team-info">
                        <h3>David Müller</h3>
                        <p>German Education Specialist</p>
                        <p>Native German speaker with extensive knowledge of Germany's university system and admission requirements.</p>
                    </div>
                </div>

                <div class="team-card">
                    <div class="team-img">
                        <i class="fas fa-user-md"></i>
                    </div>
                    <div class="team-info">
                        <h3>Dr. Elena Rossi</h3>
                        <p>Medical Studies Consultant</p>
                        <p>Medical doctor with expertise in guiding students for medical studies across Europe.</p>
                    </div>
                </div>

                <div class="team-card">
                    <div class="team-img">
                        <i class="fas fa-user-cog"></i>
                    </div>
                    <div class="team-info">
                        <h3>James Chen</h3>
                        <p>Visa & Immigration Expert</p>
                        <p>Specialized in European visa regulations with a 98% success rate in student visa applications.</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Contact Section -->
<section class="content-section" id="contact">
    <div class="container">
        <div class="section-header">
            <h2>Contact Us</h2>
            <span>Start your European education journey today</span>
        </div>
        <div class="section-content">
            <div class="contact-container">
                <div class="contact-info">
                    <h3>Get In Touch</h3>

                    <div class="contact-detail">
                        <i class="fas fa-map-marker-alt"></i>
                        <div>
                            <h4>Head Office</h4>
                            <p>123 Education Street, London, UK, EC1A 1BB</p>
                        </div>
                    </div>

                    <div class="contact-detail">
                        <i class="fas fa-phone"></i>
                        <div>
                            <h4>Phone Number</h4>
                            <p>+44 (0) 20 7123 4567</p>
                        </div>
                    </div>

                    <div class="contact-detail">
                        <i class="fas fa-envelope"></i>
                        <div>
                            <h4>Email Address</h4>
                            <p>info@edume-international.com</p>
                        </div>
                    </div>

                    <div class="contact-detail">
                        <i class="fas fa-clock"></i>
                        <div>
                            <h4>Office Hours</h4>
                            <p>Monday - Friday: 9:00 AM - 6:00 PM</p>
                            <p>Saturday: 10:00 AM - 4:00 PM</p>
                        </div>
                    </div>
                </div>

                <div class="contact-form">
                    <h3>Send us a message</h3>
                    <form id="contactForm">
                        <div class="form-group">
                            <label for="name">Full Name</label>
                            <input type="text" id="name" name="name" required>
                        </div>

                        <div class="form-group">
                            <label for="email">Email Address</label>
                            <input type="email" id="email" name="email" required>
                        </div>

                        <div class="form-group">
                            <label for="phone">Phone Number</label>
                            <input type="tel" id="phone" name="phone">
                        </div>

                        <div class="form-group">
                            <label for="interest">Area of Interest</label>
                            <select id="interest" name="interest">
                                <option value="">Select an option</option>
                                <option value="uk">Study in UK</option>
                                <option value="germany">Study in Germany</option>
                                <option value="france">Study in France</option>
                                <option value="netherlands">Study in Netherlands</option>
                                <option value="other">Other European Country</option>
                            </select>
                        </div>

                        <div class="form-group">
                            <label for="message">Your Message</label>
                            <textarea id="message" name="message" rows="4" required></textarea>
                        </div>

                        <button type="submit" class="submit-btn">Send Message</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</section>



<script>
    // Navigation functionality
    document.addEventListener('DOMContentLoaded', function() {
        const navItems = document.querySelectorAll('.ccs-pillItem');
        const contentSections = document.querySelectorAll('.content-section');

        // Function to show section and update active nav
        function showSection(sectionId) {
            console.log("Showing section:", sectionId);

            // Hide all sections
            contentSections.forEach(section => {
                section.classList.remove('active');
                section.style.display = 'none'; // Extra assurance
            });

            // Remove active class from all nav items
            navItems.forEach(item => {
                item.classList.remove('active');
            });

            // Show selected section
            const targetSection = document.querySelector(sectionId);
            if (targetSection) {
                targetSection.classList.add('active');
                targetSection.style.display = 'block'; // Extra assurance
            }

            // Update active nav item
            const activeNavItem = document.querySelector(`.ccs-pillItem[href="${sectionId}"]`);
            if (activeNavItem) {
                activeNavItem.classList.add('active');
            }
        }

        // Set up nav click events
        navItems.forEach(item => {
            item.addEventListener('click', function(e) {
                e.preventDefault();
                const targetId = this.getAttribute('href');

                // If it's the home link, scroll to hero
                if (targetId === '#home') {
                    document.querySelector('.hero').scrollIntoView({ behavior: 'smooth' });
                    // Show about section when clicking home
                    showSection('#about');
                } else {
                    showSection(targetId);

                    // Smooth scroll to section
                    const targetSection = document.querySelector(targetId);
                    if (targetSection) {
                        window.scrollTo({
                            top: targetSection.offsetTop - 80,
                            behavior: 'smooth'
                        });
                    }
                }
            });
        });

        // Handle contact form submission
        const contactForm = document.getElementById('contactForm');
        if (contactForm) {
            contactForm.addEventListener('submit', function(e) {
                e.preventDefault();

                // Get form values
                const name = document.getElementById('name').value;
                const email = document.getElementById('email').value;

                // Simple validation
                if (name && email) {
                    // Show success message (in a real app, you would send this data to a server)
                    alert(`Thank you, ${name}! We have received your message and will contact you at ${email} within 24 hours.`);
                    contactForm.reset();
                }
            });
        }

        // Set initial active section (about)
        // First hide all sections
        contentSections.forEach(section => {
            section.style.display = 'none';
        });
        // Then show about section
        showSection('#about');

        // Log for debugging
        console.log("Navigation initialized");
        console.log("Total sections:", contentSections.length);
        console.log("Total nav items:", navItems.length);
    });
</script>
