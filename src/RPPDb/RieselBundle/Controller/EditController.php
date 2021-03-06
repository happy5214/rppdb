<?php

namespace RPPDb\RieselBundle\Controller;

use Doctrine\Common\Collections\ArrayCollection;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;

use JMS\SecurityExtraBundle\Annotation\Secure;

use RPPDb\RieselBundle\Entity\RieselK;
use RPPDb\RieselBundle\Form\Type\RieselKType;
use RPPDb\RieselBundle\Entity\Program;
use RPPDb\RieselBundle\Form\Type\ProgramType;
use RPPDb\RieselBundle\Entity\Contributor;
use RPPDb\RieselBundle\Form\Type\ContributorType;
use RPPDb\RieselBundle\Entity\NearWoodall;
use RPPDb\RieselBundle\Form\Type\NearWoodallType;
use RPPDb\RieselBundle\Entity\Woodall;
use RPPDb\RieselBundle\Form\Type\WoodallType;

class EditController extends Controller {
    /**
     * @Route("/k/{k}", name="_riesel_edit_k")
     * @Template()
     * @Secure(roles="ROLE_ADMIN")
     */
    public function kAction(Request $request, $k) {
        $manager = $this->getDoctrine()->getManager();

        $rieselK = $manager->getRepository('RPPDbRieselBundle:RieselK')->findOneById($k);

        $originalPrimes = new ArrayCollection();
        $originalRanges = new ArrayCollection();

        foreach ($rieselK->getPrimes() as $prime) {
            $originalPrimes->add($prime);
        }
        foreach ($rieselK->getWorkRanges() as $range) {
            $originalRanges->add($range);
        }

        $form = $this->createForm(RieselKType::class, $rieselK);
        $form->handleRequest($request);

        if ($form->isValid()) {
            $rieselK->setLastEdit(new \DateTime());
            foreach ($originalPrimes as $prime) {
                if (!$rieselK->getPrimes()->contains($prime)) {
                    $manager->remove($prime);
                }
            }
            foreach ($originalRanges as $range) {
                if (!$rieselK->getWorkRanges()->contains($range)) {
                    $manager->remove($range);
                }
            }
            $manager->flush();

            return $this->redirect($this->generateUrl('_riesel_display_k', array('k' => $rieselK->getNum())));
        }
        return array('k' => $rieselK->getNum(), 'form' => $form->createView());
    }
    
    /**
     * @Route("/add/k", name="_riesel_add_k")
     * @Template()
     * @Secure(roles="ROLE_ADMIN")
     */
    public function addKAction(Request $request) {
        $manager = $this->getDoctrine()->getManager();
        
        $rieselK = new RieselK();
        
        $form = $this->createForm(RieselKType::class, $rieselK);
        $form->handleRequest($request);
        
        if ($form->isValid()) {
            $rieselK->setLastEdit(new \DateTime());
            $manager->persist($rieselK);
            $manager->flush();
            
            return $this->redirect($this->generateUrl('_riesel_display_k', array('k' => $rieselK->getNum())));
        }
        return array('form' => $form->createView());
    }
    
    /**
     * @Route("/program/{id}", name="_riesel_edit_program")
     * @Template()
     * @Secure(roles="ROLE_ADMIN")
     */
    public function programAction(Request $request, $id) {
        $manager = $this->getDoctrine()->getManager();
        
        $program = $manager->getRepository('RPPDbRieselBundle:Program')->findOneById($id);
        
        $form = $this->createForm(ProgramType::class, $program);
        $form->handleRequest($request);
        
        if ($form->isValid()) {
            $manager->flush();
            
            return $this->redirect($this->generateUrl('_riesel_display_program', array('id' => $program->getId())));
        }
        return array('program' => $program, 'form' => $form->createView());
    }
    
    /**
     * @Route("/add/program", name="_riesel_add_program")
     * @Template()
     * @Secure(roles="ROLE_ADMIN")
     */
    public function addProgramAction(Request $request) {
        $manager = $this->getDoctrine()->getManager();
        
        $program = new Program();
        
        $form = $this->createForm(ProgramType::class, $program);
        $form->handleRequest($request);
        
        if ($form->isValid()) {
            $manager->persist($program);
            $manager->flush();
            
            return $this->redirect($this->generateUrl('_riesel_display_program', array('id' => $program->getId())));
        }
        return array('form' => $form->createView());
    }
    
    /**
     * @Route("/contributor/{id}", name="_riesel_edit_contributor")
     * @Template()
     * @Secure(roles="ROLE_ADMIN")
     */
    public function contributorAction(Request $request, $id) {
        $manager = $this->getDoctrine()->getManager();
        
        $contributor = $manager->getRepository('RPPDbRieselBundle:Contributor')->findOneById($id);
        
        $form = $this->createForm(ContributorType::class, $contributor);
        $form->handleRequest($request);
        
        if ($form->isValid()) {
            $manager->flush();
            
            return $this->redirect($this->generateUrl('_riesel_display_contributor', array('id' => $contributor->getId())));
        }
        return array('contributor' => $contributor, 'form' => $form->createView());
    }
    
