<?php
/**
 * Delete Student - Handles POST request to delete a student record
 * This file processes the deletion of a student from the database
 */

header('Content-Type: application/json');

// Include Database Connection
require_once 'db_connect.php';

// Check if request is POST
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Get and validate student ID
    $id = isset($_POST['id']) ? intval($_POST['id']) : 0;

    // Validation
    $errors = array();

    if ($id <= 0) {
        $errors[] = "Invalid student ID.";
    } else {
        // Check if student exists
        $check_sql = "SELECT id, name FROM students WHERE id = $id";
        $check_result = $conn->query($check_sql);
        
        if ($check_result->num_rows === 0) {
            $errors[] = "Student not found.";
        }
    }

    // If validation passes, delete from database
    if (empty($errors)) {
        $sql = "DELETE FROM students WHERE id = $id";

        if ($conn->query($sql) === TRUE) {
            echo json_encode([
                'success' => true,
                'message' => 'Student deleted successfully!',
                'student_id' => $id
            ]);
        } else {
            echo json_encode([
                'success' => false,
                'message' => 'Error deleting student: ' . $conn->error
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
