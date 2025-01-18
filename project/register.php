<?php
session_start();
include 'includes/db.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $username = $_POST['reg_username'];
    $email = $_POST['reg_email'];
    $password = password_hash($_POST['reg_password'], PASSWORD_DEFAULT);

    if ($pdo) {
        $stmt = $pdo->prepare("INSERT INTO authors (username, email, password) VALUES (:username, :email, :password)");
        if ($stmt->execute(['username' => $username, 'email' => $email, 'password' => $password])) {
            $_SESSION['register_success'] = "Registration successful! Please log in.";
            $_SESSION['show_login_modal'] = true; // Set session flag to show login modal
            header('Location: blog.php'); // Redirect to the blog page where the login modal will show
            exit;
        } else {
            $error_message = "Registration failed.";
        }
    } else {
        $error_message = "Database connection failed.";
    }
}
?>

<?php include 'includes/header.php'; ?>
<main>
    <h1>Register</h1>
    <?php if (isset($error_message)): ?>
        <p class="error-message"><?= htmlspecialchars($error_message); ?></p>
    <?php endif; ?>
    <form method="POST">
        <label for="reg_username">Username:</label>
        <input type="text" name="reg_username" required>
        <label for="reg_email">Email:</label>
        <input type="email" name="reg_email" required>
        <label for="reg_password">Password:</label>
        <input type="password" name="reg_password" required>
        <button type="submit">Register</button>
    </form>
</main>




<?php include 'includes/footer.php'; ?>