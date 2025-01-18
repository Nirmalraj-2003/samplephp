<?php
session_start();
include 'includes/db.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_SESSION['username'])) {
    $blogId = $_POST['blog_id'];
    $title = $_POST['title'];
    $content = $_POST['content'];

    if ($pdo) {
        $stmt = $pdo->prepare("UPDATE blogs SET title = :title, content = :content WHERE id = :id AND author = :author");
        $stmt->execute(['title' => $title, 'content' => $content, 'id' => $blogId, 'author' => $_SESSION['username']]);
        header('Location: blog.php'); // Redirect back to blog page
        exit;
    }
}
?>


</body>
</html>

