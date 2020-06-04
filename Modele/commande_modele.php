<?php
require 'Include/setup.php';

class commande_modele
{
    public function getAdress($cid)
    {
        try {
            $conn = setup::getConnexion();
            $sql = $conn->prepare("SELECT * FROM adresses where customer_id = ?");
            $sql->execute(array($cid));
            return $sql->fetchAll(PDO::FETCH_ASSOC);
        } catch (PDOException $e) {
            $erreur = $e->getMessage();
        }
    }

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

    public function addDeliveryAdress($forname, $surname, $add1,$add2,$city, $postcode, $phone, $email)
    {
        try {
            $conn = setup::getConnexion();
            $sql = $conn->prepare("INSERT INTO delivery_addresses(firstname,lastname,add1,add2,city,postcode,phone,email) values(?,?,?,?,?,?,?,?)");
            $sql->execute(array($forname, $surname, $add1, $add2,$city, $postcode, $phone, $email));
        } catch (PDOException $e) {
            $erreur = $e->getMessage();
        }
    }

    public function deleteDeliveryAdress()
    {
        try {
            $conn = setup::getConnexion();
            $sql = $conn->prepare("DELETE FROM delivery_addresses");
            $sql->execute();
        } catch (PDOException $e) {
            $erreur = $e->getMessage();
        }
    }

    public function updateOrder($id, $cid, $r, $adress, $payement, $status, $total,$session)
    {
        try {
            $conn = setup::getConnexion();
            $sql = $conn->prepare("UPDATE orders SET customer_id = ?,registered = ?,delivery_add_id = ?,payment_type = ?, status = ?, total = ?, session = ?  where id= ?");
            $sql->execute(array($cid, $r, $adress, $payement, $status, $total,$session, $id));
        } catch (PDOException $e) {
            $erreur = $e->getMessage();
        }
    }
}