<?php
    require_once 'Modele/admin_modele.php';
function GenereTableCommande(){
    $undlg = new admin_modele();
    $Orderadmin = $undlg->getAllOrder();
    $Order = $undlg->getOrder();
    var_dump($_POST);
    if(!(empty($_POST))){
        foreach($Orderadmin as $i){
            if($_POST['id'] == $i['order_id']){
                    $undlg->updateOrderAdmin($_POST['id'],10);
            }
        }
    }
    require_once 'View/adminCommandeView.php';
}
function GenereTableProduit(){
    $undlg = new admin_modele();
    $Orderadmin = $undlg->getAllProduit();

    require_once 'View/adminProduitView.php';
}