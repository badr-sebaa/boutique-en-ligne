<?php
session_start();
require '../controler/panier.php';
require '../model/config.php';
$panier = new Panier($bdd);
    if(isset($_GET['del'])){
        $panier->del($_GET['del']);
    }

    
    $ids = array_keys($_SESSION['panier']);
?>

    <!DOCTYPE html>
    <html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Panier</title>
        <link rel="stylesheet" href="CSS/panier.css">
        <link rel="stylesheet" href="CSS/navbar.css">
    </head>
    <body>


      <?php

        require 'navbar.php';

    if(empty($ids)){
        $products = array();
    }else{
        ?>
        <div class="panier">
        <div class="articles">
        <?php
        foreach($_SESSION["panier"] as $key => $value):
        $check = $bdd->prepare('SELECT * FROM articles WHERE id = ?');
        $check->execute(array($key));
        $product = $check->fetch();
    ?>
        <div class="article_panier">
            <img src="<?= $product["image"]; ?> "width="100"> 
            <?= $product["name"]; ?>
            <?= $product["prix"]; ?>€
            <a href="afficher_panier.php?del=<?= $product["id"]; ?>" ><img src="img/bin.png"></a>
        </div>
    <?php endforeach; ?>   
    </div>
    <button type="submit" id="panier_valider" ><a href="checkout.php">Valider</a>
    </div>
    <?php
    }
     ?>  
    </body>
    </html>

