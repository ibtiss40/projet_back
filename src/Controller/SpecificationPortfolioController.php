<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class SpecificationPortfolioController extends AbstractController
{
    /**
     * @Route("/specification/portfolio", name="specification_portfolio")
     */
    public function index(): Response
    {
        return $this->render('front_chaimae/specification_portfolio/index.html.twig', [
            'controller_name' => 'SpecificationPortfolioController',
        ]);
    }
    
}
