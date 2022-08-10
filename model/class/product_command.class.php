<?php

class Product_Command
{
    // Attributs
    private ?int $idCommand;
    private ?int $idProduct;
    private ?int $quantityProduct;

    
    // Méthodes
    /**
     * Récupère la valeur de idCommand
     *
     * @return void
     */
    public function getIdCommand()
    {
        return $this->idCommand;
    }

    /**
     * Détermine la valeur de idCommand
     *
     * @param [type] $idCommand
     * @return void
     */
    public function setIdCommand($idCommand)
    {
        $this->idCommand = $idCommand;
    }

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
    }

    /**
     * Récupère la valeur de quantityProduct
     *
     * @return void
     */
    public function getQuantityProduct()
    {
        return $this->quantityProduct;
    }

    /**
     * Détermine la valeur de quantityProduct
     *
     * @param [type] $quantityProduct
     * @return void
     */
    public function setQuantityProduct($quantityProduct)
    {
        $this->quantityProduct = $quantityProduct;
    }
}