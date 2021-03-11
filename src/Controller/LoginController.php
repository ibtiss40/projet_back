<?php

namespace App\Controller;

use App\Entity\Client;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Security\Core\Encoder\UserPasswordEncoderInterface;
use Symfony\Component\Security\Http\Authentication\AuthenticationUtils;
use Doctrine\ORM\EntityManagerInterface;



class LoginController extends AbstractController
{
    
     /**
     * @Route("/login", name="login", methods={"GET", "POST"})
     */
    public function login(AuthenticationUtils $authenticationUtils)
    {

    // last username entered by the user
    $lastUsername = $authenticationUtils->getLastUsername();
    

    return $this->render('back_end/login.html.twig');
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
            $client->setPrenom($request->request->get("prenom"));
            $client->setTelephone($request->request->get("phone"));
            $client->setBio($request->request->get("bio"));
            $client->setAdress($request->request->get("adress"));
            $client->setDateBirth($request->request->get("birth"));
            $client->setEmail($request->request->get("email"));
            $client->setPassword($request->request->get("pass"));
            $client->setGenre($request->request->get("genre"));
           // $hash = $encoder->encodePassword($client , $client->getPassword());
           $hash = $encoder->encodePassword($client , $client->getPassword());
           $client->setPassword($hash);

                 $manager->persist($client);
                 $manager->flush();
                 return $this->render('back_end/login.html.twig', [
                    'controller_name' => 'LoginController', ]);
   
            }  
    
}
