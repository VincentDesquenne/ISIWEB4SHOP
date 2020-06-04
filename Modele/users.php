<?php
require 'Include/setup.php';

class users
{
    function getUtilisateur($login, $mdp)
    {
        try {
            $conn = setup::getConnexion();
            $sql = "SELECT * FROM logins where (username=? and password=?)";
            $sth = $conn->prepare($sql);
            $sth->execute(array($login, $mdp));
            return $sth->fetchAll(PDO::FETCH_ASSOC);
        } catch (PDOException $e) {
            $erreur = $e->getMessage();
        }
    }


    function getCustomer($i)
    {
        try {
            $conn = setup::getConnexion();
            $sth = $conn->prepare("SELECT * FROM customers where id= ?");
            $sth->execute(array($i));
            return $sth->fetchAll(PDO::FETCH_ASSOC);
        } catch (PDOException $e) {
            $erreur = $e->getMessage();
        }
    }

    public function getCustomerByPhone($phone)
    {
        try {
            $conn = setup::getConnexion();
            $sql = $conn->prepare("SELECT * FROM customers where phone = ?");
            $sql->execute(array($phone));
            return $sql->fetchAll(PDO::FETCH_ASSOC);
        } catch (PDOException $e) {
            $erreur = $e->getMessage();
        }
    }

    function addCustomer($forname, $surname, $phone, $email, $registered)
    {
        try {
            $conn = setup::getConnexion();
            $sql = $conn->prepare("INSERT INTO customers(forname,surname,phone,email,registered) values(?,?,?,?,?)");
            $sql->execute(array($forname, $surname, $phone, $email, $registered));
        } catch (PDOException $e) {
            $erreur = $e->getMessage();
        }
    }

    function addLogin($cid, $username, $password)
    {
        try {
            $conn = setup::getConnexion();
            $sql = $conn->prepare("INSERT INTO logins(customer_id,username,password) values(?,?,?)");
            $sql->execute(array($cid, $username, $password));
        } catch (PDOException $e) {
            $erreur = $e->getMessage();
        }
    }

    function addAdress($cid, $add1, $add2, $city, $postcode)
    {
        try {
            $conn = setup::getConnexion();
            $sql = $conn->prepare("INSERT INTO adresses(customer_id,add1,add2,city,postcode) values(?,?,?,?,?)");
            $sql->execute(array($cid, $add1, $add2, $city, $postcode));
        } catch (PDOException $e) {
            $erreur = $e->getMessage();
        }
    }


    function getAdmin($login,$mdp){
        try {
            $conn = setup::getConnexion();
            $sql = "SELECT * FROM admin where (username=? and password=?)";
            $sth = $conn->prepare($sql);
            $sth->execute(array($login, $mdp));
            return $sth->fetchAll(PDO::FETCH_ASSOC);
        } catch (PDOException $e) {
            $erreur = $e->getMessage();
        }
    }
}
