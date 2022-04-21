<?php
session_start(); // Pour récupèrer nos données dans les variables : $_SESSION   

require '../model/config.php';
$stmt = $bdd->prepare("SELECT * FROM articles WHERE id = ?");
$stmt->execute([$_GET['id']]);
$cours = $stmt->fetchAll(PDO::FETCH_ASSOC);
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="CSS/afficher_article.css">
    <title>Harvest vase</title>
 </head>
<?php foreach ($cours as $c) : ?>
  
       <body>
  <div class="wrapper">
    <div class="product-img">
      <img src="<?= $c['image']?>" height="420" width="327">
    </div>

     <div class="product-info">
      <div class="product-text">
        <h1><?= $c['name']?></h1>
        <h2><?= $c['categories']?></h2>
        <p><?= $c['description']?></p>
      </div>
      <div class="product-price-btn">
        <p><?= $c['prix']?></p>
        <button type="button">buy now</button>
      </div>
    </div>
  </div>
 
<?php endforeach; ?>
   
</body>

</html>
