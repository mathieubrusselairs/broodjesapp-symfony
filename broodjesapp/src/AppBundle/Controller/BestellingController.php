<?php

namespace AppBundle\Controller;

use AppBundle\Entity\Bestelling;
use AppBundle\Entity\Soep;
use AppBundle\Entity\Supplement;
use AppBundle\Entity\Brood;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;

class BestellingController extends Controller
{
    /**
     * @Route("/", name="bestelling")
     */
    public function indexAction()
    {
        $today = date('N');
        
        $em = $this->getDoctrine()->getManager();
        $beleg = $em->getRepository('AppBundle:Beleg')->findAll();
        $soepvdag = $em->getRepository('AppBundle:Soep')->findBy(['id' => $today]);
        
        return $this->render('default/index.html.twig', [
            'beleg' => $beleg,
            'soepvdag' => $soepvdag,
        ]);    
    }
    
    /**
     * Creates a new Bestelling entity.
     *
     * @Route("/new", name="bestelling_new")
     * @Method({"GET", "POST"})
     */
    public function newAction()
    {
        $bestelling = new Bestelling();
        
        $form = $this->createForm('AppBundle\Form\BestellingType', $bestelling);
        $form->handleRequest($request);
        
        if ($form->isSubmitted() && $form->isValid()) {
            $this->entityManager->persist($bestelling);
            $this->entityManager->flush();

            return $this->redirectToRoute('/');
        }

        return $this->render('bestelling/new.html.twig', array(
            'bestelling' => $bestelling,
            'form' => $form->createView(),
        ));
    }
}