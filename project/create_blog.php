<?php
session_start();
include 'includes/db.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_SESSION['author_id'])) {
    $title = $_POST['title'];
    $slug = strtolower(str_replace(' ', '-', $title));
    $content = $_POST['content'];
    $author_id = $_SESSION['author_id'];

    $stmt = $pdo->prepare("INSERT INTO blogs (title, slug, content, author_id, created_at) VALUES (:title, :slug, :content, :author_id, NOW())");
    $stmt->execute(['title' => $title, 'slug' => $slug, 'content' => $content, 'author_id' => $author_id]);

    header('Location: blog.php');
    exit;
}
?>




</body>
</html>
