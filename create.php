<?php
include 'config.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $student_name = $_POST['student_name'];
    $course = $_POST['course'];
    $year_level = $_POST['year_level'];

    $stmt = $conn->prepare("INSERT INTO students (student_name, course, year_level) VALUES (?, ?, ?)");
    $stmt->bind_param("sss", $student_name, $course, $year_level);

    if ($stmt->execute()) {
        header("Location: index.php");
        exit;
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Student</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">
<div class="container mt-5" style="max-width:600px;">
    <div class="card shadow-sm">
        <div class="card-body">
            <h3 class="mb-3">Add Student</h3>
            <form method="POST">
                <div class="mb-3">
                    <label class="form-label">Student Name</label>
                    <input type="text" name="student_name" class="form-control" required>
                </div>
                <div class="mb-3">
                    <label class="form-label">Course</label>
                    <input type="text" name="course" class="form-control" required>
                </div>
                <div class="mb-3">
                    <label class="form-label">Year Level</label>
                    <select name="year_level" class="form-select" required>
                        <option value="">Select Year Level</option>
                        <option>1st Year</option>
                        <option>2nd Year</option>
                        <option>3rd Year</option>
                        <option>4th Year</option>
                    </select>
                </div>
                <button class="btn btn-success">Save</button>
                <a href="index.php" class="btn btn-secondary">Back</a>
            </form>
        </div>
    </div>
</div>
</body>
</html>
