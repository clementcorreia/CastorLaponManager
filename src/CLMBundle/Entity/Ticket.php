<?php

namespace CLMBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Ticket
 *
 * @ORM\Table(name="ticket")
 * @ORM\Entity(repositoryClass="CLMBundle\Repository\TicketRepository")
 */
class Ticket
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
     *
     * @ORM\ManyToMany(targetEntity="CLMBundle\Entity\Competence")
     */
    private $competences;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="dateEmission", type="datetimetz")
     */
    private $dateEmission;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="dureeValidite", type="time", nullable=true)
     */
    private $dureeValidite;

    /**
     * @ORM\ManyToOne(targetEntity="CLMBundle\Entity\Equipe")
     */
    private $emetteur;

    /**
     * @ORM\ManyToOne(targetEntity="UserBundle\Entity\Utilisateur")
     */
    private $recepteur;

    /**
     * @var string
     *
     * @ORM\Column(name="contenu", type="text")
     */
    private $contenu;

    /**
     * @var bool
     *
     * @ORM\Column(name="traite", type="boolean")
     */
    private $traite;


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
     * Set dateEmission
     *
     * @param \DateTime $dateEmission
     *
     * @return Ticket
     */
    public function setDateEmission($dateEmission)
    {
        $this->dateEmission = $dateEmission;

        return $this;
    }

    /**
     * Get dateEmission
     *
     * @return \DateTime
     */
    public function getDateEmission()
    {
        return $this->dateEmission;
    }

    /**
     * Set dureeValidite
     *
     * @param \DateTime $dureeValidite
     *
     * @return Ticket
     */
    public function setDureeValidite($dureeValidite)
    {
        $this->dureeValidite = $dureeValidite;

        return $this;
    }

    /**
     * Get dureeValidite
     *
     * @return \DateTime
     */
    public function getDureeValidite()
    {
        return $this->dureeValidite;
    }

    /**
     * Set emetteur
     *
     * @param string $emetteur
     *
     * @return Ticket
     */
    public function setEmetteur($emetteur)
    {
        $this->emetteur = $emetteur;

        return $this;
    }

    /**
     * Get emetteur
     *
     * @return string
     */
    public function getEmetteur()
    {
        return $this->emetteur;
    }

    /**
     * Set contenu
     *
     * @param string $contenu
     *
     * @return Ticket
     */
    public function setContenu($contenu)
    {
        $this->contenu = $contenu;

        return $this;
    }

    /**
     * Get contenu
     *
     * @return string
     */
    public function getContenu()
    {
        return $this->contenu;
    }

    /**
     * Set traite
     *
     * @param boolean $traite
     *
     * @return Ticket
     */
    public function setTraite($traite)
    {
        $this->traite = $traite;

        return $this;
    }

    /**
     * Get traite
     *
     * @return bool
     */
    public function getTraite()
    {
        return $this->traite;
    }
    /**
     * Constructor
     */
    public function __construct()
    {
        $this->competences = new \Doctrine\Common\Collections\ArrayCollection();
    }

    /**
     * Add competence
     *
     * @param \CLMBundle\Entity\Competence $competence
     *
     * @return Ticket
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
     * Set recepteur
     *
     * @param \UserBundle\Entity\Utilisateur $recepteur
     *
     * @return Ticket
     */
    public function setRecepteur(\UserBundle\Entity\Utilisateur $recepteur = null)
    {
        $this->recepteur = $recepteur;

        return $this;
    }

    /**
     * Get recepteur
     *
     * @return \UserBundle\Entity\Utilisateur
     */
    public function getRecepteur()
    {
        return $this->recepteur;
    }
}
