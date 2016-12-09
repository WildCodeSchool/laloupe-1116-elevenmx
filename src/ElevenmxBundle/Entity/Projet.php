<?php

namespace ElevenmxBundle\Entity;

/**
 * Projet
 */
class Projet
{
    /**
     * @var int
     */
    private $id;

    /**
     * @var string
     */
    private $titreProjet;

    /**
     * @var string
     */
    private $client;

    /**
     * @var string
     */
    private $marque;

    /**
     * @var string
     */
    private $produit;

    /**
     * @var string
     */
    private $nomGraphiste;


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
     * Set titreProjet
     *
     * @param string $titreProjet
     *
     * @return Projet
     */
    public function setTitreProjet($titreProjet)
    {
        $this->titreProjet = $titreProjet;

        return $this;
    }

    /**
     * Get titreProjet
     *
     * @return string
     */
    public function getTitreProjet()
    {
        return $this->titreProjet;
    }

    /**
     * Set client
     *
     * @param string $client
     *
     * @return Projet
     */
    public function setClient($client)
    {
        $this->client = $client;

        return $this;
    }

    /**
     * Get client
     *
     * @return string
     */
    public function getClient()
    {
        return $this->client;
    }

    /**
     * Set marque
     *
     * @param string $marque
     *
     * @return Projet
     */
    public function setMarque($marque)
    {
        $this->marque = $marque;

        return $this;
    }

    /**
     * Get marque
     *
     * @return string
     */
    public function getMarque()
    {
        return $this->marque;
    }

    /**
     * Set produit
     *
     * @param string $produit
     *
     * @return Projet
     */
    public function setProduit($produit)
    {
        $this->produit = $produit;

        return $this;
    }

    /**
     * Get produit
     *
     * @return string
     */
    public function getProduit()
    {
        return $this->produit;
    }

    /**
     * Set nomGraphiste
     *
     * @param string $nomGraphiste
     *
     * @return Projet
     */
    public function setNomGraphiste($nomGraphiste)
    {
        $this->nomGraphiste = $nomGraphiste;

        return $this;
    }

    /**
     * Get nomGraphiste
     *
     * @return string
     */
    public function getNomGraphiste()
    {
        return $this->nomGraphiste;
    }
}

