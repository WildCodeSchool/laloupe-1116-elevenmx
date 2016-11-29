<?php

namespace ElevenmxBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class DefaultController extends Controller
{
    public function indexAction()
    {
        return $this->render('ElevenmxBundle:Default:index.html.twig');
    }
}
