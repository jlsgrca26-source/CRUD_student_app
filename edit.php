<?php
include 'config.php';

$id = isset($_GET['id']) ? (int)$_GET['id'] : 0;
$result = $conn->query("SELECT * FROM students WHERE id = $id");
$student = $result->fetch_assoc();

if (!$student) {
    die("Student not found.");
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $student_name = $_POST['student_name'];
    $course = $_POST['course'];
    $year_level = $_POST['year_level'];

    $stmt = $conn->prepare("UPDATE students SET student_name=?, course=?, year_level=? WHERE id=?");
    $stmt->bind_param("sssi", $student_name, $course, $year_level, $id);

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
    <title>Edit Student</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">
<div class="container mt-5" style="max-width:600px;">
    <div class="card shadow-sm">
        <div class="card-body">
            <h3 class="mb-3">Edit Student</h3>
            <form method="POST">
                <div class="mb-3">
                    <label class="form-label">Student Name</label>
                    <input type="text" name="student_name" class="form-control" value="<?php echo htmlspecialchars($student['student_name']); ?>" required>
                </div>
                <div class="mb-3">
                    <label class="form-label">Course</label>
                    <input type="text" name="course" class="form-control" value="<?php echo htmlspecialchars($student['course']); ?>" required>
                </div>
                <div class="mb-3">
                    <label class="form-label">Year Level</label>
                    <select name="year_level" class="form-select" required>
                        <?php
                        $levels = ["1st Year", "2nd Year", "3rd Year", "4th Year"];
                        foreach ($levels as $level) {
                            $selected = ($student['year_level'] == $level) ? "selected" : "";
                            echo "<option $selected>$level</option>";
                        }
                        ?>
                    </select>
                </div>
                <button class="btn btn-primary">Update</button>
                <a href="index.php" class="btn btn-secondary">Back</a>
            </form>
        </div>
    </div>
</div>
</body>
</html>
