<?php
require_once '../model/config.php'; // On inclut la connexion à la base de données

$req = $bdd->query('SELECT * FROM users');
$req1 = $bdd->query('SELECT * FROM articles');

require_once '../controler/articles.php';
$articles = New Articles();
$art = $articles->getArticles();

if (isset($_GET['action']) && $_GET['action'] == "suppression") {

    $arts = $articles->getArticlesbyid();
var_dump($arts);

    if (count($arts)) {
        $articles->DeleteArticles();
        var_dump( $articles->DeleteArticles());
    header('location:admin.php');
    }
}

?>

<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
</head>

<body>
    <?php include("header.php"); ?>
    <main>
        <div>
            <h1 class="tarr">TABLEAU DE BORD</h1>
        </div> 

        <section>
<h2 class="h2admin">Utilisateurs</h2>
        <table class="table">
            <thead>
                <tr>
                    <th class="th">ID</th>
                    <th class="th">WALET</th>
                    <th class="th">LASTNAME</th>
                    <th class="th">FIRSTNAME</th>
                    <th class="th">EMAIL</th>
                    <th class="th">PASSWORD</th>
                    <th class="th">MODIFIER</th>
                    <th class="th">SUPPRIMER</th>
                </tr>
            </thead>
            <tbody>
                <?php
                while ($rows = $req->fetch()) {
                    echo "<tr><th>$rows[id]</th>";
                    echo "<th>$rows[walet]</th>";
                    echo "<th>$rows[lastname]</th>";
                    echo "<th>$rows[firstname]</th>";
                    echo "<th>$rows[email]</th>";
                    echo "<th>$rows[password]</th>";
                    echo "<th><a href=\"modifier_user.php?id=$rows[id]\">modifier</a></th>";
                    echo "<th><a href=\"admin.php?action=suppression&id=$rows[id]\">supprimer</a></th></tr>";
    
                }
                ?>
            </tbody>
        </table>
    </section>
  
        <section>
<h2 class="h2admin">Articles</h2>
        <table class="table">
            <thead> 
        <button class="button" type="submit" name="connexion"><a href="creer_articles.php?id=<?php $rows['id'];?>\">Créer</a></button>
                <tr>
                    <th class="th">ID</th>
                    <th class="th">NAME</th>
                    <th class="th">IMAGE</th>
                    <th class="th">DESCRIPTION</th>
                    <th class="th">PRIX</th>
                    <th class="th"> SUPPRIMER</th>
                    <th class="th"> MODIFIER</th>
                    <!-- <th class="th"> CREER</th> -->
                </tr>
            </thead>
            <tbody>
                <?php
                while ($rows = $req1->fetch()) {
                    echo "<tr><td>$rows[id]</td>";
                    echo "<td>$rows[name]</td>";
                    echo "<td>$rows[image]</td>";
                    echo "<td>$rows[description]</td>";
                    echo "<td>$rows[prix]</td>";
                    echo "<td><a href=\"?action=suppression&id=$rows[id]\">supprimer</a></td>";
                    echo "<td><a href=\"modifier_produits.php?id=$rows[id]\">Modifier</a></td></tr>";
                }
                ?>
            </tbody>
        </table>
       
    </section>
        
</body>

</html>