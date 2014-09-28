<?php

namespace RPPDb\RieselBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * RieselPrime
 *
 * @ORM\Table()
 * @ORM\Entity(repositoryClass="RPPDb\RieselBundle\Entity\RieselPrimeRepository")
 */
class RieselPrime
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
     * @ORM\ManyToOne(targetEntity="RieselK", inversedBy="primes")
     * @ORM\JoinColumn(name="rieselk_id", referencedColumnName="id")
     */
    private $rieselK;
    
    /**
     * @var integer
     *
     * @ORM\Column(name="n", type="bigint")
     */
    private $n;

    /**
     * @var integer
     *
     * @ORM\Column(name="utm", type="integer", nullable=true)
     */
    private $utm;

    /**
     * @var string
     *
     * @ORM\Column(name="comment", type="string", length=255, nullable=true)
     */
    private $comment;

    /**
     * @var boolean
     *
     * @ORM\Column(name="is_twin", type="boolean")
     */
    private $isTwin;

    /**
     * @var boolean
     *
     * @ORM\Column(name="is_SG", type="boolean")
     */
    private $isSG;

    /**
     * @var boolean
     *
     * @ORM\Column(name="is_100th", type="boolean")
     */
    private $is100th;

    /**
     * @var boolean
     *
     * @ORM\Column(name="is_proven_prime", type="boolean")
     */
    private $isProvenPrime;

    /**
     * @ORM\ManyToOne(targetEntity="Program", inversedBy="primes")
     * @ORM\JoinColumn(name="tested_prime", referencedColumnName="id")
     */
    private $testedPrime;
    
    /**
     * @ORM\ManyToOne(targetEntity="Program", inversedBy="twins")
     * @ORM\JoinColumn(name="tested_twin", referencedColumnName="id")
     */
    private $testedTwin;
    
    /**
     * @ORM\ManyToOne(targetEntity="Contributor", inversedBy="primes")
     * @ORM\JoinColumn(name="found_by", referencedColumnName="id")
     */
    private $foundBy;
    
    /**
     * @var \DateTime
     *
     * @ORM\Column(name="found_on", type="date", nullable=true)
     */
    private $foundOn;
    
    /**
     * @ORM\OneToOne(targetEntity="NearWoodall", mappedBy="prime")
     */
    private $nearWoodall;
    
    /**
     * @ORM\OneToOne(targetEntity="Woodall", mappedBy="prime")
     */
    private $woodall;

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
     * @return RieselPrime
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
     * Set utm
     *
     * @param integer $utm
     * @return RieselPrime
     */
    public function setUtm($utm)
    {
        $this->utm = $utm;

        return $this;
    }

    /**
     * Get utm
     *
     * @return integer 
     */
    public function getUtm()
    {
        return $this->utm;
    }

    /**
     * Set comment
     *
     * @param string $comment
     * @return RieselPrime
     */
    public function setComment($comment)
    {
        $this->comment = $comment;

        return $this;
    }

    /**
     * Get comment
     *
     * @return string 
     */
    public function getComment()
    {
        return $this->comment;
    }

    /**
     * Set isTwin
     *
     * @param boolean $isTwin
     * @return RieselPrime
     */
    public function setIsTwin($isTwin)
    {
        $this->isTwin = $isTwin;

        return $this;
    }

    /**
     * Get isTwin
     *
     * @return boolean 
     */
    public function getIsTwin()
    {
        return $this->isTwin;
    }

    /**
     * Set isSG
     *
     * @param boolean $isSG
     * @return RieselPrime
     */
    public function setIsSG($isSG)
    {
        $this->isSG = $isSG;

        return $this;
    }

    /**
     * Get isSG
     *
     * @return boolean 
     */
    public function getIsSG()
    {
        return $this->isSG;
    }

    /**
     * Set is100th
     *
     * @param boolean $is100th
     * @return RieselPrime
     */
    public function setIs100th($is100th)
    {
        $this->is100th = $is100th;

        return $this;
    }

    /**
     * Get is100th
     *
     * @return boolean 
     */
    public function getIs100th()
    {
        return $this->is100th;
    }

    /**
     * Set isProvenPrime
     *
     * @param boolean $isProvenPrime
     * @return RieselPrime
     */
    public function setIsProvenPrime($isProvenPrime)
    {
        $this->isProvenPrime = $isProvenPrime;

        return $this;
    }

    /**
     * Get isProvenPrime
     *
     * @return boolean 
     */
    public function getIsProvenPrime()
    {
        return $this->isProvenPrime;
    }

    /**
     * Set foundOn
     *
     * @param \DateTime $foundOn
     * @return RieselPrime
     */
    public function setFoundOn($foundOn)
    {
        $this->foundOn = $foundOn;

        return $this;
    }

    /**
     * Get foundOn
     *
     * @return \DateTime 
     */
    public function getFoundOn()
    {
        return $this->foundOn;
    }
    
    public function render() {
        $string = strval($this->n);
        if ($this->utm) {
            $string = "<a href=\"javascript:utm({$this->utm})\">$string</a>";
        }
        if ($this->isSG) {
            $string = "<b>$string</b>";
        }
        if ($this->isTwin) {
            $string = "<span class=\"twi\">$string</span>";
        }
        if ($this->woodall) {
            $string = "<span class=\"wod\" title=\"Woodall: {$this->woodall}\">$string</span>";
        }
        if ($this->nearWoodall) {
            $string = "$string<a class=\"cmt\" title=\"Near Woodall: {$this->nearWoodall}\">*</a>";
        }
        if ($this->comment) {
            $string = "$string<a class=\"cmt\" title=\"{$this->comment}\">*</a>";
        }
        return $string;
    }
    
    /**
     * Set testedPrime
     *
     * @param \RPPDb\RieselBundle\Entity\Program $testedPrime
     * @return RieselPrime
     */
    public function setTestedPrime(\RPPDb\RieselBundle\Entity\Program $testedPrime = null)
    {
        $this->testedPrime = $testedPrime;

        return $this;
    }

    /**
     * Get testedPrime
     *
     * @return \RPPDb\RieselBundle\Entity\Program 
     */
    public function getTestedPrime()
    {
        return $this->testedPrime;
    }

    /**
     * Set testedTwin
     *
     * @param \RPPDb\RieselBundle\Entity\Program $testedTwin
     * @return RieselPrime
     */
    public function setTestedTwin(\RPPDb\RieselBundle\Entity\Program $testedTwin = null)
    {
        $this->testedTwin = $testedTwin;

        return $this;
    }

    /**
     * Get testedTwin
     *
     * @return \RPPDb\RieselBundle\Entity\Program 
     */
    public function getTestedTwin()
    {
        return $this->testedTwin;
    }

    /**
     * Set foundBy
     *
     * @param \RPPDb\RieselBundle\Entity\Contributor $foundBy
     * @return RieselPrime
     */
    public function setFoundBy(\RPPDb\RieselBundle\Entity\Contributor $foundBy = null)
    {
        $this->foundBy = $foundBy;

        return $this;
    }

    /**
     * Get foundBy
     *
     * @return \RPPDb\RieselBundle\Entity\Contributor 
     */
    public function getFoundBy()
    {
        return $this->foundBy;
    }

    /**
     * Set rieselk
     *
     * @param \RPPDb\RieselBundle\Entity\RieselK $rieselK
     * @return RieselPrime
     */
    public function setRieselK(\RPPDb\RieselBundle\Entity\RieselK $rieselK = null)
    {
        $this->rieselK = $rieselK;

        return $this;
    }

    /**
     * Get rieselk
     *
     * @return \RPPDb\RieselBundle\Entity\RieselK 
     */
    public function getRieselK()
    {
        return $this->rieselK;
    }

    /**
     * Set nearWoodall
     *
     * @param \RPPDb\RieselBundle\Entity\NearWoodall $nearWoodall
     * @return RieselPrime
     */
    public function setNearWoodall(\RPPDb\RieselBundle\Entity\NearWoodall $nearWoodall = null)
    {
        $this->nearWoodall = $nearWoodall;

        return $this;
    }

    /**
     * Get nearWoodall
     *
     * @return \RPPDb\RieselBundle\Entity\NearWoodall 
     */
    public function getNearWoodall()
    {
        return $this->nearWoodall;
    }
    
    /**
     * Get string (plain text) rendering
     * 
     * @return string
     */
    public function __toString() {
        $knum = $this->rieselK->getNum();
        if ($knum == 1) {
            return "2^{$this->n}-1";
        } else {
            return "{$knum}*2^{$this->n}-1";
        }
    }
    
    /**
     * Get string (styled) rendering
     * 
     * @return string
     */
    public function styledString() {
        $knum = $this->rieselK->getNum();
        if ($knum == 1) {
            return "2<sup>{$this->n}</sup>-1";
        } else {
            return "{$knum}&middot;2<sup>{$this->n}</sup>-1";
        }
    }
    
    /**
     * Get foundOn as string
     * 
     * @return string
     */
    public function foundOnString() {
        $foundOn = $this->foundOn;
        if ($foundOn->format("Y") >= 5000 && $foundOn->format("Y") < 6000) {
            $newDate = clone $foundOn;
            $newDate->modify("-4000 years");
            return $newDate->format("Y");
        } elseif ($foundOn->format("Y") >= 6000 && $foundOn->format("Y") < 7000) {
            $newDate = clone $foundOn;
            $newDate->modify("-5000 years");
            return $newDate->format("Y-m");
        } else {
            return $foundOn->format("Y-m-d");
        }
    }

    /**
     * Set woodall
     *
     * @param \RPPDb\RieselBundle\Entity\Woodall $woodall
     * @return RieselPrime
     */
    public function setWoodall(\RPPDb\RieselBundle\Entity\Woodall $woodall = null)
    {
        $this->woodall = $woodall;

        return $this;
    }

    /**
     * Get woodall
     *
     * @return \RPPDb\RieselBundle\Entity\Woodall 
     */
    public function getWoodall()
    {
        return $this->woodall;
    }
}
