<?php

class Category
{
    // Attributs ------
    private ?int $idCategory;
    private ?string $name;
    

    // Méthodes ------
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
    public function setidCategory($idCategory)
    {
        $this->idCategory = $idCategory;
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
}