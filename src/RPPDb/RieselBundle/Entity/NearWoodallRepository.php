<?php

namespace RPPDb\RieselBundle\Entity;

use Doctrine\ORM\EntityRepository;

/**
 * NearWoodallRepository
 *
 * This class was generated by the Doctrine ORM. Add your own custom
 * repository methods below.
 */
class NearWoodallRepository extends EntityRepository {
    public function findMinus() {
        return $this->getEntityManager()
            ->createQuery(
                "SELECT nw, p, k, fb, w, c FROM RPPDbRieselBundle:NearWoodall nw
                 JOIN nw.prime p JOIN p.rieselK k LEFT JOIN p.foundBy fb LEFT JOIN p.woodall w LEFT JOIN p.comment c
                 WHERE nw.sign = '-' ORDER BY nw.n ASC"
            )->getResult();
    }
    
    public function findPlus() {
        return $this->getEntityManager()
            ->createQuery(
                "SELECT nw, p, k, fb, w, c FROM RPPDbRieselBundle:NearWoodall nw
                 JOIN nw.prime p JOIN p.rieselK k LEFT JOIN p.foundBy fb LEFT JOIN p.woodall w LEFT JOIN p.comment c
                 WHERE nw.sign = '+' ORDER BY nw.n ASC"
            )->getResult();
    }
    
    public function findSlash() {
        return $this->getEntityManager()
            ->createQuery(
                "SELECT nw, p, k, fb, w, c FROM RPPDbRieselBundle:NearWoodall nw
                 JOIN nw.prime p JOIN p.rieselK k LEFT JOIN p.foundBy fb LEFT JOIN p.woodall w LEFT JOIN p.comment c
                 WHERE nw.sign = '/' ORDER BY nw.n ASC"
            )->setMaxResults(1)
             ->getSingleResult();
    }
}
