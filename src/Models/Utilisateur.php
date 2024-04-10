<?php

class Utilisateur {
    private $Id;
    private $Prenom;
    private $Nom;
    private $Mdp;
    private $Email;
    private $Compte_active;

    public function __construct($Id, $Prenom, $Nom, $Mdp, $Email, $Compte_active) {
        $this->Id = $Id;
        $this->Prenom = $Prenom;
        $this->Nom = $Nom;
        $this->Mdp = $Mdp;
        $this->Email = $Email;
        $this->Compte_active = $Compte_active;
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
     * Get the value of Prenom
     */
    public function getPrenom()
    {
        return $this->Prenom;
    }

    /**
     * Set the value of Prenom
     *
     * @param   mixed  $Prenom  
     *
     */
    public function setPrenom($Prenom)
    {
        $this->Prenom = $Prenom;
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
     * Get the value of Mdp
     */
    public function getMdp()
    {
        return $this->Mdp;
    }

    /**
     * Set the value of Mdp
     *
     * @param   mixed  $Mdp  
     *
     */
    public function setMdp($Mdp)
    {
        $this->Mdp = $Mdp;
    }
    
    /**
     * Get the value of Email
     */
    public function getEmail()
    {
        return $this->Email;
    }

    /**
     * Set the value of Email
     *
     * @param   mixed  $Email  
     *
     */
    public function setEmail($Email)
    {
        $this->Email = $Email;
    }
    
    /**
     * Get the value of Compte_active
     */
    public function getCompteActive()
    {
        return $this->Compte_active;
    }

    /**
     * Set the value of Compte_active
     *
     * @param   mixed  $Compte_active  
     *
     */
    public function setCompteActive($Compte_active)
    {
        $this->Compte_active = $Compte_active;
    }
    }