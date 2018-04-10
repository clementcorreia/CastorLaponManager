<?php

namespace CLMBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Equipe
 *
 * @ORM\Table(name="equipe")
 * @ORM\Entity(repositoryClass="CLMBundle\Repository\EquipeRepository")
 */
class Equipe
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
     * @var int
     *
     * @ORM\Column(name="credit", type="integer")
     */
    private $credit;

    /**
     *
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
     * Set credit
     *
     * @param integer $credit
     *
     * @return Equipe
     */
    public function setCredit($credit)
    {
        $this->credit = $credit;

        return $this;
    }

    /**
     * Get credit
     *
     * @return int
     */
    public function getCredit()
    {
        return $this->credit;
    }

    /**
     * Constructor
     */
    public function __construct()
    {
        $this->apprenants = new \Doctrine\Common\Collections\ArrayCollection();
    }

    /**
     * Add apprenant
     *
     * @param \UserBundle\Entity\Utilisateur $apprenant
     *
     * @return Equipe
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
