<?php
require_once '../core/models.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['submit'])) {
    $data = [
        'first_name' => $_POST['first_name'],
        'last_name' => $_POST['last_name'],
        'gender' => $_POST['gender'],
        'section' => $_POST['section'],
        'dream_job' => $_POST['dream_job'],
        'specialty' => $_POST['specialty']
    ];
    addStudent($pdo, $data);
}

$students = getAllStudents($pdo);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Student Management System</title>
    <style>
        body { font-family: Arial, sans-serif; }
        table { width: 100%; border-collapse: collapse; }
        th, td { padding: 8px; border: 1px solid #ccc; text-align: left; }
        th { background-color: #f2f2f2; }
        form { margin-bottom: 20px; }
        label {
            width: 30%; 
            display: inline-block; 
            margin-right: 10px; 
        }
        input[type="text"], select {
            width: 65%; 
            padding: 8px; 
            margin-bottom: 10px; 
        }
        input[type="submit"] {
            width: 10%;
            padding: 10px;
            background-color: #007BFF;
            color: white;
            border: none;
            border-radius: 4px;
            cursor: pointer;
			margin: 20px auto;
			display: block;
        }
        input[type="submit"]:hover {
            background-color: #0056b3; 
        }
    </style>
</head>
<body>
    <h1>Welcome to the Student Management System</h1>
    <form action="" method="POST">
        <label for="first_name">First Name:</label>
        <input type="text" name="first_name" required>

        <label for="last_name">Last Name:</label>
        <input type="text" name="last_name" required>

        <label for="gender">Gender:</label>
        <select name="gender" required>
            <option value="">Select Gender</option>
            <option value="Male">Male</option>
            <option value="Female">Female</option>
			<option value="Attack-Helicopter">Attack-Helicopter</option>
            <option value="Other">Other</option>
        </select>

        <label for="section">Section:</label>
        <input type="text" name="section" required>

        <label for="dream_job">Dream Job:</label>
        <input type="text" name="dream_job" required>

        <label for="specialty">Specialty:</label>
        <input type="text" name="specialty" required>

        <input type="submit" name="submit" value="Submit">
    </form>

    <h2>Student Records</h2>
    <table>
        <thead>
            <tr>
                <th>ID</th>
                <th>First Name</th>
                <th>Last Name</th>
                <th>Gender</th>
                <th>Section</th>
                <th>Dream Job</th>
                <th>Specialty</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($students as $student): ?>
                <tr>
                    <td><?php echo htmlspecialchars($student['student_id']); ?></td>
                    <td><?php echo htmlspecialchars($student['first_name']); ?></td>
                    <td><?php echo htmlspecialchars($student['last_name']); ?></td>
                    <td><?php echo htmlspecialchars($student['gender']); ?></td>
                    <td><?php echo htmlspecialchars($student['section']); ?></td>
                    <td><?php echo htmlspecialchars($student['dream_job']); ?></td>
                    <td><?php echo htmlspecialchars($student['specialty']); ?></td>
                    <td>
                        <a href="editstudent.php?id=<?php echo $student['student_id']; ?>">Edit</a>
                        <a href="handleForm.php?deleteStudentBtn=1&id=<?php echo $student['student_id']; ?>">Delete</a>
                    </td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</body>
</html>
