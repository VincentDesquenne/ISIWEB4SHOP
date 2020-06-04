<?php
require_once 'Include/setup.php';

class facture_modele
{
    public function getDeliveryAdress()
    {
        try {
            $conn = setup::getConnexion();
            $sql = $conn->prepare("SELECT * FROM delivery_addresses");
            $sql->execute();
            return $sql->fetchAll(PDO::FETCH_ASSOC);
        } catch (PDOException $e) {
            $erreur = $e->getMessage();
        }
    }

    public function getPanierPDF($orderid)
    {
        try {
            $conn = setup::getConnexion();
            $sql = $conn->prepare("SELECT name,price,quantity FROM products p join orderitems o on p.id =o.product_id where order_id=?");
            $sql->execute(array($orderid));
            return $sql->fetchAll(PDO::FETCH_ASSOC);
        }
        catch (PDOException $e){
            $erreur = $e->getMessage();
        }
    }
}