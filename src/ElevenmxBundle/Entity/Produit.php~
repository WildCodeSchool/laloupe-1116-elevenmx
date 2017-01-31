<?php

namespace ElevenmxBundle\Entity;

/**
 * Produit
 */
class Produit
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
     * @return Produit
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
     * @var \Doctrine\Common\Collections\Collection
     */
    private $projets;

    /**
     * Constructor
     */
    public function __construct()
    {
        $this->projets = new \Doctrine\Common\Collections\ArrayCollection();
    }

    /**
     * Add projet
     *
     * @param \ElevenmxBundle\Entity\Projet $projet
     *
     * @return Produit
     */
    public function addProjet(\ElevenmxBundle\Entity\Projet $projet)
    {
        $this->projets[] = $projet;

        return $this;
    }

    /**
     * Remove projet
     *
     * @param \ElevenmxBundle\Entity\Projet $projet
     */
    public function removeProjet(\ElevenmxBundle\Entity\Projet $projet)
    {
        $this->projets->removeElement($projet);
    }

    /**
     * Get projets
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getProjets()
    {
        return $this->projets;
    }
    /**
     * @var string
     */
    private $oneToMany;


    /**
     * Set oneToMany
     *
     * @param string $oneToMany
     *
     * @return Produit
     */
    public function setOneToMany($oneToMany)
    {
        $this->oneToMany = $oneToMany;

        return $this;
    }

    /**
     * Get oneToMany
     *
     * @return string
     */
    public function getOneToMany()
    {
        return $this->oneToMany;
    }

    public function __toString()
    {
        return $this->nom;
    }

    /**
     * @var string
     */
    private $googleform;


    /**
     * Set googleform
     *
     * @param string $googleform
     *
     * @return Produit
     */
    public function setGoogleform($googleform)
    {
        $this->googleform = $googleform;

        return $this;
    }

    /**
     * Get googleform
     *
     * @return string
     */
    public function getGoogleform()
    {
        return $this->googleform;
    }
}
