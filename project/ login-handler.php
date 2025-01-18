<?php
session_start();
include 'includes/db.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $username = $_POST['login_username'];
    $password = $_POST['login_password'];

    $stmt = $pdo->prepare("SELECT * FROM authors WHERE username = :username");
    $stmt->execute(['username' => $username]);
    $user = $stmt->fetch(PDO::FETCH_ASSOC);

    if ($user && password_verify($password, $user['password'])) {
        $_SESSION['author_id'] = $user['id'];
        $_SESSION['username'] = $user['username'];
        header('Location: blog.php');
        exit;
    } else {
        $_SESSION['login_error'] = "Invalid credentials.";
        header('Location: blog.php');
        exit;
    }
}
?>
