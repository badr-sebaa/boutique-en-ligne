<?php
require_once 'Config-boutique.php';
require('articles.php');
$user = new articles();
require('categories.php');
$cat = new categories();
?>
<!DOCTYPE html>
<html>

<head>
    <title>Creer Categories</title>
    <meta charset="UTF-8" />
    <link rel="stylesheet" href="#.css" />
</head>
<div align="center">
    <form method="POST">
        <?php if (isset($_POST['submit'])) {
            $user->Creerarticles($_POST['name'], $_POST['prix'], $_POST['image'], $_POST['description'], $_POST['categories']);
            $user->alerts();
        }
        ?>
        <table>
            <tr>
                <td>
                    <h1>Ajouter un produit</h1>
                    <label for="">Nom</label>
                    <input type="text" id="nom" name="name" placeholder=" ..." required>
                </td>
            </tr>
            <tr>
                <td>
                    <label for="">Prix</label>
                    <input type="number" id="prix" name="prix" placeholder=" ..." required>
                </td>
            </tr>
            <tr>
                <td>
                    <label for="">img</label>
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
                    <label for="categories">Catégorie</label>
                    <select id="categories" name="categories" required>
                        <option>Choisir une catégorie</option>
                        <?= $cat->getCategories(); ?>
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