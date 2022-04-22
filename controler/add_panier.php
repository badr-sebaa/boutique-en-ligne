<?php
session_start();
require 'panier.php';
require '../model/config.php';
$panier = new Panier($bdd);

if(isset($_GET['id_produit'])){

    $check = $bdd->prepare('SELECT id FROM articles WHERE id = ?');
    $check->execute(array($_GET['id_produit']));
    $product = $check->fetch();

    if(empty($product)){
        header("Location: ../view/boutique.php?panier_result=noexistence");
    }
    $product_id = $product["id"];
    $panier->add($product_id);
    header("Location: ../view/boutique.php?panier_result=good");

}
else{
    header("Location: ../view/boutique.php?panier_result=noproduct");
}