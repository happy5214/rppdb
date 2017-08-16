<?php

namespace RPPDb\RieselBundle\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

class DisplayController extends Controller {
    /**
     * @Route("/list/{min}/{max}", name="_riesel_display_list")
     * @Template()
     */
    public function listAction($min, $max) {
        $manager = $this->getDoctrine()->getManager();
        $ks = $manager->getRepository('RPPDbRieselBundle:RieselK')
            ->findByRange($min, $max);
        return array('min' => $min, 'max' => $max, 'ks' => $ks);
    }
    
    /**
     * @Route("/k/{k}", name="_riesel_display_k")
     * @Template()
     */
    public function kAction($k) {
        $repo = $this->getDoctrine()->getManager()->getRepository('RPPDbRieselBundle:RieselK');
        $rieselK = $repo->findOneByNum($k);
        $previous = $repo->findPreviousK($k);
        $next = $repo->findNextK($k);
        return array('k' => $rieselK, 'previous' => $previous, 'next' => $next);
    }
    
    public function kdetailAction(Request $request, $k) {
        $rieselK = $this->getDoctrine()->getManager()->getRepository('RPPDbRieselBundle:RieselK')->findOneById($k);
        $response = new Response();
        $response->setLastModified($rieselK->getLastEdit());
        $response->setPublic();
        
        if ($response->isNotModified($request)) {
            // return the 304 Response immediately
            return $response;
        } else {
            $repo = $this->getDoctrine()->getManager()->getRepository('RPPDbRieselBundle:RieselPrime');
            $renderedPrimes = '';
            if ($rieselK->getMaxTested()) {
                $before = $repo->findByKBelow($rieselK, $rieselK->getMaxTested());
                $after = $repo->findByKAbove($rieselK, $rieselK->getMaxTested());
                $separator = true;
                /*$below = array();
                $above = array();
                foreach ($before as $prime) {
                    $before[] = $prime->render();
                }
                foreach ($after as $prime) {
                    $after[] = $prime->render();
                }
                $renderedPrimes = implode(', ', $below) . " (...) " . implode(', ', $above);*/
            } else {
                /*$primes = array();
                foreach ($rieselK->getPrimes() as $prime) {
                    $primes[] = $prime->render();
                }
                $renderedPrimes = implode(', ', $primes);*/
                $before = $rieselK->getPrimes();
                $after = array();
                $separator = false;
            }
            return $this->render('RPPDbRieselBundle:Display:kdetail.html.twig', array('k' => $rieselK, 'before' => $before, 'after' => $after, 'separator' => $separator), $response);
        }
    }
    
    /**
     * @Route("/program/{id}", name="_riesel_display_program")
     * @Template()
     */
    public function programAction($id) {
        $program = $this->getDoctrine()->getManager()->getRepository('RPPDbRieselBundle:Program')->findOneById($id);
        return array('program' => $program);
    }
    
    /**
     * @Route("/contributor/{id}", name="_riesel_display_contributor")
     * @Template()
     */
    public function contributorAction($id) {
        $contributor = $this->getDoctrine()->getManager()->getRepository('RPPDbRieselBundle:Contributor')->findOneById($id);
        return array('contributor' => $contributor);
    }
    
    /**
     * @Route("/woodall", name="_riesel_display_woodall")
     * @Template()
     */
    public function woodallAction() {
        $woodall = $this->getDoctrine()->getManager()->getRepository('RPPDbRieselBundle:Woodall')->findPrimes();
        $nwRepo = $this->getDoctrine()->getManager()->getRepository('RPPDbRieselBundle:NearWoodall');
        $plus = $nwRepo->findPlus();
        $minus = $nwRepo->findMinus();
        return array('woodall' => $woodall, 'plus' => $plus, 'minus' => $minus);
    }
    
    /**
     * @Route("/firsttwin", name="_riesel_display_firsttwin")
     * @Template()
     */
    public function firstTwinAction() {
        $repo = $this->getDoctrine()->getManager()->getRepository('RPPDbRieselBundle:RieselPrime');
        $tens = 10;
        $flat_ks = array(0 => '-');
        $jumpingKs = array();
        $jumping = 0;
        $result = $repo->findFirstTwinKLessThanN($tens * 10);
        foreach ($result as $resultN => $resultData) {
            $num = $resultData['min_k'];
            $flat_ks[$resultN] = $num;
            if ($num > $jumping) {
                $jumping = $num;
                $jumpingKs[$resultN] = true;
            }
        }
        $table_ks = array();
        for ($row = 0; $row < $tens; $row++) {
            $table_ks[$row] = array();
            for ($col = 0; $col < 10; $col++) {
                $table_ks[$row][$col] = isset($flat_ks[$row * 10 + $col]) ? $flat_ks[$row * 10 + $col] : 'N/A';
            }
        }

        return array('ks' => $table_ks, 'jumpingKs' => $jumpingKs);
    }
}
