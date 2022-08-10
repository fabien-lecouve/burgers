<?php

class Product
{
    // Attributs ------
    private ?int $idProduct;
    private ?string $name;
    private ?string $description;
    private ?float $unitPrice;
    private ?int $idCategory;

    
    // Méthodes ------
    /**
     * Récupère la valeur de idProduct
     *
     * @return void
     */
    public function getIdProduct()
    {
        return $this->idProduct;
    }

    /**
     * Détermine la valeur de idProduct
     *
     * @param [type] $idProduct
     * @return void
     */
    public function setIdProduct($idProduct)
    {
        $this->idProduct = $idProduct;
        return $this;
    }

    /**
     * Récupère la valeur de name
     *
     * @return void
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * Détermine la valeur de name
     *
     * @param [type] $name
     * @return void
     */
    public function setName($name)
    {
        $this->name = $name;
        return $this;
    }

    /**
     * Récupère la valeur de description
     *
     * @return void
     */
    public function getDescription()
    {
        return $this->description;
    }

    /**
     * Détermine la valeur de description
     *
     * @param [type] $description
     * @return void
     */
    public function setDescription($description)
    {
        $this->description = $description;
        return $this;
    }

    /**
     * Récupère la valeur de unitPrice
     *
     * @return void
     */
    public function getUnitPrice()
    {
        return $this->unitPrice;
    }

    /**
     * Détermine la valeur de unitPrice
     *
     * @param [type] $unitPrice
     * @return void
     */
    public function setUnitPrice($unitPrice)
    {
        $this->unitPrice = $unitPrice;
        return $this;
    }

    /**
     * Récupère la valeur de idCategory
     *
     * @return void
     */
    public function getIdCategory()
    {
        return $this->idCategory;
    }

    /**
     * Détermine la valeur de idCategory
     *
     * @param [type] $idCategory
     * @return void
     */
    public function setIdCategory($idCategory)
    {
        $this->idCategory = $idCategory;
        return $this;
    }
}