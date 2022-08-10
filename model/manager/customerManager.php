<?php

require('model/class/customer.class.php');

class CustomerManager
{
    // Attributs
    private $lePDO;


    // Méthodes------
    public function __construct($unPDO)
    {
        $this->lePDO = $unPDO;
    }

    public function fetchCustomerByEmailAndPassword($email, $hashPassword)
    {
        try
        {
            $connexion = $this->lePDO;
            $sql = $connexion->prepare("SELECT * FROM customer WHERE email=:email and password=:password");
            $sql->bindParam(":email", $email);
            $sql->bindParam(":password", $hashPassword);
            $sql->execute();
            $sql->setFetchMode(PDO::FETCH_CLASS, "Customer");
            $resultat = $sql->fetch();
            return $resultat;
        }
        catch( PDOException $error)
        {
            $error->getMessage();
        }
    }

    public function fetchAllCustomers()
    {
        try
        {
            $connexion = $this->lePDO;
            $sql = $connexion->prepare("SELECT * FROM customer");
            $sql->execute();
            $sql->setFetchMode(PDO::FETCH_CLASS, "Customer");
            $resultat = $sql->fetchAll();
            return $resultat;
        }
        catch( PDOException $error)
        {
            $error->getMessage();
        }
    }

    public function addNewCustomer($firstname, $lastname, $email, $hashpassword, $address, $city, $postalCode)
    {
        try
        {
            $connexion = $this->lePDO;
            $sql = $connexion->prepare("INSERT INTO customer VALUES(null, :firstname, :lastname, :email, :hashpassword, :address, :city, :postalCode)");
            $sql->bindParam(":firstname", $firstname);
            $sql->bindParam(":lastname", $lastname);
            $sql->bindParam(":email", $email);
            $sql->bindParam(":hashpassword", $hashpassword);
            $sql->bindParam(":address", $address);
            $sql->bindParam(":city", $city);
            $sql->bindParam(":postalCode", $postalCode);
            $sql->execute();
        }
        catch (PDOException $error)
        {
            echo $error->getMessage();
        }
    }

    public function deleteCustomer($id)
    {
        try
        {
            $connexion = $this->lePDO;
            $connexion->beginTransaction();
            $sql = $connexion->prepare("DELETE FROM command WHERE idCustomer=:id");
            $sql->bindParam(":id", $id);
            $sql->execute();
            $sql = $connexion->prepare("DELETE FROM customer WHERE idCustomer=:id");
            $sql->bindParam(":id", $id);
            $sql->execute();
            $connexion->commit();
        }
        catch( PDOException $error)
        {
            $connexion->rollBack();
            $error->getMessage();
        }
    }
}