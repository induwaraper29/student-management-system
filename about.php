<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>About - Student Management System</title>
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
            <h1>About Our System</h1>
            <p>Learn more about the Student Management System and its capabilities</p>
        </div>
    </div>

    <!-- Main Content -->
    <div class="container">
        <!-- Project Overview -->
        <section class="section">
            <h2 class="mb-3">Project Overview</h2>
            <p>The Student Management System is a modern web-based application developed for diploma programs in educational institutions. It streamlines the process of managing student records, providing an efficient and user-friendly interface for administrators and staff members.</p>

            <h3 class="mt-4 mb-2">Project Objectives</h3>
            <p>This system was created with the following objectives in mind:</p>
            <ul style="margin-left: 2rem; margin-bottom: 1rem;">
                <li>Provide a centralized platform for managing student information</li>
                <li>Simplify the process of adding, viewing, updating, and deleting student records</li>
                <li>Ensure data integrity through comprehensive validation mechanisms</li>
                <li>Create an intuitive and visually appealing user interface</li>
                <li>Maintain security and reliability of stored data</li>
                <li>Support seamless navigation and user experience</li>
            </ul>
        </section>

        <!-- Technical Architecture -->
        <section class="section">
            <h2 class="mb-3">Technical Architecture</h2>

            <h3 class="mb-2">Technology Stack</h3>
            <div class="features">
                <div class="card">
                    <h4>Frontend Technologies</h4>
                    <ul style="margin-left: 1.5rem;">
                        <li><strong>HTML5:</strong> Semantic markup and structure</li>
                        <li><strong>CSS3:</strong> Custom styling and responsive design</li>
                        <li><strong>JavaScript:</strong> Form validation and AJAX operations</li>
                    </ul>
                </div>
                <div class="card">
                    <h4>Backend Technologies</h4>
                    <ul style="margin-left: 1.5rem;">
                        <li><strong>PHP 7.4+:</strong> Server-side logic and CRUD operations</li>
                        <li><strong>MySQL:</strong> Relational database management</li>
                        <li><strong>REST API:</strong> AJAX communication</li>
                    </ul>
                </div>
                <div class="card">
                    <h4>Development Practices</h4>
                    <ul style="margin-left: 1.5rem;">
                        <li><strong>Clean Code:</strong> Well-organized and documented</li>
                        <li><strong>Input Validation:</strong> Both client and server-side</li>
                        <li><strong>Security:</strong> SQL injection prevention</li>
                    </ul>
                </div>
            </div>

            <h3 class="mt-4 mb-2">Database Schema</h3>
            <p>The system uses a single <code>students</code> table with the following structure:</p>
            <table>
                <thead>
                    <tr>
                        <th>Column</th>
                        <th>Type</th>
                        <th>Description</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td><strong>id</strong></td>
                        <td>INT (Primary Key)</td>
                        <td>Unique student identifier</td>
                    </tr>
                    <tr>
                        <td><strong>name</strong></td>
                        <td>VARCHAR(100)</td>
                        <td>Student's full name</td>
                    </tr>
                    <tr>
                        <td><strong>email</strong></td>
                        <td>VARCHAR(100) (UNIQUE)</td>
                        <td>Student's email address</td>
                    </tr>
                    <tr>
                        <td><strong>course</strong></td>
                        <td>VARCHAR(100)</td>
                        <td>Course name (e.g., Diploma in IT)</td>
                    </tr>
                    <tr>
                        <td><strong>batch</strong></td>
                        <td>VARCHAR(50)</td>
                        <td>Batch/year information</td>
                    </tr>
                    <tr>
                        <td><strong>created_at</strong></td>
                        <td>TIMESTAMP</td>
                        <td>Record creation timestamp</td>
                    </tr>
                    <tr>
                        <td><strong>updated_at</strong></td>
                        <td>TIMESTAMP</td>
                        <td>Record last update timestamp</td>
                    </tr>
                </tbody>
            </table>
        </section>

        <!-- Features and Functionality -->
        <section class="section">
            <h2 class="mb-3">Features and Functionality</h2>

            <h3 class="mb-2">CRUD Operations</h3>
            <div class="features">
                <div class="card">
                    <h4>📝 Create (Add)</h4>
                    <p>Add new student records with complete information. The system validates all inputs before storing in the database.</p>
                </div>
                <div class="card">
                    <h4>👁️ Read (View)</h4>
                    <p>View all student records in a formatted table. Data is presented clearly with options for editing and deletion.</p>
                </div>
                <div class="card">
                    <h4>✏️ Update (Edit)</h4>
                    <p>Modify existing student information. The system maintains data integrity through comprehensive validation.</p>
                </div>
                <div class="card">
                    <h4>🗑️ Delete</h4>
                    <p>Remove student records from the system. Confirmation prompts prevent accidental deletions.</p>
                </div>
            </div>

            <h3 class="mt-4 mb-2">Validation System</h3>
            <p>The system implements comprehensive validation on both client and server sides:</p>
            <ul style="margin-left: 2rem; margin-bottom: 1rem;">
                <li><strong>Email Validation:</strong> Ensures proper email format using regex patterns</li>
                <li><strong>Required Fields:</strong> Prevents submission of empty or incomplete forms</li>
                <li><strong>Name Validation:</strong> Ensures names are at least 3 characters long</li>
                <li><strong>Duplicate Email Check:</strong> Prevents duplicate email addresses in the database</li>
                <li><strong>Data Type Validation:</strong> Ensures correct data types are stored</li>
            </ul>
        </section>

        <!-- Compliance and Standards -->
        <section class="section">
            <h2 class="mb-3">Compliance and Standards</h2>

            <h3 class="mb-2">Web Standards</h3>
            <p>The system adheres to modern web development standards:</p>
            <ul style="margin-left: 2rem; margin-bottom: 1rem;">
                <li>HTML5 semantic markup</li>
                <li>CSS3 for styling and responsive design</li>
                <li>JavaScript ES6+ features</li>
                <li>RESTful API principles</li>
                <li>Mobile-responsive design (works on all devices)</li>
            </ul>

            <h3 class="mb-2">Security Practices</h3>
            <ul style="margin-left: 2rem; margin-bottom: 1rem;">
                <li>SQL injection prevention through input escaping</li>
                <li>Server-side validation of all inputs</li>
                <li>Proper error handling without exposing sensitive information</li>
                <li>Session management best practices</li>
            </ul>

            <h3 class="mb-2">Code Quality</h3>
            <ul style="margin-left: 2rem;">
                <li>Well-commented code with docstrings</li>
                <li>Consistent naming conventions</li>
                <li>DRY (Don't Repeat Yourself) principles</li>
                <li>Proper separation of concerns</li>
                <li>Error handling and logging</li>
            </ul>
        </section>

        <!-- Development Information -->
        <section class="section">
            <h2 class="mb-3">Development Information</h2>

            <h3 class="mb-2">System Requirements</h3>
            <ul style="margin-left: 2rem; margin-bottom: 1rem;">
                <li>PHP 7.4 or higher</li>
                <li>MySQL 5.7 or higher</li>
                <li>Modern web browser with JavaScript enabled</li>
                <li>Web server (Apache, Nginx, etc.)</li>
            </ul>

            <h3 class="mb-2">Installation Steps</h3>
            <ol style="margin-left: 2rem;">
                <li>Create a new MySQL database named <code>student_management_system</code></li>
                <li>Import the <code>database/database_schema.sql</code> file</li>
                <li>Update database credentials in <code>php/db_connect.php</code> if needed</li>
                <li>Place the project folder in your web server's root directory</li>
                <li>Access the application via your web browser</li>
            </ol>

            <h3 class="mt-4 mb-2">Project Structure</h3>
            <pre style="background-color: #f8f9fa; padding: 1rem; border-radius: 4px; overflow-x: auto;">
student-management-system/
├── index.php                    # Home page
├── add_student.php             # Add student page
├── view_students.php           # View all students page
├── edit_student.php            # Edit student page
├── about.php                   # About page
├── contact.php                 # Contact page
├── css/
│   └── style.css              # Main stylesheet
├── js/
│   └── validation.js          # JavaScript validation and AJAX
├── php/
│   ├── db_connect.php         # Database connection
│   ├── add_student.php        # Add student API
│   ├── view_students.php      # View students API
│   ├── update_student.php     # Update student API
│   └── delete_student.php     # Delete student API
└── database/
    └── database_schema.sql     # Database schema
            </pre>
        </section>

        <!-- Contact Section -->
        <section class="section text-center">
            <h2 class="mb-3">Have Questions?</h2>
            <p>Get in touch with us through our contact page for more information.</p>
            <a href="contact.php" class="btn btn-primary">Contact Us</a>
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
</body>
</html>
