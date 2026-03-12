<?php
/**
 * View Students - Retrieves and displays all student records
 * This file handles both GET requests for viewing and API responses
 */

header('Content-Type: application/json');

// Include Database Connection
require_once 'db_connect.php';

// Check if request is GET
if ($_SERVER['REQUEST_METHOD'] === 'GET') {
    // Query to fetch all students, ordered by most recent
    $sql = "SELECT id, name, email, course, batch, created_at FROM students ORDER BY created_at DESC";
    
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        $students = array();
        
        // Fetch all student records
        while ($row = $result->fetch_assoc()) {
            $students[] = $row;
        }

        echo json_encode([
            'success' => true,
            'total' => count($students),
            'data' => $students
        ]);
    } else {
        echo json_encode([
            'success' => true,
            'total' => 0,
            'data' => [],
            'message' => 'No students found in the database.'
        ]);
    }
} else {
    echo json_encode([
        'success' => false,
        'message' => 'Invalid request method. Only GET is allowed.'
    ]);
}

// Close Connection
$conn->close();

?>
