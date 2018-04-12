<?php

namespace CLMBundle\Controller;

use CLMBundle\Form\TicketType;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;
use Symfony\Component\Security\Core\Exception\AccessDeniedException;

class TicketController extends Controller {

    public function editAction(Request $request, $idTicket) {
        $ticket = null;
        if(!is_null($idTicket) && $idTicket > 0)
            $ticket = $this->getDoctrine()->getRepository("CLMBundle:Ticket")->find($idTicket);

        $form = $this->createForm("CLMBundle\Form\TicketType", $ticket,array(
            'method' => 'POST',
            'action' => $this->generateUrl('clm_ticket_edit', array('idTicket' => $idTicket))
        ));

        $form->handleRequest($request);

        if ($form->isSubmitted()) {
            if ($form->isValid()) {
                $ticket = $form->getData();
                $em = $this->getDoctrine()->getManager();
                $em->persist($ticket);
                $em->flush();
            }
        }

        return $this->render("CLMBundle:Ticket:edit.html.twig", array(
            "form" => $form->createView(),
        ));
    }

    public function detailsAction($idTicket) {
        $ticket = $this->getDoctrine()->getRepository("CLMBundle:Ticket")->find($idTicket);
        if(!$ticket && $idTicket > 0) {
            throw new NotFoundHttpException();
        }
        return $this->render("CLMBundle:Ticket:details.html.twig", array(
            "ticket" => $ticket ? $ticket : null,
        ));
    }

    public function listeAction() {
        $tickets = $this->getDoctrine()->getRepository("CLMBundle:Ticket")->findAll();
        return $this->render("CLMBundle:Ticket:liste.html.twig", array(
            'tickets' => $tickets,
        ));
    }

}