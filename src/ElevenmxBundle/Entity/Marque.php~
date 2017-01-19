<?php

namespace ElevenmxBundle\Entity;

/**
 * Marque
 */
class Marque
{
    /* ajout de code genere */
    public $file1;

    protected function getUploadDir()
    {
        return 'uploads';
    }

    protected function getUploadRootDir()
    {
        return __DIR__.'/../../../web/'.$this->getUploadDir();
    }


    public function getWebPath()
    {
        return null === $this->image1 ? null : $this->getUploadDir().'/'.$this->image1;
    }

    public function getAbsolutePath()
    {
        return null === $this->image1 ? null : $this->getUploadRootDir().'/'.$this->image1;
    }

    public function preUpload1()
    {
        if (null !== $this->file1) {
            // do whatever you want to generate a unique name
            $this->image1 = uniqid().'.'.$this->file1->guessExtension();
        }
    }


    public function upload1()
    {
        if (null === $this->file1) {
            return;
        }

        // if there is an error when moving the file, an exception will
        // be automatically thrown by move(). This will properly prevent
        // the entity from being persisted to the database on error
        $this->file1->move($this->getUploadRootDir(), $this->image1);

        unset($this->file1);
    }


    public function removeUpload1()
    {
        if ($file = $this->getAbsolutePath()) {
            unlink($file);
        }
    }


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
     * @return Marque
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
     * @var string
     */
    private $image1;


    /**
     * Set image
     *
     * @param string $image
     *
     * @return Marque
     */
    public function setImage1($image1)
    {
        $this->image1 = $image1;

        return $this;
    }

    /**
     * Get image
     *
     * @return string
     */
    public function getImage1()
    {
        return $this->image1;
    }
    /**
     * @var string
     */
    private $image;


    /**
     * Set image
     *
     * @param string $image
     *
     * @return Marque
     */
    public function setImage($image)
    {
        $this->image = $image;

        return $this;
    }

    /**
     * Get image
     *
     * @return string
     */
    public function getImage()
    {
        return $this->image;
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
     * @return Marque
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
     * @var \Doctrine\Common\Collections\Collection
     */
    private $projet;


    /**
     * Get projet
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getProjet()
    {
        return $this->projet;
    }



    /**
     * Set projets
     *
     * @param string $projets
     *
     * @return Marque
     */
    public function setProjets($projets)
    {
        $this->projets = $projets;

        return $this;
    }

    public function __toString()
    {
        return $this->nom;
    }

}
