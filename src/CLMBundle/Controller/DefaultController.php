<?php

namespace CLMBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class DefaultController extends Controller
{
    /**
     * Affichage de la page d'accueil
     * - On teste si l'utilisateur est connecté
     *      -- Oui : on teste son rôle et on affiche la page d'accueil correspondante
     *      -- Non : on le redirige sur la page de connexion
     *
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function indexAction()
    {

        if (!$this->isGranted('IS_AUTHENTICATED_FULLY')) {
            return $this->redirectToRoute('login');
        }
        else {
            if ($this->isGranted('ROLE_ADMIN')) {
                return $this->render('CLMBundle:Admin:index.html.twig', array(

                ));
            }
            elseif ($this->isGranted('ROLE_INTERVENANT')) {
                return $this->render('CLMBundle:Intervenant:index.html.twig', array(

                ));
            }
            elseif ($this->isGranted('ROLE_APPRENANT')) {
                $projets = $this->getDoctrine()->getRepository("CLMBundle:Projet")->findAll();
                return $this->render("CLMBundle:Apprenant:index.html.twig", array(
                    'projets' => $projets,
                ));
            }
        }

        return $this->render('CLMBundle:Default:index.html.twig', array(

        ));
    }
}
