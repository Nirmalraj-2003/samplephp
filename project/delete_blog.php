
<?php
session_start();
require 'includes/db.php';

// Ensure user is logged in
if (!isset($_SESSION['is_logged_in']) || !$_SESSION['is_logged_in']) {
    header('Location: login.php');
    exit;
}

if (isset($_GET['slug'])) {
    $slug = $_GET['slug'];

    // Fetch the blog to check if the logged-in user is the owner
    $stmt = $pdo->prepare("SELECT * FROM blogs WHERE slug = :slug");
    $stmt->execute(['slug' => $slug]);
    $blog = $stmt->fetch();

    if ($blog && $blog['author_id'] == $_SESSION['user_id']) {
        // Delete the blog if the user is the owner
        $stmt = $pdo->prepare("DELETE FROM blogs WHERE slug = :slug");
        $stmt->execute(['slug' => $slug]);
        $_SESSION['blog_deleted'] = "Blog deleted successfully!";
    }
}

header('Location: blogs.php');
exit;
?>
