<?php

namespace ElevenmxBundle\Entity;

/**
 * Gestionstatus
 */
class Gestionstatus
{
    /**
     * @var int
     */
    private $id;

    /**
     * @var string
     */
    private $statut;


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
     * Set statut
     *
     * @param string $statut
     *
     * @return Gestionstatus
     */
    public function setStatut($statut)
    {
        $this->statut = $statut;

        return $this;
    }

    /**
     * Get statut
     *
     * @return string
     */
    public function getStatut()
    {
        return $this->statut;
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
     * @return Gestionstatus
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

    public function __toString()
    {
        return $this->statut;
    }

    /**
     * Set projets
     *
     * @param \ElevenmxBundle\Entity\Projet $projets
     *
     * @return Gestionstatus
     */
    public function setProjets(\ElevenmxBundle\Entity\Projet $projets = null)
    {
        $this->projets = $projets;

        return $this;
    }
}
