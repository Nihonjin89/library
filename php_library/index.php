<?php
require 'db.php';
$books = $conn->query("SELECT b.id, b.title, b.author, AVG(r.score) as avg_rating
                       FROM books b LEFT JOIN ratings r ON b.id = r.book_id
                       GROUP BY b.id")->fetch_all(MYSQLI_ASSOC);
?>
<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <title>Онлайн Библиотека</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <h1>Онлайн Библиотека</h1>
    <form action="add_book.php" method="post">
        <input type="text" name="title" placeholder="Название книги" required>
        <input type="text" name="author" placeholder="Автор" required>
        <button type="submit">Добавить книгу</button>
    </form>
    <div class="books">
        <?php foreach ($books as $book): ?>
            <div class="book">
                <b><?= htmlspecialchars($book['title']) ?></b> — <?= htmlspecialchars($book['author']) ?><br>
                Рейтинг: <?= $book['avg_rating'] ? number_format($book['avg_rating'], 2) : 'Нет' ?><br>
                <form action="rate_book.php" method="post">
                    <input type="hidden" name="book_id" value="<?= $book['id'] ?>">
                    <?php for ($i = 1; $i <= 5; $i++): ?>
                        <button name="score" value="<?= $i ?>"><?= $i ?></button>
                    <?php endfor; ?>
                </form>
            </div>
        <?php endforeach; ?>
    </div>
</body>
</html>
