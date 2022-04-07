<?php
session_start(); // Pour récupèrer nos données dans les variables : $_SESSION   

$pdo =  new PDO(
    'mysql:host=localhost;dbname=boutique_en_ligne.sql',
    'root',
    'root'
);
$req = "SELECT * FROM articles";
$stmt = $pdo->prepare($req);
$stmt->execute();
$cours = $stmt->fetchAll(PDO::FETCH_ASSOC);
// var_dump($cours);
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>SCHLASS</title>
    <link rel="stylesheet" href="boutique.css">
</head>

<body>
    <!-- Barre de navigation -->
    <nav>

    </nav>
    <!-- Fin de la barre de navigation -->

    <!-- Header -->
    <header>
        <h1> 총을 쏘다 </h1>
    </header>
    <!-- Fin du header -->

    <!-- Section principale -->
    <class="card">

        <!-- Toutes les cartes -->

        <?php foreach ($cours as $c) : ?>
           
          <div class="shell">
  <div class="container">
    <div class="row">
      <div class="col-md-3">
        <div class="wsk-cp-product">
          <div class="wsk-cp-img">
            <img src="<?= $c['image']?>" alt="Product" class="img-responsive" />
          </div>
          <!-- <div class="wsk-cp-text">
            <div class="category">
              <span>Ethnic</span>
            </div> -->
            <div class="title-product">
              <h3><?= $c['name']?></h3>
            </div>
            <div class="description-prod">
              <p><?= $c['description']?></p>
            </div>
            <div class="card-footer">
              <div class="wcf-left"><span class="price"><?= $c['prix']?></span></div>
              <div class="wcf-right"><a href="#" class="buy-btn"><i class="zmdi zmdi-shopping-basket"></i></a></div>
            </div>
          </div>
        </div>
      </div>     
        <?php endforeach; ?>
        <!-- Fin de toutes les cartes -->

    <!-- Pied de page -->
    <footer>

    </footer>
    <!-- Fin du pied de page -->
</body>

</html>

<div class="shell">
  <div class="container">
    <div class="row">
      <div class="col-md-3">
        <div class="wsk-cp-product">
          <div class="wsk-cp-img">
            <img src="<?= $c['image']?>" alt="Product" class="img-responsive" />
          </div>
          <!-- <div class="wsk-cp-text">
            <div class="category">
              <span>Ethnic</span>
            </div> -->
            <div class="title-product">
              <h3><?= $c['name']?></h3>
            </div>
            <div class="description-prod">
              <p><?= $c['description']?></p>
            </div>
            <div class="card-footer">
              <div class="wcf-left"><span class="price"><?= $c['prix']?></span></div>
              <div class="wcf-right"><a href="#" class="buy-btn"><i class="zmdi zmdi-shopping-basket"></i></a></div>
            </div>
          </div>
        </div>
      </div>
      