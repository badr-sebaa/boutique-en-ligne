<?php
    if(isset($_GET['del'])){
        $panier->del($_GET['del']);
    }
    $ids = array_keys($_SESSION['panier']);
    if(empty($ids)){
        $products = array();
    }else{
        $check = $bdd->prepare('SELECT * FROM products WHERE id IN ('.implode(',',$ids).')');
        $products = $check->fetch();
    }
    foreach($products as $product):
    ?>
        <?= $product['name']; ?>
        <?= $product['price']; ?>
        //ect ...
        <a href="afficher_panier.php?del=<?= $product->id; ?>" ></a>
    <?php endforeach; ?>