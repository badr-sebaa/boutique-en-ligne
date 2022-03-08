<?php

require 'user.php';

// Si les variables existent et qu'elles ne sont pas vides
if(!empty($_POST['walet']) && !empty($_POST['lastname']) && !empty($_POST['firstname']) && !empty($_POST['email']) && !empty($_POST['email_verify']) && !empty($_POST['password']) && !empty($_POST['password_verify']))
{
    
    // je crée des variable pour chaque donné 
    $walet = stripslashes(trim(htmlspecialchars($_POST['walet'])));
    $lastname = stripslashes(trim(htmlspecialchars($_POST['lastname'])));
    $firstname = stripslashes(trim(htmlspecialchars($_POST['firstname'])));
    $email = stripslashes(trim(htmlspecialchars($_POST['email'])));
    $email_verify = stripslashes(trim(htmlspecialchars($_POST['email_verify'])));
    $password = stripslashes(trim(htmlspecialchars($_POST['password'])));
    $password_verify = stripslashes(trim(htmlspecialchars($_POST['password_verify'])));
    $user = new Users();

    $register = $user->register($walet,$lastname,$firstname,$email,$email_verify,$password,$password_verify);
}