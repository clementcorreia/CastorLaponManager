<?php

namespace CLMBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Classe
 *
 * @ORM\Table(name="classe")
 * @ORM\Entity(repositoryClass="CLMBundle\Repository\ClasseRepository")
 */
class Classe
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
     * @ORM\ManyToMany(targetEntity="UserBundle\Entity\Utilisateur")
     */
    private $apprenants;


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
     * @return Classe
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
     * Constructor
     */
    public function __construct()
    {
        $this->apprenants = new \Doctrine\Common\Collections\ArrayCollection();
    }

    public function __toString()
    {
        return $this->getNom();
    }

    /**
     * Add apprenant
     *
     * @param \UserBundle\Entity\Utilisateur $apprenant
     *
     * @return Classe
     */
    public function addApprenant(\UserBundle\Entity\Utilisateur $apprenant)
    {
        $this->apprenants[] = $apprenant;

        return $this;
    }

    /**
     * Remove apprenant
     *
     * @param \UserBundle\Entity\Utilisateur $apprenant
     */
    public function removeApprenant(\UserBundle\Entity\Utilisateur $apprenant)
    {
        $this->apprenants->removeElement($apprenant);
    }

    /**
     * Get apprenants
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getApprenants()
    {
        return $this->apprenants;
    }
}
