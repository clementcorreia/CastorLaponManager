<?php

namespace CLMBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\Security\Core\Exception\AccessDeniedException;

// TODO
class IntervenantController extends Controller {

    public function listeAction() {

        $intervenants = $this->getDoctrine()->getRepository("UserBundle:Utilisateur")->findByRole('ROLE_INTERVENANT');

        return $this->render("CLMBundle:Intervenant:liste.html.twig", array(
            'intervenants' => $intervenants,
        ));

    }

    public function searchAction($idCampus = 0, $idCompetence = 0, $search = 0) {
        $erCampus = $this->getDoctrine()->getRepository("CLMBundle:Campus");
        $erCompetence = $this->getDoctrine()->getRepository("CLMBundle:Competence");
        $intervenants = $this->getDoctrine()->getRepository("UserBundle:Utilisateur")->findByRole('ROLE_INTERVENANT');

        $all_campus = $erCampus->findAll();
        $all_competences = $erCompetence->findAll();
        $tab_intervenants = array();

        if($search === 0 && $idCampus <= 0 && $idCompetence <= 0) {
            $tab_intervenants = $intervenants;
        }
        else {
            $intervenants = $this->getDoctrine()->getRepository("UserBundle:Utilisateur")->findCoachBySearch($search);
            $test = true;

            if ($idCampus > 0) {
                $campus = $erCampus->find($idCampus);
                if (!$campus) {
                    $test = false;
                }
            }
            if ($idCompetence > 0) {
                $competence = $erCompetence->find($idCompetence);
                if (!$competence) {
                    $test = false;
                }
            }

            if ($test) {
                foreach ($intervenants as $coach) {
                    if ($idCampus > 0 && $idCompetence <= 0) {
                        if ($coach->getCampus() == $campus) {
                            $tab_intervenants[] = $coach;
                        }
                    } else if ($idCampus <= 0 && $idCompetence > 0) {
                        if ($coach->containsCompetence($competence)) {
                            $tab_intervenants[] = $coach;
                        }
                    } else if ($idCampus > 0 && $idCompetence > 0) {
                        if ($coach->getCampus() == $campus && $coach->containsCompetence($competence)) {
                            $tab_intervenants[] = $coach;
                        }
                    }
                }
            }
        }

        return $this->render("CLMBundle:Intervenant:liste.html.twig", array(
            'intervenants' => $tab_intervenants,
            'idCampus' => $idCampus,
            'idCompetence' => $idCompetence,
            'search' => $search,
            'tab_competences' => $all_competences,
            'tab_campus' => $all_campus,
        ));

    }

}
