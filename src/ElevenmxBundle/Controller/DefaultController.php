<?php

namespace ElevenmxBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;

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

        $Request = $this->getRequest();
        if ($Request->getMethod() == "POST") {
            $Subject = $Request->get("Subject");
            $message = $Request->get("message") . " " . $Request->get("Nom") . " " . $Request->get("Prénom") . " " . $Request->get("Mail") . " " . $Request->get("Téléphone") . " " . $Request->get("Entreprise") . " " . $Request->get("Login") . " " . $Request->get("Password");



            $message = \Swift_Message::newInstance('Test')
                ->setSubject($Subject)
                ->setFrom('javadescavernes38@gmail.com')
                ->setTo('javadescavernes38@gmail.com')
                ->setBody($message);
            $this->get('mailer')->send($message);


            return $this->render('ElevenmxBundle:Default:formMail.html.twig');

        }
        return $this->render('ElevenmxBundle:Default:formMail.html.twig');

    }

    // ******************************** fin d'envoi de mail ****************************************************
}
