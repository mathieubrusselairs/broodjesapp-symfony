<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Soep
 *
 * @ORM\Table(name="soep")
 * @ORM\Entity(repositoryClass="AppBundle\Repository\SoepRepository")
 */
class Soep
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
     * @ORM\Column(name="soep", type="string", length=255)
     */
    private $soep;


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
     * Set soep
     *
     * @param string $soep
     *
     * @return Soep
     */
    public function setSoep($soep)
    {
        $this->soep = $soep;

        return $this;
    }

    /**
     * Get soep
     *
     * @return string
     */
    public function getSoep()
    {
        return $this->soep;
    }
}

