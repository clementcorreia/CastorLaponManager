<?php

namespace CLMBundle\Controller;

use CLMBundle\Form\CampusType;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;
use Symfony\Component\Security\Core\Exception\AccessDeniedException;

class CampusController extends Controller {

    public function editAction(Request $request, $idCampus) {
        $campus = null;
        if(!is_null($idCampus) && $idCampus > 0)
            $campus = $this->getDoctrine()->getRepository("CLMBundle:Campus")->find($idCampus);

        $form = $this->createForm("CLMBundle\Form\CampusType", $campus,array(
            'method' => 'POST',
            'action' => $this->generateUrl('clm_campus_edit', array('idCampus' => $idCampus))
        ));

        $form->handleRequest($request);

        if ($form->isSubmitted()) {
            if ($form->isValid()) {
                $campus = $form->getData();
                $em = $this->getDoctrine()->getManager();
                $em->persist($campus);
                $em->flush();
            }
        }

        if($result) {
            $this->get('session')->getFlashBag()->add('success', "Le campus a bien été enregistré");
        }

        return $this->render("CLMBundle:Campus:edit.html.twig", array(
            "form" => $form->createView(),
        ));
    }

    public function listeAction() {
        $campusListe = $this->getDoctrine()->getRepository("CLMBundle:Campus")->findAll();
        return $this->render("CLMBundle:Campus:liste.html.twig", array(
            'campusListe' => $campusListe,
        ));
    }

}