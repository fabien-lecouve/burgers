<?php

class Customer
{
    // Attributs
    private ?int $idCustomer;
    private ?string $firstname;
    private ?string $lastname;
    private ?string $email;
    private ?string $password;
    private ?string $address;
    private ?string $city;
    private ?int $postalCode;

    
    // Méthodes
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

    /**
     * Récupère la valeur de address
     *
     * @return void
     */
    public function getAddress()
    {
        return $this->address;
    }

    /**
     * Détermine la valeur de address
     *
     * @param [type] $address
     * @return void
     */
    public function setAddress($address)
    {
        $this->address = $address;
    }

    /**
     * Récupère la valeur de city
     *
     * @return void
     */
    public function getCity()
    {
        return $this->city;
    }

    /**
     * Détermine la valeur de city
     *
     * @param [type] $city
     * @return void
     */
    public function setCity($city)
    {
        $this->city = $city;
    }

    /**
     * Récupère la valeur de postalCode
     *
     * @return void
     */
    public function getPostalCode()
    {
        return $this->postalCode;
    }

    /**
     * Détermine la valeur de postalCode
     *
     * @param [type] $postalCode
     * @return void
     */
    public function setPostalCode($postalCode)
    {
        $this->postalCode = $postalCode;
    }
}