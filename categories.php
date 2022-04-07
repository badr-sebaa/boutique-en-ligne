<?php

class categories extends DB
{

    public function alerts()
    {
        if ($this->_Talert == 1) {
            echo "<div class='succes'>" . $this->_Malert . "</div>";
        } else {
            echo "<div class='error'>" . $this->_Malert . "</div>";
        }
    }

    public function getcategories()
    {

        $check = $this->db->query("SELECT * FROM `categories`");
        $res = $check->fetchAll(PDO::FETCH_ASSOC);

        foreach ($res as $data) { ?>

            <option value=" <?php echo $data['id']; ?>"> <?php echo $data['name']; ?></option>
<?php
        }
    }

    public function Updatecategories($id, $name)
    {
        $this->_name = $name;
        $this->_id = $id;

        if (!empty($select) && !empty($name)) {

            $req = $this->db->prepare("UPDATE `categories`  SET `name` = $name");
            $req->execute();
            

            $this->_Malert = 'La categorie à bien été modifier avec succès.';
            $this->_Talert = 1;

            header('refresh:2;url=admin.php');
        } else {
            $this->_Malert = 'Vous devez remplir correctement tous les champs.';
            $this->_Talert = 2;
        }
    }

    public function CreerCategories($name)
    {
        if (!empty($name)) {
            $req = $this->db->prepare("INSERT INTO `categories` (`name`) values ($name)");
            $req->execute();
            $this->_Malert = 'La categorie à bien été ajouter avec succès.';
            $this->_Talert = 1;

            header('refresh:2;url=admin.php');
        } else {
            $this->_Malert = 'Vous devez remplir correctement tous les champs.';
            $this->_Talert = 2;
        }
    }

    public function DeleteCategories()
    {
        $userid = $_GET['id'];
        var_dump($_GET);

        $req = $this->db->prepare("DELETE FROM utilisateurs  WHERE id = '$userid' ");
        $req->execute(array());

        echo "L'utilisateur a bien été supprimer";

        header('refresh:2;url=admin.php');
    }
}
