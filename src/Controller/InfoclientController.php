<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class InfoclientController extends AbstractController
{
    /**
     * @Route("/infoclient", name="infoclient")
     */
    public function index(): Response
    {

        
        return $this->render('front_chaimae/infoclient/index.html.twig', [
            'controller_name' => 'InfoclientController',
        ]);

        
    }

    /**
     * @Route("/y", name="y")
     */
    public function test(): Response
    {

        return $this->render('front_chaimae/infoclient/test.html.twig', [
            'controller_name' => 'InfoclientController',
        ]);

        
    }
}
