<?php
require_once '../model/Config-boutique.php';
require('../controler/user.php');
$user = new users();

?>
<!DOCTYPE html>
<html>

<head>
    <title>Modifier user</title>
    <meta charset="UTF-8" />
    <link rel="stylesheet" href="#.css" />
</head>
<div align="center">
    <form method="POST">
        <?php if (isset($_POST['submit'])) {
            $user->update($_POST['walet'], $_POST['lastname'], $_POST['firstname'], $_POST['email'], $_POST['password']);
        }
        ?>
        <table>
            <tr>
                <td>
                    <h1>Modifier utilisateur</h1>
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
                    <address <label for="">Email</label>
                        <input type="number" id="email" name="email" placeholder="..." required>
                </td>
            </tr>
            <tr>
                <td>
                    <label for="">Password</label>
                    <input type="text" id="password" name="password" placeholder="..." required>
                </td>
            </tr>
        
            <tr>
                <td align="center">
                    <button type="submit" name="submit">Ajouter</button>
                </td>
            </tr>
        </table>
    </form>

    