<?php

namespace ElevenmxBundle\Entity;

/**
 * NouveauGraphiste
 */
class NouveauGraphiste
{
    /**
     * @var int
     */
    private $id;

    /**
     * @var string
     */
    private $nom;

    /**
     * @var string
     */
    private $prenom;

    /**
     * @var string
     */
    private $codeUtilisateur;

    /**
     * @var string
     */
    private $motDePasse;


    /**
     * Get id
     *
     * @return int
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set nom
     *
     * @param string $nom
     *
     * @return NouveauGraphiste
     */
    public function setNom($nom)
    {
        $this->nom = $nom;

        return $this;
    }

    /**
     * Get nom
     *
     * @return string
     */
    public function getNom()
    {
        return $this->nom;
    }

    /**
     * Set prenom
     *
     * @param string $prenom
     *
     * @return NouveauGraphiste
     */
    public function setPrenom($prenom)
    {
        $this->prenom = $prenom;

        return $this;
    }

    /**
     * Get prenom
     *
     * @return string
     */
    public function getPrenom()
    {
        return $this->prenom;
    }

    /**
     * Set codeUtilisateur
     *
     * @param string $codeUtilisateur
     *
     * @return NouveauGraphiste
     */
    public function setCodeUtilisateur($codeUtilisateur)
    {
        $this->codeUtilisateur = $codeUtilisateur;

        return $this;
    }

    /**
     * Get codeUtilisateur
     *
     * @return string
     */
    public function getCodeUtilisateur()
    {
        return $this->codeUtilisateur;
    }

    /**
     * Set motDePasse
     *
     * @param string $motDePasse
     *
     * @return NouveauGraphiste
     */
    public function setMotDePasse($motDePasse)
    {
        $this->motDePasse = $motDePasse;

        return $this;
    }

    /**
     * Get motDePasse
     *
     * @return string
     */
    public function getMotDePasse()
    {
        return $this->motDePasse;
    }
}

