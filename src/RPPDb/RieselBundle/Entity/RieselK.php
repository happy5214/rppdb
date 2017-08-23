<?php

namespace RPPDb\RieselBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Doctrine\Common\Collections\ArrayCollection;

/**
 * RieselK
 *
 * @ORM\Table()
 * @ORM\Entity(repositoryClass="RPPDb\RieselBundle\Entity\RieselKRepository")
 */
class RieselK
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
     * @ORM\Column(name="num", type="bigint", nullable=true)
     */
    private $num;

    /**
     * @var string
     *
     * @ORM\Column(name="value", type="string", length=255)
     */
    private $value;

    /**
     * @var integer
     *
     * @ORM\Column(name="nash_weight", type="integer")
     */
    private $nashWeight;

    /**
     * @var boolean
     *
     * @ORM\Column(name="is3k", type="boolean")
     */
    private $is3k;

    /**
     * @var integer
     *
     * @ORM\Column(name="is15k", type="integer")
     */
    private $is15k;

    /**
     * @var integer
     *
     * @ORM\Column(name="is2145k", type="integer")
     */
    private $is2145k;

    /**
     * @var integer
     *
     * @ORM\Column(name="is2805k", type="integer")
     */
    private $is2805k;

    /**
     * @var integer
     *
     * @ORM\Column(name="is_primorial", type="integer")
     */
    private $isPrimorial;

    /**
     * @var string
     *
     * @ORM\Column(name="ranges", type="string", length=255, nullable=true)
     */
    private $ranges;

    /**
     * @var integer
     *
     * @ORM\Column(name="max_tested", type="bigint", nullable=true)
     */
    private $maxTested;

    /**
     * @var string
     *
     * @ORM\Column(name="reserved", type="string", length=3)
     */
    private $reserved;

    /**
     * @var string
     *
     * @ORM\Column(name="reserved_by", type="string", length=255, nullable=true)
     */
    private $reservedBy;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="last_update", type="date", nullable=true)
     */
    private $lastUpdate;

    /**
     * @var string
     *
     * @ORM\Column(name="covering", type="string", length=255, nullable=true)
     */
    private $coveringSet;
    
    /**
     * @var \DateTime
     *
     * @ORM\Column(name="last_edit", type="datetime", nullable=true)
     */
    private $lastEdit;
    
    /**
     * @ORM\OneToMany(targetEntity="RieselPrime", mappedBy="rieselK", cascade={"persist"})
     * @ORM\OrderBy({"n" = "ASC"})
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
    public function getId() {
        return $this->id;
    }

    /**
     * Set num
     *
     * @param integer $num
     * @return RieselK
     */
    public function setNum($num) {
        $this->num = $num;
        return $this;
    }

    /**
     * Get num
     *
     * @return integer 
     */
    public function getNum() {
        return $this->num;
    }

    /**
     * Set value
     *
     * @param string $value
     * @return RieselK
     */
    public function setValue($value) {
        $this->value = $value;
        return $this;
    }

    /**
     * Get value
     *
     * @return string 
     */
    public function getValue() {
        return $this->value;
    }

    /**
     * Set nashWeight
     *
     * @param integer $nashWeight
     * @return RieselK
     */
    public function setNashWeight($nashWeight) {
        $this->nashWeight = $nashWeight;
        return $this;
    }

    /**
     * Get nashWeight
     *
     * @return integer 
     */
    public function getNashWeight() {
        return $this->nashWeight;
    }

    /**
     * Set is3k
     *
     * @param boolean $is3k
     * @return RieselK
     */
    public function setIs3k($is3k) {
        $this->is3k = $is3k;
        return $this;
    }

    /**
     * Get is3k
     *
     * @return boolean 
     */
    public function getIs3k() {
        return $this->is3k;
    }

    /**
     * Set is15k
     *
     * @param integer $is15k
     * @return RieselK
     */
    public function setIs15k($is15k) {
        $this->is15k = $is15k;
        return $this;
    }

    /**
     * Get is15k
     *
     * @return integer 
     */
    public function getIs15k() {
        return $this->is15k;
    }

    /**
     * Set is2145k
     *
     * @param integer $is2145k
     * @return RieselK
     */
    public function setIs2145k($is2145k) {
        $this->is2145k = $is2145k;
        return $this;
    }

    /**
     * Get is2145k
     *
     * @return integer 
     */
    public function getIs2145k() {
        return $this->is2145k;
    }

    /**
     * Set is2805k
     *
     * @param integer $is2805k
     * @return RieselK
     */
    public function setIs2805k($is2805k) {
        $this->is2805k = $is2805k;
        return $this;
    }

    /**
     * Get is2805k
     *
     * @return integer 
     */
    public function getIs2805k() {
        return $this->is2805k;
    }

    /**
     * Set isPrimorial
     *
     * @param integer $isPrimorial
     * @return RieselK
     */
    public function setIsPrimorial($isPrimorial) {
        $this->isPrimorial = $isPrimorial;
        return $this;
    }

    /**
     * Get isPrimorial
     *
     * @return integer 
     */
    public function getIsPrimorial() {
        return $this->isPrimorial;
    }

    /**
     * Set ranges
     *
     * @param string $ranges
     * @return RieselK
     */
    public function setRanges($ranges) {
        $this->ranges = $ranges;
        return $this;
    }

    /**
     * Get ranges
     *
     * @return string 
     */
    public function getRanges() {
        return $this->ranges;
    }

    /**
     * Set maxTested
     *
     * @param integer $maxTested
     * @return RieselK
     */
    public function setMaxTested($maxTested) {
        $this->maxTested = $maxTested;
        return $this;
    }

    /**
     * Get maxTested
     *
     * @return integer 
     */
    public function getMaxTested() {
        return $this->maxTested;
    }

    /**
     * Set reserved
     *
     * @param string $reserved
     * @return RieselK
     */
    public function setReserved($reserved) {
        $this->reserved = $reserved;
        return $this;
    }

    /**
     * Get reserved
     *
     * @return string 
     */
    public function getReserved() {
        return $this->reserved;
    }

    /**
     * Set reservedBy
     *
     * @param string $reservedBy
     * @return RieselK
     */
    public function setReservedBy($reservedBy) {
        $this->reservedBy = $reservedBy;
        return $this;
    }

    /**
     * Get reservedBy
     *
     * @return string 
     */
    public function getReservedBy() {
        return $this->reservedBy;
    }

    /**
     * Set lastUpdate
     *
     * @param \DateTime $lastUpdate
     * @return RieselK
     */
    public function setLastUpdate($lastUpdate) {
        $this->lastUpdate = $lastUpdate;
        return $this;
    }

    /**
     * Get lastUpdate
     *
     * @return \DateTime 
     */
    public function getLastUpdate() {
        return $this->lastUpdate;
    }

    /**
     * Set coveringSet
     *
     * @param string $coveringSet
     * @return RieselK
     */
    public function setCoveringSet($coveringSet) {
        $this->coveringSet = $coveringSet;
        return $this;
    }

    /**
     * Get coveringSet
     *
     * @return string 
     */
    public function getCoveringSet() {
        return $this->coveringSet;
    }
    
    /**
     * Get CSS class
     * 
     * @return string
     */
    public function kclass() {
        if ($this->coveringSet) {
            return 'don';
        } elseif ($this->is2805k) {
            return 'k28';
        } elseif ($this->is2145k) {
            return 'k21';
        } elseif ($this->is15k) {
            return 'k15';
        } elseif ($this->nashWeight < 1000) {
            return 'low';
        } else {
            return '';
        }
    }

    /**
     * Add primes
     *
     * @param \RPPDb\RieselBundle\Entity\RieselPrime $primes
     * @return RieselK
     */
    public function addPrime(\RPPDb\RieselBundle\Entity\RieselPrime $prime) {
        $this->primes[] = $prime;
        $prime->setRieselK($this);

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
     * Set lastEdit
     *
     * @param \DateTime $lastEdit
     * @return RieselK
     */
    public function setLastEdit($lastEdit) {
        $this->lastEdit = $lastEdit;

        return $this;
    }

    /**
     * Get lastEdit
     *
     * @return \DateTime 
     */
    public function getLastEdit() {
        return $this->lastEdit;
    }
}
