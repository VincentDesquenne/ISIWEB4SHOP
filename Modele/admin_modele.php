<?php
require_once 'Include/setup.php';

class admin_modele
{
    function getAllOrder(){
        try{
            $conn = setup::getConnexion();
            $sql = "SELECT DISTINCT * FROM orders o join orderitems i on o.id=i.order_id";
            $sth = $conn->prepare($sql);
            $sth->execute();
            return $sth->fetchAll(PDO::FETCH_ASSOC);
        }
        catch(PDOException $e){
            $erreur = $e->getMessage();
        }
    }

    function getOrder(){
        try{
            $conn = setup::getConnexion();
            $sql = "SELECT DISTINCT * FROM orders";
            $sth = $conn->prepare($sql);
            $sth->execute();
            return $sth->fetchAll(PDO::FETCH_ASSOC);
        }
        catch(PDOException $e){
            $erreur = $e->getMessage();
        }
    }

    function getAllProduit(){
        try{
            $conn = setup::getConnexion();
            $sql = "SELECT DISTINCT * FROM products";
            $sth = $conn->prepare($sql);
            $sth->execute();
            return $sth->fetchAll(PDO::FETCH_ASSOC);
        }
        catch(PDOException $e){
            $erreur = $e->getMessage();
        }
    }

    public function updateOrderAdmin($id,$status)
    {
        try {
            $conn = setup::getConnexion();
            $sql = $conn->prepare("UPDATE orders SET  status = ? where id= ?");
            $sql->execute(array( $status,$id));
        } catch (PDOException $e) {
            $erreur = $e->getMessage();
        }
    }
}