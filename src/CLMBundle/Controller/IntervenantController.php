<?php

namespace CLMBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\Security\Core\Exception\AccessDeniedException;

// TODO
class IntervenantController extends Controller {

    public function indexAction() {
        if($this->isGranted("ROLE_ADMIN") || $this->isGranted("ROLE_INTERVENANT")) {
            return $this->render('CLMBundle:Intervenant:index.html.twig', array());
        }
        else {
            throw new AccessDeniedException('Vous ne passerez pas !');
        }
    }

}
