<?php

class Cours {
    private $Id;
    private $Nom;
    private $Date_debut;
    private $Date_fin;
    private $Code;

    public function __construct($Id, $Nom, $Date_debut, $Date_fin, $Code) {
        $this->Id = $Id;
        $this->Nom = $Nom;
        $this->Date_debut = $Date_debut;
        $this->Date_fin = $Date_fin;
        $this->Code = $Code;
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
    
    /**
     * Get the value of Date_debut
     */
    public function getDateDebut()
    {
        return $this->Date_debut;
    }

    /**
     * Set the value of Date_debut
     *
     * @param   mixed  $Date_debut  
     *
     */
    public function setDateDebut($Date_debut)
    {
        $this->Date_debut = $Date_debut;
    }
    
    /**
     * Get the value of Date_fin
     */
    public function getDateFin()
    {
        return $this->Date_fin;
    }

    /**
     * Set the value of Date_fin
     *
     * @param   mixed  $Date_fin  
     *
     */
    public function setDateFin($Date_fin)
    {
        $this->Date_fin = $Date_fin;
    }
    
    /**
     * Get the value of Code
     */
    public function getCode()
    {
        return $this->Code;
    }

    /**
     * Set the value of Code
     *
     * @param   mixed  $Code  
     *
     */
    public function setCode($Code)
    {
        $this->Code = $Code;
    }
    }