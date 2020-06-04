<?php
require 'Include/setup.php';

class selection_modele
{
    public function getProduit($codecat)
    {
        //Tous les produits par categorie (image, name , description, price)
        try {
            $conn = setup::getConnexion();
            $sql = "SELECT * FROM products where cat_id = ?";
            $sth = $conn->prepare($sql);
            $sth->execute(array($codecat));
            return $sth->fetchAll(PDO::FETCH_ASSOC);
        } catch (PDOException $e) {
            $erreur = $e->getMessage();
        }
    }

    public function getCategorie()
    {
        //Toutes les categories (name)
        try {
            $conn = setup::getConnexion();
            $sql = "SELECT * FROM categories";
            $sth = $conn->prepare($sql);
            $sth->execute();
            return $sth->fetchAll(PDO::FETCH_ASSOC);
        } catch (PDOException $e) {
            $erreur = $e->getMessage();
        }
    }


}