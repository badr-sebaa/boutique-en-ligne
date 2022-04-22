<?php

require_once '../model/Config-boutique.php';
require_once '../controler/articles.php';



// Nombre de produits sur chaque page
$produitsParPage = 5;

// Je défini la page courante
$current_page = isset($_GET['p']) && is_numeric($_GET['p']) ? (int)$_GET['p'] : 1;
$art = new Articles;

$cours= $art->getAllProducts($produitsParPage,$current_page );
die;
$total_products=$art->totalProducts();
?>


<!DOCTYPE html>
        <html>
            <head>
                <meta charset="utf-8">
                <title>Catégorie</title>
                <link href="style.css" rel="stylesheet" type="text/css">
                <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.1/css/all.css">
            </head>

            <body>


<div class="products content-wrapper">

<?=$total_products?>
<div class="products-wrapper">
<?php foreach ($a as $produit): ?>  
<a href="boutique.php?page=product&id=<?=$produit['id']?>" class="product">

    <img src="<?=$produit['image']?>" width="200" height="200" alt="<?=$produit['name']?>">
    <span class="name"><?=$produit['name']?></span>
    <span class="price">
        <?=$produit['prix'].' euros'?>
        
    </span>
</a>
<?php endforeach; ?>
</div>
<div class="buttons">
<?php if ($current_page > 1): ?>
<a href="boutique.php?page=products&p=<?=$current_page-1?>">Prev</a>
<?php endif; ?>
<?php if ($total_products > ($current_page * $produitsParPage) - $produitsParPage + count($shop)): ?>
<a href="boutique.php?page=products&p=<?=$current_page+1?>">Next</a>
<?php endif; ?>

</div>
</div>
</body>
</html>