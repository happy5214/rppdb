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
    private $rieselk;
    
    /**
     * @var integer
     *
     * @ORM\Column(name="n", type="bigint")
     */
    private $n;

    /**
     * @var integer
     *
     * @ORM\Column(name="woodall", type="integer", nullable=true)
     */
    private $woodall;

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
     * Set woodall
     *
     * @param integer $woodall
     * @return RieselPrime
     */
    public function setWoodall($woodall)
    {
        $this->woodall = $woodall;

        return $this;
    }

    /**
     * Get woodall
     *
     * @return integer 
     */
    public function getWoodall()
    {
        return $this->woodall;
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
            $string = "<span class=\"wod\" title=\"Woodall: {$this->woodall}*2^{$this->woodall}-1\">$string</span>";
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
     * @param \RPPDb\RieselBundle\Entity\RieselK $rieselk
     * @return RieselPrime
     */
    public function setRieselk(\RPPDb\RieselBundle\Entity\RieselK $rieselk = null)
    {
        $this->rieselk = $rieselk;

        return $this;
    }

    /**
     * Get rieselk
     *
     * @return \RPPDb\RieselBundle\Entity\RieselK 
     */
    public function getRieselk()
    {
        return $this->rieselk;
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
}
