<?php
require 'db.php';
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $book_id = (int)$_POST["book_id"];
    $score = (int)$_POST["score"];
    if ($score >= 1 && $score <= 5) {
        $conn->query("INSERT INTO ratings (book_id, score) VALUES ($book_id, $score)");
    }
}
header("Location: index.php");
exit;
