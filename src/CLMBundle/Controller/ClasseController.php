<?php

namespace CLMBundle\Controller;

use CLMBundle\Form\ClasseType;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;
use Symfony\Component\Security\Core\Exception\AccessDeniedException;

class ClasseController extends Controller {

    public function editAction(Request $request, $idClasse) {
        $classe = null;
        if(!is_null($idClasse) && $idClasse > 0)
            $classe = $this->getDoctrine()->getRepository("CLMBundle:Classe")->find($idClasse);

        $repo = $this->getDoctrine()
            ->getManager()
            ->getRepository("UserBundle:Utilisateur");

        $form = $this->createForm("CLMBundle\Form\ClasseType", $classe,array(
            'method' => 'POST',
            'action' => $this->generateUrl('clm_classe_edit', array('idClasse' => $idClasse)),
            'repo' => $repo
        ));

        $form->handleRequest($request);

        $result = false;

        if ($form->isSubmitted()) {
            if ($form->isValid()) {
                $classe = $form->getData();
                $em = $this->getDoctrine()->getManager();
                $em->persist($classe);
                $em->flush();
                $result = true;
            }
        }

        if($result) {
            $this->get('session')->getFlashBag()->add('success', "La classe a bien été enregistrée");
        }

        return $this->render("CLMBundle:Classe:edit.html.twig", array(
            "form" => $form->createView(),
        ));
    }

    public function detailsAction($idClasse) {
        $classe = $this->getDoctrine()->getRepository("CLMBundle:Classe")->find($idClasse);
        if(!$classe && $idClasse > 0) {
            throw new NotFoundHttpException();
        }
        return $this->render("CLMBundle:Classe:details.html.twig", array(
            "classe" => $classe ? $classe : null,
        ));
    }

    public function listeAction() {
        $classes = $this->getDoctrine()->getRepository("CLMBundle:Classe")->findAll();
        return $this->render("CLMBundle:Classe:liste.html.twig", array(
            'classes' => $classes,
        ));
    }

}