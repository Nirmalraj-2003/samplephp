<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PHP Web Application</title>
    <link rel="stylesheet" href="css/style.css">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="js/script.js" defer></script>
</head>
<body>
<header>
    <div class="logo">Pinit
        <img src="images/logo1.png" alt="logo" width="20px" height="20px">
    </div>
    <nav>
        <ul>
            <li><a href="index.php">Home</a></li>
            <li><a href="blogs.php">Blogs</a></li>
            <li><a href="contact.php">Contact Us</a></li>
            <li><a href="about.php">About Us</a></li>
            <li><a href="register.php">Register</a></li>
            <li><a  id="login-trigger">Login</a></li>
        </ul>
    </nav>
</header>
<?php include 'login.php'

?>





