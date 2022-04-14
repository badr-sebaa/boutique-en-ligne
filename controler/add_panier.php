<?php

require 'panier.php';
require '../model/config.php';
$panier = new Panier($bdd);

if(isset($_GET['id_produit'])){

    $check = $bdd->prepare('SELECT id FROM products WHERE id = ?');
    $check->execute(array($_GET['id_produit']));
    $product = $check->fetch();

    if(empty($product)){
        die("ce produit n'existe pas");
    }

    $panier->add($product[0]->id);
    die('le produit à bien été ajouté à votre panier <a href="javascript:history.back()">');
}
else{
    die("VOUS N'AVEZ PAS AJOUTER DE PRODUIT AU PANIER ! ");
}