<?php
require_once 'Modele/selection_modele.php';


function GenererAccueil()
{
    $unldg = new selection_modele();
    $getCat = $unldg->getCategorie();
    if(isset($_GET['categ'])) {
        $getProduit = $unldg->getProduit($_GET['categ']);
    }

    require 'View/accueilView.php';
}

