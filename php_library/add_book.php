<?php
require 'db.php';
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $title = $conn->real_escape_string($_POST["title"]);
    $author = $conn->real_escape_string($_POST["author"]);
    $conn->query("INSERT INTO books (title, author) VALUES ('$title', '$author')");
}
header("Location: index.php");
exit;
