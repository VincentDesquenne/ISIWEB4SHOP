<?php
require 'Include/setup.php';
class panier_modele
{
        public function getOrderInvite()
        {
            try {
                $conn = setup::getConnexion();
                $sql = $conn->prepare("SELECT * FROM orders where registered = 0");
                $sql->execute();
                return $sql->fetchAll(PDO::FETCH_ASSOC);
            } catch (PDOException $e) {
                $erreur = $e->getMessage();
            }
        }

        public function getOrder($cid)
        {
            try {
                $conn = setup::getConnexion();
                $sql = $conn->prepare("SELECT * FROM orders where customer_id = ?");
                $sql->execute(array($cid));
                return $sql->fetchAll(PDO::FETCH_ASSOC);
            } catch (PDOException $e) {
                $erreur = $e->getMessage();
            }
        }

        public function addOrderInvite($id_session)
        {
            try {
                $conn = setup::getConnexion();
                $sql = $conn->prepare("INSERT INTO orders (session,status,registered) VALUES (?,0,0)");
                $sql->execute(array($id_session));

            } catch (PDOException $e) {
                $erreur = $e->getMessage();
            }
        }

        public function addOrder($cid)
        {
            try {
                $conn = setup::getConnexion();
                $sql = $conn->prepare("INSERT INTO orders (customer_id,status,registered) VALUES (?,0,1)");
                $sql->execute(array($cid));

            } catch (PDOException $e) {
                $erreur = $e->getMessage();
            }
        }

        public function getPanier($orderid)
        {
            $conn = setup::getConnexion();
            $sql = $conn->prepare("SELECT * FROM products p join orderitems o on p.id =o.product_id where order_id=?");
            $sql->execute(array($orderid));
            return $sql->fetchAll(PDO::FETCH_ASSOC);
        }

        public function addPanier($order_id, $product_id, $quantite)
        {
            try {
                $conn = setup::getConnexion();
                $sql = $conn->prepare("INSERT INTO orderitems values('',?,?,?)");
                $sql->execute(array($order_id, $product_id, $quantite));

            } catch (PDOexception $e) {
                $erreur = $e->getMessage();
            }
        }
        public function updatePanier($quantite,$id){
            try {
                $conn = setup::getConnexion();
                $sql = $conn->prepare("UPDATE orderitems SET quantity=? where id=?");
                $sql->execute(array($quantite,$id));
            } catch (PDOexception $e) {
                $erreur = $e->getMessage();
            }
        }
        public function deleteLigne($id)
        {
            try {
                $conn = setup::getConnexion();
                $sql = $conn->prepare("DELETE FROM orderitems where id=?");
                $sql->execute(array($id));

            } catch (PDOexception $e) {
                $erreur = $e->getMessage();
            }
        }
        public function deleteOrder($id){
            try {
                $conn = setup::getConnexion();
                $sql = $conn->prepare("DELETE FROM orders where id=?");
                $sql->execute(array($id));

            } catch (PDOexception $e) {
                $erreur = $e->getMessage();
            }
        }
}

?>