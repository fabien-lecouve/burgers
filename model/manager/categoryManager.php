<?php

require("model/class/category.class.php");

class CategoryManager
{
    // Attributs ------
    private $lePDO;

    
    // Méthodes ------
    public function __construct($unPDO)
    {
        $this->lePDO = $unPDO;
    }

    /**
     * Fonction qui récupère toutes les catégories
     *
     * @return object
     */
    public function fetchAllCategories()
    {
        try
        {
            $connexion = $this->lePDO;
            $sql = $connexion->prepare("SELECT * FROM category ORDER BY idCategory");
            $sql->execute();
            $sql->setFetchMode(PDO::FETCH_CLASS, 'Category');
            $resultat = $sql->fetchAll();
            return $resultat;
        }
        catch( PDOException $error)
        {
            echo $error->getMessage();
        }
    }
    /**
     * Fonction qui récupère une catégorie par son id
     *
     * @param [type] $id
     * @return object
     */
    public function fetchCategoryById($id)
    {
        try
        {
            $connexion = $this->lePDO;
            $sql = $connexion->prepare("SELECT * FROM category WHERE idCategory=:idCategory");
            $sql->bindParam(":idCategory", $id);
            $sql->execute();
            $sql->setFetchMode(PDO::FETCH_CLASS, 'Category');
            $resultat = $sql->fetch();
            return $resultat;
        }
        catch( PDOException $error)
        {
            echo $error->getMessage();
        }
    }

    
    public function addNewCategory($name)
    {
        try
        {
            $connexion = $this->lePDO;
            $sql = $connexion->prepare("INSERT INTO category VALUES(null, :name)");
            $sql->bindParam(":name", $name);
            $sql->execute();
        }
        catch (PDOException $error)
        {
            echo $error->getMessage();
        }
    }

    public function deleteCategory($id)
    {
        try
        {
            $connexion = $this->lePDO;
            $connexion->beginTransaction();
            $sql = $connexion->prepare("DELETE FROM product WHERE idCategory=:id");
            $sql->bindParam(":id", $id);
            $sql->execute();
            $sql = $connexion->prepare("DELETE FROM category WHERE idCategory=:id");
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

    public function updateCategory($idCategory, $name)
    {
        try
        {
            $connexion = $this->lePDO;
            $sql = $connexion->prepare("UPDATE category SET name=:name WHERE idCategory=:idCategory");
            $sql->bindParam(":name", $name);
            $sql->bindParam(":idCategory", $idCategory);
            $sql->execute();
        }
        catch (PDOException $error)
        {
            $error->getMessage();
        }
    }
}