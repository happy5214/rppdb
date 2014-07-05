<?php

namespace RPPDb\RieselBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Woodall
 *
 * @ORM\Table()
 * @ORM\Entity(repositoryClass="RPPDb\RieselBundle\Entity\WoodallRepository")
 */
class Woodall
{
    /**
     * @var integer
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @var integer
     *
     * @ORM\Column(name="n", type="integer")
     */
    private $n;

    /**
     * @var integer
     *
     * @ORM\Column(name="digits", type="integer")
     */
    private $digits;
    
    /**
     * @ORM\OneToOne(targetEntity="RieselPrime", inversedBy="woodallObject")
     */
    private $prime;

    /**
     * Get id
     *
     * @return integer 
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set n
     *
     * @param integer $n
     * @return Woodall
     */
    public function setN($n)
    {
        $this->n = $n;

        return $this;
    }

    /**
     * Get n
     *
     * @return integer 
     */
    public function getN()
    {
        return $this->n;
    }

    /**
     * Set digits
     *
     * @param integer $digits
     * @return Woodall
     */
    public function setDigits($digits)
    {
        $this->digits = $digits;

        return $this;
    }

    /**
     * Get digits
     *
     * @return integer 
     */
    public function getDigits()
    {
        return $this->digits;
    }
    
    /**
     * Get string (plain text) rendering
     * 
     * @return string
     */
    public function __toString() {
        return "{$this->n}*2^{$this->n}-1";
    }
    
    /**
     * Get string (styled) rendering
     * 
     * @return string
     */
    public function styledString() {
        return "{$this->n}&middot;2<sup>{$this->n}</sup>-1";
    }

    /**
     * Set prime
     *
     * @param \RPPDb\RieselBundle\Entity\RieselPrime $prime
     * @return Woodall
     */
    public function setPrime(\RPPDb\RieselBundle\Entity\RieselPrime $prime = null)
    {
        $this->prime = $prime;

        return $this;
    }

    /**
     * Get prime
     *
     * @return \RPPDb\RieselBundle\Entity\RieselPrime 
     */
    public function getPrime()
    {
        return $this->prime;
    }
}
