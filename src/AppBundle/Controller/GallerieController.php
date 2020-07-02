<?php

namespace AppBundle\Controller;

use AppBundle\Entity\Gallerie;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Component\HttpFoundation\Request;

/**
 * Gallerie controller.
 *
 * @Route("gallerie")
 */
class GallerieController extends Controller
{
    /**
     * Lists all gallerie entities.
     *
     * @Route("/", name="gallerie_index")
     * @Method("GET")
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $galleries = $em->getRepository('AppBundle:Gallerie')->findAll();

        return $this->render('gallerie/index.html.twig', array(
            'galleries' => $galleries,
        ));
    }

    /**
     * Creates a new gallerie entity.
     *
     * @Route("/new", name="gallerie_new")
     * @Method({"GET", "POST"})
     */
    public function newAction(Request $request)
    {
        $gallerie = new Gallerie();
        $form = $this->createForm('AppBundle\Form\GallerieType', $gallerie);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($gallerie);
            $em->flush();

            return $this->redirectToRoute('gallerie_show', array('id' => $gallerie->getId()));
        }

        return $this->render('gallerie/new.html.twig', array(
            'gallerie' => $gallerie,
            'form' => $form->createView(),
        ));
    }

    /**
     * Finds and displays a gallerie entity.
     *
     * @Route("/{id}", name="gallerie_show")
     * @Method("GET")
     */
    public function showAction(Gallerie $gallerie)
    {
        $deleteForm = $this->createDeleteForm($gallerie);

        return $this->render('gallerie/show.html.twig', array(
            'gallerie' => $gallerie,
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Displays a form to edit an existing gallerie entity.
     *
     * @Route("/{id}/edit", name="gallerie_edit")
     * @Method({"GET", "POST"})
     */
    public function editAction(Request $request, Gallerie $gallerie)
    {
        $deleteForm = $this->createDeleteForm($gallerie);
        $editForm = $this->createForm('AppBundle\Form\GallerieType', $gallerie);
        $editForm->handleRequest($request);

        if ($editForm->isSubmitted() && $editForm->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('gallerie_edit', array('id' => $gallerie->getId()));
        }

        return $this->render('gallerie/edit.html.twig', array(
            'gallerie' => $gallerie,
            'edit_form' => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Deletes a gallerie entity.
     *
     * @Route("/{id}", name="gallerie_delete")
      * @Method({"DELETE", "GET", "POST"})
     */
    public function deleteAction(Request $request, Gallerie $gallerie)
    {
        $form = $this->createDeleteForm($gallerie);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();

            $em->remove($gallerie);
            $em->flush();
        }

        return $this->redirectToRoute('gallerie_index');
    }

    /**
     * Creates a form to delete a gallerie entity.
     *
     * @param Gallerie $gallerie The gallerie entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm(Gallerie $gallerie)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('gallerie_delete', array('id' => $gallerie->getId())))
            ->setMethod('DELETE')
            ->getForm()
        ;
    }
}
