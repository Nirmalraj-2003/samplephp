<?php
include 'includes/db.php';

$slug = $_GET['slug'] ?? null;

$stmt = $pdo->prepare("SELECT b.*, a.username FROM blogs b JOIN authors a ON b.author_id = a.id WHERE b.slug = :slug");
$stmt->execute(['slug' => $slug]);
$blog = $stmt->fetch(PDO::FETCH_ASSOC);

if (!$blog) {
    echo "Blog not found.";
    exit;
}

?>

<?php include 'includes/header.php'; ?>
<main>
    <h1><?= htmlspecialchars($blog['title']); ?></h1>
    <p><?= nl2br(htmlspecialchars($blog['content'])); ?></p>
    <p><strong>Author:</strong> <?= htmlspecialchars($blog['username']); ?></p>
    <p><strong>Created At:</strong> <?= htmlspecialchars($blog['created_at']); ?></p>
</main>
