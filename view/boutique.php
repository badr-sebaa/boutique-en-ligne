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
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <link rel="stylesheet" href="CSS/boutique.css">
</head>
 <h1 class="heading"> 当社製品 </h1>
<section class="products" id="products">

<div class="box-container">
 <?php foreach ($cours as $c) : ?>
    
     
        <!-- <div class="col-md-4"> -->
        <div class="box">
            <div class="icons">
                <a href="#" class="fas fa-shopping-cart"></a>
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
</html>
