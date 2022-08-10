<?php

class Admin
{
    // Attributs
    private ?int $idAdmin;
    private ?string $firstname;
    private ?string $lastname;
    private ?string $email;
    private ?string $password;

    
    // Méthodes
    /**
     * Récupère la valeur de idAdmin
     *
     * @return void
     */
    public function getIdAdmin()
    {
        return $this->idAdmin;
    }

    /**
     * Détermine la valeur de idCustomer
     *
     * @param [type] $idCustomer
     * @return void
     */
    public function setIdAdmin($idAdmin)
    {
        $this->idAdmin = $idAdmin;
    }

    /**
     * Récupère la valeur de firstname
     *
     * @return void
     */
    public function getFirstname()
    {
        return $this->firstname;
    }

    /**
     * Détermine la valeur de firstname
     *
     * @param [type] $firstname
     * @return void
     */
    public function setFirstname($firstname)
    {
        $this->firstname = $firstname;
    }

    /**
     * Récupère la valeur de lastname
     *
     * @return void
     */
    public function getLastname()
    {
        return $this->lastname;
    }

    /**
     * Détermine la valeur de lastname
     *
     * @param [type] $lastname
     * @return void
     */
    public function setLastname($lastname)
    {
        $this->lastname = $lastname;
    }

    /**
     * Récupère la valeur de email
     *
     * @return void
     */
    public function getEmail()
    {
        return $this->email;
    }

    /**
     * Détermine la valeur de email
     *
     * @param [type] $email
     * @return void
     */
    public function setEmail($email)
    {
        $this->email = $email;
    }

    /**
     * Récupère la valeur de password
     *
     * @return void
     */
    public function getPassword()
    {
        return $this->password;
    }

    /**
     * Détermine la valeur de password
     *
     * @param [type] $password
     * @return void
     */
    public function setPassword($password)
    {
        $this->password = $password;
    }
}