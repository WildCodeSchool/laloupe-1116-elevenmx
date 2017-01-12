<?php

namespace ElevenmxBundle\Entity;

/**
 * User
 */

use FOS\UserBundle\Model\User as BaseUser;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;

class User extends BaseUser
{
    /**
     * @var integer
     */
    protected $id;

    /**
     * @var string
     */
    private $nom;

    /**
     * @var string
     */
    private $prenom;



    /**
     * @Assert\Regex(pattern="/(^0[1-9]([-. ]?[0-9]{2}){4}$)/")
     */
    private $telephone;

    /**
     * @var string
     */
    private $entreprise;



    /**
     * Get id
     *
     * @return integer
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
     * @return User
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
     * @return User
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
     * Set telephone
     *
     * @param string $telephone
     *
     * @return User
     */
    public function setTelephone($telephone)
    {
        $this->telephone = $telephone;

        return $this;
    }

    /**
     * Get telephone
     *
     * @return string
     */
    public function getTelephone()
    {
        return $this->telephone;
    }

    /**
     * Set entreprise
     *
     * @param string $entreprise
     *
     * @return User
     */
    public function setEntreprise($entreprise)
    {
        $this->entreprise = $entreprise;

        return $this;
    }

    /**
     * Get entreprise
     *
     * @return string
     */
    public function getEntreprise()
    {
        return $this->entreprise;
    }

    /**
     * @var \ElevenmxBundle\Entity\Categorie
     */
    private $categorie;

    /**
     * @var \Doctrine\Common\Collections\Collection
     */
    private $users;


    /**
     * Set categorie
     *
     * @param \ElevenmxBundle\Entity\Categorie $categorie
     *
     * @return User
     */
    public function setCategorie($categorie)
    {
        $this->categorie = $categorie;

        return $this;
    }

    /**
     * Get categorie
     *
     * @return \ElevenmxBundle\Entity\Categorie
     */
    public function getCategorie()
    {
        return $this->categorie;
    }

    /**
     * Add user
     *
     * @param \ElevenmxBundle\Entity\User $user
     *
     * @return User
     */
    public function addUser(\ElevenmxBundle\Entity\User $user)
    {
        $this->users[] = $user;

        return $this;
    }

    /**
     * Remove user
     *
     * @param \ElevenmxBundle\Entity\User $user
     */
    public function removeUser(\ElevenmxBundle\Entity\User $user)
    {
        $this->users->removeElement($user);
    }

    /**
     * Get users
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getUsers()
    {
        return $this->users;
    }







}
