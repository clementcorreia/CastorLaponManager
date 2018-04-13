<?php

namespace CLMBundle\Controller;

use CLMBundle\Form\EquipeType;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;
use Symfony\Component\Security\Core\Exception\AccessDeniedException;

class EquipeController extends Controller {

    public function editAction(Request $request, $idEquipe) {
        $equipe = null;
        $edit = false;
        if(!is_null($idEquipe) && $idEquipe > 0) {
            $equipe = $this->getDoctrine()->getRepository("CLMBundle:Equipe")->find($idEquipe);
            $edit = true;
        }

        $repo = $this->getDoctrine()
            ->getManager()
            ->getRepository("UserBundle:Utilisateur");

        $form = $this->createForm("CLMBundle\Form\EquipeType", $equipe, array(
            'method' => 'POST',
            'action' => $this->generateUrl('clm_equipe_edit', array('idEquipe' => $idEquipe)),
            'repo' => $repo
        ));

        if($edit)
            $form->remove('credit');

        $form->handleRequest($request);
        $result = false;
        if ($form->isSubmitted()) {
            if ($form->isValid()) {
                $equipe = $form->getData();
                $em = $this->getDoctrine()->getManager();
                $em->persist($equipe);
                $em->flush();
                $result = true;
            }
        }

        if($result) {
            $this->get('session')->getFlashBag()->add('success', "L'équipe a bien été enregistrée");
        }

        return $this->render("CLMBundle:Equipe:edit.html.twig", array(
            "form" => $form->createView(),
        ));
    }

    public function detailsAction($idEquipe) {
        $equipe = $this->getDoctrine()->getRepository("CLMBundle:Equipe")->find($idEquipe);
        if(!$equipe && $idEquipe > 0) {
            throw new NotFoundHttpException;
        }
        return $this->render("CLMBundle:Equipe:details.html.twig", array(
            "equipe" => $equipe ? $equipe : null,
        ));
    }

    public function listeAction() {
        $equipes = $this->getDoctrine()->getRepository("CLMBundle:Equipe")->findAll();
        return $this->render("CLMBundle:Equipe:liste.html.twig", array(
            'equipes' => $equipes,
        ));
    }

}