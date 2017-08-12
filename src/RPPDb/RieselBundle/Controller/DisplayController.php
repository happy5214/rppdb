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
                $below = $repo->findByKBelow($rieselK, $rieselK->getMaxTested());
                $above = $repo->findByKAbove($rieselK, $rieselK->getMaxTested());
                $before = array();
                $after = array();
                foreach ($below as $prime) {
                    $before[] = $prime->render();
                }
                foreach ($above as $prime) {
                    $after[] = $prime->render();
                }
                $renderedPrimes = implode(', ', $before) . " (...) " . implode(', ', $after);
            } else {
                $primes = array();
                foreach ($rieselK->getPrimes() as $prime) {
                    $primes[] = $prime->render();
                }
                $renderedPrimes = implode(', ', $primes);
            }
            return $this->render('RPPDbRieselBundle:Display:kdetail.html.twig', array('k' => $rieselK, 'primes' => $renderedPrimes), $response);
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
}
