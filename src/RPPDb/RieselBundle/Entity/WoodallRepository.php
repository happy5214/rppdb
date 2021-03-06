<?php

namespace RPPDb\RieselBundle\Entity;

use Doctrine\ORM\EntityRepository;

/**
 * WoodallRepository
 *
 * This class was generated by the Doctrine ORM. Add your own custom
 * repository methods below.
 */
class WoodallRepository extends EntityRepository {
    public function findPrimes() {
        return $this->getEntityManager()
            ->createQuery(
                "SELECT w, p, k, fb, nw, c FROM RPPDbRieselBundle:Woodall w
                 JOIN w.prime p JOIN p.rieselK k LEFT JOIN p.foundBy fb LEFT JOIN p.nearWoodall nw LEFT JOIN p.comment c
                 ORDER BY w.n ASC"
            )->getResult();
    }
}
