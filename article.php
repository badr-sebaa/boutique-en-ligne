<?php

class Article
{

    private $id;
    public $name;
    public $image;
    public $description;
    public $prix;
    public $id_categorie;
    
      //Constructeur de l'objet article 
    public function __construct($name,$image,$description,$prix,$id_categorie)
    {
        $this->name = $name;
        $this->image = $image;
        $this->description = $description;
        $this->prix = $prix;
        $this->id_categorie = $id_categorie;
    }

    public function CreateArticle()
    {
        // Appel de la bdd
        require 'config.php';

        // Insert de l'article dans la bdd 
        $stmt = $bdd->prepare("INSERT INTO `articles` (`name`, `mail`, `image`, `description`, `prix`, `id_categorie`) VALUES (?,?,?,?,?)");
        $stmt->execute(array($this->name,  $this->image, $this->description,  $this->prix,  $this->id_categorie));
        
    }

    public function DeleteArticle($id)
    {    
    
        // Appel de la bdd
        require 'config.php';

        // Delet de l'article dans la bdd 
        $stmt = $bdd->prepare("DELETE FROM `articles` WHERE id = ?");
        $stmt->execute(array($id));

    }

    public function UpdateArticle($name,$image,$description,$prix,$id_categorie,$id)
    {
        // Appel de la bdd
        require 'config.php';

        // Insert de l'article dans la bdd 
        $stmt = $bdd->prepare("UPDATE `articles` SET `name`=?,`image`='?',`description`= ?,`prix`= ?,`id_categorie`=? WHERE id = ?");
        $stmt->execute(array($name,$image,$description,$prix,$id_categorie,$id));
    }

    public function GetArticleInfo($id)
    {
        require('config.php');

        $stmt = $bdd->prepare("SELECT * FROM articles WHERE id = ?");
        $stmt->execute(array($id));
        $req = $stmt->fetchAll(PDO::FETCH_ASSOC);
        foreach($req as $value){
            $name = $value['name'];
            $image = $value['image'];
            $description = $value['description'];
            $prix = $value['prix'];
            $id_categorie= $value['id_categorie'];
        }
        

        return array('name' => $name,
                     'image' => $image,
                     'description' => $description,
                     'prix' => $prix,
                     'id_categorie' => $id_categorie,
                    );
    }

    


}