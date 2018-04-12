<?php
// src/UserBundle/Entity/Utilisateur.php

namespace UserBundle\Entity;

use FOS\UserBundle\Entity\User as BaseUser;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity
 * @ORM\Table(name="utilisateur")
 */
class Utilisateur extends BaseUser
{
    /**
     * @ORM\Id
     * @ORM\Column(type="integer")
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    protected $id;

    /**
     * @var string
     *
     * @ORM\Column(name="nom", type="string", length=255, nullable=true)
     */
    private $nom;

    /**
     * @var string
     *
     * @ORM\Column(name="prenom", type="string", length=255, nullable=true)
     */
    private $prenom;

    /**
     * @ORM\ManyToMany(targetEntity="CLMBundle\Entity\Competence")
     */
    private $competences;

    /**
     * @ORM\ManyToOne(targetEntity="CLMBundle\Entity\Campus")
     */
    private $campus;

    public function __construct()
    {
        parent::__construct();
        // your own logic
    }

    public function getFullname() {
        return $this->getPrenom()." ".$this->getNom();
    }

    public function __toString()
    {
        return $this->getFullname();
    }

    /**
     * Set nom
     *
     * @param string $nom
     *
     * @return Utilisateur
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
     * @return Utilisateur
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
     * Add competence
     *
     * @param \CLMBundle\Entity\Competence $competence
     *
     * @return Utilisateur
     */
    public function addCompetence(\CLMBundle\Entity\Competence $competence)
    {
        $this->competences[] = $competence;

        return $this;
    }

    /**
     * Remove competence
     *
     * @param \CLMBundle\Entity\Competence $competence
     */
    public function removeCompetence(\CLMBundle\Entity\Competence $competence)
    {
        $this->competences->removeElement($competence);
    }

    /**
     * Get competences
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getCompetences()
    {
        return $this->competences;
    }

    /**
     * Set campus
     *
     * @param \CLMBundle\Entity\Campus $campus
     *
     * @return Utilisateur
     */
    public function setCampus(\CLMBundle\Entity\Campus $campus = null)
    {
        $this->campus = $campus;

        return $this;
    }

    /**
     * Get campus
     *
     * @return \CLMBundle\Entity\Campus
     */
    public function getCampus()
    {
        return $this->campus;
    }
}
