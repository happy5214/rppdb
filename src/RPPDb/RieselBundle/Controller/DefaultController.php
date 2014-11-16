<?php

namespace RPPDb\RieselBundle\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class DefaultController extends Controller {
    /**
     * @Route("/", name="_riesel_default_index")
     * @Template()
     */
    public function indexAction() {
        return array();
    }
}
