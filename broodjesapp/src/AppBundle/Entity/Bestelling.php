<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Doctrine\Common\Collections\ArrayCollection;
use AppBundle\Entity\Brood;
use AppBundle\Form\BestellingType;

/**
 * 
 * TODO // REMOVE ALL BELEG FROM BESTELLING AND ADD IN BROOD
 * 
 */


/**
 * Bestelling
 *
 * @ORM\Table(name="bestelling")
 * @ORM\Entity(repositoryClass="AppBundle\Repository\BestellingRepository")
 */
class Bestelling
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
     * @var User
     * 
     * @ORM\ManyToOne(targetEntity="User", inversedBy="user")
     * @ORM\JoinColumn(name="user_id", referencedColumnName="id", onDelete="CASCADE")
     * 
     */
    private $user;


    /**
     * @var int
     *
     * @ORM\Column(name="userId", type="integer")
     */
    private $userId;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="datum", type="datetime")
     */
    private $datum;

    /**
     * @var bool
     *
     * @ORM\Column(name="soep", type="boolean")
     */
    private $soep;

    /**
     * @var bool
     *
     * @ORM\Column(name="soepbroodWit", type="boolean")
     */
    private $soepbroodWit;


    /**
     * @var Brood[]|ArrayCollection
     * 
     * @ORM\OneToMany(targetEntity="AppBundle\Entity\Brood", mappedBy="bestelling")
     */
    private $brood;

    public function __construct(Brood $brood)
    {

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
     * Set userId
     *
     * @param integer $userId
     *
     * @return Bestelling
     */
    public function setUserId($userId)
    {
        $this->userId = $userId;

        return $this;
    }

    /**
     * Get userId
     *
     * @return int
     */
    public function getUserId()
    {
        return $this->userId;
    }

    /**
     * Set datum
     *
     * @param \DateTime $datum
     *
     * @return Bestelling
     */
    public function setDatum($datum)
    {
        $this->datum = $datum;

        return $this;
    }

    /**
     * Get datum
     *
     * @return \DateTime
     */
    public function getDatum()
    {
        return $this->datum;
    }

    /**
     * Set soep
     *
     * @param boolean $soep
     *
     * @return Bestelling
     */
    public function setSoep($soep)
    {
        $this->soep = $soep;

        return $this;
    }

    /**
     * Get soep
     *
     * @return bool
     */
    public function getSoep()
    {
        return $this->soep;
    }

    /**
     * Set soepbroodWit
     *
     * @param boolean $soepbroodWit
     *
     * @return Bestelling
     */
    public function setSoepbroodWit($soepbroodWit)
    {
        $this->soepbroodWit = $soepbroodWit;

        return $this;
    }
    /**
     * Get soepbroodWit
     *
     * @return bool
     */
    public function getSoepbroodWit()
    {
        return $this->soepbroodWit;
    }



    public function addBrood(Brood $brood)
    {
        if(!$this->brood->contains($brood)) {
            $this->brood->add($brood);
        }
    }

    public function removeBrood(Brood $brood)
    {
        $this->brood->removeElement($brood);
    }

    /**
     * Get soepbroodWit
     *
     * @return Brood
     */

    public function getBrood()
    {
        return $this->brood;
    }
}

