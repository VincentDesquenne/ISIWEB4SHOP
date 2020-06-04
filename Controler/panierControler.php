<?php
require 'Modele/panier_modele.php';
    function genenerPanier()
    {
        $unldg=new panier_modele();

        if(isset($_SESSION['customer_id'])) {
            if ($unldg->getOrder($_SESSION['customer_id']) == null) {
                if (isset($_GET['product_id'])) {
                    $_SESSION['statut'] = 0;
                    $unldg->addOrder($_SESSION['customer_id']);
                }
            }
            foreach ($unldg->getOrder($_SESSION['customer_id']) as $i) {
                $order_id = $i['id'];
            }
        }
        else {
            if($unldg->getOrderInvite() == null) {
                if (isset($_GET['product_id'])) {
                        $_SESSION['statut'] = 0;
                        $unldg->addOrderInvite(session_id());
                }
            }
                foreach ($unldg->getOrderInvite() as $i) {
                        $order_id = $i['id'];
                }
            }

            if(isset($order_id)){
                $_SESSION['SESS_ORDERNUM'] = $order_id;
                if(isset($_GET['product_id'])){
                    $unldg->addPanier($order_id, $_GET['product_id'], $_POST['quantite']);
            }
                $Panier = $unldg->getPanier($_SESSION['SESS_ORDERNUM']);
                $_SESSION['NbPanier'] = count($Panier);
        }

            require_once 'View/panierView.php';
    }
    function Actualiser(){
        $unldg = new panier_modele();
        if(isset($_SESSION['SESS_ORDERNUM'])) {
            $unldg->updatePanier($_POST['quantity'] ,$_POST['id']);
            $Panier = $unldg->getPanier($_SESSION['SESS_ORDERNUM']);
            $_SESSION['NbPanier'] = count($Panier);
        }
        require_once 'View/panierView.php';
    }
    function Supprimer(){
        $unldg = new panier_modele();
        $unldg->deleteLigne($_GET['id']);
        if(isset($_SESSION['SESS_ORDERNUM'])) {
            $Panier = $unldg->getPanier($_SESSION['SESS_ORDERNUM']);
            $_SESSION['NbPanier'] = count($Panier);
        }
        if(empty($unldg->getPanier($_SESSION['SESS_ORDERNUM']))){
            $unldg->deleteOrder($_SESSION['SESS_ORDERNUM']);
            $_SESSION['SESS_ORDERNUM'] = null;
        }
        require_once 'View/panierView.php';
    }
?>