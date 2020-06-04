<?php
    session_start();
    require_once 'Include/header.inc.php';
    require_once 'Include/footer.php';
    if (isset($_GET['action'])) {
        if ($_GET['action'] == 'login') {
            require_once('Controler/loginControler.php');
            logIn();

        }
        elseif ($_GET['action'] == 'logout') {
            require_once 'Controler/loginControler.php';
            logOut();
        }
        elseif ($_GET['action'] == 'registered') {
            require_once 'Controler/loginControler.php';
            register();
        }
        elseif ($_GET['action'] == 'accueil') {
            require_once 'Controler/accueilControler.php';
            GenererAccueil();
        }
        elseif($_GET['action'] == 'adminC'){
            require_once 'Controler/adminControler.php';
            GenereTableCommande();
        }
        elseif($_GET['action'] == 'adminP'){
            require_once 'Controler/adminControler.php';
            GenereTableProduit();
        }
        elseif ($_GET['action'] == 'panier') {
             {
                require_once 'Controler/panierControler.php';
                if(isset($_GET['id'])){
                    Supprimer();
                }
                elseif(isset($_POST['quantity'])){
                    Actualiser();
                }
                else{
                    genenerPanier();
                }
            }
        }
        elseif ($_GET['action'] == 'livraison') {
                require_once 'Controler/commandeControler.php';
                Adresselivraison();
        }
        elseif ($_GET['action'] == 'payement') {
            require_once 'Controler/commandeControler.php';
            Payement();
        }
    }
    else {
        require_once('Controler/accueilControler.php');
        session_destroy();
        genererAccueil();
        }
