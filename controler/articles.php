<?php
require_once '../model/Config-boutique.php';
class Articles extends DB
{
    public $_id;
    public $_name;
    public $_prix;
    public $_image;
    public $_description;
    private $_Malert;
    private $_Talert;

    public function alerts()
    {
        if ($this->_Talert == 1) {
            echo "<div class='succes'>" . $this->_Malert . "</div>";
        } else {
            echo "<div class='error'>" . $this->_Malert . "</div>";
        }
    }

    public function Creerarticles($name, $prix, $image, $description, $categories)
    {

        $this->_name = $name;
        $this->_prix = $prix;
        $this->_image = $image;
        $this->_description = $description;-
        $this->_categories = $categories;

        $check = $this->db->query("SELECT  `name`  FROM `articles` WHERE  `name` = '$name'");
        $res = $check->fetchAll(PDO::FETCH_ASSOC);
        var_dump($res);
        if (!empty($name) && !empty($prix) && !empty($image) && !empty($description) && !empty($categories)) {
            if (count($res)) {
                $this->_Malert = 'Nom de produit déjà utilisé.';
                $this->_Talert = 2;
            } elseif (count($res) == 0) {
                $req = $this->db->prepare("INSERT INTO articles (name, image, description, prix) VALUES ('$name', '$image','$description','$prix')");
                $req->execute();
                $this->_Malert = 'Le produit à bien été ajouter avec succès.';
                $this->_Talert = 1;

                // header('refresh:2;url=admin.php');
            } else {
                $this->_Malert = 'Vous devez remplir correctement tous les champs.';
                $this->_Talert = 2;
            }
        }else{
            $this->_Malert = 'Vous devez remplir tous les champs.';
            $this->_Talert = 2;  
        }
    }

    public function Updatearticles($name, $newname, $prix, $image, $description, $categories)
    {
        $this->_name = $name;
        $this->_prix = $prix;
        $this->_image = $image;
        $this->_description = $description;
        $this->_categorie = $categories;

        if (!empty($name) && !empty($newname) && !empty($prix) && !empty($image) && !empty($description) && !empty($categories)) {

            $check = $this->db->query("SELECT  `name`  FROM `articles` WHERE  `name` = '$name'");
            $res = $check->fetchAll(PDO::FETCH_ASSOC);
            var_dump($res);

            if (count($res)) {

                $req = $this->db->prepare(" UPDATE articles SET  nom = '$newname' , prix = '$prix' , image = '$image' , description = '$description' , vendu = '0' , date = NOW() , id_cat = '$categories' WHERE name = '$name'");
                $req->execute();
                var_dump($req);
                var_dump($req->execute());
                var_dump($categories);
                $this->_Malert = 'Le produit à bien été modifier avec succès.';
                $this->_Talert = 1;

                // header('refresh:2;url=admin.php');
            } else {
                $this->_Malert = 'Nom de produit invalide ou inexistent.';
                $this->_Talert = 2;
            }
        } else {
            $this->_Malert = 'Vous devez remplir tous les champs.';
            $this->_Talert = 2;
        }
    }

    public function getArticlesbyid()
    {
        $userid = $_GET['id'];
        var_dump($_GET);

        $req = $this->db->prepare("SELECT * FROM articles  WHERE id = ? ");
        $req->execute(array($userid));
        return $req->fetchAll(PDO::FETCH_ASSOC);
    }

    public function DeleteArticles()
    {
        $userid = $_GET['id'];
        var_dump($_GET);

        $req = $this->db->prepare("DELETE FROM articles  WHERE id = ? ");
        $req->execute(array($userid));
        return $req->fetchAll(PDO::FETCH_ASSOC);
    }

    public function getArticles()
    {

        $check = $this->db->prepare("SELECT * FROM `articles`");
        $check->execute();
       return $check->fetchAll(PDO::FETCH_ASSOC);

    }

    
}
