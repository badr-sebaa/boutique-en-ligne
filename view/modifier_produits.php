<?php
require_once '../model/Config-boutique.php';
require('../controler/articles.php');
$user = new articles();
require('../controler/categories.php');
$cat = new categories();
?>
<!DOCTYPE html>
<html>

<head>
    <title>Page Modifier Categories</title>
    <meta charset="UTF-8" />
    <link rel="stylesheet" href="#.css" />
</head>
<div align="center">
    <form method="POST">
        <?php if (isset($_POST['submit'])) {
            $user->Updatearticles($_POST['name'], $_POST['newname'], $_POST['prix'], $_POST['image'], $_POST['description'], $_POST['categories']);
            $user->alerts();
        }
        ?>
        <table>
            <tr>
                <td>
                    <h1>Modifier un produit</h1>
                    <label for="">Nom</label>
                    <input type="text" id="nom" name="name" placeholder="..." required>
                </td>
            </tr>
            <tr>
                <td>
                    <label for="">Nouveau Nom</label>
                    <input type="text" id="nom" name="newname" placeholder=" ..." required>
                </td>
            </tr>
            <tr>
                <td>
                    <address <label for="">Prix</label>
                        <input type="number" id="prix" name="prix" placeholder="..." required>
                </td>
            </tr>
            <tr>
                <td>
                    <label for="">image</label>
                    <input type="text" id="image" name="image" placeholder="Lien de l'image" required>
                </td>
            </tr>
            <tr>
                <td>
                    <label for="">Description</label>
                    <input type="text" id="description" name="description" placeholder="Ce produit est.." required>
                </td>
            </tr>
    
            <tr>
                <td>
                    <label for="categorie">Catégorie</label>
                    <select type="text" id="categorie" name="categorie" required>
                        <option>Choisir une catégorie</option>
                        <?= $cat->getcategories(); ?>
                    </select>
                </td>
            </tr>
            <tr>
                <td align="center">
                    <button type="submit" name="submit">Ajouter</button>
                </td>
            </tr>
        </table>
    </form>

    