<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class SpecificationCvController extends AbstractController
{
    /**
     * @Route("/specification/cv", name="specification_cv")
     */
    public function index(): Response
    {
        return $this->render('front_chaimae/specification_cv/index.html.twig', [
            'controller_name' => 'SpecificationCvController',
        ]);
    }
}
