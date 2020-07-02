<?php

namespace AppBundle\Controller;

use AppBundle\Entity\jour;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;use Symfony\Component\HttpFoundation\Request;

/**
 * Jour controller.
 *
 * @Route("jour")
 */
class jourController extends Controller
{
    /**
     * Lists all jour entities.
     *
     * @Route("/", name="jour_index")
     * @Method("GET")
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $jours = $em->getRepository('AppBundle:jour')->findAll();

        return $this->render('jour/index.html.twig', array(
            'jours' => $jours,
        ));
    }

    /**
     * Creates a new jour entity.
     *
     * @Route("/new", name="jour_new")
     * @Method({"GET", "POST"})
     */
    public function newAction(Request $request)
    {
        $jour = new Jour();
        $form = $this->createForm('AppBundle\Form\jourType', $jour);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($jour);
            $em->flush();

            return $this->redirectToRoute('jour_show', array('id' => $jour->getId()));
        }

        return $this->render('jour/new.html.twig', array(
            'jour' => $jour,
            'form' => $form->createView(),
        ));
    }

    /**
     * Finds and displays a jour entity.
     *
     * @Route("/{id}", name="jour_show")
     * @Method("GET")
     */
    public function showAction(jour $jour)
    {
        $deleteForm = $this->createDeleteForm($jour);

        return $this->render('jour/show.html.twig', array(
            'jour' => $jour,
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Displays a form to edit an existing jour entity.
     *
     * @Route("/{id}/edit", name="jour_edit")
     * @Method({"GET", "POST"})
     */
    public function editAction(Request $request, jour $jour)
    {
        $deleteForm = $this->createDeleteForm($jour);
        $editForm = $this->createForm('AppBundle\Form\jourType', $jour);
        $editForm->handleRequest($request);

        if ($editForm->isSubmitted() && $editForm->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('jour_edit', array('id' => $jour->getId()));
        }

        return $this->render('jour/edit.html.twig', array(
            'jour' => $jour,
            'edit_form' => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Deletes a jour entity.
     *
     * @Route("/{id}", name="jour_delete")
     * @Method("DELETE")
     */
    public function deleteAction(Request $request, jour $jour)
    {
        $form = $this->createDeleteForm($jour);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->remove($jour);
            $em->flush();
        }

        return $this->redirectToRoute('jour_index');
    }

    /**
     * Creates a form to delete a jour entity.
     *
     * @param jour $jour The jour entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm(jour $jour)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('jour_delete', array('id' => $jour->getId())))
            ->setMethod('DELETE')
            ->getForm()
        ;
    }
}
