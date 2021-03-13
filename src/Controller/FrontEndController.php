<?php

namespace App\Controller;

use App\Entity\Client;
use App\Repository\ClientRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Security\Core\Encoder\UserPasswordEncoderInterface;


class FrontEndController extends AbstractController
{

    
    #[Route('/front/end', name: 'front_end')]
    public function index(): Response
    {
        return $this->render('front_end/index.html.twig', [
            'controller_name' => 'FrontEndController',
        ]);
    }




             /**
            * @Route("/in", name="in")
            * @return response
            */
            public function in(Request $request, EntityManagerInterface $manager,UserPasswordEncoderInterface $encoder)
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
                 return $this->render('front_end/login.html.twig', [
                    'controller_name' => 'FrontEndController', ]);
   
            }  
      
            /**
            * @Route("/inscriptiona", name="inscriptiona")
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
                 return $this->render('back_chaimae/index.html.twig', [
                    'controller_name' => 'LoginController', ]);
   
            }  


             /**
            * @Route("/in1", name="in1")
            * @return response
            */
            public function in1(Request $request, EntityManagerInterface $manager,UserPasswordEncoderInterface $encoder)
            {
                 
               // dd("testjs");
                
             $client= new Client();
             $repo = $this->getDoctrine()->getRepository(Client::class);
            $client->setName($request->request->get("first_name"));
            $client->setTelephone($request->request->get("tel"));
            $client->setAdress($request->request->get("adresse"));
            $client->setDateBirth($request->request->get("birthdate"));
            $client->setEmail($request->request->get("email"));
            $client->setPassword($request->request->get("password"));
           // $hash = $encoder->encodePassword($client , $client->getPassword());

           $manager->persist($client);
           $manager->flush();

        
           return $this->render('front_chaimae/accueil.html.twig', [
              'controller_name' => 'FrontEndController', ]);
            }  
    
    
    
          
    



                /**
                * @Route("/lo", name="lo")
                */
            public function login(): Response
            {
                return $this->render('front_end/login.html.twig', [
                    'controller_name' => 'FrontEndController',
                ]);
            }

              /**
                * @Route("/inn", name="inn")
                */
                public function inn(): Response
                {
                    return $this->render('front_chaimae/inscriptionn.html.twig', [
                        'controller_name' => 'FrontEndController',
                    ]);
                }

                 /**
                * @Route("/cv1", name="cv1")
                */
                public function cv1(ClientRepository $client)
                {
                    return $this->render('front_chaimae/cv1.html.twig', [
                        'controller_name' => 'FrontEndController',
                        'client' => $client->find($this->getUser()),
                    ]);
                }

                /**
                * @Route("/cv2", name="cv2")
                */
                public function cv2(ClientRepository $client)
                {
                    return $this->render('front_chaimae/cv2.html.twig', [
                        'controller_name' => 'FrontEndController',
                        'client' => $client->find($this->getUser()),
                    ]);
                }

              

           




















}
