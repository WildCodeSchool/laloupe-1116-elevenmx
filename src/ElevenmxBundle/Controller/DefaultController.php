<?php

namespace ElevenmxBundle\Controller;

use ElevenmxBundle\Form\MailType;
use ElevenmxBundle\Entity\Mail;
use ElevenmxBundle\Repository\MailRepository;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Form\FormTypeInterface;
use  Symfony\Component\Form\ResolvedFormTypeInterface;
use Symfony\Component\Form\Form;

class DefaultController extends Controller
{
    public function indexAction()
    {
        return $this->render('ElevenmxBundle:Default:index.html.twig');
    }

    public function redirectionAction()
    {
        return $this->render('ElevenmxBundle:Default:formMail.html.twig');
    }
// ******************************* envoi de mail **********************************
    public function sendMailAction()
    {
        $request = $this->get('request');
        $mail = new Mail();
        $form = $this->createForm(new MailType(), $mail);
        $form->handleRequest($request);
        if ($form->isSubmitted()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($mail);
            $em->flush();


            $message = \Swift_Message::newInstance()
                ->setSubject('hello mail')
                ->setFrom('javadescavernes38@gmail.com')
                ->setTo('javadescavernes38@gmail.com')
                ->setBody(
                    $this->renderView(
                        'Emails/registration.html.twig',
                        array('mail' => $mail)
                    )
                );
            $this->get('mailer')->send($message);


            return $this->render('ElevenmxBundle:Default:formMail.html.twig', array(

                'form' => $form->createView()

            ));

        }

        return $this->render('ElevenmxBundle:Default:formMail.html.twig', array(

            'form' => $form->createView()

        ));


}












            /* $message = \Swift_Message::newInstance('Test')
                 ->setSubject($Subject)
                 ->setFrom('javadescavernes38@gmail.com')
                 ->setTo('javadescavernes38@gmail.com')
                 ->setBody($body);

             $this->get('mailer')->send($message);

             return $this->render('ElevenmxBundle:Default:formMail.html.twig');*/





        // fin envoi BDD ******************************************************

     /*   $Request = $this->getRequest();
        if ($Request->getMethod() == "POST") {
            $Subject = $Request->get("Subject");
            $message = $Request->get("message") . " " . $Request->get("Nom") . " " . $Request->get("Prénom") . " " . $Request->get("mail") . " " . $Request->get("Téléphone") . " " . $Request->get("Entreprise") . " " . $Request->get("Login") . " " . $Request->get("Password");


            $message = \Swift_Message::newInstance('Test')
                ->setSubject('Votre inscription ElevenMx')
                ->setFrom('javadescavernes38@gmail.com')
                ->setTo('javadescavernes38@gmail.com')
                ->setBody($message);
            $this->get('mailer')->send($message);


            return $this->render('ElevenmxBundle:Default:formMail.html.twig');

        }
        return array(
            'form' => $form->createView()
        );*/





    // ******************************** fin d'envoi de mail ****************************************************



}
