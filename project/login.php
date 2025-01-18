<?php
session_start();
if (isset($_SESSION['register_success'])) {
    $success_message = $_SESSION['register_success'];
    unset($_SESSION['register_success']); // Clear the message after displaying it
}
?>

<?php include_once 'includes/header.php'; ?>

<main id="login-popup" style="display:none;">
    <h1>Login</h1>

    <?php if (isset($success_message)): ?>
        <p class="success-message"><?= htmlspecialchars($success_message); ?></p>
    <?php endif; ?>

    <?php if (isset($error_message)): ?>
        <p class="error-message"><?= htmlspecialchars($error_message); ?></p>
    <?php endif; ?>

    <div id="login-form" class="form-container">
        <form method="POST" action="login.php">
            <label for="username">Username:</label>
            <input type="text" name="username" required>

            <label for="password">Password:</label>
            <input type="password" name="password" required>

            <button type="submit" name="login">Login</button>
        </form>
        <p>Don't have an account? <a href="register.php">Register here</a></p>
    </div>
</main>

</body>
</html>


</body>
</html>





