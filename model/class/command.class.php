<?php

class Command
{
    // Attributs
    private ?int $idCommand;
    private ?string $dateCommand;
    private ?string $deliveryTime;
    private ?int $idCustomer;
    private ?float $totalCommand;

    
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
     * Récupère la valeur de dateCommand
     *
     * @return void
     */
    public function getDateCommand()
    {
        return $this->dateCommand;
    }

    /**
     * Détermine la valeur de dateCommand
     *
     * @param [type] $dateCommand
     * @return void
     */
    public function setDateCommand($dateCommand)
    {
        $this->dateCommand = $dateCommand;
    }

    /**
     * Récupère la valeur de deliveryTime
     *
     * @return void
     */
    public function getDeliveryTime()
    {
        return $this->deliveryTime;
    }

    /**
     * Détermine la valeur de deliveryTime
     *
     * @param [type] $deliveryTime
     * @return void
     */
    public function setDeliveryTime($deliveryTime)
    {
        $this->deliveryTime = $deliveryTime;
    }

    /**
     * Récupère la valeur de idCustomer
     *
     * @return void
     */
    public function getIdCustomer()
    {
        return $this->idCustomer;
    }

    /**
     * Détermine la valeur de idCustomer
     *
     * @param [type] $idCustomer
     * @return void
     */
    public function setIdCustomer($idCustomer)
    {
        $this->idCustomer = $idCustomer;
    }

    /**
     * Récupère la valeur de totalCommand
     *
     * @return void
     */
    public function getTotalCommand()
    {
        return $this->totalCommand;
    }

    /**
     * Détermine la valeur de totalCommand
     *
     * @param [type] $totalCommand
     * @return void
     */
    public function setTotalCommand($totalCommand)
    {
        $this->totalCommand = $totalCommand;
    }
}