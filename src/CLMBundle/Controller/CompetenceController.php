<?php

namespace CLMBundle\Controller;

use CLMBundle\Form\CompetenceType;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;
use Symfony\Component\Security\Core\Exception\AccessDeniedException;

class CompetenceController extends Controller {

    public function editAction(Request $request, $idCompetence) {
        $competence = null;
        if(!is_null($idCompetence) && $idCompetence > 0)
            $competence = $this->getDoctrine()->getRepository("CLMBundle:Competence")->find($idCompetence);

        $form = $this->createForm("CLMBundle\Form\CompetenceType", $competence,array(
            'method' => 'POST',
            'action' => $this->generateUrl('clm_competence_edit', array('idCompetence' => $idCompetence)),
        ));

        $form->handleRequest($request);

        if ($form->isSubmitted()) {
            if ($form->isValid()) {
                $competence = $form->getData();
                $em = $this->getDoctrine()->getManager();
                $em->persist($competence);
                $em->flush();
            }
        }

        return $this->render("CLMBundle:Competence:edit.html.twig", array(
            "form" => $form->createView(),
        ));
    }

    public function listeAction() {
        $competences = $this->getDoctrine()->getRepository("CLMBundle:Competence")->findAll();
        return $this->render("CLMBundle:Competence:liste.html.twig", array(
            'competences' => $competences,
        ));
    }

}