<?php

namespace UserBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;

class UtilisateurController extends Controller {

    public function editAction(Request $request, $idUtilisateur) {
        $utilisateur = null;
        if(!is_null($idUtilisateur) && $idUtilisateur > 0)
            $utilisateur = $this->getDoctrine()->getRepository("UserBundle:Utilisateur")->find($idUtilisateur);

        $form = $this->createForm("UserBundle\Form\UtilisateurType", $utilisateur,array(
            'method' => 'POST',
            'action' => $this->generateUrl('clm_utilisateur_edit', array('idUtilisateur' => $idUtilisateur)),
        ));

        $form->handleRequest($request);

        if ($form->isSubmitted()) {
            if ($form->isValid()) {
                $utilisateur = $form->getData();
                $em = $this->getDoctrine()->getManager();
                $em->persist($utilisateur);
                $em->flush();
            }
        }

        return $this->render("CLMBundle:Utilisateur:edit.html.twig", array(
            "form" => $form->createView(),
        ));
    }
    
    public function listeAction() {
        $utilisateurs = $this->getDoctrine()->getRepository("UserBundle:Utilisateur")->findAll();

        return $this->render("CLMBundle:Utilisateur:liste.html.twig", array(
            'utilisateurs' => $utilisateurs,
        ));

    }

}