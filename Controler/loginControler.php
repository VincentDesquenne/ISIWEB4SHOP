<?php
require_once 'Modele/users.php';

    function logIn(){
        $undlg = new users();

        if((isset($_POST['login'] )&& isset($_POST['mdp']))) {
            foreach ($undlg->getUtilisateur($_POST['login'],$_POST['mdp']) as $i){
                $login = $i['username'];
                $pwd = $i['password'];
                $cdi = $i['customer_id'];
            }
            if(isset($login) && isset($pwd)){
                $_SESSION['customer_id'] = $cdi;

                foreach ($undlg->getCustomer($cdi) as $i){
                    $_SESSION['firstname'] = $i['forname'];
                    $_SESSION['lastname'] = $i['surname'];
                }
                header('Location: index.php?action=accueil');
            }

            var_dump($undlg->getAdmin($_POST['login'],$_POST['mdp']));
            foreach ($undlg->getAdmin($_POST['login'],$_POST['mdp']) as $i){
                $admin = $i['username'];
                $mdp = $i['password'];
                $id = $i['id'];
            }

            if(isset($admin) && isset($mdp)){
                $_SESSION['admin_id'] = $id;
                header('Location: index.php?action=accueil');
            }
        }
        require 'View/loginView.php';
    }


    function logOut(){
          session_destroy();
          header('Location: index.php?action=accueil');
    }

    function register()
    {
        if (!(empty($_POST))) {
            $undlg = new users();
            $undlg->addCustomer($_POST['forname'], $_POST['surname'], $_POST['phone'], $_POST['mail'], 1);

            foreach ($undlg->getCustomerByPhone($_POST['phone']) as $i) {
                $cid = $i['id'];
            };
            $undlg->addAdress($cid, $_POST['add1'], $_POST['add2'], $_POST['city'], $_POST['postcode']);
            $undlg->addLogin($cid, $_POST['username'], $_POST['pwd']);
            header('Location: index.php?action=login');

        }
        require_once 'View/registeredView.php';
    }

?>

