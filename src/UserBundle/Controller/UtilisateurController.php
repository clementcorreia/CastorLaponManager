<?php

namespace UserBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\HttpFoundation\Request;

class UtilisateurController extends Controller {

    public function editAction(Request $request, $idUtilisateur) {
        $utilisateur = null;
        $edit = false;
        if(!is_null($idUtilisateur) && $idUtilisateur > 0) {
            $utilisateur = $this->getDoctrine()->getRepository("UserBundle:Utilisateur")->find($idUtilisateur);
            $edit = true;
        }

        $form = $this->createForm("UserBundle\Form\UtilisateurType", $utilisateur,array(
            'method' => 'POST',
            'action' => $this->generateUrl('clm_utilisateur_edit', array('idUtilisateur' => $idUtilisateur)),
        ));

        if($edit) {
            $form->remove('plainPassword');
        }
        else {
            $form->add('rolesTmp', ChoiceType::class, array(
                "label" => "Role",
                "choices" => array(
                    "Apprenant" => "ROLE_APPRENANT",
                    "Intervenant" => "ROLE_INTERVENANT",
                    "Administrateur" => "ROLE_ADMIN",
                ),
                'choices_as_values' => true,
            ));
        }

        $form->handleRequest($request);

        $result = false;

        if ($form->isSubmitted()) {
            if ($form->isValid()) {
                $role = $form->get('rolesTmp')->getData();
                dump($role);
                $utilisateur = $form->getData();
                $utilisateur->setEnabled(true);
                if(!$edit) {
                    $utilisateur->addRole($role);
                }
                $em = $this->getDoctrine()->getManager();
                $em->persist($utilisateur);
                $em->flush();
                $result = true;
            }
        }

        if($result) {
            $this->get('session')->getFlashBag()->add('success', "L'utilisateur a bien été enregistré");
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