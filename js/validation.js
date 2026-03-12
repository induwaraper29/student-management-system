/**
 * Student Management System - JavaScript Validation
 * Handles form validation and AJAX operations
 */

// ========================================
// Form Validation Functions
// ========================================

/**
 * Validates email format
 * @param {string} email - The email to validate
 * @returns {boolean} True if valid, false otherwise
 */
function validateEmail(email) {
    const emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
    return emailRegex.test(email);
}

/**
 * Validates student name
 * @param {string} name - The name to validate
 * @returns {boolean} True if valid, false otherwise
 */
function validateName(name) {
    return name.trim().length >= 3;
}

/**
 * Validates that a field is not empty
 * @param {string} value - The value to validate
 * @returns {boolean} True if not empty, false otherwise
 */
function validateRequired(value) {
    return value.trim().length > 0;
}

/**
 * Main form validation function
 * @param {object} formData - Object containing form data
 * @returns {object} Object with validation result and error messages
 */
function validateStudentForm(formData) {
    const errors = [];

    // Validate Name
    if (!validateRequired(formData.name)) {
        errors.push("Student name is required.");
    } else if (!validateName(formData.name)) {
        errors.push("Student name must be at least 3 characters long.");
    }

    // Validate Email
    if (!validateRequired(formData.email)) {
        errors.push("Email is required.");
    } else if (!validateEmail(formData.email)) {
        errors.push("Please enter a valid email address.");
    }

    // Validate Course
    if (!validateRequired(formData.course)) {
        errors.push("Course is required.");
    }

    // Validate Batch
    if (!validateRequired(formData.batch)) {
        errors.push("Batch is required.");
    }

    return {
        isValid: errors.length === 0,
        errors: errors
    };
}

// ========================================
// Display Functions
// ========================================

/**
 * Displays an alert message to the user
 * @param {string} message - The message to display
 * @param {string} type - The type of alert (success, error, warning, info)
 */
function showAlert(message, type = 'info') {
    const alertDiv = document.createElement('div');
    alertDiv.className = `alert alert-${type}`;
    alertDiv.textContent = message;

    const alertContainer = document.getElementById('alert-container');
    if (alertContainer) {
        alertContainer.innerHTML = '';
        alertContainer.appendChild(alertDiv);
        window.scrollTo(0, 0);
    } else {
        alert(message);
    }

    // Auto-remove alert after 5 seconds
    setTimeout(function() {
        if (alertDiv.parentNode) {
            alertDiv.remove();
        }
    }, 5000);
}

/**
 * Displays multiple validation error messages
 * @param {array} errors - Array of error messages
 */
function showValidationErrors(errors) {
    if (errors.length === 1) {
        showAlert(errors[0], 'error');
    } else {
        const errorList = '<ul style="text-align: left;">' +
            errors.map(error => `<li>${error}</li>`).join('') +
            '</ul>';
        const alertDiv = document.createElement('div');
        alertDiv.className = 'alert alert-error';
        alertDiv.innerHTML = '<strong>Validation Errors:</strong>' + errorList;

        const alertContainer = document.getElementById('alert-container');
        if (alertContainer) {
            alertContainer.innerHTML = '';
            alertContainer.appendChild(alertDiv);
        }
    }
}

// ========================================
// AJAX Functions
// ========================================

/**
 * Adds a new student via AJAX
 * @param {object} formData - The form data to submit
 * @param {function} callback - Callback function after completion
 */
function addStudent(formData, callback) {
    const form = new FormData();
    form.append('name', formData.name);
    form.append('email', formData.email);
    form.append('course', formData.course);
    form.append('batch', formData.batch);

    fetch('php/add_student.php', {
        method: 'POST',
        body: form
    })
    .then(response => response.json())
    .then(data => {
        if (callback) callback(data);
    })
    .catch(error => {
        console.error('Error:', error);
        showAlert('An error occurred while adding the student.', 'error');
    });
}

/**
 * Updates an existing student via AJAX
 * @param {object} formData - The form data to submit
 * @param {function} callback - Callback function after completion
 */
function updateStudent(formData, callback) {
    const form = new FormData();
    form.append('id', formData.id);
    form.append('name', formData.name);
    form.append('email', formData.email);
    form.append('course', formData.course);
    form.append('batch', formData.batch);

    fetch('php/update_student.php', {
        method: 'POST',
        body: form
    })
    .then(response => response.json())
    .then(data => {
        if (callback) callback(data);
    })
    .catch(error => {
        console.error('Error:', error);
        showAlert('An error occurred while updating the student.', 'error');
    });
}

/**
 * Loads students from the database via AJAX
 * @param {function} callback - Callback function with students data
 */
function loadStudents(callback) {
    fetch('php/view_students.php')
        .then(response => response.json())
        .then(data => {
            if (callback) callback(data);
        })
        .catch(error => {
            console.error('Error:', error);
            showAlert('An error occurred while loading students.', 'error');
        });
}

