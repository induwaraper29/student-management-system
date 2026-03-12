<?php
/**
 * Database Connection File
 * This file establishes a connection to the MySQL database
 * for the Student Management System
 */

// Database Configuration
define('DB_HOST', 'localhost');
define('DB_USER', 'root');
define('DB_PASSWORD', '');
define('DB_NAME', 'student_management_system');

// Create Connection
$conn = new mysqli(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME);

// Check Connection
if ($conn->connect_error) {
    die("Connection Failed: " . $conn->connect_error);
}

// Set Charset
$conn->set_charset("utf8");

/**
 * Function to escape user input for security
 * @param string $data The data to escape
 * @param mysqli $conn The database connection
 * @return string The escaped string
 */
function escape_input($data, $conn) {
    return $conn->real_escape_string(trim($data));
}

/**
 * Function to check if email exists
 * @param string $email The email to check
 * @param mysqli $conn The database connection
 * @return bool True if email exists, false otherwise
 */
function email_exists($email, $conn, $exclude_id = null) {
    $email = escape_input($email, $conn);
    $query = "SELECT id FROM students WHERE email = '$email'";
    
    if ($exclude_id) {
        $query .= " AND id != '$exclude_id'";
    }
    
    $result = $conn->query($query);
    
    if ($result->num_rows > 0) {
        return true;
    }
    return false;
}

?>
