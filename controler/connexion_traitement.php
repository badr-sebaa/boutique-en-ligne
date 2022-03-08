<?php


require 'user.php';

    if(!empty($_POST['email']) && !empty($_POST['password'])) // Si il existe les champs login, password et qu'il sont pas vident
    {
        $user = new Users();
        // Patch XSS
        $email = htmlspecialchars($_POST['email']); 
        $password = htmlspecialchars($_POST['password']);
        
        //on connecte l'utilisateur  

        $connect = $user->connect($email,$password);

    }//else{ header('Location: connection.php'); die();} // si le formulaire est envoyé sans aucune données
