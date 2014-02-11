<?php

namespace RPPDb\RieselBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use JMS\SecurityExtraBundle\Annotation\Secure;

use RPPDb\RieselBundle\Entity\RieselK;
use RPPDb\RieselBundle\Form\Type\RieselKType;

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
        return array('k' => $rieselk->getNum(), 'form' => $form->createView());
    }
}
