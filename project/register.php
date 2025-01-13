

<?php
session_start();
require 'includes/db.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $username = $_POST['username'];
    $email = $_POST['email'];
    $password = password_hash($_POST['password'], PASSWORD_DEFAULT);

    $stmt = $pdo->prepare("INSERT INTO users (username, email, password) VALUES (:username, :email, :password)");
    if ($stmt->execute(['username' => $username, 'email' => $email, 'password' => $password])) {
        $_SESSION['register_success'] = "Registration successful! Please login.";
        header('Location: login.php');
        exit;
    }
}
?>

<?php include 'includes/header.php'; ?>
<main>
    <h1>Register</h1>
    <form method="POST">
        <label>Username:</label>
        <input type="text" name="username" required>
        <label>Email:</label>
        <input type="email" name="email" required>
        <label>Password:</label>
        <input type="password" name="password" required>
        <button type="submit">Register</button>
    </form>
</main>


<footer>
<nav>
        <a href="index.php">Home</a> 
        <a href="blogs.php">Blogs</a> 
        <a href="contact.php">Contact Us</a> 
        <a href="about.php">About Us</a>
    </nav>
    <p>&copy; 2025 MySite. All Rights Reserved.</p>
    </footer>
