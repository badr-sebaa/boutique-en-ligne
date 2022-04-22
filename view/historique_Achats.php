<?php
session_start();
require '../controler/panier.php';
require '../model/config.php';
require '../controler/user.php';

$user = new Users();

if(!($user->isConnected())){
  header('Location: inscription.php');
}



$req = "SELECT * FROM achats WHERE id_users = ?";
$stmt = $bdd->prepare($req);
$stmt->execute(array($_SESSION["id"]));
$achats = $stmt->fetchAll(PDO::FETCH_ASSOC);

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>SCHLASS</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <link rel="stylesheet" href="CSS/historique.css">
</head>
    <h1> HISTORIQUE D'ACHATS </h1>
<div class="container"> 
    <?php foreach ($achats as $achat) : ?>
    <div class="elements">
        <p> ARTICLES | </p>
        <p>Réference: <?= $achat["id_article"] ;?> </p>
        <p>Date : <?= $achat["date"]; ?> </p>
    </div>
    <?php endforeach; ?>   

</div>