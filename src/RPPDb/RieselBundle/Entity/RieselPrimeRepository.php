<?php

namespace RPPDb\RieselBundle\Entity;

use Doctrine\ORM\EntityRepository;

/**
 * RieselPrimeRepository
 *
 * This class was generated by the Doctrine ORM. Add your own custom
 * repository methods below.
 */
class RieselPrimeRepository extends EntityRepository {
    public function findByKBelow($k, $limit) {
        return $this->getEntityManager()
            ->createQuery(
                'SELECT p, w, nw, c FROM RPPDbRieselBundle:RieselPrime p LEFT JOIN p.woodall w LEFT JOIN p.nearWoodall nw LEFT JOIN p.comment c WHERE p.n < :limit AND p.rieselK = :k ORDER BY p.n ASC'
            )->setParameters(array('k' => $k, 'limit' => $limit))
            ->getResult();
    }
    
    public function findByKAbove($k, $limit) {
        return $this->getEntityManager()
            ->createQuery(
                'SELECT p, w, nw, c FROM RPPDbRieselBundle:RieselPrime p LEFT JOIN p.woodall w LEFT JOIN p.nearWoodall nw LEFT JOIN p.comment c WHERE p.n > :limit AND p.rieselK = :k ORDER BY p.n ASC'
            )->setParameters(array('k' => $k, 'limit' => $limit))
            ->getResult();
    }
    
    public function findByRieselKAndN($rieselk, $n) {
        return $this->getEntityManager()
            ->createQuery(
                'SELECT p FROM RPPDbRieselBundle:RieselPrime p WHERE p.rieselK = :k AND p.n = :n'
            )->setParameters(array('k' => $rieselk, 'n' => $n))
            ->getOneOrNullResult();
    }
    
    public function findByKNumAndN($k, $n) {
        return $this->getEntityManager()
            ->createQuery(
                'SELECT p FROM RPPDbRieselBundle:RieselPrime p JOIN p.rieselK k WHERE k.num = :k AND p.n = :n'
            )->setParameters(array('k' => $k, 'n' => $n))
            ->getOneOrNullResult();
    }
    
    public function findWoodallPrimes() {
        return $this->getEntityManager()
            ->createQuery(
                'SELECT p, k, nw FROM RPPDbRieselBundle:RieselPrime p JOIN p.rieselk k LEFT JOIN p.nearWoodall nw WHERE p.woodall IS NOT NULL ORDER BY p.woodall ASC'
            )->getResult();
    }
    
    public function findFirstTwinKLessThanN($max) {
        return $this->getEntityManager()
            ->createQuery(
                'SELECT p.n, MIN(k.num) AS min_k FROM RPPDbRieselBundle:RieselPrime p INDEX BY p.n JOIN p.rieselK k WHERE p.n < :max AND p.isTwin = true GROUP BY p.n ORDER BY p.n ASC'
           )->setParameters(array('max' => $max))
            ->getResult();
    }
}
