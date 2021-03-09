<?php

namespace App\Controller;

use App\Entity\Client;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Security\Core\Encoder\UserPasswordEncoderInterface;
use Doctrine\ORM\EntityManagerInterface;



class LoginController extends AbstractController
{
    /**
     * @Route("/login", name="login")
     */
    public function login(): Response
    {
        return $this->render('back_end/login.html.twig', [
            'controller_name' => 'LoginController',
        ]);
    }

    /**
            * @Route("/inscription", name="inscription")
            * @return response
            */
            public function inscr(Request $request, EntityManagerInterface $manager,UserPasswordEncoderInterface $encoder)
            {
             $client= new Client();
             $repo = $this->getDoctrine()->getRepository(Client::class);
            $client->setName($request->request->get("name"));
            $client->setTelephone($request->request->get("phone"));
            $client->setAdress($request->request->get("adress"));
            $client->setDateBirth($request->request->get("birth"));
            $client->setEmail($request->request->get("email"));
            $client->setPassword($request->request->get("pass"));
           // $hash = $encoder->encodePassword($client , $client->getPassword());

                 $manager->persist($client);
                 $manager->flush();
                 return $this->render('back_end/index.html.twig', [
                    'controller_name' => 'LoginController', ]);
   
            }  
    
}
