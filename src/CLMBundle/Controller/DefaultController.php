<?php

namespace CLMBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class DefaultController extends Controller
{
    public function indexAction()
    {
        return $this->render('CLMBundle:Default:index.html.twig');
    }
}
