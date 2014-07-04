<?php

namespace RPPDb\RieselBundle\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Response;

class DisplayController extends Controller
{
    /**
     * @Route("/list/{min}/{max}", name="_riesel_display_list")
     * @Template()
     */
    public function listAction($min, $max)
    {
        $em = $this->getDoctrine()->getManager();
        $ks = $em->getRepository('RPPDbRieselBundle:RieselK')
            ->findByRange($min, $max);
        return array('min' => $min, 'max' => $max, 'riesel_ks' => $ks);
    }
    
    /**
     * @Route("/k/{k}", name="_riesel_display_k")
     * @Template()
     */
    public function kAction($k) {
        $repo = $this->getDoctrine()->getManager()->getRepository('RPPDbRieselBundle:RieselK');
        $rieselk = $repo->findOneByNum($k);
        $previous = $repo->findPreviousK($k);
        $next = $repo->findNextK($k);
        return array('k' => $rieselk, 'previous' => $previous, 'next' => $next);
    }
    
    public function kdetailAction($k) {
        $rieselk = $this->getDoctrine()->getManager()->getRepository('RPPDbRieselBundle:RieselK')->findOneById($k);
        $response = new Response();
        $response->setLastModified($rieselk->getLastEdit());
        $response->setPublic();
        
        if ($response->isNotModified($this->getRequest())) {
            // return the 304 Response immediately
            return $response;
        } else {
            $rep = $this->getDoctrine()->getManager()->getRepository('RPPDbRieselBundle:RieselPrime');
            $renderedPrimes = '';
            if ($rieselk->getMaxTested()) {
                $below = $rep->findByKBelow($rieselk, $rieselk->getMaxTested());
                $above = $rep->findByKAbove($rieselk, $rieselk->getMaxTested());
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
                foreach ($rieselk->getPrimes() as $prime) {
                    $primes[] = $prime->render();
                }
                $renderedPrimes = implode(', ', $primes);
            }
            return $this->render('RPPDbRieselBundle:Display:kdetail.html.twig', array('rieselk' => $rieselk, 'primes' => $renderedPrimes), $response);
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
        $woodall = $this->getDoctrine()->getManager()->getRepository('RPPDbRieselBundle:RieselPrime')->findWoodallPrimes();
        $nwrepo = $this->getDoctrine()->getManager()->getRepository('RPPDbRieselBundle:NearWoodall');
        $plus = $nwrepo->findPlus();
        $minus = $nwrepo->findMinus();
        return array('woodall' => $woodall, 'plus' => $plus, 'minus' => $minus);
    }
}
