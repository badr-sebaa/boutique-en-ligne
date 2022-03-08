<?php

class Users
{

    private $id;
    public $walet;
    public $firstname;
    public $lastname;
    public $email;
    
    

    private $bdd;

      //Constructeur sans paramètre
    public function __construct()
    {
    }

    // Créée l’utilisateur en BDD et retourne un tableau contenant l’ensembles des informations de ce même utilisateur
    public function register($walet, $lastname, $firstname, $email, $email_verify, $password, $password_verify)
    {
        if($email === $email_verify){
            require('config.php');
            $check = $bdd->prepare('SELECT * FROM users WHERE email = ?');
            $check->execute(array($email));
            $data = $check->fetch();
            $row = $check->rowCount();
            if($row === 0){
                if(strlen($walet) <= 100){
                    if($password === $password_verify){
                        $cost = ['cost' => 12];
                        $password = password_hash($password, PASSWORD_BCRYPT, $cost);
                        $stmt = $bdd->prepare("INSERT INTO `users` (`walet`, `lastname`, `firstname`, `email`, `password`) VALUES (?,?,?,?,?)");
                        $stmt->execute(array($walet, $lastname, $firstname, $email, $password));
                        echo 'Inscrit';
                    }else{'Vous avez taper deux mots de passe différents';}
                }else{echo 'walet trop long';}
            }else{echo 'un utilisateur avec cet email existe deja';}
        }else{echo 'Vous avez taper deux email differents';}
    }

    // Connecte l’utilisateur, donne aux attributs de la classe les valeurs correspondantes à celles de l’utilisateur connecté
    public function connect($email, $password)
    {

        require('config.php');

        $stmt = $bdd->prepare("SELECT * FROM users WHERE email = ?");
        $stmt->execute(array($email));

        if($stmt->rowCount() == 1 ){

            $req = $stmt->fetchAll(PDO::FETCH_ASSOC);
            foreach($req as $value){
                $id = $value['id'];
                $walet = $value['walet'];
                $email = $value['email'];
                $firstname = $value['firstname'];
                $lastname = $value['lastname'];
                $password_verify = $value['password'];
            }
        }
        else{echo 'Introuvable';}
            if(password_verify($password, $password_verify)){
                $this->id = $id;
                $this->walet = $walet;
                $this->email = $email;
                $this->firstname = $firstname;
                $this->lastname = $lastname;

                session_start();
                $_SESSION['email'] = $email;
                $_SESSION['id'] = $id;  
                echo 'Connecter';
            }
            else {echo 'mauvais mot de passe';}  
        
    }
    
    // Déconnecte l’utilisateur
    public function disconnect()
    {
        session_start();
        session_destroy();
        echo 'Déconnecter';
    }

    // Supprime ET déconnecte un user
    public function delete($email)
    {
        require('config.php');
        $stmt = $bdd->prepare("DELETE FROM `users` WHERE `email`=?");
        $stmt->execute(array($email));
        
        echo 'Supprimer';
    } 
    // MAJ attributs de l’objet, modifie informations en BDD
    public function update($walet, $lastname,  $firstname,  $email, $password)
    {
        $loged_id = $_SESSION['id'];
        require('config.php');
        $stmt = $bdd->prepare("UPDATE users SET walet=?, password =?,  email =?, firstname = ?, lastname = ? WHERE id = ?");
        $stmt->execute(array($walet,$email,$firstname,$lastname,$loged_id));
        echo 'Modifier';
    }
    // Savoir si un utilisateur est connecté ou non
    public function isConnected()
    {
        $result = null;
        if(isset($_SESSION['email']))
        {
            $result = true;
        }
        else
        {
            $result = false;
        }

        return $result;
    }
    // Tableau contenant l’ensemble des informations de l’utilisateur
    public function getAllInfos()
    {
        $loged_id = $_SESSION['id'];
        require('config.php');
        $stmt = $bdd->prepare("SELECT * FROM users WHERE id = ?");
        $stmt->execute(array($loged_id));
        $req = $stmt->fetchAll(PDO::FETCH_ASSOC);
        foreach($req as $value){
            $walet = $value['walet'];
            $password = $value['password'];
            $email = $value['email'];
            $firstname = $value['firstname'];
            $lastname = $value['lastname'];
        }
        

        return array($walet, $password, $email, $firstname, $lastname);
    }
// Autre façon

    // Retourne walet de l’utilisateur
    public function getwalet()
    {
        $loged_id = $_SESSION['id'];
        require('config.php');
        $stmt = $bdd->prepare("SELECT walet FROM users WHERE id = ?");
        $stmt->execute(array($loged_id));
        $req = $stmt->fetchAll(PDO::FETCH_ASSOC);
        foreach($req as $value){
            $walet = $value['walet'];
        }
        return $walet;
    }

    // Retourne Email de l'utilisateur
    public function getEmail()
    {
        $loged_id = $_SESSION['id'];
        require('config.php');
        $stmt = $bdd->prepare("SELECT email FROM users WHERE id = ?");
        $stmt->execute(array($loged_id));
        $req = $stmt->fetchAll(PDO::FETCH_ASSOC);
        foreach($req as $value){
            $email = $value['email'];
        }
        return $email;
    }

    // Retourne prenom de l'utilsateur
    public function getFirstname()
    {
        $loged_id = $_SESSION['id'];
        require('config.php');
        $stmt = $bdd->prepare("SELECT firstname FROM users WHERE id = ?");
        $stmt->execute(array($loged_id));
        $req = $stmt->fetchAll(PDO::FETCH_ASSOC);
        foreach($req as $value){
            $firstname = $value['firstname'];
        }
        return $firstname;
    }

     //Retourne Nom de l'utilisateur
    public function getLastname()
    {
        $loged_id = $_SESSION['id'];
        require('config.php');
        $stmt = $bdd->prepare("SELECT lastname FROM users WHERE id = ?");
        $stmt->execute(array($loged_id));
        $req = $stmt->fetchAll(PDO::FETCH_ASSOC);
        foreach($req as $value){
            $lastname = $value['lastname'];
        }
        
        return $lastname;
    }

    public function IsUser($email)
    {
        require('config.php');
        $check = $bdd->prepare('SELECT * FROM users WHERE email = ?');
        $check->execute(array($email));
        $data = $check->fetch();
        $row = $check->rowCount();
        if($row > 0){
            return true;
        }
        return false;
    }
}

?>