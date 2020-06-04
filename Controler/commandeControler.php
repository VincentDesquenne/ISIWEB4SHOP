<?php
require_once'Modele/commande_modele.php';

function Adresselivraison()
{
    $unldg = new commande_modele();
    if (isset($_SESSION['customer_id'])) {
        $Adresse = $unldg->getAdress($_SESSION['customer_id']);
    }
    if (!empty($_POST)) {
        $_SESSION['statut'] = 1;
        $unldg->deleteDeliveryAdress();
        if (isset($_POST['nouvadresse']) || !(isset($_SESSION['customer_id']))) {
            $_SESSION['forname'] = $_POST['forname'];
            $_SESSION['surname'] = $_POST['surname'];

            $unldg->addDeliveryAdress($_POST['forname'], $_POST['surname'], $_POST['add1'],$_POST['add2'], $_POST['city'], $_POST['postcode'],'','');
            foreach ($unldg->getDeliveryAdress() as $i) {
                $_SESSION['adresse_id'] = $i['id'];
            }
            $unldg->updateOrder($_SESSION['SESS_ORDERNUM'], 0, 0, $_SESSION['adresse_id'], 0, 1, $_SESSION['total'], session_id());
        }
        if (!(isset($_POST['nouvadresse']) || !(isset($_SESSION['customer_id'])))) {
            foreach ($Adresse as $i) {
                if ($_POST['SelectAdr'] == $i['id']) {
                    $add1 = $i['add1'];
                    $city = $i['city'];
                    $postcode = $i['postcode'];
                }
            }
                $unldg->addDeliveryAdress($_SESSION['firstname'],$_SESSION['lastname'],$add1,'',$city,$postcode,'','');
                foreach ($unldg->getDeliveryAdress() as $u) {
                    $_SESSION['adresse_id'] = $u['id'];
                }
            $unldg->updateOrder($_SESSION['SESS_ORDERNUM'], $_SESSION['customer_id'], 1, $_SESSION['adresse_id'], 0, 1, $_SESSION['total'], '');
        }
        header('Location: index.php?action=payement');
    }
    require_once 'View/livraisonView.php';

}

function Payement(){
    $unldg = new commande_modele();
    if (!empty($_POST)) {
        $_SESSION['statut'] = 2;
        if(isset($_SESSION['customer_id'])){
            $unldg->updateOrder($_SESSION['SESS_ORDERNUM'], $_SESSION['customer_id'], 1, $_SESSION['adresse_id'], 1, 2, $_SESSION['total'], '');
        }
        else{
            $unldg->updateOrder($_SESSION['SESS_ORDERNUM'], 0, 0, $_SESSION['adresse_id'], 1, 2, $_SESSION['total'], session_id());
        }

        switch ($_POST['payement']){
            case 0 : header('Location: https://www.paypal.com/fr/home'); break;
            case 1 : header('Location: FacturePDF.php');
        }
    }
    require_once 'View/payementView.php';   
}


?>