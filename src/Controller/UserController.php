<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Request;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\Security\Core\Encoder\UserPasswordEncoderInterface;
use App\Entity\Client;
use App\Entity\Formation;
use App\Entity\Loisir;
use App\Entity\Experience;
use App\Entity\Langue;

use App\Entity\Competence;




class UserController extends AbstractController
{
    /**
     * @Route("/user ", name="user") 
     */
    public function index(): Response
    {
        return $this->render('front_chaimae/frontend/user.html.twig', [
            'controller_name' => 'UserController',
            'client' => $this->getUser(),
            
        ]);
    }

       /**
            * @Route("/edituser", name="edituser") 
            * @return response
            */
            public function EditProfile(Request $request, EntityManagerInterface $manager,UserPasswordEncoderInterface $encoder)
            {
             $client = $this->getUser();
             $repo = $this->getDoctrine()->getRepository(Client::class);
            $client->setName($request->request->get("name"));
            $client->setPrenom($request->request->get("prenom"));
            $client->setTelephone($request->request->get("telephone"));
            $client->setPassword($request->request->get("password"));
           // $hash = $encoder->encodePassword($client , $client->getPassword());
           $hash = $encoder->encodePassword($client , $client->getPassword());
           $client->setPassword($hash);

                 $manager->persist($client);
                 $manager->flush();
                 return $this->render('front_chaimae/frontend/user.html.twig', [
                    'controller_name' => 'LoginController', 
                    'client' =>  $this->getUser() , 
                    ]);
   
            } 

              /**
     * @Route("/formations/{id}/delete", name="deleteForm")
     */
     public function deleteForm(Formation $formation , EntityManagerInterface $manager)
     {
        $client = $this->getUser();
        $client->removeIdFormation($formation);
         $manager->remove($formation);
         $manager ->flush();
         return $this->redirectToRoute('user');
 
     }

      /**
     * @Route("/experience/{id}/delete", name="deleteEx")
     */
    public function deleteEx(Experience $experience , EntityManagerInterface $manager)
    {
       $client = $this->getUser();
       $client->removeIdExperience($experience);
        $manager->remove($experience);
        $manager ->flush();
        return $this->redirectToRoute('user');

    }
     /**
     * @Route("/competence/{id}/delete", name="deleteComp")
     */
    public function deletecomp(Competence $competence , EntityManagerInterface $manager)
    {
       $client = $this->getUser();
       $client->removeIdCompetence($competence);
        $manager->remove($competence);
        $manager ->flush();
        return $this->redirectToRoute('user');

    }
    /**
     * @Route("/loisir/{id}/delete", name="deleteLoi")
     */
    public function deleteLoi(Loisir $loisir , EntityManagerInterface $manager)
    {
       $client = $this->getUser();
       $client->removeIdLoisir($loisir);
        $manager->remove($loisir);
        $manager ->flush();
        return $this->redirectToRoute('user');

    }


}
