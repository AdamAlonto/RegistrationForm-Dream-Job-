<?php
require_once '../core/models.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['update'])) {
    $data = [
        'student_id' => $_POST['student_id'],
        'first_name' => $_POST['first_name'],
        'last_name' => $_POST['last_name'],
        'gender' => $_POST['gender'],
        'section' => $_POST['section'],
        'dream_job' => $_POST['dream_job'],
        'specialty' => $_POST['specialty']
    ];
    updateStudent($pdo, $data);
    header('Location: index.php');
    exit();
}

if (isset($_GET['id'])) {
    $student = getStudentByID($pdo, $_GET['id']);
} else {
    header('Location: index.php');
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Student</title>
    <style>
        body { font-family: Arial, sans-serif; }
        form { margin-bottom: 20px; }
        input[type="text"], select { width: 100%; padding: 8px; margin: 5px 0; }
    </style>
</head>
<body>
    <h1>Edit Student</h1>
    <form action="" method="POST">
        <input type="hidden" name="student_id" value="<?php echo htmlspecialchars($student['student_id']); ?>">
        <label>First Name:</label>
        <input type="text" name="first_name" value="<?php echo htmlspecialchars($student['first_name']); ?>" required>
        <label>Last Name:</label>
        <input type="text" name="last_name" value="<?php echo htmlspecialchars($student['last_name']); ?>" required>
        <label>Gender:</label>
        <select name="gender" required>
            <option value="Male" <?php echo $student['gender'] === 'Male' ? 'selected' : ''; ?>>Male</option>
            <option value="Female" <?php echo $student['gender'] === 'Female' ? 'selected' : ''; ?>>Female</option>
            <option value="Attack-Helicopter" <?php echo $student['gender'] === 'Attack-Helicopter' ? 'selected' : ''; ?>>Attack-Helicopter</option>
            <option value="Other" <?php echo $student['gender'] === 'Other' ? 'selected' : ''; ?>>Other</option>
        </select>
        <label>Section:</label>
        <input type="text" name="section" value="<?php echo htmlspecialchars($student['section']); ?>" required>
        <label>Dream Job:</label>
        <input type="text" name="dream_job" value="<?php echo htmlspecialchars($student['dream_job']); ?>" required>
        <label>Specialty:</label>
        <input type="text" name="specialty" value="<?php echo htmlspecialchars($student['specialty']); ?>" required>
        <input type="submit" name="update" value="Update">
    </form>
    <a href="index.php">Back to Student List</a>
</body>
</html>