    /**
     * @Route("/add/contributor", name="_riesel_add_contributor")
     * @Template()
     * @Secure(roles="ROLE_ADMIN")
     */
    public function addContributorAction(Request $request) {
        $manager = $this->getDoctrine()->getManager();
        
        $contributor = new Contributor();
        
        $form = $this->createForm(ContributorType::class, $contributor);
        $form->handleRequest($request);
        
        if ($form->isValid()) {
            $manager->persist($contributor);
            $manager->flush();
            
            return $this->redirect($this->generateUrl('_riesel_display_contributor', array('id' => $contributor->getId())));
        }
        return array('form' => $form->createView());
    }
    
    /**
     * @Route("/nearwoodall/{id}", name="_riesel_edit_nearwoodall")
     * @Template()
     * @Secure(roles="ROLE_ADMIN")
     */
    public function nearWoodallAction(Request $request, $id) {
        $manager = $this->getDoctrine()->getManager();
        
        $nearWoodall = $manager->getRepository('RPPDbRieselBundle:NearWoodall')->findOneById($id);
        
        $form = $this->createForm(NearWoodallType::class, $nearWoodall);
        $prime = $nearWoodall->getPrime();
        $form->get('primek')->setData($prime->getRieselK()->getNum());
        $form->get('primen')->setData($prime->getN());
        $form->handleRequest($request);
        
        if ($form->isValid()) {
            $rieselK = $form->get('primek')->getData();
            $rieselN = $form->get('primen')->getData();
            $newPrime = $this->getDoctrine()->getManager()->getRepository('RPPDbRieselBundle:RieselPrime')->findByKNumAndN($rieselK, $rieselN);
            if (is_null($newPrime)) {
                return array('form' => $form->createView());
            }
            $nearWoodall->setPrime($newPrime);
            $manager->flush();
            
            return $this->redirect($this->generateUrl('_riesel_display_woodall'));
        }
        return array('nearwoodall' => $nearWoodall, 'form' => $form->createView());
    }
    
    /**
     * @Route("/add/nearwoodall", name="_riesel_add_nearwoodall")
     * @Template()
     * @Secure(roles="ROLE_ADMIN")
     */
    public function addNearWoodallAction(Request $request) {
        $manager = $this->getDoctrine()->getManager();
        
        $nearWoodall = new NearWoodall();
        
        $form = $this->createForm(NearWoodallType::class, $nearWoodall);
        $form->handleRequest($request);
        
        if ($form->isValid()) {
            $rieselK = $form->get('primek')->getData();
            $rieselN = $form->get('primen')->getData();
            $rieselPrime = $this->getDoctrine()->getManager()->getRepository('RPPDbRieselBundle:RieselPrime')->findByKNumAndN($rieselK, $rieselN);
            if (is_null($rieselPrime)) {
                return array('form' => $form->createView());
            }
            $nearWoodall->setPrime($rieselPrime);
            $manager->persist($nearWoodall);
            $manager->flush();
            
            return $this->redirect($this->generateUrl('_riesel_display_woodall'));
        }
        return array('form' => $form->createView());
    }
    
    /**
     * @Route("/woodall/{id}", name="_riesel_edit_woodall")
     * @Template()
     * @Secure(roles="ROLE_ADMIN")
     */
    public function woodallAction(Request $request, $id) {
        $manager = $this->getDoctrine()->getManager();
        
        $woodall = $manager->getRepository('RPPDbRieselBundle:Woodall')->findOneById($id);
        
        $form = $this->createForm(WoodallType::class, $woodall);
        $prime = $woodall->getPrime();
        $form->get('primek')->setData($prime->getRieselK()->getNum());
        $form->get('primen')->setData($prime->getN());
        $form->handleRequest($request);
        
        if ($form->isValid()) {
            $rieselK = $form->get('primek')->getData();
            $rieselN = $form->get('primen')->getData();
            $newPrime = $this->getDoctrine()->getManager()->getRepository('RPPDbRieselBundle:RieselPrime')->findByKNumAndN($rieselK, $rieselN);
            if (is_null($newPrime)) {
                return array('form' => $form->createView());
            }
            $woodall->setPrime($newPrime);
            $manager->flush();
            
            return $this->redirect($this->generateUrl('_riesel_display_woodall'));
        }
        return array('woodall' => $woodall, 'form' => $form->createView());
    }
    
    /**
     * @Route("/add/woodall", name="_riesel_add_woodall")
     * @Template()
     * @Secure(roles="ROLE_ADMIN")
     */
    public function addWoodallAction(Request $request) {
        $manager = $this->getDoctrine()->getManager();
        
        $woodall = new Woodall();
        
        $form = $this->createForm(WoodallType::class, $woodall);
        $form->handleRequest($request);
        
        if ($form->isValid()) {
            $rieselK = $form->get('primek')->getData();
            $rieselN = $form->get('primen')->getData();
            $rieselPrime = $this->getDoctrine()->getManager()->getRepository('RPPDbRieselBundle:RieselPrime')->findByKNumAndN($rieselK, $rieselN);
            if (is_null($rieselPrime)) {
                return array('form' => $form->createView());
            }
            $woodall->setPrime($rieselPrime);
            $manager->persist($woodall);
            $manager->flush();
            
            return $this->redirect($this->generateUrl('_riesel_display_woodall'));
        }
        return array('form' => $form->createView());
    }
}
