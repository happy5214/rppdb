<?php

namespace RPPDb\RieselBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use JMS\SecurityExtraBundle\Annotation\Secure;

use RPPDb\RieselBundle\Entity\RieselK;
use RPPDb\RieselBundle\Form\Type\RieselKType;
use RPPDb\RieselBundle\Entity\Program;
use RPPDb\RieselBundle\Form\Type\ProgramType;
use RPPDb\RieselBundle\Entity\Contributor;
use RPPDb\RieselBundle\Form\Type\ContributorType;
use RPPDb\RieselBundle\Entity\NearWoodall;
use RPPDb\RieselBundle\Form\Type\NearWoodallType;

class EditController extends Controller {
    /**
     * @Route("/k/{k}", name="_riesel_edit_k")
     * @Template()
     * @Secure(roles="ROLE_ADMIN")
     */
    public function kAction($k) {
        $request = $this->getRequest();
        $em = $this->getDoctrine()->getManager();
     
        $rieselk = $em->getRepository('RPPDbRieselBundle:RieselK')->findOneById($k);
        
        $form = $this->createForm(new RieselKType(), $rieselk);
        $form->handleRequest($request);
        
        if ($form->isValid()) {
            $rieselk->setLastEdit(new \DateTime());
            $em->flush();

            return $this->redirect($this->generateUrl('_riesel_display_k', array('k' => $rieselk->getNum())));
        }
        return array('k' => $rieselk->getNum(), 'form' => $form->createView());
    }
    
    /**
     * @Route("/add/k", name="_riesel_add_k")
     * @Template()
     * @Secure(roles="ROLE_ADMIN")
     */
    public function addKAction() {
        $request = $this->getRequest();
        $em = $this->getDoctrine()->getManager();
     
        $rieselk = new RieselK();
        
        $form = $this->createForm(new RieselKType(), $rieselk);
        $form->handleRequest($request);
        
        if ($form->isValid()) {
            $rieselk->setLastEdit(new \DateTime());
            $em->persist($rieselk);
            $em->flush();

            return $this->redirect($this->generateUrl('_riesel_display_k', array('k' => $rieselk->getNum())));
        }
        return array('form' => $form->createView());
    }
    
    /**
     * @Route("/program/{id}", name="_riesel_edit_program")
     * @Template()
     * @Secure(roles="ROLE_ADMIN")
     */
    public function programAction($id) {
        $request = $this->getRequest();
        $em = $this->getDoctrine()->getManager();
     
        $program = $em->getRepository('RPPDbRieselBundle:Program')->findOneById($id);
        
        $form = $this->createForm(new ProgramType(), $program);
        $form->handleRequest($request);
        
        if ($form->isValid()) {
            $em->flush();

            return $this->redirect($this->generateUrl('_riesel_display_program', array('id' => $program->getId())));
        }
        return array('program' => $program, 'form' => $form->createView());
    }
    
    /**
     * @Route("/add/program", name="_riesel_add_program")
     * @Template()
     * @Secure(roles="ROLE_ADMIN")
     */
    public function addProgramAction() {
        $request = $this->getRequest();
        $em = $this->getDoctrine()->getManager();
     
        $program = new Program();
        
        $form = $this->createForm(new ProgramType(), $program);
        $form->handleRequest($request);
        
        if ($form->isValid()) {
            $em->persist($program);
            $em->flush();

            return $this->redirect($this->generateUrl('_riesel_display_program', array('id' => $program->getId())));
        }
        return array('form' => $form->createView());
    }
    
    /**
     * @Route("/contributor/{id}", name="_riesel_edit_contributor")
     * @Template()
     * @Secure(roles="ROLE_ADMIN")
     */
    public function contributorAction($id) {
        $request = $this->getRequest();
        $em = $this->getDoctrine()->getManager();
     
        $contributor = $em->getRepository('RPPDbRieselBundle:Contributor')->findOneById($id);
        
        $form = $this->createForm(new ContributorType(), $contributor);
        $form->handleRequest($request);
        
        if ($form->isValid()) {
            $em->flush();

            return $this->redirect($this->generateUrl('_riesel_display_contributor', array('id' => $contributor->getId())));
        }
        return array('contributor' => $contributor, 'form' => $form->createView());
    }
    
    /**
     * @Route("/add/contributor", name="_riesel_add_contributor")
     * @Template()
     * @Secure(roles="ROLE_ADMIN")
     */
    public function addContributorAction() {
        $request = $this->getRequest();
        $em = $this->getDoctrine()->getManager();
     
        $contributor = new Contributor();
        
        $form = $this->createForm(new ContributorType(), $contributor);
        $form->handleRequest($request);
        
        if ($form->isValid()) {
            $em->persist($contributor);
            $em->flush();

            return $this->redirect($this->generateUrl('_riesel_display_contributor', array('id' => $contributor->getId())));
        }
        return array('form' => $form->createView());
    }
    
    /**
     * @Route("/add/nearwoodall", name="_riesel_add_nearwoodall")
     * @Template()
     * @Secure(roles="ROLE_ADMIN")
     */
    public function addNearWoodallAction() {
        $request = $this->getRequest();
        $em = $this->getDoctrine()->getManager();
     
        $nearwoodall = new NearWoodall();
        
        $form = $this->createForm(new NearWoodallType(), $nearwoodall);
        $form->handleRequest($request);
        
        if ($form->isValid()) {
            $rieselk = $form->get('primek')->getData();
            $rieseln = $form->get('primen')->getData();
            $rieselprime = $this->getDoctrine()->getManager()->getRepository('RPPDbRieselBundle:RieselPrime')->findByKNumAndN($rieselk, $rieseln);
            if (is_null($rieselprime)) {
                return array('form' => $form->createView());
            }
            $nearwoodall->setPrime($rieselprime);
            $em->persist($nearwoodall);
            $em->flush();

            return $this->redirect($this->generateUrl('_riesel_display_k', array('k' => $rieselk)));
        }
        return array('form' => $form->createView());
    }
}
