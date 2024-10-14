<?php
require_once 'dbConfig.php';

function getAllStudents($pdo) {
    $stmt = $pdo->prepare("SELECT * FROM students");
    $stmt->execute();
    return $stmt->fetchAll(PDO::FETCH_ASSOC);
}

function getStudentByID($pdo, $student_id) {
    $stmt = $pdo->prepare("SELECT * FROM students WHERE student_id = :student_id");
    $stmt->execute(['student_id' => $student_id]);
    return $stmt->fetch(PDO::FETCH_ASSOC);
}

function addStudent($pdo, $data) {
    $stmt = $pdo->prepare("INSERT INTO students (first_name, last_name, gender, section, dream_job, specialty) VALUES (:first_name, :last_name, :gender, :section, :dream_job, :specialty)");
    return $stmt->execute($data);
}

function updateStudent($pdo, $data) {
    $stmt = $pdo->prepare("UPDATE students SET first_name = :first_name, last_name = :last_name, gender = :gender, section = :section, dream_job = :dream_job, specialty = :specialty WHERE student_id = :student_id");
    return $stmt->execute($data);
}

function deleteStudent($pdo, $student_id) {
    $stmt = $pdo->prepare("DELETE FROM students WHERE student_id = :student_id");
    return $stmt->execute(['student_id' => $student_id]);
}
?>
