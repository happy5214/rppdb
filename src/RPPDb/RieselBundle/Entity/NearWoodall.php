<?php

namespace RPPDb\RieselBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * NearWoodall
 *
 * @ORM\Table()
 * @ORM\Entity(repositoryClass="RPPDb\RieselBundle\Entity\NearWoodallRepository")
 */
class NearWoodall {
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
     * @var string
     *
     * @ORM\Column(name="sign", type="string", length=1)
     */
    private $sign;
    
    /**
     * @var integer
     *
     * @ORM\Column(name="digits", type="integer")
     */
    private $digits;
    
    /**
     * @ORM\OneToOne(targetEntity="RieselPrime", inversedBy="nearWoodall")
     */
    private $prime;
    
    /**
     * Get id
     *
     * @return integer 
     */
    public function getId() {
        return $this->id;
    }
    
    /**
     * Set n
     *
     * @param integer $n
     * @return NearWoodall
     */
    public function setN($n) {
        $this->n = $n;

        return $this;
    }
    
    /**
     * Get n
     *
     * @return integer 
     */
    public function getN() {
        return $this->n;
    }
    
    /**
     * Set sign
     *
     * @param boolean $sign
     * @return NearWoodall
     */
    public function setSign($sign) {
        $this->sign = $sign;

        return $this;
    }
    
    /**
     * Get sign
     *
     * @return boolean 
     */
    public function getSign() {
        return $this->sign;
    }
    
    /**
     * Set prime
     *
     * @param \RPPDb\RieselBundle\Entity\RieselPrime $prime
     * @return NearWoodall
     */
    public function setPrime(\RPPDb\RieselBundle\Entity\RieselPrime $prime = null) {
        $this->prime = $prime;

        return $this;
    }
    
    /**
     * Get prime
     *
     * @return \RPPDb\RieselBundle\Entity\RieselPrime 
     */
    public function getPrime() {
        return $this->prime;
    }
    
    /**
     * Get string (plain text) rendering
     * 
     * @return string
     */
    public function __toString() {
        if ($this->sign == "/") {
            return "(1+1)*2^1-1; also (2-1)*2^2-1";
        } else {
            return "({$this->n}{$this->sign}1)*2^{$this->n}-1";
        }
    }
    
    /**
     * Get comment type
     * 
     * @return string
     */
    public function getCommentType() {
        return "Near Woodall";
    }
    
    /**
     * Get string (styled) rendering
     * 
     * @return string
     */
    public function styledString() {
        if ($this->sign == "/") {
            return "(1+1)&middot;2<sup>1</sup>-1; also (2-1)&middot;2<sup>2</sup>-1";
        } else {
            return "({$this->n}{$this->sign}1)&middot;2<sup>{$this->n}</sup>-1";
        }
    }
    
    /**
     * Set digits
     *
     * @param integer $digits
     * @return NearWoodall
     */
    public function setDigits($digits) {
        $this->digits = $digits;

        return $this;
    }
    
    /**
     * Get digits
     *
     * @return integer 
     */
    public function getDigits() {
        return $this->digits;
    }
}
