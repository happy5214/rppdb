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
     * @var boolean
     *
     * @ORM\Column(name="sign", type="string", length=1)
     */
    private $sign;
    
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
