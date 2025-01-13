



<?php
session_start();
require 'includes/db.php';


if (!isset($_GET['slug'])) {
    echo "Blog not found.";
    exit;
}

$slug = $_GET['slug'];

$stmt = $pdo->prepare("SELECT * FROM blogs WHERE slug = :slug");
$stmt->execute(['slug' => $slug]);
$blog = $stmt->fetch(PDO::FETCH_ASSOC);


if (!$blog) {
    echo "Blog not found.";
    exit;
}

?>

<?php include 'includes/header.php'; ?>
<main>
    <h1><?= htmlspecialchars($blog['title']) ?></h1>
    <p><strong>Author:</strong> <?= htmlspecialchars($blog['author']) ?></p>
    <p><strong>Date:</strong> <?= htmlspecialchars($blog['created_at']) ?></p>
    <p><?= nl2br(htmlspecialchars($blog['content'])) ?></p>

    <?php if ($_SESSION['is_author']) : ?>
        <a href="edit_blog.php?id=<?= $blog['id'] ?>">Edit</a>
        <a href="delete_blog.php?id=<?= $blog['id'] ?>" onclick="return confirm('Are you sure you want to delete this blog?');">Delete</a>
    <?php endif; ?>
</main>
<?php include 'includes/footer.php'; ?>
