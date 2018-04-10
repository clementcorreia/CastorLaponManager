<?php

namespace CLMBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Disponibilite
 *
 * @ORM\Table(name="disponibilite")
 * @ORM\Entity(repositoryClass="CLMBundle\Repository\DisponibiliteRepository")
 */
class Disponibilite
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
     * @var \DateTime
     *
     * @ORM\Column(name="lundiDebut", type="time", nullable=true)
     */
    private $lundiDebut;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="lundiFin", type="time", nullable=true)
     */
    private $lundiFin;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="mardiDebut", type="time", nullable=true)
     */
    private $mardiDebut;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="mardiFin", type="time", nullable=true)
     */
    private $mardiFin;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="mercrediDebut", type="time", nullable=true)
     */
    private $mercrediDebut;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="mercrediFin", type="time", nullable=true)
     */
    private $mercrediFin;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="jeudiDebut", type="time", nullable=true)
     */
    private $jeudiDebut;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="jeudiFin", type="time", nullable=true)
     */
    private $jeudiFin;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="vendrediDebut", type="time", nullable=true)
     */
    private $vendrediDebut;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="vendrediFin", type="time", nullable=true)
     */
    private $vendrediFin;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="samediDebut", type="time", nullable=true)
     */
    private $samediDebut;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="samediFin", type="time", nullable=true)
     */
    private $samediFin;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="dimancheDebut", type="time", nullable=true)
     */
    private $dimancheDebut;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="dimancheFin", type="time", nullable=true)
     */
    private $dimancheFin;


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
     * Set lundiDebut
     *
     * @param \DateTime $lundiDebut
     *
     * @return Disponibilite
     */
    public function setLundiDebut($lundiDebut)
    {
        $this->lundiDebut = $lundiDebut;

        return $this;
    }

    /**
     * Get lundiDebut
     *
     * @return \DateTime
     */
    public function getLundiDebut()
    {
        return $this->lundiDebut;
    }

    /**
     * Set lundiFin
     *
     * @param \DateTime $lundiFin
     *
     * @return Disponibilite
     */
    public function setLundiFin($lundiFin)
    {
        $this->lundiFin = $lundiFin;

        return $this;
    }

    /**
     * Get lundiFin
     *
     * @return \DateTime
     */
    public function getLundiFin()
    {
        return $this->lundiFin;
    }

    /**
     * Set mardiDebut
     *
     * @param \DateTime $mardiDebut
     *
     * @return Disponibilite
     */
    public function setMardiDebut($mardiDebut)
    {
        $this->mardiDebut = $mardiDebut;

        return $this;
    }

    /**
     * Get mardiDebut
     *
     * @return \DateTime
     */
    public function getMardiDebut()
    {
        return $this->mardiDebut;
    }

    /**
     * Set mardiFin
     *
     * @param \DateTime $mardiFin
     *
     * @return Disponibilite
     */
    public function setMardiFin($mardiFin)
    {
        $this->mardiFin = $mardiFin;

        return $this;
    }

    /**
     * Get mardiFin
     *
     * @return \DateTime
     */
    public function getMardiFin()
    {
        return $this->mardiFin;
    }

    /**
     * Set mercrediDebut
     *
     * @param \DateTime $mercrediDebut
     *
     * @return Disponibilite
     */
    public function setMercrediDebut($mercrediDebut)
    {
        $this->mercrediDebut = $mercrediDebut;

        return $this;
    }

    /**
     * Get mercrediDebut
     *
     * @return \DateTime
     */
    public function getMercrediDebut()
    {
        return $this->mercrediDebut;
    }

    /**
     * Set mercrediFin
     *
     * @param \DateTime $mercrediFin
     *
     * @return Disponibilite
     */
    public function setMercrediFin($mercrediFin)
    {
        $this->mercrediFin = $mercrediFin;

        return $this;
    }

    /**
     * Get mercrediFin
     *
     * @return \DateTime
     */
    public function getMercrediFin()
    {
        return $this->mercrediFin;
    }

    /**
     * Set jeudiDebut
     *
     * @param \DateTime $jeudiDebut
     *
     * @return Disponibilite
     */
    public function setJeudiDebut($jeudiDebut)
    {
        $this->jeudiDebut = $jeudiDebut;

        return $this;
    }

    /**
     * Get jeudiDebut
     *
     * @return \DateTime
     */
    public function getJeudiDebut()
    {
        return $this->jeudiDebut;
    }

    /**
     * Set jeudiFin
     *
     * @param \DateTime $jeudiFin
     *
     * @return Disponibilite
     */
    public function setJeudiFin($jeudiFin)
    {
        $this->jeudiFin = $jeudiFin;

        return $this;
    }

    /**
     * Get jeudiFin
     *
     * @return \DateTime
     */
    public function getJeudiFin()
    {
        return $this->jeudiFin;
    }

    /**
     * Set vendrediDebut
     *
     * @param \DateTime $vendrediDebut
     *
     * @return Disponibilite
     */
    public function setVendrediDebut($vendrediDebut)
    {
        $this->vendrediDebut = $vendrediDebut;

        return $this;
    }

    /**
     * Get vendrediDebut
     *
     * @return \DateTime
     */
    public function getVendrediDebut()
    {
        return $this->vendrediDebut;
    }

    /**
     * Set vendrediFin
     *
     * @param \DateTime $vendrediFin
     *
     * @return Disponibilite
     */
    public function setVendrediFin($vendrediFin)
    {
        $this->vendrediFin = $vendrediFin;

        return $this;
    }

    /**
     * Get vendrediFin
     *
     * @return \DateTime
     */
    public function getVendrediFin()
    {
        return $this->vendrediFin;
    }

    /**
     * Set samediDebut
     *
     * @param \DateTime $samediDebut
     *
     * @return Disponibilite
     */
    public function setSamediDebut($samediDebut)
    {
        $this->samediDebut = $samediDebut;

        return $this;
    }

    /**
     * Get samediDebut
     *
     * @return \DateTime
     */
    public function getSamediDebut()
    {
        return $this->samediDebut;
    }

    /**
     * Set samediFin
     *
     * @param \DateTime $samediFin
     *
     * @return Disponibilite
     */
    public function setSamediFin($samediFin)
    {
        $this->samediFin = $samediFin;

        return $this;
    }

    /**
     * Get samediFin
     *
     * @return \DateTime
     */
    public function getSamediFin()
    {
        return $this->samediFin;
    }

    /**
     * Set dimancheDebut
     *
     * @param \DateTime $dimancheDebut
     *
     * @return Disponibilite
     */
    public function setDimancheDebut($dimancheDebut)
    {
        $this->dimancheDebut = $dimancheDebut;

        return $this;
    }

    /**
     * Get dimancheDebut
     *
     * @return \DateTime
     */
    public function getDimancheDebut()
    {
        return $this->dimancheDebut;
    }

    /**
     * Set dimancheFin
     *
     * @param \DateTime $dimancheFin
     *
     * @return Disponibilite
     */
    public function setDimancheFin($dimancheFin)
    {
        $this->dimancheFin = $dimancheFin;

        return $this;
    }

    /**
     * Get dimancheFin
     *
     * @return \DateTime
     */
    public function getDimancheFin()
    {
        return $this->dimancheFin;
    }
}

