<?php
class DB
    {
        protected $db;
        public function __construct()
        {

            try {
                $this->db =  new PDO(
                    'mysql:host=localhost;dbname=boutique_en_ligne.sql', 'root', 'root');
            } catch (Exception $e) {
                // En cas d'erreur, on affiche un message et on arrête tout
                die('Erreur : ' . $e->getMessage());
            }

            return  $this->db;
        }
    }

