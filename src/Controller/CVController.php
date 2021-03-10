<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use App\Entity\Experience;
use App\Repository\ExperienceRepository;
use Symfony\Component\HttpFoundation\Request;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\Validator\Constraints\DateTimeInterface;
use DateTime;
use App\Entity\Client ;
use Symfony\Component\Validator\Constraints;


class CVController extends AbstractController
{
    /**
     * @Route("/cvChaimae", name="c_v")
     * 
     */
    public function index(): Response
    {
        return $this->render('front_chaimae/cv/index.html.twig', [
            'controller_name' => 'CVController', 
        ]);
    }
     /**
            * @Route("/AddExperience", name="AddExperience")
            * @return response
            */
            public function AddExperience(Request $request, EntityManagerInterface $manager )
            {
                $client = new Client();
                
                 $pieces = [] ;
                 dump($request->request->get("experiance"));
                for( $i = 0 ; $i <=  count((array)$request->request->get('experiance')[0]) - 1; $i ++){
                   
                    $pieces1 = [] ;
                    $pieces1 = explode("DebutEx", $request->request->get('experiance')[$i]);
                    for ($o=1; $o < count($pieces1)  ; $o++) { 
                      $pieces = substr($pieces1[$o], 0, strlen($pieces1[$o]));
                     $pieces = explode(" - ",substr($pieces, 0, -1));
                        $tempEx = new Experience();
                        $tempEx->setSociete($pieces[0]);
                        $tempEx->setDateFin(new DateTime($pieces[1]));
                        $tempEx->setDateDebut(new DateTime($pieces[2]));
                        $tempEx->setDescription($pieces[3]);
                        $client->addIdExperience($tempEx);
                    }
                    
                    

                    
                }
                
                for ($i=0; $i < count($client->getIdExperience()) ; $i++) { 
                    dump($client->getIdExperience()[$i]->getSociete());
                }
                die;
            //  $experience= new Experience();
            //  $repo = $this->getDoctrine()->getRepository(Experience::class);
            // $experience->setSociete($request->request->get("societe"));
            // $experience->setDescription($request->request->get("desc"));
            // $experience->setDateDebut(new DateTime($request->request->get("db")));
                
            // $experience->setDateFin(new DateTime($request->request->get("df")));
            


          
            //      $manager->persist($experience);
            //      $manager->flush();
                 return $this->redirectToRoute('liste_clients');
   
            }  
}
