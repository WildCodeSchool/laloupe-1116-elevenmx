<?php

namespace ElevenmxBundle\Entity;

/**
 * Categorie
 */
class Categorie
{
    /**
     * @var int
     */
    private $id;

    /**
     * @var string
     */
    private $graphiste;

    /**
     * @var string
     */
    private $superAdmin;

    /**
     * @var string
     */
    private $admin;

    /**
     * @var string
     */
    private $client;


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
     * Set graphiste
     *
     * @param string $graphiste
     *
     * @return Categorie
     */
    public function setGraphiste($graphiste)
    {
        $this->graphiste = $graphiste;

        return $this;
    }

    /**
     * Get graphiste
     *
     * @return string
     */
    public function getGraphiste()
    {
        return $this->graphiste;
    }

    /**
     * Set superAdmin
     *
     * @param string $superAdmin
     *
     * @return Categorie
     */
    public function setSuperAdmin($superAdmin)
    {
        $this->superAdmin = $superAdmin;

        return $this;
    }

    /**
     * Get superAdmin
     *
     * @return string
     */
    public function getSuperAdmin()
    {
        return $this->superAdmin;
    }

    /**
     * Set admin
     *
     * @param string $admin
     *
     * @return Categorie
     */
    public function setAdmin($admin)
    {
        $this->admin = $admin;

        return $this;
    }

    /**
     * Get admin
     *
     * @return string
     */
    public function getAdmin()
    {
        return $this->admin;
    }

    /**
     * Set client
     *
     * @param string $client
     *
     * @return Categorie
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
}
