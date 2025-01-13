
      <?php
    session_start();
    require 'includes/db.php';


     if (!isset($_SESSION['is_author'])) {
    header('Location: login.php');
    exit;
     }

     if (isset($_GET['id'])) {
    $id = $_GET['id'];

    $stmt = $pdo->prepare("DELETE FROM blogs WHERE id = :id");
    $stmt->execute(['id' => $id]);

    header('Location: blogs.php'); 
    exit;
    }
  ?>
