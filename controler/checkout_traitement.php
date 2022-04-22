<?php
session_start();
require('../model/config.php');
require 'panier.php';
$panier = new Panier($bdd);


$ids = array_keys($_SESSION['panier']);
if(empty($ids)){
   
    $products = array();
}else{
    
    foreach($_SESSION["panier"] as $key => $value):
        //recuperer les infos articles

        $req = "SELECT * FROM articles WHERE id=?";
        $stmt = $bdd->prepare($req);
        $stmt->execute(array($key));
        $arts = $stmt->fetchAll(PDO::FETCH_ASSOC);

        foreach ($arts as $art) {
            $art_name=$art["name"];
            $art_image=$art["image"];
            $art_description=$art["description"];
            $art_prix=$art["prix"]; 
        }

        // AJOUTER LES ELEMENTS DU PANIER A LA TABLE ACHATS DANS LA BDD
        $stmt = $bdd->prepare("INSERT INTO `articles_acheter` (`name`,`image`,`description`,`prix`,`owner`) VALUES (?,?,?,?,?)");
        $stmt->execute(array($art_name,$art_image,$art_description,$art_prix,$_SESSION["id"]));
        
        $sessid=$_SESSION["id"];

        $req = "SELECT * FROM articles_acheter WHERE owner=$sessid";
        $stmt = $bdd->prepare($req);
        $stmt->execute();
        $idarts = $stmt->fetchAll(PDO::FETCH_ASSOC);
        foreach ($idarts as $idart) {
            $artid=$idart["id"];
            echo $artid;
        }

        // Enregistrement de la ref 
        $stmt = $bdd->prepare("INSERT INTO `achats` (`id_article`, `id_users`) VALUES (?,?)");
        $stmt->execute(array($artid,$_SESSION["id"]));

        // SUPPRIMER LES ARTICLES DU PANIER DE LA TALBE ARTICLES

        $stmt = $bdd->prepare("DELETE FROM `articles` WHERE `id`=?");
        $stmt->execute(array($key));
        endforeach;
    
    // VIDER LA SESSION PANIER 

    $_SESSION['panier']=array(); 
}

if(!empty($_POST['checkbox']) && isset($_POST['checkbox'])){

// Si les variables existent et qu'elles ne sont pas vides
if(!empty($_POST['card_number']) && !empty($_POST['name']) && !empty($_POST['CVV']) && !empty($_POST['expiration']))
{
    
    // je crée des variable pour chaque donné 
    $card_number = stripslashes(trim(htmlspecialchars($_POST['card_number'])));
    $name = stripslashes(trim(htmlspecialchars($_POST['name'])));
    $CVV = stripslashes(trim(htmlspecialchars($_POST['CVV'])));
    $expiration = stripslashes(trim(htmlspecialchars($_POST['expiration'])));
    
    
            $check = $bdd->prepare('SELECT * FROM cartes WHERE card_number = ?');
            $check->execute(array($card_number));
            $data = $check->fetch();
            $row = $check->rowCount();
            if($row === 0){
                if(strlen($name) <= 100){
    
                        $cost = ['cost' => 12];
                        $card_number = password_hash($card_number, PASSWORD_BCRYPT, $cost);
                        $name = password_hash($name, PASSWORD_BCRYPT, $cost);
                        $CVV = password_hash($CVV, PASSWORD_BCRYPT, $cost);
                        
                        $stmt = $bdd->prepare("INSERT INTO `cartes` (`id_user`, `card_number`, `name`, `CVV`, `date_exp`) VALUES (?,?,?,?,?)");
                        $stmt->execute(array($_SESSION["id"], $card_number, $name, $CVV, $expiration));
                        echo 'carte enregistrer';
                    
                }else{echo 'nom trop long';}
            }else{echo 'carte deja enregistrer';}
}else{echo 'champs vide';}

}


header('location: ../index.php');
    




?>