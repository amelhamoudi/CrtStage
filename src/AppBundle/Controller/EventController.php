<?php

namespace AppBundle\Controller;

use AppBundle\Entity\Event;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\JsonResponse;
/**
 * Event controller.
 *
 * @Route("event")
 */
class EventController extends Controller
{
    /**
     * Lists all event entities.
     *
     * @Route("/", name="event_index")
     * @Method("GET")
     */
    public function indexAction()
    {
         // you can fetch the EntityManager via $this->getDoctrine()
        $em = $this->getDoctrine()->getManager();

        // find *all* events
        $events = $em->getRepository('AppBundle:Event')->findAll();
         // the template path is the relative file path from `event/index.html.twig`

        return $this->render('event/index.html.twig', array(
        // this array defines the variables passed to the template,
         // where the key is the variable name and the value is the variable value

            'events' => $events,
        ));
    }
    /**
     * Creates a new event entity.
     *
     * @Route("/new", name="event_new")
     * @Method({"GET", "POST"})
     */
    public function newAction(Request $request)
    {
     //creat new instance of entity event
        $event = new Event();
        //creat form
        $form = $this->createForm('AppBundle\Form\EventType', $event);
        //t takes the POST’ed data from the previous request, processes it,
       //  and runs any validation (checks integrity of expected versus received data). it only does this for POST requests

         //Use the form’s handleRequest method to actually process the data
        $form->handleRequest($request);

        // add an if statement that checks to see if the form was submitted and if all of the data is valid

        if ($form->isSubmitted() && $form->isValid()) {
         // you can fetch the EntityManager via $this->getDoctrine()

            $em = $this->getDoctrine()->getManager();
            //then finally persist and flush the new event:
            $em->persist($event);
            //You can also store special messages, called "flash" messages
           // , in the user's session. Intentionally, flash messages are designed
            // for one-time use: they automatically disappear from the session as soon as you retrieve them.
              //This feature makes flash messages particularly ideal for storing user notifications.

            $em->flush();
       //The redirectToRoute () method is simply a shortcut for creating a Response object, which specializes in redirecting the user.
            return $this->redirectToRoute('event_show', array('id' => $event->getId()));
        }

        return $this->render('event/new.html.twig', array(
            'event' => $event,
            'form' => $form->createView(),
        ));
    }

    /**
     * Finds and displays a event entity.
     *
     * @Route("/{id}", name="event_show")
     * @Method("GET")
     */
    public function showAction(Event $event)
    {
        $deleteForm = $this->createDeleteForm($event);

        return $this->render('event/show.html.twig', array(
            'event' => $event,
            'delete_form' => $deleteForm->createView(),
        ));
    }
    /**
     * Finds and displays a event entity.
     *
     * @Route("/gallery/{id}", name="event_gallery")
     * @Method("GET")
     */
    public function galleryAction(Event $event)
    {

        return new JsonResponse([
            "description" => $event->getDescriptionEvent(),
            "title" => $event->getNomEvent(),
            "images" => count($event->getGallerie()) ? $event->getGallerie()->getMedia()->toArray() : []
        ]);
    }

 /**
     * Finds and displays a event entity.
     *
     * @Route("/{id}", name="event_warini")
     * @Method("GET")
     */
    public function WariniAction(Event $event)
    {
        $deleteForm = $this->createDeleteForm($event);

        return $this->render('event/show2.html.twig', array(
            'event' => $event,
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Displays a form to edit an existing event entity.
     *
     * @Route("/{id}/edit", name="event_edit")
     * @Method({"GET", "POST"})
     */
    public function editAction(Request $request, Event $event)
    {
        $deleteForm = $this->createDeleteForm($event);
        $editForm = $this->createForm('AppBundle\Form\EventType', $event);
        $editForm->handleRequest($request);

        if ($editForm->isSubmitted() && $editForm->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('event_edit', array('id' => $event->getId()));
        }

        return $this->render('event/edit.html.twig', array(
            'event' => $event,
            'edit_form' => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Deletes a event entity.
     *
     * @Route("/{id}", name="event_delete")
     * @Method("DELETE")
     */
    public function deleteAction(Request $request, Event $event)
    {
        $form = $this->createDeleteForm($event);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->remove($event);
            $em->flush();
        }

        return $this->redirectToRoute('event_index');
    }

    /**
     * Creates a form to delete a event entity.
     *
     * @param Event $event The event entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm(Event $event)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('event_delete', array('id' => $event->getId())))
            ->setMethod('DELETE')
            ->getForm()
        ;
    }
}
