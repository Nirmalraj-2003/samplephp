<?php
session_start();
require 'includes/db.php';

if (!isset($_SESSION['is_author'])) {
    header('Location: login.php');
    exit;
}

$stmt = $pdo->query("SELECT * FROM blogs");
$blogs = $stmt->fetchAll(PDO::FETCH_ASSOC);
?>

<?php include 'includes/header.php'; ?>
<main>
    <h1>Our Blogs</h1>

    <?php if ($_SESSION['is_author']) : ?>
        <a href="create_blog.php">Create New Blog</a>
    <?php endif; ?>

    <div class="blogs-container">
        <?php foreach ($blogs as $blog) : ?>
            <div class="blog">
   <h2><a href="blog.php?slug=<?= htmlspecialchars($blog['slug']) ?>"><?= htmlspecialchars($blog['title']) ?></a></h2>
                <p>
    <?= htmlspecialchars(substr($blog['content'], 0, 100)) ?>...
                    <a href="blog.php?slug=<?= htmlspecialchars($blog['slug']) ?>">Read more</a>
                </p>
    <p><strong>Author:</strong> <?= htmlspecialchars($blog['author']) ?></p>
    <p><strong>Date:</strong> <?= htmlspecialchars($blog['created_at']) ?></p>

                <?php if ($_SESSION['is_author']) : ?>
    <a href="edit_blog.php?id=<?= $blog['id'] ?>">Edit</a>
    <a href="delete_blog.php?id=<?= $blog['id'] ?>" onclick="return confirm('Are you sure you want to delete this blog?');">Delete</a>
                <?php endif; ?>
            </div>
        <?php endforeach; ?>
    </div>
</main>
<?php include 'includes/footer.php'; ?>

