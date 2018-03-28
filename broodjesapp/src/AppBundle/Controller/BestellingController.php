<?php

namespace AppBundle\Controller;

use AppBundle\Entity\Bestelling;
use AppBundle\Entity\Soep;
use AppBundle\Entity\Supplement;
use AppBundle\Entity\Brood;
use AppBundle\Entity\Beleg;
use AppBundle\Service\BestellingService;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Symfony\Component\HttpFoundation\Request;

class BestellingController extends Controller
{

    private $bestelling;

    public function __construct(BestellingService $bestellingService)
    {

        $this->bestellingService = $bestellingService;
    }
    /**
     * @Route("/", name="bestelling_index")
     */
    public function indexAction()
    {
        $today = date('N');
        
        $em = $this->getDoctrine()->getManager();
        $beleg = $em->getRepository('AppBundle:Beleg')->findAll();
        $soepvdag = $em->getRepository('AppBundle:Soep')->findBy(['id' => $today]);
        $bestellingen = array();
        
        return $this->render('bestelling/index.html.twig', [
            'bestellingen' => $bestellingen,
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
    public function newAction(Request $request)
    {
        $beleg = new Beleg();
        $brood = new Brood($beleg);
        $bestelling = new Bestelling($brood);
        
        $form = $this->createForm('AppBundle\Form\BestellingType', $bestelling);
        $form->handleRequest($request);
        
        if ($form->isSubmitted() && $form->isValid()) {
            $this->BestellingService->persist($bestelling);

            return $this->redirectToRoute('/');
        }

        return $this->render('bestelling/new.html.twig', array(
            'bestelling' => $bestelling,
            'form' => $form->createView(),
        ));
    }
    
    /**
     * Displays a form to edit an existing Bestelling entity.
     *
     * @Route("/{id}/edit", name="bestelling_edit")
     * @Method({"GET", "POST"})
     */
    public function editAction(Request $request, Bestelling $bestelling)
    {
        $deleteForm = $this->createDeleteForm($bestelling);
        $editForm = $this->createForm('AppBundle\Form\BestellingType', $bestelling);
        $editForm->handleRequest($request);

        if ($editForm->isSubmitted() && $editForm->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('bestelling_edit', array('id' => $bestelling->getId()));
        }

        return $this->render('bestelling/edit.html.twig', array(
            'bestelling' => $bestelling,
            'edit_form' => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Deletes a Bestelling entity.
     *
     * @Route("/{id}", name="bestelling_delete")
     * @Method("DELETE")
     */
    public function deleteAction(Request $request, Bestelling $bestelling)
    {
        $form = $this->createDeleteForm($bestelling);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->remove($bestelling);
            $em->flush();
        }

        return $this->redirectToRoute('bestelling_index');
    }

}