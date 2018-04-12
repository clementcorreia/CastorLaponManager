<?php

namespace CLMBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;

class ErrorController extends Controller {

    public function error404Action() {
        throw new NotFoundHttpException;
    }

}
