<?php

$host = "localhost";
$user = "root";
$password = "";
$dbname = "AAA";
$dsn = "mysql:host={$host};dbname={$dbname}";

$pdo = new PDO(dsn: $dsn, username: $user, password: $password);
$pdo = exec(command: "SET time_zone = '+08:00';");

?>
