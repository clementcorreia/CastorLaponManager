<?php

namespace CLMBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Campus
 *
 * @ORM\Table(name="campus")
 * @ORM\Entity(repositoryClass="CLMBundle\Repository\CampusRepository")
 */
class Campus
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
     * @ORM\Column(name="ville", type="string", length=255, unique=true)
     */
    private $ville;

    public function __toString()
    {
        return $this->getVille();
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
     * Set ville
     *
     * @param string $ville
     *
     * @return Campus
     */
    public function setVille($ville)
    {
        $this->ville = $ville;

        return $this;
    }

    /**
     * Get ville
     *
     * @return string
     */
    public function getVille()
    {
        return $this->ville;
    }
}
