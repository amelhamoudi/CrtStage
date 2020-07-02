<?php

namespace AppBundle\Controller;

use AppBundle\Entity\CrtInfo;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;use Symfony\Component\HttpFoundation\Request;

/**
 * Crtinfo controller.
 *
 * @Route("crtinfo")
 */
class CrtInfoController extends Controller
{
    /**
     * Lists all crtInfo entities.
     *
     * @Route("/", name="crtinfo_index")
     * @Method("GET")
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $crtInfos = $em->getRepository('AppBundle:CrtInfo')->findAll();

        return $this->render('crtinfo/index.html.twig', array(
            'crtInfos' => $crtInfos,
        ));
    }

    /**
     * Creates a new crtInfo entity.
     *
     * @Route("/new", name="crtinfo_new")
     * @Method({"GET", "POST"})
     */
    public function newAction(Request $request)
    {
        $crtInfo = new Crtinfo();
        $form = $this->createForm('AppBundle\Form\CrtInfoType', $crtInfo);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($crtInfo);
            $em->flush();

            return $this->redirectToRoute('crtinfo_show', array('id' => $crtInfo->getId()));
        }

        return $this->render('crtinfo/new.html.twig', array(
            'crtInfo' => $crtInfo,
            'form' => $form->createView(),
        ));
    }

    /**
     * Finds and displays a crtInfo entity.
     *
     * @Route("/{id}", name="crtinfo_show")
     * @Method("GET")
     */
    public function showAction(CrtInfo $crtInfo)
    {
        $deleteForm = $this->createDeleteForm($crtInfo);

        return $this->render('crtinfo/show.html.twig', array(
            'crtInfo' => $crtInfo,
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Displays a form to edit an existing crtInfo entity.
     *
     * @Route("/{id}/edit", name="crtinfo_edit")
     * @Method({"GET", "POST"})
     */
    public function editAction(Request $request, CrtInfo $crtInfo)
    {
        $deleteForm = $this->createDeleteForm($crtInfo);
        $editForm = $this->createForm('AppBundle\Form\CrtInfoType', $crtInfo);
        $editForm->handleRequest($request);

        if ($editForm->isSubmitted() && $editForm->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('crtinfo_edit', array('id' => $crtInfo->getId()));
        }

        return $this->render('crtinfo/edit.html.twig', array(
            'crtInfo' => $crtInfo,
            'edit_form' => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Deletes a crtInfo entity.
     *
     * @Route("/{id}", name="crtinfo_delete")
     * @Method("DELETE")
     */
    public function deleteAction(Request $request, CrtInfo $crtInfo)
    {
        $form = $this->createDeleteForm($crtInfo);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->remove($crtInfo);
            $em->flush();
        }

        return $this->redirectToRoute('crtinfo_index');
    }

    /**
     * Creates a form to delete a crtInfo entity.
     *
     * @param CrtInfo $crtInfo The crtInfo entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm(CrtInfo $crtInfo)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('crtinfo_delete', array('id' => $crtInfo->getId())))
            ->setMethod('DELETE')
            ->getForm()
        ;
    }
}
