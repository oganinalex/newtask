<?php

namespace Acme\HelloBundle\Controller;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Response;

class HelloController extends Controller
{
    public function indexAction($name)
    {
      
        return $this->render('AcmeHelloBundle:Default:index.html.twig', array('name' => $name));
    }
}