<?php

namespace RPPDb\RieselBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Doctrine\Common\Collections\ArrayCollection;

/**
 * Program
 *
 * @ORM\Table()
 * @ORM\Entity(repositoryClass="RPPDb\RieselBundle\Entity\ProgramRepository")
 */
class Program {
    /**
     * @var integer
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;
    
    /**
     * @var string
     *
     * @ORM\Column(name="program", type="string", length=255)
     */
    private $program;
    
    /**
     * @var string
     *
     * @ORM\Column(name="version", type="string", length=255)
     */
    private $version;
    
    /**
     * @ORM\OneToMany(targetEntity="RieselPrime", mappedBy="testedPrime")
     */
    protected $primes;
    
    /**
     * @ORM\OneToMany(targetEntity="RieselPrime", mappedBy="testedTwin")
     */
    protected $twins;
    
    public function __construct() {
        $this->primes = new ArrayCollection();
        $this->twins = new ArrayCollection();
    }
    
    /**
     * Get id
     *
     * @return integer 
     */
    public function getId() {
        return $this->id;
    }
    
    /**
     * Set program
     *
     * @param string $program
     * @return Program
     */
    public function setProgram($program) {
        $this->program = $program;

        return $this;
    }
    
    /**
     * Get program
     *
     * @return string 
     */
    public function getProgram() {
        return $this->program;
    }
    
    /**
     * Set version
     *
     * @param string $version
     * @return Program
     */
    public function setVersion($version) {
        $this->version = $version;

        return $this;
    }
    
    /**
     * Get version
     *
     * @return string 
     */
    public function getVersion() {
        return $this->version;
    }
    
    /**
     * Add primes
     *
     * @param \RPPDb\RieselBundle\Entity\RieselPrime $primes
     * @return Program
     */
    public function addPrime(\RPPDb\RieselBundle\Entity\RieselPrime $prime) {
        $this->primes[] = $prime;

        return $this;
    }
    
    /**
     * Remove primes
     *
     * @param \RPPDb\RieselBundle\Entity\RieselPrime $primes
     */
    public function removePrime(\RPPDb\RieselBundle\Entity\RieselPrime $prime) {
        $this->primes->removeElement($prime);
    }
    
    /**
     * Get primes
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getPrimes() {
        return $this->primes;
    }
    
    /**
     * Add twins
     *
     * @param \RPPDb\RieselBundle\Entity\RieselPrime $twins
     * @return Program
     */
    public function addTwin(\RPPDb\RieselBundle\Entity\RieselPrime $twin) {
        $this->twins[] = $twin;

        return $this;
    }
    
    /**
     * Remove twins
     *
     * @param \RPPDb\RieselBundle\Entity\RieselPrime $twins
     */
    public function removeTwin(\RPPDb\RieselBundle\Entity\RieselPrime $twin) {
        $this->twins->removeElement($twin);
    }
    
    /**
     * Get twins
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getTwins() {
        return $this->twins;
    }
    
    public function __toString() {
        return $this->program . ' ' . $this->version;
    }
}
