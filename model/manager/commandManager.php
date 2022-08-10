<?php

require_once('model/class/command.class.php');
require_once('model/class/product_command.class.php');

class CommandManager
{
    // Attributs
    private $lePDO;

    // Méthodes
    public function __construct($unPDO)
    {
        $this->lePDO = $unPDO;
    }

    public function createCommand( $totalCommand )
    {
        try
        {
            $connexion = $this->lePDO;
            $connexion->beginTransaction();
            $sql = $connexion->prepare("INSERT INTO command VALUES(null, :dateCommand, null, :idCustomer, :totalCommand)");
            
            $date = date("Y-m-d H:i:s");
            $sql->bindParam(":dateCommand", $date);
            $sql->bindParam(":idCustomer", $_SESSION["id"]);
            $sql->bindParam(":totalCommand", $totalCommand);
            $sql->execute();
            
            $idCommand = $connexion->lastInsertId();

            foreach( $_SESSION["panier"] as $line )
            {
                $sql = $connexion->prepare("INSERT INTO product_command VALUES( :idCommand, :idProduct, :quantityProduct)");

                $sql->bindParam(":idCommand", $idCommand);
                $sql->bindParam(":idProduct", $line[0]);
                $sql->bindParam(":quantityProduct", $line[1]);
                $sql->execute();
            }
            $connexion->commit();
        }
        catch( PDOException $error )
        {
            $connexion->rollBack();
            echo $error->getMessage();
        }
    }

    public function fetchAllCommandsByIdCustomer( $idCustomer )
    {
        try
        {
            $connexion = $this->lePDO;
            $sql = $connexion->prepare("SELECT * FROM command WHERE idCustomer = :idCustomer");
            $sql->bindParam(":idCustomer", $idCustomer);
            $sql->execute();
            $sql->setFetchMode(PDO::FETCH_CLASS, "Command");
            $resultat = $sql->fetchAll();
            return $resultat;
        }
        catch( PDOException $error )
        {
            $connexion->rollBack();
            echo $error->getMessage();
        }
    }
}