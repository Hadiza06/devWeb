<?php
    session_start();
    require("db.php");
    if(!isset($_SESSION['id'])){
        header("location: index.php");
    }
    $listUsers = $pdo->query("SELECT * FROM users")->fetchAll();
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Homme</title>
    <?php include("link.php"); ?>
</head>
<?php include("navbar.php"); ?>
<body>
    <p>Bienvenue <?php echo $_SESSION['username']; ?></p>

    <a class="btn btn-danger" href="logout.php"><i class="fa-solid fa-right-from-bracket"></i></a>
</body>
</html>