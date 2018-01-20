<?php

namespace RPPDb\RieselBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * WorkRange
 *
 * @ORM\Table()
 * @ORM\Entity(repositoryClass="RPPDb\RieselBundle\Repository\WorkRangeRepository")
 */
class WorkRange
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
     * @ORM\ManyToOne(targetEntity="RieselK", inversedBy="workRanges")
     * @ORM\JoinColumn(name="rieselk_id", referencedColumnName="id")
     */
    private $rieselK;

    /**
     * @var int
     *
     * @ORM\Column(name="min_n", type="bigint")
     */
    private $minN;

    /**
     * @var int
     *
     * @ORM\Column(name="max_n", type="bigint")
     */
    private $maxN;


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
     * Set minN
     *
     * @param integer $minN
     *
     * @return WorkRange
     */
    public function setMinN($minN)
    {
        $this->minN = $minN;

        return $this;
    }

    /**
     * Get minN
     *
     * @return int
     */
    public function getMinN()
    {
        return $this->minN;
    }

    /**
     * Set maxN
     *
     * @param integer $maxN
     *
     * @return WorkRange
     */
    public function setMaxN($maxN)
    {
        $this->maxN = $maxN;

        return $this;
    }

    /**
     * Get maxN
     *
     * @return int
     */
    public function getMaxN()
    {
        return $this->maxN;
    }

    /**
     * Set rieselk
     *
     * @param \RPPDb\RieselBundle\Entity\RieselK $rieselK
     * @return RieselPrime
     */
    public function setRieselK(\RPPDb\RieselBundle\Entity\RieselK $rieselK = null) {
        $this->rieselK = $rieselK;

        return $this;
    }

    /**
     * Get rieselk
     *
     * @return \RPPDb\RieselBundle\Entity\RieselK 
     */
    public function getRieselK() {
        return $this->rieselK;
    }
}

