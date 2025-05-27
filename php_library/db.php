<?php
$host = 'localhost';
$user = 'root';
$pass = '';
$db_name = 'library';
$conn = new mysqli($host, $user, $pass, $db_name);
if ($conn->connect_error) {
    die("Ошибка подключения: " . $conn->connect_error);
}
