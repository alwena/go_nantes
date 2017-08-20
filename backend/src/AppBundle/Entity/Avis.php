<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Avis
 *
 * @ORM\Table(name="avis")
 * @ORM\Entity(repositoryClass="AppBundle\Repository\AvisRepository")
 */
class Avis
{
    /**
     * @var int
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @var string
     *
     * @ORM\Column(name="commentaire", type="string", length=255)
     */
    private $commentaire;

    /**
     * @var int
     *
     * @ORM\Column(name="nbEtoile", type="integer", nullable=true)
     */
    private $nbEtoile;

    /**
     * @ORM\ManyToOne(targetEntity="Lieu", cascade={"all"}, fetch="EAGER")
     */
    private $lieu;

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
     * Set commentaire
     *
     * @param string $commentaire
     * @return Avis
     */
    public function setCommentaire($commentaire)
    {
        $this->commentaire = $commentaire;

        return $this;
    }

    /**
     * Get commentaire
     *
     * @return string 
     */
    public function getCommentaire()
    {
        return $this->commentaire;
    }

    /**
     * Set nbEtoile
     *
     * @param integer $nbEtoile
     * @return Avis
     */
    public function setNbEtoile($nbEtoile)
    {
        $this->nbEtoile = $nbEtoile;

        return $this;
    }

    /**
     * Get nbEtoile
     *
     * @return integer 
     */
    public function getNbEtoile()
    {
        return $this->nbEtoile;
    }

    /**
     * Set lieu
     *
     * @param \AppBundle\Entity\Lieu $lieu
     * @return Avis
     */
    public function setLieu(\AppBundle\Entity\Lieu $lieu = null)
    {
        $this->lieu = $lieu;

        return $this;
    }

    /**
     * Get lieu
     *
     * @return \AppBundle\Entity\Lieu 
     */
    public function getLieu()
    {
        return $this->lieu;
    }
}
