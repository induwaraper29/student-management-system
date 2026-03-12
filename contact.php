<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Contact - Student Management System</title>
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
    <!-- Navigation Bar -->
    <nav>
        <ul>
            <li><a href="index.php">Home</a></li>
            <li><a href="view_students.php">View Students</a></li>
            <li><a href="add_student.php">Add Student</a></li>
            <li><a href="about.php">About</a></li>
            <li><a href="contact.php">Contact</a></li>
        </ul>
    </nav>

    <!-- Hero Section -->
    <div class="hero">
        <div>
            <h1>Contact Us</h1>
            <p>Get in touch with our support team for any inquiries or assistance</p>
        </div>
    </div>

    <!-- Alert Container -->
    <div id="alert-container" class="container"></div>

    <!-- Main Content -->
    <div class="container">
        <div style="display: grid; grid-template-columns: repeat(auto-fit, minmax(300px, 1fr)); gap: 2rem; margin-bottom: 3rem;">
            <!-- Contact Information Cards -->
            <div class="card">
                <h3>📧 Email Support</h3>
                <p><strong>Primary:</strong> support@sms.edu.com</p>
                <p><strong>Administrative:</strong> admin@sms.edu.com</p>
                <p class="text-center" style="color: #888; margin-top: 1rem;">Response time: 24-48 hours</p>
            </div>

            <div class="card">
                <h3>📞 Phone Support</h3>
                <p><strong>Helpdesk:</strong> +1-800-SMS-2026</p>
                <p><strong>Emergency:</strong> +1-800-SMS-9999</p>
                <p class="text-center" style="color: #888; margin-top: 1rem;">Available: Mon-Fri, 9AM-5PM</p>
            </div>

            <div class="card">
                <h3>📍 Location</h3>
                <p>Student Management Division</p>
                <p>Education Block, 123 University Lane</p>
                <p>Tech City, TC 12345</p>
            </div>
        </div>

        <!-- Contact Form Section -->
        <section class="section">
            <h2 class="text-center mb-4">Send us a Message</h2>
            <form id="contact-form" onsubmit="handleContactFormSubmit(event)">
                <div class="form-group">
                    <label for="contact-name">Full Name *</label>
                    <input 
                        type="text" 
                        id="contact-name" 
                        name="name" 
                        placeholder="Enter your full name"
                        required
                    >
                </div>

                <div class="form-group">
                    <label for="contact-email">Email Address *</label>
                    <input 
                        type="email" 
                        id="contact-email" 
                        name="email" 
                        placeholder="Enter your email address"
                        required
                    >
                </div>

                <div class="form-group">
                    <label for="contact-subject">Subject *</label>
                    <input 
                        type="text" 
                        id="contact-subject" 
                        name="subject" 
                        placeholder="What is this regarding?"
                        required
                    >
                </div>

                <div class="form-group">
                    <label for="contact-category">Category *</label>
                    <select id="contact-category" name="category" required>
                        <option value="">Select a category</option>
                        <option value="general">General Inquiry</option>
                        <option value="technical">Technical Support</option>
                        <option value="feature">Feature Request</option>
                        <option value="bug">Bug Report</option>
                        <option value="feedback">Feedback</option>
                        <option value="other">Other</option>
                    </select>
                </div>

                <div class="form-group">
                    <label for="contact-message">Message *</label>
                    <textarea 
                        id="contact-message" 
                        name="message" 
                        placeholder="Please provide details about your inquiry..."
                        required
                    ></textarea>
                </div>

                <div class="form-group">
                    <label for="contact-priority">Priority Level</label>
                    <select id="contact-priority" name="priority">
                        <option value="low">Low</option>
                        <option value="normal" selected>Normal</option>
                        <option value="high">High</option>
                    </select>
                </div>

                <div style="text-align: center;">
                    <button type="submit" class="btn btn-primary">Send Message</button>
                    <button type="reset" class="btn" style="background-color: #ecf0f1; color: #333; margin-left: 1rem;">Clear Form</button>
                </div>

                <p style="text-align: center; color: #888; margin-top: 1rem; font-size: 0.9rem;">
                    * Required fields. We'll get back to you as soon as possible.
                </p>
            </form>
        </section>

        <!-- FAQ Section -->
        <section class="section">
            <h2 class="text-center mb-4">Frequently Asked Questions</h2>
            <div class="faq-container">
                <div class="card">
                    <h4>How do I reset my password?</h4>
                    <p>Currently, the system doesn't have a password reset feature. Please contact our support team for account-related issues. In future updates, we'll implement self-service password reset functionality.</p>
                </div>

                <div class="card">
                    <h4>Can I export student data?</h4>
                    <p>The current version displays all student information in the View Students page, which you can print or save using your browser's print functionality. Data export features will be added in upcoming releases.</p>
                </div>

                <div class="card">
                    <h4>Is my data secure?</h4>
                    <p>Yes! We implement industry-standard security practices including input validation, SQL injection prevention, and secure database connections. Your data is encrypted and stored securely.</p>
                </div>

                <div class="card">
                    <h4>How do I report a bug?</h4>
                    <p>Use this contact form and select "Bug Report" as the category. Please provide detailed information about the bug, including steps to reproduce it. Our technical team will investigate promptly.</p>
                </div>

                <div class="card">
                    <h4>Can I customize the system?</h4>
                    <p>Yes! The system is built with clean, well-documented code that can be customized. Contact us for customization requests or feature implementations tailored to your institution's needs.</p>
                </div>

                <div class="card">
                    <h4>What are the system requirements?</h4>
                    <p>You need PHP 7.4+, MySQL 5.7+, and a modern web browser. The system is compatible with Apache and Nginx web servers and works on Windows, Linux, and macOS.</p>
                </div>
            </div>
        </section>

        <!-- Support Resources -->
        <section class="section text-center">
            <h2 class="mb-3">Need Help?</h2>
            <p>Visit our documentation and resources center for comprehensive guides and tutorials.</p>
            <a href="index.php" class="btn btn-primary">Return to Home</a>
            <a href="about.php" class="btn btn-secondary" style="margin-left: 1rem;">Learn More About Us</a>
        </section>
    </div>

    <!-- Footer -->
    <footer>
        <p>&copy; 2026 Student Management System. All rights reserved.</p>
        <p>Designed for Educational Institution Management</p>
        <div class="footer-links">
            <a href="index.php">Home</a>
            <a href="about.php">About</a>
            <a href="contact.php">Contact</a>
        </div>
    </footer>

    <!-- Scripts -->
    <script src="js/validation.js"></script>
    <script>
        /**
         * Handle contact form submission
         * Note: This is a simple demonstration. In production, 
         * you would create a PHP file to process this data.
         */
        function handleContactFormSubmit(event) {
            event.preventDefault();
            
            const name = document.getElementById('contact-name').value;
            const email = document.getElementById('contact-email').value;
            const subject = document.getElementById('contact-subject').value;
            const category = document.getElementById('contact-category').value;
            const message = document.getElementById('contact-message').value;
            const priority = document.getElementById('contact-priority').value;

            // Basic validation
            if (!name || !email || !subject || !category || !message) {
                showAlert('Please fill in all required fields.', 'error');
                return;
            }

            if (!validateEmail(email)) {
                showAlert('Please enter a valid email address.', 'error');
                return;
            }

            // Show success message
            showAlert('Thank you for your message! We will get back to you soon.', 'success');

            // Reset form
            document.getElementById('contact-form').reset();

            // Log the message (in production, send to server)
            console.log({
                name: name,
                email: email,
                subject: subject,
                category: category,
                message: message,
                priority: priority,
                timestamp: new Date().toISOString()
            });
        }
    </script>
</body>
</html>
