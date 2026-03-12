<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Student - Student Management System</title>
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
            <h1>Add New Student</h1>
            <p>Register a new student in the system</p>
        </div>
    </div>

    <!-- Alert Container -->
    <div id="alert-container" class="container"></div>

    <!-- Main Content -->
    <div class="container">
        <section class="section">
            <h2 class="text-center mb-4">Student Registration Form</h2>

            <form id="add-student-form">
                <!-- Student Name Field -->
                <div class="form-group">
                    <label for="student-name">Student Name *</label>
                    <input 
                        type="text" 
                        id="student-name" 
                        name="name" 
                        placeholder="Enter student's full name"
                        minlength="3"
                        required
                    >
                    <small style="color: #888;">Minimum 3 characters required</small>
                </div>

                <!-- Email Field -->
                <div class="form-group">
                    <label for="student-email">Email Address *</label>
                    <input 
                        type="email" 
                        id="student-email" 
                        name="email" 
                        placeholder="Enter student's email address"
                        required
                    >
                    <small style="color: #888;">Must be a valid email (e.g., name@example.com)</small>
                </div>

                <!-- Course Selection -->
                <div class="form-group">
                    <label for="student-course">Course *</label>
                    <select id="student-course" name="course" required>
                        <option value="">-- Select a Course --</option>
                        <option value="Diploma in Information Technology">Diploma in Information Technology</option>
                        <option value="Diploma in Business Management">Diploma in Business Management</option>
                        <option value="Diploma in Engineering">Diploma in Engineering</option>
                        <option value="Diploma in Hospitality Management">Diploma in Hospitality Management</option>
                        <option value="Diploma in Nursing">Diploma in Nursing</option>
                        <option value="Diploma in Fashion Design">Diploma in Fashion Design</option>
                        <option value="Diploma in Agriculture">Diploma in Agriculture</option>
                    </select>
                </div>

                <!-- Batch Selection -->
                <div class="form-group">
                    <label for="student-batch">Batch/Year *</label>
                    <select id="student-batch" name="batch" required>
                        <option value="">-- Select Batch --</option>
                        <option value="2023-Batch">2023-Batch</option>
                        <option value="2024-Batch">2024-Batch</option>
                        <option value="2025-Batch">2025-Batch</option>
                        <option value="2026-Batch">2026-Batch</option>
                    </select>
                </div>

                <!-- Submit Buttons -->
                <div style="text-align: center; margin-top: 2rem;">
                    <input type="submit" class="btn btn-primary" value="Add Student">
                    <input type="reset" class="btn" value="Clear Form">
                </div>

                <p style="text-align: center; color: #888; margin-top: 1rem; font-size: 0.9rem;">
                    * Required fields. All information must be accurate.
                </p>
            </form>

            <!-- Information Box -->
            <div style="background-color: #d6eaf8; border-left: 4px solid #3498db; padding: 1.5rem; margin-top: 2rem; border-radius: 4px;">
                <h4 style="color: #3498db; margin-bottom: 0.5rem;">ℹ️ Important Information</h4>
                <ul style="margin-left: 1.5rem; color: #333;">
                    <li>Email addresses must be unique - you cannot register the same email twice</li>
                    <li>All fields are required for successful registration</li>
                    <li>Student name must contain at least 3 characters</li>
                    <li>After successful registration, you can view, edit, or delete the student record</li>
                    <li>The system will validate all information before saving</li>
                </ul>
            </div>
        </section>

        <!-- Quick Navigation -->
        <section class="section text-center">
            <h3 class="mb-3">What would you like to do?</h3>
            <div style="display: flex; justify-content: center; gap: 1rem; flex-wrap: wrap;">
                <a href="view_students.php" class="btn btn-secondary">View All Students</a>
                <a href="index.php" class="btn" style="background-color: #ecf0f1; color: #333;">Back to Home</a>
            </div>
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
