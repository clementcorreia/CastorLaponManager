<?php

namespace CLMBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

// TODO
class ApprenantController extends Controller {

    public function indexAction() {
        return $this->render('CLMBundle:Apprenant:index.html.twig', array(

        ));
    }

    public function listeProjetAction() {
        $projets = $this->getDoctrine()->getRepository("CLMBundle:Projet")->findAll();
        return $this->render("CLMBundle:Apprenant:index.html.twig", array(
            'projets' => $projets,
        ));
    }

}
