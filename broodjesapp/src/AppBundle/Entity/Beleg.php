<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Beleg
 *
 * @ORM\Table(name="beleg")
 * @ORM\Entity(repositoryClass="AppBundle\Repository\BelegRepository")
 */
class Beleg
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
     * @var Beleg[]
     * 
     * @ORM\OneToMany(targetEntity="Brood", mappedBy="brood")
     */
    private $brood;

     /**
     * 
     * @ORM\ManyToOne(targetEntity="Categorie", inversedBy="categorie")
     * @ORM\JoinColumn(name="category_id", referencedColumnName="id", onDelete="CASCADE")
     * 
     */
    private $categorie;

    /**
     * @var string
     *
     * @ORM\Column(name="prijsKlein", type="decimal", precision=10, scale=2)
     */
    private $prijsKlein;

    /**
     * @var string
     *
     * @ORM\Column(name="prijsGroot", type="decimal", precision=10, scale=2)
     */
    private $prijsGroot;

    /**
     * @var string
     *
     * @ORM\Column(name="naam", type="string", length=255)
     */
    private $naam;

    /**
     * @var string
     *
     * @ORM\Column(name="omschrijving", type="text")
     */
    private $omschrijving;


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
     * Set prijsKlein
     *
     * @param string $prijsKlein
     *
     * @return Beleg
     */
    public function setPrijsKlein($prijsKlein)
    {
        $this->prijsKlein = $prijsKlein;

        return $this;
    }

    /**
     * Get prijsKlein
     *
     * @return string
     */
    public function getPrijsKlein()
    {
        return $this->prijsKlein;
    }

    /**
     * Set prijsGroot
     *
     * @param string $prijsGroot
     *
     * @return Beleg
     */
    public function setPrijsGroot($prijsGroot)
    {
        $this->prijsGroot = $prijsGroot;

        return $this;
    }

    /**
     * Get prijsGroot
     *
     * @return string
     */
    public function getPrijsGroot()
    {
        return $this->prijsGroot;
    }

    /**
     * Set naam
     *
     * @param string $naam
     *
     * @return Beleg
     */
    public function setNaam($naam)
    {
        $this->naam = $naam;

        return $this;
    }

    /**
     * Get naam
     *
     * @return string
     */
    public function getNaam()
    {
        return $this->naam;
    }

    /**
     * Set omschrijving
     *
     * @param string $omschrijving
     *
     * @return Beleg
     */
    public function setOmschrijving($omschrijving)
    {
        $this->omschrijving = $omschrijving;

        return $this;
    }

    /**
     * Get omschrijving
     *
     * @return string
     */
    public function getOmschrijving()
    {
        return $this->omschrijving;
    }

    public function __construct()
    {
        
    }
}

