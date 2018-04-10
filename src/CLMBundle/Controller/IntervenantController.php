<?php
/**
 * Created by PhpStorm.
 * User: arnaudg
 * Date: 10/04/2018
 * Time: 14:42
 */

namespace CLMBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

// TODO
class IntervenantController extends Controller {
    public function indexAction() {
        return $this->render('CLMBundle:Default:ticketProjet.html.twig', array(

        ));
    }
}
