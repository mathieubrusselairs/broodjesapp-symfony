<?php

namespace AppBundle\Controller;

use AppBundle\Entity\Bestelling;
use AppBundle\Entity\Soep;
use AppBundle\Entity\Supplement;
use AppBundle\Entity\Brood;
use AppBundle\Entity\Beleg;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Symfony\Component\HttpFoundation\Request;

class DashboardController extends Controller
{
    /**
     * @Route("/dashboard", name="dashboard_index")
     */
    public function indexAction()
    {        
        $em = $this->getDoctrine()->getManager();
        $bestellingen = $em->getRepository('AppBundle:Bestelling')->findAll();
        $soepvdag = $em->getRepository('AppBundle:Soep')->findAll();
        $users = $em->getRepository('AppBundle:User')->findAll();
        
        return $this->render('dashboard/index.html.twig', [
            'bestellingen' => $bestellingen,
            'soepvdag' => $soepvdag,
            'users' => $users,
        ]);    
    }
    
    /**
    * @Route("/dashboard/soep/{id}/edit", name="dashboard_soep_edit")
    * @Method({"GET", "POST"})
    */
    public function editAction(Request $request, Soep $soep)
    {
        $editForm = $this->createForm('AppBundle\Form\SoepvdagType', $soep);
        $editForm->handleRequest($request);

        if ($editForm->isSubmitted() && $editForm->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('dashboard_index', array('id' => $bestelling->getId()));
        }

        return $this->render('dashboard/edit.html.twig', array(
            'soep' => $soep,
            'edit_form' => $editForm->createView(),
        ));    
    }
}