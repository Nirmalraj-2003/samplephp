
<?php
session_start();
require 'includes/db.php';


$success_message = '';
if (!empty($_SESSION['register_success'])) {
    $success_message = $_SESSION['register_success'];
    unset($_SESSION['register_success']);
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $username = $_POST['username'];
    $password = $_POST['password'];


    if ($username === 'testuser' && $password === 'testpass') {
        $_SESSION['username'] = $username;
        $_SESSION['is_author'] = true;  
        $_SESSION['register_success'] = "Login successful!";
        header('Location: blogs.php');
        exit;
    } else {
        $error = "Invalid username or password!";
    }
}
?>

<?php include 'includes/header.php'; ?>
<main>
    <h1>Login</h1>
    <div class="contact-box">
        <div class="contact-form">
            <form id="login-form" method="POST">
                <h2>Login to Your Account</h2>
                <?php if (!empty($success_message)) : ?>
                    <p class="success-message"><?= $success_message; ?></p>
                <?php endif; ?>
                <?php if (!empty($error)) : ?>
                    <p class="error-message"><?= $error; ?></p>
                <?php endif; ?>
                <label for="username">Username:</label>
                <input type="text" id="username" name="username" required>
                
                <label for="password">Password:</label>
                <input type="password" id="password" name="password" required>
                
                <button type="submit">Login</button>
            </form>
        </div>
    </div>
</main>


