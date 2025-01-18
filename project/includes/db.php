
<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "brandb";

$conn = new mysqli($servername, $username, $password, $dbname);// Check if connection was successful
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
?>