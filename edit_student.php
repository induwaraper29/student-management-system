<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Student - Student Management System</title>
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
            <h1>Edit Student Information</h1>
            <p>Update student details and record information</p>
        </div>
    </div>

    <!-- Alert Container -->
    <div id="alert-container" class="container"></div>

    <!-- Main Content -->
    <div class="container">
        <!-- Loading State -->
        <section class="section text-center" id="loading-section">
            <div style="padding: 2rem;">
                <div class="spinner" style="margin: 0 auto 1rem;"></div>
                <p>Loading student information...</p>
            </div>
        </section>

        <!-- Form Section -->
        <section class="section" id="form-section" style="display: none;">
            <h2 class="text-center mb-4">Update Student Record</h2>

            <form id="edit-student-form">
                <!-- Hidden Student ID Field -->
                <input type="hidden" id="student-id" name="id">

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
                    <input type="submit" class="btn btn-primary" value="Update Student">
                    <a href="view_students.php" class="btn" style="background-color: #ecf0f1; color: #333; text-decoration: none; display: inline-block; margin-left: 0.5rem;">Cancel</a>
                </div>

                <p style="text-align: center; color: #888; margin-top: 1rem; font-size: 0.9rem;">
                    * Required fields. All information must be accurate.
                </p>
            </form>

            <!-- Information Box -->
            <div style="background-color: #d5f4e6; border-left: 4px solid #27ae60; padding: 1.5rem; margin-top: 2rem; border-radius: 4px;">
                <h4 style="color: #27ae60; margin-bottom: 0.5rem;">✓ Update Guidelines</h4>
                <ul style="margin-left: 1.5rem; color: #333;">
                    <li>Make the changes you need in the form above</li>
                    <li>Email addresses must be unique - you cannot use an email that's already registered</li>
                    <li>All fields are required</li>
                    <li>Student name must contain at least 3 characters</li>
                    <li>Click "Update Student" to save your changes</li>
                    <li>Click "Cancel" to return to the student list without saving</li>
                </ul>
            </div>
        </section>

        <!-- Error State -->
        <section class="section text-center" id="error-section" style="display: none;">
            <div style="padding: 2rem;">
                <h3 style="color: #c0392b; margin-bottom: 1rem;">⚠️ Error Loading Student</h3>
                <p style="color: #999; margin: 1rem 0;">The student record could not be loaded. It may have been deleted or the ID is invalid.</p>
                <a href="view_students.php" class="btn btn-secondary">Back to Student List</a>
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
    <script>
        /**
         * Get student ID from URL parameters
         */
        function getStudentIdFromURL() {
            const params = new URLSearchParams(window.location.search);
            return params.get('id');
        }

        /**
         * Load student data for editing
         */
        function loadStudentData() {
            const studentId = getStudentIdFromURL();

            if (!studentId || studentId <= 0) {
                showError();
                return;
            }

            showLoading();

            getStudent(studentId, function(response) {
                hideLoading();

                if (response.success && response.data) {
                    populateForm(response.data);
                    showForm();
                } else {
                    showError();
                }
            });
        }

        /**
         * Populate form with student data
         */
        function populateForm(student) {
            document.getElementById('student-id').value = student.id;
            document.getElementById('student-name').value = student.name;
            document.getElementById('student-email').value = student.email;
            document.getElementById('student-course').value = student.course;
            document.getElementById('student-batch').value = student.batch;
        }

        /**
         * Show form section
         */
        function showForm() {
            document.getElementById('form-section').style.display = 'block';
            document.getElementById('error-section').style.display = 'none';
        }

        /**
         * Show error section
         */
        function showError() {
            document.getElementById('error-section').style.display = 'block';
            document.getElementById('form-section').style.display = 'none';
        }

        /**
         * Show loading state
         */
        function showLoading() {
            document.getElementById('loading-section').style.display = 'block';
            document.getElementById('form-section').style.display = 'none';
            document.getElementById('error-section').style.display = 'none';
        }

        /**
         * Hide loading state
         */
        function hideLoading() {
            document.getElementById('loading-section').style.display = 'none';
        }

        /**
         * Initialize page on load
         */
        document.addEventListener('DOMContentLoaded', function() {
            loadStudentData();
        });
    </script>
</body>
</html>
