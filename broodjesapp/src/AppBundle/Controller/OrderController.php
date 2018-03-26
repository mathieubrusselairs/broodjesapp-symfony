<?php

namespace AppBundle\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;

class OrderController extends Controller
{
    /**
     * @Route("/", name="order")
     */
    public function indexAction()
    {
        $today = date('N');
        
        $em = $this->getDoctrine()->getManager();
        $beleg = $em->getRepository('AppBundle:Beleg')->findAll();
        $soepvdag = $em->getRepository('AppBundle:Soep')->findBy(['id' => $today]);
        
        return $this->render('default/index.html.twig', [
            'beleg' => $beleg,
        ]);    
    }
}