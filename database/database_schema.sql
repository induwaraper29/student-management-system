-- Student Management System Database Schema
-- Create Database
CREATE DATABASE IF NOT EXISTS student_management_system;

-- Use the database
USE student_management_system;

-- Create Students Table
CREATE TABLE IF NOT EXISTS students (
    id INT AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(100) NOT NULL,
    email VARCHAR(100) NOT NULL UNIQUE,
    course VARCHAR(100) NOT NULL,
    batch VARCHAR(50) NOT NULL,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    updated_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
);

-- Insert Sample Data (Optional)
INSERT INTO students (name, email, course, batch) VALUES
('John Doe', 'john.doe@example.com', 'Diploma in Information Technology', '2024-Batch'),
('Jane Smith', 'jane.smith@example.com', 'Diploma in Business Management', '2024-Batch'),
('Michael Johnson', 'michael.johnson@example.com', 'Diploma in Engineering', '2023-Batch'),
('Sarah Williams', 'sarah.williams@example.com', 'Diploma in Information Technology', '2025-Batch');
