<?php

class Panier{

    private $bdd;

    public function __construct($bdd)
    {
        if(!isset($_SESSION)){
            session_start();
        }

        if(!isset($_SESSION['panier'])){
            $_SESSION['panier'] = array();
        }

        $this->bdd = $bdd; 
    }

    public function total(){
        $total = 0;
        $ids = array_keys($_SESSION['panier']);
        if(empty($ids)){
            $products = array();
        }else{
            $check = $this->bdd->prepare('SELECT id , price FROM articles WHERE id IN ('.implode(',',$ids).')');
            $products = $check->fetch();
        }
        foreach ($products as $product) {
            $total += $product -> price;
        }
        return $total;
    }

    public function add($product_id){

        if(isset($_SESSION['panier'][$product_id])){
            $_SESSION['panier'][$product_id]++;
        }else{
            $_SESSION['panier'][$product_id] = 1;
        }
        
    }

    public function del($product_id){

        unset($_SESSION['panier'][$product_id]);
    }

}