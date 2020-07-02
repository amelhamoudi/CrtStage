<?php

namespace AppBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\File\UploadedFile;

class DefaultController extends Controller
{







    /**
     * @Route("/", name="homepage")
     */
    public function indexAction(Request $request)
    {

         {
                $em = $this->getDoctrine()->getManager();
                $categories= $em->getRepository('AppBundle:Categorie')->findAll();
                $events = $em->getRepository('AppBundle:Event')->findAll();
                $collaborateurs=$em->getRepository('AppBundle:Collaborateur')->findAll();
                $membres = $em->getRepository('AppBundle:Membre')->findAll();
                $formations = $em->getRepository('AppBundle:Formation')->findAll();
                $crtInfos = $em->getRepository('AppBundle:CrtInfo')->findAll();
                $jours = $em->getRepository('AppBundle:jour')->findAll();
                return $this->render('default/index.html.twig', array(
                    'categories' => $categories,
                    'events' => $events,
                    'collaborateurs' => $collaborateurs,
                    'membres' => $membres,
                    'formations' => $formations,
                    'crtInfos' => $crtInfos,
                    'jours' => $jours,

                ));
            }
    }




    /**
     * @Route("/like", name="like")
     */
    public function likeAction(Request $request)
    {
                $em = $this->getDoctrine()->getManager();
                $info= $em->getRepository('AppBundle:CrtInfo')->find(1);
                $info->setNbrJaime($info->getNbrJaime()+1);
                $em->persist($info);
                $em->flush();
                return new JsonResponse($info->getNbrJaime());
    }




 /**
     * @Route("/journe", name="journepage")
     */
    public function JourneAction(Request $request)
    {

         {
                $em = $this->getDoctrine()->getManager();

                $jours = $em->getRepository('AppBundle:jour')->findAll();
                return $this->render('default/jourtest.html.twig', array(

                    'jours' => $jours,

                ));
            }
    }




     /**
         * @Route("/message1", name="message_index")
         */
        public function messageAction(Request $request)
        {

             {
                    $em = $this->getDoctrine()->getManager();


                    return $this->render('message/new.html.twig');
                }
        }

/**
     * @Route("/contact", name="contact_page")
     */
    public function contacteAction(Request $request)
    {

         {
                $em = $this->getDoctrine()->getManager();


                return $this->render('default/contact.html.twig');
            }
    }







     /**
         * @Route("/media2", name="Media2page")
         */
        public function index2Action(Request $request)
        {

             {
                    $em = $this->getDoctrine()->getManager();
                    $events = $em->getRepository('AppBundle:Event')->findAll();
                    return $this->render('default/media.html.twig', array(
                    'events' => $events



                    ));
                }
        }





 /**
         * @Route("/formationTest", name="formationtest_page")
         */
        public function formationAction(Request $request)
        {
             {
               $em = $this->getDoctrine()->getManager();
                  $formations = $em->getRepository('AppBundle:Formation')->findAll();
                  return $this->render('default/formation.html.twig', array(
                   'formations' => $formations,
                   ));
                }
        }

 /**
     * @Route("/send/{name}", name="send_mail")
     * @param Request $request
     * @return \Symfony\Component\HttpFoundation\RedirectResponse
     */

public function SendNewsletterAction($name, \Swift_Mailer $mailer)
{
    $message = (new \Swift_Message('Hello Email'))
        ->setFrom('send@example.com')
        ->setTo('recipient@example.com')
        ->setBody(
            $this->renderView(
                // app/Resources/views/Emails/registration.html.twig
                'newsletter/email.html.twig',
                array('name' => $name)
            ),
            'text/html'
        )
        /*
         * If you also want to include a plaintext version of the message
        ->addPart(
            $this->renderView(
                'newsletter/email.txt.twig',
                array('name' => $name)
            ),
            'text/plain'
        )
        */
    ;

    $mailer->send($message);

    // or, you can also fetch the mailer service this way
    // $this->get('mailer')->send($message);

    return $this->redirectToRoute('homepage');
}



 /**
         * @Route("/formationIndex", name="formation2page")
         */
        public function formation2Action(Request $request)
        {

             {
             $em = $this->getDoctrine()->getManager();
             $formations = $em->getRepository('AppBundle:Formation')->findAll();
             $events = $em->getRepository('AppBundle:Event')->findAll();
             return $this->render('default/formation.html.twig', array(
             'formations' => $formations,
             'events' => $events,
                           ));
                }
        }




         /**
                         * @Route("/media3", name="Media3page")
                         */
                        public function indexMedia2Action(Request $request)
                        {

                             {
                                    $em = $this->getDoctrine()->getManager();
                                    $events = $em->getRepository('AppBundle:Event')->findAll();
                                    return $this->render('default/mediatest.html.twig', array(
                                    'events' => $events



                                    ));
                                }
                        }

/**
     * @Route("/team", name="team_page")
     */
    public function headerAction()
    {
        $em = $this->getDoctrine()->getManager();
        $membres = $em->getRepository('AppBundle:Membre')->findAll();
        return $this->render('default/header.html.twig', array(
         'membres' => $membres,
         ));
    }





/**
     * @Route("/defaut2", name="home2page")
     */
    public function indexHomeAction(Request $request)
    {

         {
                $em = $this->getDoctrine()->getManager();
                $events = $em->getRepository('AppBundle:Event')->findAll();
                $categories= $em->getRepository('AppBundle:Categorie')->findAll();
                $crtInfos = $em->getRepository('AppBundle:CrtInfo')->findAll();
                $membres = $em->getRepository('AppBundle:Membre')->findAll();
                $formations = $em->getRepository('AppBundle:Formation')->findAll();
                $collaborateurs=$em->getRepository('AppBundle:Collaborateur')->findAll();
                return $this->render('default/index2.html.twig', array(
                'events' => $events,
                'categories' => $categories,
                'crtInfos' => $crtInfos,
                'membres' => $membres,
                 'formations' => $formations,
                   'collaborateurs' => $collaborateurs,
               ));
            }
    }
/**
     * @Route("/collab", name="collabpage")
     */
    public function teamHomeAction(Request $request)
    {

         {
                $em = $this->getDoctrine()->getManager();

              $collaborateurs=$em->getRepository('AppBundle:Collaborateur')->findAll();
                return $this->render('default/collab.html.twig', array(
                'collaborateurs' => $collaborateurs,
               ));
            }
    }



}
