<?php

namespace ElevenmxBundle\Entity;

/**
 * Commentaire
 */
class Commentaire
{
    /** ajout code pour administrer les photos */
    public $file;

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
        return null === $this->image ? null : $this->getUploadDir().'/'.$this->image;
    }

    public function getAbsolutePath()
    {
        return null === $this->image ? null : $this->getUploadRootDir().'/'.$this->image;
    }

    public function preUpload()
    {
        if (null !== $this->file) {
            // do whatever you want to generate a unique name
            $this->image = uniqid().'.'.$this->file->guessExtension();
        }
    }

    public function upload()
    {
        if (null === $this->file) {
            return;
        }

        $this->file->move($this->getUploadRootDir(), $this->image);

        unset($this->file);
    }

    public function removeUpload()
    {
        if ($file = $this->getAbsolutePath()) {
            unlink($file);
        }
    }
    /** fin ajout code pour administrer les photo */
    /**
     * @var int
     */
    private $id;

    /**
     * @var string
     */
    private $champsText;

    /**
     * Set id
     *
     * @param string $id
     *
     * @return Commentaire
     */
    public function setid($id)
    {
        $this->id = $id;

        return $this;
    }
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
     * Set champsText
     *
     * @param string $champsText
     *
     * @return Commentaire
     */
    public function setChampsText($champsText)
    {
        $this->champsText = $champsText;

        return $this;
    }

    /**
     * Get champsText
     *
     * @return string
     */
    public function getChampsText()
    {
        return $this->champsText;
    }
    /**
     * @var \ElevenmxBundle\Entity\Projet
     */
    private $projet;


    /**
     * Set projet
     *
     * @param \ElevenmxBundle\Entity\Projet $projet
     *
     * @return Commentaire
     */
    public function setProjet(\ElevenmxBundle\Entity\Projet $projet = null)
    {
        $this->projet = $projet;

        return $this;
    }

    /**
     * Get projet
     *
     * @return \ElevenmxBundle\Entity\Projet
     */
    public function getProjet()
    {
        return $this->projet;
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
     * @return Commentaire
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
}
