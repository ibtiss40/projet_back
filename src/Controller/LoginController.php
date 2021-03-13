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
    return $this->render('front_chaimae/accueil.html.twig', [
        'controller_name' => 'LoginController', ]);
    }

 /**
     * @Route("/Deconnexion" , name="Deconnexion")
     */
    public function Deconnection()
    {
        $this->Client->delete;
    }

    /**
            * @Route("/inscription", name="inscription") 
            * @return response
            */
            public function inscr(Request $request, EntityManagerInterface $manager,UserPasswordEncoderInterface $encoder)
            {
                

               // $x = $request->request->get("image");
             $client= new Client();
             $repo = $this->getDoctrine()->getRepository(Client::class);
            $client->setName($request->request->get("name"));
            $client->setPrenom($request->request->get("prenom"));
            $client->setTelephone($request->request->get("phone"));
            $client->setBio($request->request->get("bio"));
            $client->setAdress($request->request->get("adress"));
            $client->setDateBirth($request->request->get("birth"));
           // $client->setImage($request->request->get("image"));
            $client->setEmail($request->request->get("email"));
            $client->setPassword($request->request->get("pass"));
           // $hash = $encoder->encodePassword($client , $client->getPassword());
           $hash = $encoder->encodePassword($client , $client->getPassword());
           $client->setPassword($hash);
           if($request->files->get('image') != null){
            $file = md5(uniqid()).'.'.$request->files->get('image')->getClientOriginalExtension();
            $request->files->get('image')->move(
                $this->getParameter('images_directory'),
                $file
            );
            $client->setImage('/files_telecharger/'.$file);
        }

                 $manager->persist($client);
                 $manager->flush();
                 return $this->render('front_chaimae/accueil.html.twig', [
                    'controller_name' => 'LoginController',
                     ]);
   
            }  
    
}
