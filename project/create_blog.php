<?php
session_start();
require 'includes/db.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $title = $_POST['title'];
    $content = $_POST['content'];
    $slug = strtolower(trim(preg_replace('/[^A-Za-z0-9-]+/', '-', $title)));
    $author_id = $_SESSION['user_id'];

    $stmt = $pdo->prepare("INSERT INTO blogs (title, slug, content, author_id, created_at) VALUES (:title, :slug, :content, :author_id, NOW())");
    $stmt->execute(['title' => $title, 'slug' => $slug, 'content' => $content, 'author_id' => $author_id]);

    header('Location: blogs.php');
    exit;
}
?>

<?php include 'includes/header.php'; ?>
<main>
    <h1>Create New Blog</h1>
    <form method="POST">
        <label>Title:</label>
        <input type="text" name="title" required>
        <label>Content:</label>
        <textarea name="content" required></textarea>
        <button type="submit">Create Blog</button>
    </form>
</main>


<?php include 'includes/footer.php'; ?>
