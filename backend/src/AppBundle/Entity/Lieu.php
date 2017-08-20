<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Lieu
 *
 * @ORM\Table(name="lieu")
 * @ORM\Entity(repositoryClass="AppBundle\Repository\LieuRepository")
 */
class Lieu
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
     * @ORM\Column(name="nom", type="string", length=255, unique=true)
     */
    private $nom;

    /**
     * @var string
     *
     * @ORM\Column(name="adresse", type="string", length=255, unique=true)
     */
    private $adresse;

    /**
     * @ORM\OneToMany(targetEntity="Sortie", mappedBy="lieu", cascade={"persist"})
     */
    private $sorties;

    /**
     * @ORM\OneToMany(targetEntity="Avis", mappedBy="lieu", cascade={"persist"})
     */
    private $avis;
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
     * @return Lieu
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
     * Set adresse
     *
     * @param string $adresse
     * @return Lieu
     */
    public function setAdresse($adresse)
    {
        $this->adresse = $adresse;

        return $this;
    }

    /**
     * Get adresse
     *
     * @return string 
     */
    public function getAdresse()
    {
        return $this->adresse;
    }
    /**
     * Constructor
     */
    public function __construct()
    {
        $this->sorties = new \Doctrine\Common\Collections\ArrayCollection();
    }

    /**
     * Add sorties
     *
     * @param \AppBundle\Entity\Sortie $sorties
     * @return Lieu
     */
    public function addSortie(\AppBundle\Entity\Sortie $sorties)
    {
        $this->sorties[] = $sorties;

        return $this;
    }

    /**
     * Remove sorties
     *
     * @param \AppBundle\Entity\Sortie $sorties
     */
    public function removeSortie(\AppBundle\Entity\Sortie $sorties)
    {
        $this->sorties->removeElement($sorties);
    }

    /**
     * Get sorties
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getSorties()
    {
        return $this->sorties;
    }

    /**
     * Add avis
     *
     * @param \AppBundle\Entity\Avis $avis
     * @return Lieu
     */
    public function addAvi(\AppBundle\Entity\Avis $avis)
    {
        $this->avis[] = $avis;

        return $this;
    }

    /**
     * Remove avis
     *
     * @param \AppBundle\Entity\Avis $avis
     */
    public function removeAvi(\AppBundle\Entity\Avis $avis)
    {
        $this->avis->removeElement($avis);
    }

    /**
     * Get avis
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getAvis()
    {
        return $this->avis;
    }
}