/**
 * Fetches a specific student's data for editing
 * @param {number} studentId - The ID of the student to fetch
 * @param {function} callback - Callback function with student data
 */
function getStudent(studentId, callback) {
    fetch(`php/update_student.php?id=${studentId}`)
        .then(response => response.json())
        .then(data => {
            if (callback) callback(data);
        })
        .catch(error => {
            console.error('Error:', error);
            showAlert('An error occurred while fetching student data.', 'error');
        });
}

/**
 * Deletes a student via AJAX
 * @param {number} studentId - The ID of the student to delete
 * @param {function} callback - Callback function after deletion
 */
function deleteStudent(studentId, callback) {
    const form = new FormData();
    form.append('id', studentId);

    fetch('php/delete_student.php', {
        method: 'POST',
        body: form
    })
    .then(response => response.json())
    .then(data => {
        if (callback) callback(data);
    })
    .catch(error => {
        console.error('Error:', error);
        showAlert('An error occurred while deleting the student.', 'error');
    });
}

// ========================================
// Form Submission Handlers
// ========================================

/**
 * Handles the add/edit student form submission
 * @param {event} e - The form submission event
 * @param {boolean} isUpdate - Whether this is an update operation
 */
function handleStudentFormSubmit(e, isUpdate = false) {
    e.preventDefault();

    const form = e.target;
    const formData = {
        name: document.getElementById('student-name').value,
        email: document.getElementById('student-email').value,
        course: document.getElementById('student-course').value,
        batch: document.getElementById('student-batch').value
    };

    // Validate form
    const validation = validateStudentForm(formData);
    if (!validation.isValid) {
        showValidationErrors(validation.errors);
        return;
    }

    // Add student ID if updating
    if (isUpdate) {
        formData.id = document.getElementById('student-id').value;
    }

    // Show loading state
    const submitBtn = form.querySelector('input[type="submit"]');
    const originalText = submitBtn.value;
    submitBtn.value = 'Processing...';
    submitBtn.disabled = true;

    // Submit form
    const submitFunction = isUpdate ? updateStudent : addStudent;
    submitFunction(formData, function(response) {
        submitBtn.value = originalText;
        submitBtn.disabled = false;

        if (response.success) {
            showAlert(response.message, 'success');
            form.reset();
            setTimeout(function() {
                if (isUpdate) {
                    window.location.href = 'view_students.php';
                } else {
                    // Stay on the form or redirect
                    window.location.href = 'view_students.php';
                }
            }, 1500);
        } else {
            if (response.errors && Array.isArray(response.errors)) {
                showValidationErrors(response.errors);
            } else {
                showAlert(response.message, 'error');
            }
        }
    });
}

// ========================================
// DOM Ready Function
// ========================================

/**
 * Initializes event listeners when DOM is ready
 */
document.addEventListener('DOMContentLoaded', function() {
    // Set active navigation link
    const currentPage = window.location.pathname.split('/').pop() || 'index.php';
    const navLinks = document.querySelectorAll('nav a');
    navLinks.forEach(link => {
        const href = link.getAttribute('href');
        if (href === currentPage || (currentPage === '' && href === 'index.php')) {
            link.classList.add('active');
        }
    });

    // Add form submit handlers
    const addStudentForm = document.getElementById('add-student-form');
    if (addStudentForm) {
        addStudentForm.addEventListener('submit', function(e) {
            handleStudentFormSubmit(e, false);
        });
    }

    const editStudentForm = document.getElementById('edit-student-form');
    if (editStudentForm) {
        editStudentForm.addEventListener('submit', function(e) {
            handleStudentFormSubmit(e, true);
        });
    }
});

// ========================================
// Delete Confirmation
// ========================================

/**
 * Confirms deletion before proceeding
 * @param {number} studentId - The ID of the student to delete
 * @returns {boolean} True if user confirms, false otherwise
 */
function confirmDelete(studentId) {
    if (confirm('Are you sure you want to delete this student? This action cannot be undone.')) {
        deleteStudent(studentId, function(response) {
            if (response.success) {
                showAlert(response.message, 'success');
                setTimeout(function() {
                    location.reload();
                }, 1500);
            } else {
                showAlert(response.message, 'error');
            }
        });
        return true;
    }
    return false;
}

// ========================================
// Utility Functions
// ========================================

/**
 * Formats a date string to a readable format
 * @param {string} dateString - The date string to format
 * @returns {string} Formatted date
 */
function formatDate(dateString) {
    const options = { year: 'numeric', month: 'short', day: 'numeric', hour: '2-digit', minute: '2-digit' };
    return new Date(dateString).toLocaleDateString('en-US', options);
}

/**
 * Truncates text to a specified length
 * @param {string} text - The text to truncate
 * @param {number} length - Maximum length
 * @returns {string} Truncated text
 */
function truncateText(text, length = 50) {
    if (text.length > length) {
        return text.substring(0, length) + '...';
    }
    return text;
}
