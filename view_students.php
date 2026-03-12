<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>View Students - Student Management System</title>
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
            <h1>Student Records</h1>
            <p>View and manage all student information</p>
        </div>
    </div>

    <!-- Alert Container -->
    <div id="alert-container" class="container"></div>

    <!-- Main Content -->
    <div class="container">
        <!-- Statistics Section -->
        <section class="section" id="statistics-section" style="display: none;">
            <div style="display: grid; grid-template-columns: repeat(auto-fit, minmax(200px, 1fr)); gap: 1rem;">
                <div style="background: linear-gradient(135deg, #3498db 0%, #2980b9 100%); color: white; padding: 1.5rem; border-radius: 8px; text-align: center;">
                    <div style="font-size: 2rem; font-weight: bold;" id="total-students">0</div>
                    <p>Total Students</p>
                </div>
                <div style="background: linear-gradient(135deg, #27ae60 0%, #229954 100%); color: white; padding: 1.5rem; border-radius: 8px; text-align: center;">
                    <div style="font-size: 2rem; font-weight: bold;" id="courses-count">0</div>
                    <p>Active Courses</p>
                </div>
                <div style="background: linear-gradient(135deg, #f39c12 0%, #e67e22 100%); color: white; padding: 1.5rem; border-radius: 8px; text-align: center;">
                    <div style="font-size: 2rem; font-weight: bold;" id="batches-count">0</div>
                    <p>Active Batches</p>
                </div>
            </div>
        </section>

        <!-- Search and Filter Section -->
        <section class="section">
            <h2 class="mb-3">Search and Filter</h2>
            <div style="display: grid; grid-template-columns: repeat(auto-fit, minmax(200px, 1fr)); gap: 1rem;">
                <div class="form-group" style="margin-bottom: 0;">
                    <input 
                        type="text" 
                        id="search-input" 
                        placeholder="Search by name, email, or course..."
                        style="width: 100%;"
                    >
                </div>
                <div>
                    <button class="btn btn-primary" onclick="filterStudents()" style="width: 100%;">Search</button>
                </div>
                <div>
                    <button class="btn btn-secondary" onclick="loadAllStudents()" style="width: 100%;">Reset</button>
                </div>
                <div>
                    <a href="add_student.php" class="btn btn-success" style="width: 100%; text-align: center; text-decoration: none;">Add New Student</a>
                </div>
            </div>
        </section>

        <!-- Students Table Section -->
        <section class="section" id="table-section" style="display: none;">
            <div class="table-responsive">
                <table id="students-table">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Name</th>
                            <th>Email</th>
                            <th>Course</th>
                            <th>Batch</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody id="students-tbody">
                        <!-- Data will be inserted here -->
                    </tbody>
                </table>
            </div>
        </section>

        <!-- Empty State -->
        <section class="section text-center" id="empty-state">
            <div style="padding: 2rem;">
                <h3 style="color: #888;">📚 No Students Found</h3>
                <p style="color: #999; margin: 1rem 0;">There are currently no students in the system.</p>
                <a href="add_student.php" class="btn btn-primary">Add Your First Student</a>
            </div>
        </section>

        <!-- Loading Spinner -->
        <section class="section text-center" id="loading-section" style="display: none;">
            <div style="padding: 2rem;">
                <div class="spinner" style="margin: 0 auto 1rem;"></div>
                <p>Loading student records...</p>
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
         * Load all students and display in table
         */
        function loadAllStudents() {
            showLoading();
            document.getElementById('search-input').value = '';
            
            loadStudents(function(response) {
                hideLoading();
                
                if (response.success && response.data.length > 0) {
                    displayStudents(response.data);
                    updateStatistics(response.data);
                } else {
                    showEmptyState();
                }
            });
        }

        /**
         * Display students in table
         */
        function displayStudents(students) {
            const tbody = document.getElementById('students-tbody');
            tbody.innerHTML = '';

            if (students.length === 0) {
                showEmptyState();
                return;
            }

            students.forEach((student, index) => {
                const row = document.createElement('tr');
                row.innerHTML = `
                    <td>${index + 1}</td>
                    <td><strong>${student.name}</strong></td>
                    <td>${student.email}</td>
                    <td>${student.course}</td>
                    <td>${student.batch}</td>
                    <td>
                        <div class="action-buttons">
                            <a href="edit_student.php?id=${student.id}" class="btn btn-warning btn-sm" title="Edit Student">Edit</a>
                            <button class="btn btn-danger btn-sm" onclick="confirmDelete(${student.id})" title="Delete Student">Delete</button>
                        </div>
                    </td>
                `;
                tbody.appendChild(row);
            });

            document.getElementById('table-section').style.display = 'block';
            document.getElementById('empty-state').style.display = 'none';
            document.getElementById('statistics-section').style.display = 'block';
        }

        /**
         * Update statistics based on students data
         */
        function updateStatistics(students) {
            // Total students
            document.getElementById('total-students').textContent = students.length;

            // Count unique courses
            const courses = new Set(students.map(s => s.course));
            document.getElementById('courses-count').textContent = courses.size;

            // Count unique batches
            const batches = new Set(students.map(s => s.batch));
            document.getElementById('batches-count').textContent = batches.size;
        }

        /**
         * Filter students based on search input
         */
        function filterStudents() {
            const searchTerm = document.getElementById('search-input').value.toLowerCase();
            
            if (!searchTerm) {
                loadAllStudents();
                return;
            }

            showLoading();

            loadStudents(function(response) {
                hideLoading();

                if (response.success && response.data.length > 0) {
                    const filtered = response.data.filter(student => 
                        student.name.toLowerCase().includes(searchTerm) ||
                        student.email.toLowerCase().includes(searchTerm) ||
                        student.course.toLowerCase().includes(searchTerm) ||
                        student.batch.toLowerCase().includes(searchTerm)
                    );

                    if (filtered.length > 0) {
                        displayStudents(filtered);
                        showAlert(`Found ${filtered.length} student(s) matching your search.`, 'info');
                    } else {
                        showEmptyState();
                        showAlert('No students found matching your search criteria.', 'info');
                    }
                }
            });
        }

        /**
         * Show loading state
         */
        function showLoading() {
            document.getElementById('loading-section').style.display = 'block';
            document.getElementById('table-section').style.display = 'none';
            document.getElementById('empty-state').style.display = 'none';
            document.getElementById('statistics-section').style.display = 'none';
        }

        /**
         * Hide loading state
         */
        function hideLoading() {
            document.getElementById('loading-section').style.display = 'none';
        }

        /**
         * Show empty state
         */
        function showEmptyState() {
            document.getElementById('empty-state').style.display = 'block';
            document.getElementById('table-section').style.display = 'none';
            document.getElementById('statistics-section').style.display = 'none';
        }

        /**
         * Search on Enter key
         */
        document.addEventListener('DOMContentLoaded', function() {
            document.getElementById('search-input').addEventListener('keypress', function(e) {
                if (e.key === 'Enter') {
                    filterStudents();
                }
            });

            // Load students on page load
            loadAllStudents();
        });
    </script>
</body>
</html>
