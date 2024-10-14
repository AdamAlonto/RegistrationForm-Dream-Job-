<?php
require_once '../core/models.php';

if (isset($_GET['deleteStudentBtn']) && isset($_GET['id'])) {
    deleteStudent($pdo, $_GET['id']);
    header('Location: index.php');
    exit();
}

header('Location: index.php');
exit();
?>
