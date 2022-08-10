<?php

require('model/class/product.class.php');

class ProductManager
{
    // Attributs------
    private $lePDO;

    
    // Méthodes------
    public function __construct($unPDO)
    {
        $this->lePDO = $unPDO;
    }

    /**
     * Récupère tous les produits en fonction de l'idCategory
     *
     * @param [type] $id
     * @return object
     */
    public function fetchAllProductsByIdCategory($id)
    {
        try
        {
            $connexion = $this->lePDO;
            $sql = $connexion->prepare("SELECT * FROM product WHERE idCategory=:idCategory");
            $sql->bindParam(":idCategory", $id);
            $sql->execute();
            $sql->setFetchMode(PDO::FETCH_CLASS, "Product");
            $resultat = $sql->fetchAll();
            return $resultat;
        }
        catch (PDOException $error)
        {
            echo $error->getMessage();
        }
    }

    /**
     * Récupère un produit en fonction de sa propre id
     *
     * @param [type] $id
     * @return object
     */
    public function fetchProductById($id)
    {
        try
        {
            $connexion = $this->lePDO;
            $sql = $connexion->prepare("SELECT * FROM product WHERE idProduct=:idProduct");
            $sql->bindParam(":idProduct", $id);
            $sql->execute();
            $sql->setFetchMode(PDO::FETCH_CLASS, 'Product');
            $resultat = $sql->fetch();
            return $resultat;
        }
        catch (PDOException $error)
        {
            echo $error->getMessage();
        }
    }

    /**
     * Récupère un produit en fonction de sa propre name
     *
     * @param [type] $name
     * @return object
     */
    public function fetchProductByName($name)
    {
        try
        {
            $connexion = $this->lePDO;
            $sql = $connexion->prepare("SELECT * FROM product WHERE name=:name");
            $sql->execute([":name" => $name]);
            $sql->setFetchMode(PDO::FETCH_CLASS, 'Product');
            $resultat = $sql->fetch();
            return $resultat;
        }
        catch (PDOException $error)
        {
            echo $error->getMessage();
        }
    }

    /**
     * Récupère tous les articles
     *
     * @return object
     */
    public function fetchAllProducts()
    {
        try
        {
            $connexion = $this->lePDO;
            $sql = $connexion->prepare("SELECT * FROM product");
            $sql->execute();
            $sql->setFetchMode(PDO::FETCH_CLASS, 'Product');
            $resultat = $sql->fetchAll();
            return $resultat;
        }
        catch (PDOException $error)
        {
            echo $error->getMessage();
        }
    }

    /**
     * Ajoute un nouvel article dans la base de données
     *
     * @param [type] $name
     * @param [type] $description
     * @param [type] $unitPrice
     * @param [type] $idCategory
     * @return void
     */
    public function addNewProduct($name, $description, $unitPrice, $idCategory)
    {
        try
        {
            $connexion = $this->lePDO;
            $sql = $connexion->prepare("INSERT INTO product VALUES(null, :name, :description, :unitPrice, :idCategory)");
            
            $sql->execute([
                            ":name" => $name,
                            ":description" => $description,
                            ":unitPrice" => $unitPrice,
                            ":idCategory" => $idCategory
                        ]);
        }
        catch (PDOException $error)
        {
            echo $error->getMessage();
        }
    }
    
    /**
     * Supprime un article en fonction de son id
     *
     * @param [type] $id
     * @return void
     */
    public function deleteProduct($id)
    {
        try
        {
            $connexion = $this->lePDO;
            // beginTransaction() désactive le mode autocommit. Lorsque l'autocommit est désactivé, les modifications faites sur la base de données via les instances des objets PDO ne sont pas appliquées tant que vous ne mettez pas fin à la transaction en appelant la fonction PDO::commit(). L'appel de PDO::rollBack() annulera toutes les modifications faites à la base de données et remettra la connexion en mode autocommit.
            $connexion->beginTransaction();
            $sql = $connexion->prepare("DELETE FROM product_command WHERE idProduct=:id");
            $sql->bindParam(":id", $id);
            $sql->execute();
            $sql = $connexion->prepare("DELETE FROM product WHERE idProduct=:id");
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


    /**
     * Modifie un article en fonction de son id
     *
     * @param [type] $idProduct
     * @param [type] $name
     * @param [type] $description
     * @param [type] $unitPrice
     * @param [type] $idCategory
     * @return void
     */
    public function updateProduct($idProduct, $name, $description, $unitPrice, $idCategory)
    {
        try
        {
            $connexion = $this->lePDO;
            $sql = $connexion->prepare("UPDATE product SET name=:name, description=:description, unitPrice=:unitPrice, idCategory=:idCategory WHERE idProduct=:idProduct");
            $sql->bindParam(":name", $name);
            $sql->bindParam(":description", $description);
            $sql->bindParam(":unitPrice", $unitPrice);
            $sql->bindParam(":idCategory", $idCategory);
            $sql->bindParam(":idProduct", $idProduct);
            $sql->execute();
        }
        catch (PDOException $error)
        {
            $error->getMessage();
        }
    }

    /**
     * Récupère tous les produits par leur idCommand
     *
     * @param [type] $idCommand
     * @return void
     */
    public function fetchAllProductsByIdCommand( $idCommand )
    {
        try
        {
            $connexion = $this->lePDO;
            $sql = $connexion->prepare("SELECT * FROM product NATURAL JOIN product_command WHERE idCommand = :idCommand");
            $sql->bindParam(":idCommand", $idCommand);
            $sql->execute();
            $sql->setFetchMode(PDO::FETCH_CLASS, "Product");
            $resultat = $sql->fetchAll();
            return $resultat;
        }
        catch( PDOException $error )
        {
            echo $error->getMessage();
        }
    } 
}