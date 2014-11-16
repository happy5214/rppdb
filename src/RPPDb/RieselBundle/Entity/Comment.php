<?php

namespace RPPDb\RieselBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * RieselPrimeComment
 *
 * @ORM\Table("RieselPrimeComment")
 * @ORM\Entity(repositoryClass="RPPDb\RieselBundle\Entity\CommentRepository")
 */
class Comment {
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
     * @ORM\Column(name="contents", type="string", length=255)
     */
    private $contents;
    
    /**
     * @ORM\OneToOne(targetEntity="RieselPrime", inversedBy="comment")
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
     * Set contents
     *
     * @param string $contents
     * @return Comment
     */
    public function setContents($contents) {
        $this->contents = $contents;
        
        return $this;
    }
    
    /**
     * Get contents
     *
     * @return string 
     */
    public function getContents() {
        return $this->contents;
    }
    
    /**
     * Set prime
     *
     * @param \RPPDb\RieselBundle\Entity\RieselPrime $prime
     * @return Comment
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
     * Get string
     * 
     * @return string
     */
    public function __toString() {
        return $this->contents;
    }
}
