CREATE DATABASE IF NOT EXISTS student_crud_db;
USE student_crud_db;

CREATE TABLE IF NOT EXISTS students (
    id INT AUTO_INCREMENT PRIMARY KEY,
    student_name VARCHAR(100) NOT NULL,
    course VARCHAR(100) NOT NULL,
    year_level VARCHAR(20) NOT NULL
);

INSERT INTO students (student_name, course, year_level) VALUES
('Juan Dela Cruz', 'BS Information Technology', '3rd Year'),
('Maria Santos', 'BS Computer Science', '2nd Year');
