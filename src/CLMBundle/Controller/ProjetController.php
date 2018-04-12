<?php

namespace CLMBundle\Controller;

use CLMBundle\Form\ProjetType;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;
use Symfony\Component\Security\Core\Exception\AccessDeniedException;

class ProjetController extends Controller {

    public function editAction(Request $request, $idProjet) {
        $projet = null;
        if(!is_null($idProjet) && $idProjet > 0)
            $projet = $this->getDoctrine()->getRepository("CLMBundle:Projet")->find($idProjet);

        $repo = $this->getDoctrine()
            ->getManager()
            ->getRepository("UserBundle:Utilisateur");

        $form = $this->createForm("CLMBundle\Form\ProjetType", $projet,array(
            'method' => 'POST',
            'action' => $this->generateUrl('clm_projet_edit', array('idProjet' => $idProjet)),
            'repo' => $repo
        ));

        $form->handleRequest($request);

        if ($form->isSubmitted()) {
            if ($form->isValid()) {
                $projet = $form->getData();
                $em = $this->getDoctrine()->getManager();
                $em->persist($projet);
                $em->flush();
            }
        }

        return $this->render("CLMBundle:Projet:edit.html.twig", array(
            "form" => $form->createView(),
        ));
    }

    public function detailsAction($idProjet) {
        $projet = $this->getDoctrine()->getRepository("CLMBundle:Projet")->find($idProjet);
        if(!$projet && $idProjet > 0) {
            throw new NotFoundHttpException();
        }
        return $this->render("CLMBundle:Projet:details.html.twig", array(
            "projet" => $projet ? $projet : null,
        ));
    }

    public function listeAction() {
        $projets = $this->getDoctrine()->getRepository("CLMBundle:Projet")->findAll();
        return $this->render("CLMBundle:Projet:liste.html.twig", array(
            'projets' => $projets,
        ));
    }

}