<?php

class Utilisateur {
    private $Id;
    private $Nom;

    public function __construct($Id, $Nom) {
        $this->Id = $Id;
        $this->Nom = $Nom;
    }

    /**
     * Get the value of Id
     */
    public function getId()
    {
        return $this->Id;
    }

    /**
     * Set the value of Id
     *
     * @param   mixed  $Id  
     *
     */
    public function setId($Id)
    {
        $this->Id = $Id;
    }
    
    /**
     * Get the value of Nom
     */
    public function getNom()
    {
        return $this->Nom;
    }

    /**
     * Set the value of Nom
     *
     * @param   mixed  $Nom  
     *
     */
    public function setNom($Nom)
    {
        $this->Nom = $Nom;
    }
    }