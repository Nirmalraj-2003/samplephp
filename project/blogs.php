
<?php
session_start();
include 'includes/db.php';

$blogs = [];
$stmt = $pdo->prepare("SELECT b.*, a.username FROM blogs b JOIN authors a ON b.author_id = a.id ORDER BY b.created_at DESC");
$stmt->execute();
$blogs = $stmt->fetchAll(PDO::FETCH_ASSOC);

$showLoginModal = isset($_SESSION['show_login_modal']) && $_SESSION['show_login_modal'] === true;
unset($_SESSION['show_login_modal']); // Clear the session flag
?>

<?php include 'includes/header.php'; ?>
<main>
    <h1>Blogs</h1>
    <?php if (isset($_SESSION['author_id'])): ?>
        <button onclick="showCreateBlogModal()">Create New Blog</button>
    <?php endif; ?>

    <div class="blogs-container">
        <?php foreach ($blogs as $blog): ?>
            <div class="blog-card">
                <h2><a href="view-blog.php?slug=<?= $blog['slug']; ?>"><?= htmlspecialchars($blog['title']); ?></a></h2>
                <p><?= htmlspecialchars(substr($blog['content'], 0, 100)); ?>...</p>
                <p><strong>Author:</strong> <?= htmlspecialchars($blog['username']); ?></p>
                <p><strong>Created At:</strong> <?= htmlspecialchars($blog['created_at']); ?></p>
                <a href="view-blog.php?slug=<?= $blog['slug']; ?>">Read more</a>

                <?php if (isset($_SESSION['author_id']) && $_SESSION['author_id'] === $blog['author_id']): ?>
                    <a href="edit-blog.php?id=<?= $blog['id']; ?>">Edit</a>
                    <form method="POST" action="delete-blog.php" onsubmit="return confirm('Are you sure you want to delete this blog?')">
                        <input type="hidden" name="blog_id" value="<?= $blog['id']; ?>">
                        <button type="submit">Delete</button>
                    </form>
                <?php endif; ?>
            </div>
        <?php endforeach; ?>
    </div>
</main>

<!-- Login Modal -->
<div id="login-modal" class="modal" style="display: <?= $showLoginModal ? 'block' : 'none'; ?>;">
    <div class="modal-content">
        <span class="close" onclick="document.getElementById('login-modal').style.display='none'">&times;</span>
        <h2>Login</h2>
        <form method="POST" action="login-handler.php">
            <label for="login_username">Username:</label>
            <input type="text" name="login_username" required>
            <label for="login_password">Password:</label>
            <input type="password" name="login_password" required>
            <button type="submit">Login</button>
        </form>
    </div>
</div>

<script>
    // Close modal when clicking outside of it
    window.onclick = function(event) {
        var modal = document.getElementById('login-modal');
        if (event.target == modal) {
            modal.style.display = "none";
        }
    }
</script>



<?php include 'includes/footer.php'; ?>
