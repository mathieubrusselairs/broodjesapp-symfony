<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Brood
 *
 * @ORM\Table(name="brood")
 * @ORM\Entity(repositoryClass="AppBundle\Repository\BroodRepository")
 */
class Brood
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
     * @var bool
     *
     * @ORM\Column(name="isGroot", type="boolean")
     */
    private $isGroot;

    /**
     * @var bool
     *
     * @ORM\Column(name="isWit", type="boolean")
     */
    private $isWit;

    /**
     * @var string
     *
     * @ORM\Column(name="opmerking", type="text")
     */
    private $opmerking;


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
     * Set isGroot
     *
     * @param boolean $isGroot
     *
     * @return Brood
     */
    public function setIsGroot($isGroot)
    {
        $this->isGroot = $isGroot;

        return $this;
    }

    /**
     * Get isGroot
     *
     * @return bool
     */
    public function getIsGroot()
    {
        return $this->isGroot;
    }

    /**
     * Set isWit
     *
     * @param boolean $isWit
     *
     * @return Brood
     */
    public function setIsWit($isWit)
    {
        $this->isWit = $isWit;

        return $this;
    }

    /**
     * Get isWit
     *
     * @return bool
     */
    public function getIsWit()
    {
        return $this->isWit;
    }

    /**
     * Set opmerking
     *
     * @param string $opmerking
     *
     * @return Brood
     */
    public function setOpmerking($opmerking)
    {
        $this->opmerking = $opmerking;

        return $this;
    }

    /**
     * Get opmerking
     *
     * @return string
     */
    public function getOpmerking()
    {
        return $this->opmerking;
    }
}

