<?php

namespace RPPDb\RieselBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Doctrine\Common\Collections\ArrayCollection;

/**
 * Contributor
 *
 * @ORM\Table()
 * @ORM\Entity(repositoryClass="RPPDb\RieselBundle\Entity\ContributorRepository")
 */
class Contributor
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
     * @var string
     *
     * @ORM\Column(name="name", type="string", length=255)
     */
    private $name;

    /**
     * @var integer
     *
     * @ORM\Column(name="top5000", type="integer", nullable=true)
     */
    private $top5000;

    /**
     * @var string
     *
     * @ORM\Column(name="link", type="string", length=500, nullable=true)
     */
    private $link;
    
    /**
     * @ORM\OneToMany(targetEntity="RieselPrime", mappedBy="foundBy")
     */
    protected $primes;

    public function __construct() {
        $this->primes = new ArrayCollection();
    }
    
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
     * Set name
     *
     * @param string $name
     * @return Contributor
     */
    public function setName($name)
    {
        $this->name = $name;

        return $this;
    }

    /**
     * Get name
     *
     * @return string 
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * Set top5000
     *
     * @param integer $top5000
     * @return Contributor
     */
    public function setTop5000($top5000)
    {
        $this->top5000 = $top5000;

        return $this;
    }

    /**
     * Get top5000
     *
     * @return integer 
     */
    public function getTop5000()
    {
        return $this->top5000;
    }

    /**
     * Set link
     *
     * @param string $link
     * @return Contributor
     */
    public function setLink($link)
    {
        $this->link = $link;

        return $this;
    }

    /**
     * Get link
     *
     * @return string 
     */
    public function getLink()
    {
        return $this->link;
    }

    /**
     * Add primes
     *
     * @param \RPPDb\RieselBundle\Entity\RieselPrime $primes
     * @return Contributor
     */
    public function addPrime(\RPPDb\RieselBundle\Entity\RieselPrime $prime)
    {
        $this->primes[] = $prime;

        return $this;
    }

    /**
     * Remove primes
     *
     * @param \RPPDb\RieselBundle\Entity\RieselPrime $primes
     */
    public function removePrime(\RPPDb\RieselBundle\Entity\RieselPrime $prime)
    {
        $this->primes->removeElement($prime);
    }

    /**
     * Get primes
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getPrimes()
    {
        return $this->primes;
    }
    
    public function __toString() {
        return $this->name;
    }
}
