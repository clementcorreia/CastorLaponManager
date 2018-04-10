<?php

namespace CLMBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Projet
 *
 * @ORM\Table(name="projet")
 * @ORM\Entity(repositoryClass="CLMBundle\Repository\ProjetRepository")
 */
class Projet
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
     * @ORM\Column(name="description", type="text", nullable=true)
     */
    private $description;

    /**
     *
     * @ORM\ManyToMany(targetEntity="UserBundle\Entity\Utilisateur")
     */
    private $intervenants;

    /**
     *
     * @ORM\ManyToMany(targetEntity="CLMBundle\Entity\Equipe")
     */
    private $equipes;

    /**
     *
     * @ORM\ManyToMany(targetEntity="CLMBundle\Entity\Competence")
     */
    private $competences;

    /**
     *
     * @ORM\ManyToMany(targetEntity="CLMBundle\Entity\Classe")
     */
    private $classes;


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
     * Set description
     *
     * @param string $description
     *
     * @return Projet
     */
    public function setDescription($description)
    {
        $this->description = $description;

        return $this;
    }

    /**
     * Get description
     *
     * @return string
     */
    public function getDescription()
    {
        return $this->description;
    }

    /**
     * Set nom
     *
     * @param string $nom
     *
     * @return Projet
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
        $this->intervenants = new \Doctrine\Common\Collections\ArrayCollection();
    }

    /**
     * Add intervenant
     *
     * @param \UserBundle\Entity\Utilisateur $intervenant
     *
     * @return Projet
     */
    public function addIntervenant(\UserBundle\Entity\Utilisateur $intervenant)
    {
        $this->intervenants[] = $intervenant;

        return $this;
    }

    /**
     * Remove intervenant
     *
     * @param \UserBundle\Entity\Utilisateur $intervenant
     */
    public function removeIntervenant(\UserBundle\Entity\Utilisateur $intervenant)
    {
        $this->intervenants->removeElement($intervenant);
    }

    /**
     * Get intervenants
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getIntervenants()
    {
        return $this->intervenants;
    }

    /**
     * Add equipe
     *
     * @param \CLMBundle\Entity\Equipe $equipe
     *
     * @return Projet
     */
    public function addEquipe(\CLMBundle\Entity\Equipe $equipe)
    {
        $this->equipes[] = $equipe;

        return $this;
    }

    /**
     * Remove equipe
     *
     * @param \CLMBundle\Entity\Equipe $equipe
     */
    public function removeEquipe(\CLMBundle\Entity\Equipe $equipe)
    {
        $this->equipes->removeElement($equipe);
    }

    /**
     * Get equipes
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getEquipes()
    {
        return $this->equipes;
    }

    /**
     * Add competence
     *
     * @param \CLMBundle\Entity\Competence $competence
     *
     * @return Projet
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
     * Add class
     *
     * @param \CLMBundle\Entity\Classe $class
     *
     * @return Projet
     */
    public function addClass(\CLMBundle\Entity\Classe $class)
    {
        $this->classes[] = $class;

        return $this;
    }

    /**
     * Remove class
     *
     * @param \CLMBundle\Entity\Classe $class
     */
    public function removeClass(\CLMBundle\Entity\Classe $class)
    {
        $this->classes->removeElement($class);
    }

    /**
     * Get classes
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getClasses()
    {
        return $this->classes;
    }
}
