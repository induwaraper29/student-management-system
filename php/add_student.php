<?php
/**
 * Add Student - Handles POST request to add a new student
 * This file processes the form submission to create a new student record
 */

header('Content-Type: application/json');

// Include Database Connection
require_once 'db_connect.php';

// Check if request is POST
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Get and validate input data
    $name = isset($_POST['name']) ? escape_input($_POST['name'], $conn) : '';
    $email = isset($_POST['email']) ? escape_input($_POST['email'], $conn) : '';
    $course = isset($_POST['course']) ? escape_input($_POST['course'], $conn) : '';
    $batch = isset($_POST['batch']) ? escape_input($_POST['batch'], $conn) : '';

    // Validation
    $errors = array();

    if (empty($name)) {
        $errors[] = "Student name is required.";
    } elseif (strlen($name) < 3) {
        $errors[] = "Student name must be at least 3 characters long.";
    }

    if (empty($email)) {
        $errors[] = "Email is required.";
    } elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $errors[] = "Invalid email format.";
    } elseif (email_exists($email, $conn)) {
        $errors[] = "Email already exists in the database.";
    }

    if (empty($course)) {
        $errors[] = "Course is required.";
    }

    if (empty($batch)) {
        $errors[] = "Batch is required.";
    }

    // If validation passes, insert into database
    if (empty($errors)) {
        $sql = "INSERT INTO students (name, email, course, batch) VALUES ('$name', '$email', '$course', '$batch')";

        if ($conn->query($sql) === TRUE) {
            echo json_encode([
                'success' => true,
                'message' => 'Student added successfully!',
                'student_id' => $conn->insert_id
            ]);
        } else {
            echo json_encode([
                'success' => false,
                'message' => 'Error adding student: ' . $conn->error
            ]);
        }
    } else {
        echo json_encode([
            'success' => false,
            'message' => implode(' ', $errors),
            'errors' => $errors
        ]);
    }
} else {
    echo json_encode([
        'success' => false,
        'message' => 'Invalid request method. Only POST is allowed.'
    ]);
}

// Close Connection
$conn->close();

?>
