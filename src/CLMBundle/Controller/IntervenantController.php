<?php
/**
 * Created by PhpStorm.
 * User: arnaudg
 * Date: 10/04/2018
 * Time: 14:42
 */

namespace CLMBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class IntervenantController extends Controller {
    public function indexAction() {
        return $this->render('CLMBundle:Default:intervenant.html.twig', array(

        ));
    }
}
