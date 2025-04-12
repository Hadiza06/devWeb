<?php
session_start();

if(!isset($_SESSION['id'])){
    header("location: index.php");
    return;
}

if($_SESSION['access'] != 1){
    header("location: home.php");
    return;
}

//methode get pour recuperer l'id de l'utilisateur a supprimer
if ($_SERVER["REQUEST_METHOD"] == "GET") {
    require("db.php");
    $id = $_GET['id'];
    $sql = "DELETE FROM users WHERE id = :id";
    $stmt = $pdo->prepare($sql);
    $stmt->execute(['id' => $id]);
    header("location: home.php");
} else {
    die("Erreur lors de la suppression de l'utilisateur !");
}