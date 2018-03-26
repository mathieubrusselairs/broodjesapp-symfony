<?php
namespace AppBundle\Controller;
use AppBundle\Entity\Broodje;
use AppBundle\Service\BroodjesService;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
/**
 * @Route("/broodje")
 */
class BroodController extends Controller
{
    private $broodjesService;
    public function __construct(BroodjesService $broodjesService)
    {
        $this->broodjesService = $broodjesService;
    }

    public function showBroodjes() 
    {
        $broodje = new Broodje();
        $form = $this->createForm('AppBundle\Form\BroodjesType', $broodje);


    }
}


