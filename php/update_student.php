<?php
/**
 * Update Student - Handles POST request to update student information
 * This file processes form submission to update an existing student record
 */

header('Content-Type: application/json');

// Include Database Connection
require_once 'db_connect.php';

// Check if request is POST
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Get and validate input data
    $id = isset($_POST['id']) ? intval($_POST['id']) : 0;
    $name = isset($_POST['name']) ? escape_input($_POST['name'], $conn) : '';
    $email = isset($_POST['email']) ? escape_input($_POST['email'], $conn) : '';
    $course = isset($_POST['course']) ? escape_input($_POST['course'], $conn) : '';
    $batch = isset($_POST['batch']) ? escape_input($_POST['batch'], $conn) : '';

    // Validation
    $errors = array();

    if ($id <= 0) {
        $errors[] = "Invalid student ID.";
    } else {
        // Check if student exists
        $check_sql = "SELECT id FROM students WHERE id = $id";
        $check_result = $conn->query($check_sql);
        if ($check_result->num_rows === 0) {
            $errors[] = "Student not found.";
        }
    }

    if (empty($name)) {
        $errors[] = "Student name is required.";
    } elseif (strlen($name) < 3) {
        $errors[] = "Student name must be at least 3 characters long.";
    }

    if (empty($email)) {
        $errors[] = "Email is required.";
    } elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $errors[] = "Invalid email format.";
    } elseif (email_exists($email, $conn, $id)) {
        $errors[] = "Email already exists in the database.";
    }

    if (empty($course)) {
        $errors[] = "Course is required.";
    }

    if (empty($batch)) {
        $errors[] = "Batch is required.";
    }

    // If validation passes, update database
    if (empty($errors)) {
        $sql = "UPDATE students SET name = '$name', email = '$email', course = '$course', batch = '$batch' WHERE id = $id";

        if ($conn->query($sql) === TRUE) {
            echo json_encode([
                'success' => true,
                'message' => 'Student updated successfully!',
                'student_id' => $id
            ]);
        } else {
            echo json_encode([
                'success' => false,
                'message' => 'Error updating student: ' . $conn->error
            ]);
        }
    } else {
        echo json_encode([
            'success' => false,
            'message' => implode(' ', $errors),
            'errors' => $errors
        ]);
    }
} elseif ($_SERVER['REQUEST_METHOD'] === 'GET') {
    // GET request to fetch a specific student's data for editing
    $id = isset($_GET['id']) ? intval($_GET['id']) : 0;

    if ($id <= 0) {
        echo json_encode([
            'success' => false,
            'message' => 'Invalid student ID.'
        ]);
    } else {
        $sql = "SELECT id, name, email, course, batch FROM students WHERE id = $id";
        $result = $conn->query($sql);

        if ($result->num_rows > 0) {
            $student = $result->fetch_assoc();
            echo json_encode([
                'success' => true,
                'data' => $student
            ]);
        } else {
            echo json_encode([
                'success' => false,
                'message' => 'Student not found.'
            ]);
        }
    }
} else {
    echo json_encode([
        'success' => false,
        'message' => 'Invalid request method. Only GET and POST are allowed.'
    ]);
}

// Close Connection
$conn->close();

?>
