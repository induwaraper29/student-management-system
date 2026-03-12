<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Student Management System - Home</title>
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
            <h1>Student Management System</h1>
            <p>Manage your diploma program students efficiently and effectively</p>
            <a href="add_student.php" class="btn btn-primary">Add New Student</a>
        </div>
    </div>

    <!-- Alert Container -->
    <div id="alert-container" class="container"></div>

    <!-- Main Content -->
    <div class="container">
        <!-- Features Section -->
        <section class="section">
            <h2 class="text-center mb-4">Key Features</h2>
            <div class="features">
                <div class="feature-card">
                    <div class="feature-icon">📝</div>
                    <h3>Add Students</h3>
                    <p>Easily add new student records with complete details including name, email, course, and batch information.</p>
                </div>
                <div class="feature-card">
                    <div class="feature-icon">👁️</div>
                    <h3>View Students</h3>
                    <p>Browse all students in the system with a clean, organized table view. Filter and search through records effortlessly.</p>
                </div>
                <div class="feature-card">
                    <div class="feature-icon">✏️</div>
                    <h3>Update Records</h3>
                    <p>Modify student information quickly. Keep your data up-to-date with our intuitive update functionality.</p>
                </div>
                <div class="feature-card">
                    <div class="feature-icon">🗑️</div>
                    <h3>Delete Records</h3>
                    <p>Remove student records safely with confirmation prompts. Maintain a clean database with our deletion feature.</p>
                </div>
                <div class="feature-card">
                    <div class="feature-icon">✅</div>
                    <h3>Data Validation</h3>
                    <p>Rest assured with our comprehensive validation system. All data is verified before being stored in the database.</p>
                </div>
                <div class="feature-card">
                    <div class="feature-icon">🔒</div>
                    <h3>Secure & Reliable</h3>
                    <p>Your data is protected with industry-standard security practices. Built with clean, maintainable code.</p>
                </div>
            </div>
        </section>

        <!-- About the System -->
        <section class="section">
            <h2 class="mb-3">About This System</h2>
            <p>The Student Management System is a comprehensive web application designed to streamline the management of student records in diploma programs. It provides educational institutions with a centralized platform to maintain accurate student information and facilitate quick access to records.</p>
            <h3 class="mt-4 mb-2">System Capabilities</h3>
            <ul style="margin-left: 2rem; margin-bottom: 1rem;">
                <li><strong>Complete CRUD Operations:</strong> Create, Read, Update, and Delete student records with ease</li>
                <li><strong>Comprehensive Validation:</strong> Ensures data integrity with robust validation mechanisms</li>
                <li><strong>User-Friendly Interface:</strong> Clean and intuitive design for smooth navigation</li>
                <li><strong>Responsive Design:</strong> Works seamlessly on desktops, tablets, and mobile devices</li>
                <li><strong>Secure Database:</strong> MySQL database with proper error handling and data protection</li>
            </ul>

            <h3 class="mb-2">Getting Started</h3>
            <p>To get started with the system:</p>
            <ol style="margin-left: 2rem;">
                <li>Visit the <a href="add_student.php" style="color: var(--secondary-color);">Add Student</a> page to create new records</li>
                <li>Go to <a href="view_students.php" style="color: var(--secondary-color);">View Students</a> to see all records</li>
                <li>Click the edit button on any record to update information</li>
                <li>Use the delete button to remove records (with confirmation)</li>
            </ol>
        </section>

        <!-- Quick Stats -->
        <section class="section">
            <h2 class="text-center mb-4">System Statistics</h2>
            <div class="features">
                <div class="card">
                    <div style="font-size: 2.5rem; color: var(--secondary-color); font-weight: bold;">CRUD</div>
                    <p><strong>Full Operations</strong></p>
                    <p>Create, Read, Update, Delete functionality</p>
                </div>
                <div class="card">
                    <div style="font-size: 2.5rem; color: var(--secondary-color); font-weight: bold;">5</div>
                    <p><strong>Pages</strong></p>
                    <p>Home, About, Contact, Add, View</p>
                </div>
                <div class="card">
                    <div style="font-size: 2.5rem; color: var(--secondary-color); font-weight: bold;">100%</div>
                    <p><strong>Valid Code</strong></p>
                    <p>Clean and well-structured codebase</p>
                </div>
            </div>
        </section>

        <!-- Call to Action -->
        <section class="section text-center">
            <h2 class="mb-3">Ready to Get Started?</h2>
            <p>Manage your student records efficiently with our comprehensive system.</p>
            <a href="add_student.php" class="btn btn-primary">Add Your First Student</a>
            <a href="view_students.php" class="btn btn-secondary" style="margin-left: 1rem;">View All Students</a>
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
