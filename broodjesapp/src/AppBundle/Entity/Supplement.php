<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Supplement
 *
 * @ORM\Table(name="supplement")
 * @ORM\Entity(repositoryClass="AppBundle\Repository\SupplementRepository")
 */
class Supplement
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
     * @ORM\Column(name="Supplement", type="string", length=255)
     */
    private $supplement;

    /**
     * @var string
     *
     * @ORM\Column(name="Prijs", type="decimal", precision=10, scale=2)
     */
    private $prijs;


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
     * Set supplement
     *
     * @param string $supplement
     *
     * @return Supplement
     */
    public function setSupplement($supplement)
    {
        $this->supplement = $supplement;

        return $this;
    }

    /**
     * Get supplement
     *
     * @return string
     */
    public function getSupplement()
    {
        return $this->supplement;
    }

    /**
     * Set prijs
     *
     * @param string $prijs
     *
     * @return Supplement
     */
    public function setPrijs($prijs)
    {
        $this->prijs = $prijs;

        return $this;
    }

    /**
     * Get prijs
     *
     * @return string
     */
    public function getPrijs()
    {
        return $this->prijs;
    }
}

