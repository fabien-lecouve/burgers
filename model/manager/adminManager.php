<?php

require('model/class/admin.class.php');

class AdminManager
{
    // Attributs
    private $lePDO;


    // Méthodes------
    public function __construct($unPDO)
    {
        $this->lePDO = $unPDO;
    }

    public function fetchAdminByEmailAndPassword($email, $hashPassword)
    {
        try
        {
            $connexion = $this->lePDO;
            $sql = $connexion->prepare("SELECT * FROM admin WHERE email=:email and password=:password");
            $sql->bindParam(":email", $email);
            $sql->bindParam(":password", $hashPassword);
            $sql->execute();
            $sql->setFetchMode(PDO::FETCH_CLASS, "Admin");
            $resultat = $sql->fetch();
            return $resultat;
        }
        catch( PDOException $error)
        {
            $error->getMessage();
        }
    }

    public function fetchAllAdmins()
    {
        try
        {
            $connexion = $this->lePDO;
            $sql = $connexion->prepare("SELECT * FROM admin");
            $sql->execute();
            $sql->setFetchMode(PDO::FETCH_CLASS, "Admin");
            $resultat = $sql->fetchAll();
            return $resultat;
        }
        catch( PDOException $error)
        {
            $error->getMessage();
        }
    }

    public function addNewAdmin($firstname, $lastname, $email, $hashpassword)
    {
        try
        {
            $connexion = $this->lePDO;
            $sql = $connexion->prepare("INSERT INTO admin VALUES(null, :firstname, :lastname, :email, :hashpassword)");
            $sql->bindParam(":firstname", $firstname);
            $sql->bindParam(":lastname", $lastname);
            $sql->bindParam(":email", $email);
            $sql->bindParam(":hashpassword", $hashpassword);
            $sql->execute();
        }
        catch (PDOException $error)
        {
            echo $error->getMessage();
        }
    }

    public function deleteAdmin($id)
    {
        try
        {
            $connexion = $this->lePDO;
            $sql = $connexion->prepare("DELETE FROM admin WHERE idAdmin=:id");
            $sql->bindParam(":id", $id);
            $sql->execute();
        }
        catch( PDOException $error)
        {
            $error->getMessage();
        }
    }
}