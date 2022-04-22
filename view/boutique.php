<?php
session_start(); // Pour récupèrer nos données dans les variables : $_SESSION   
require '../model/config.php';
//require('pagination1.php');

$req = "SELECT * FROM articles";
$stmt = $bdd->prepare($req);
$stmt->execute();
$cours = $stmt->fetchAll(PDO::FETCH_ASSOC);


?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>SCHLASS</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/fo  nt-awesome/5.15.4/css/all.min.css">
    <link rel="stylesheet" href="CSS/boutique.css">
    <link rel="stylesheet" href="CSS/navbar.css">
</head>
<body>
<?php require 'navbar.php'; ?>
 <h1 class="heading"> 当社製品 </h1>
<section class="products" id="products">

<div class="box-container">
 <?php foreach ($cours as $c) : ?>
    
     
        <!-- <div class="col-md-4"> -->
        <div class="box">
            <div class="icons">
                <a href="../controler/add_panier.php?id_produit=<?php echo $c["id"];?>" class="fas fa-shopping-cart"></a>
                <a href="#" class="fas fa-eye"></a>
            </div>
            <div class="image">
                <img src="<?= $c['image']?>" alt="">
            </div>

            <div class="content">
                <h3><?= $c['name']?></h3>
    
                <div class="price"><?= $c['prix']?></div>
            </div>
        </div>
        <!-- </div> -->
                        
<?php endforeach; ?>
</div> 
    
   
</section>

<?php 
if($_GET["panier_result"] = "good"){ ?>

<script>window.alert("L\'article à bien été ajouter au panier")</script>
<?php
}
elseif($_GET["panier_result"] = "noexistence"){ ?>

<script>window.alert("L\'article n'existe pas")</script>

<?php
}
elseif($_GET["panier_result"] = "noproduct"){?>

<script>window.alert("Pas d\'article ")</script>

<?php
}
else{$_GET["panier_result"] = "" ;  }
?>
</body>
</html>
