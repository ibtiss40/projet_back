<?php

namespace App\Controller;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use App\Repository\ExperienceRepository;
use App\Repository\FormationRepository;
use Symfony\Component\HttpFoundation\Request;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\Validator\Constraints\DateTimeInterface;
use DateTime;
use App\Entity\Client;
use Symfony\Component\Validator\Constraints;
use App\Entity\Experience;
use App\Entity\Formation;
use App\Entity\Competence;
use App\Repository\CompetenceRepository;
use App\Entity\Loisir;
use App\Repository\LoisirRepository;
use App\Entity\Langue;
use App\Repository\LangueRepository;
use Symfony\Component\HttpFoundation\Session\Session;







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
            public function AddExperience( Request $request, EntityManagerInterface $manager )
            {   
                $client = new Client();
                 $pieces = [] ;
                for( $i = 0 ; $i <=  count((array)$request->request->get('experiance')[0]) - 1; $i ++){
                   
                    $pieces1 = [] ;
                    $pieces1 = explode("DebutEx", $request->request->get('experiance')[$i]);
                    for ($o=1; $o < count($pieces1)  ; $o++) { 
                      $pieces = substr($pieces1[$o], 0, strlen($pieces1[$o]));
                     $pieces = explode(" - ",substr($pieces, 0));
                        $tempEx = new Experience();
                        $tempEx->setSociete($pieces[0]);
                        $tempEx->setDateFin(new DateTime($pieces[1]));
                        $tempEx->setDateDebut(new DateTime($pieces[2]));
                        $tempEx->setDescription($pieces[3]); 
                        $manager = $this->getDoctrine()->getManager();
                        $client = $manager->getRepository(Experience::class);
                        $tempEx->setIdClient($this->getUser());
                        $manager->persist($tempEx);
                    }
                } $manager->flush();


                 return $this->redirectToRoute('c_v');
            }  
             /**
            * @Route("/AddFormation", name="AddFormation")
            * @return response
            */
            
            public function AddFormation( Request $request, EntityManagerInterface $manager )
            {   
                $client = new Client();
                
                 $pieces = [] ;
               // dump($request->request->get("formation"));
                for( $i = 0 ; $i <=  count((array)$request->request->get('formation')[0]) - 1; $i ++){
                     $pieces1 = [] ;
                    $pieces1 = explode("DebutFr", $request->request->get('formation')[$i]);
                    for ($o=1; $o < count($pieces1)  ; $o++) { 
                      $pieces = substr($pieces1[$o], 0, strlen($pieces1[$o]));
                     $pieces = explode(" - ",substr($pieces, 0, -1));
                        $tempFr = new Formation();
                        $tempFr->setSociete($pieces[0]);
                        $tempFr->setDateFin(new DateTime($pieces[1]));
                        $tempFr->setDateDebut(new DateTime($pieces[2]));
                        $tempFr->setDescription($pieces[3]);

                        $manager = $this->getDoctrine()->getManager();
                        $client = $manager->getRepository(Formation::class);
                       $tempFr->setClient($this->getUser());
                         $manager->persist($tempFr);

                    }
                  
                }
                $manager->flush();

                return $this->redirectToRoute('c_v');
   
            }  


             /**
            * @Route("/AddCompetence", name="AddCompetence")
            * @Route("/AddCompetence/{id}", name="AddCompetenceID")
            * @return response
            */
            public function AddCompetence( Request $request, EntityManagerInterface $manager )
            {
              $client = new Client();
                $pieces = [] ;
                            // dump($request->request->get("competence"));
                 for( $i = 0 ; $i <=  count((array)$request->request->get('competence')[0]) - 1; $i ++){
                      $pieces1 = [] ;
                     $pieces1 = explode("DebutCom", $request->request->get('competence')[$i]);
                     for ($o=1; $o < count($pieces1)  ; $o++) { 
                       $pieces = substr($pieces1[$o], 0, strlen($pieces1[$o]));
                      $pieces = explode(" - ",substr($pieces, 0, -1));
                         $tempCom = new Competence();
                         $tempCom->setTitre($pieces[1]);
                       
                         $manager = $this->getDoctrine()->getManager();
                         $client = $manager->getRepository(Competence::class);
                       // $client->addIdCompetence($tempCom);
                        $tempCom->setClient($this->getUser());
                          $manager->persist($tempCom);
 
                     }
                   
                 }
                
       $manager->flush();

           
       return $this->redirectToRoute('c_v');

                
                }


                 /**
            * @Route("/AddLangue", name="AddLangue")
            * @return response
            */
            public function AddLangue(Request $request, EntityManagerInterface $manager )
            {
                $client = new Client();
             
                $pieces = [] ;
                // dump($request->request->get("langue"));
                 for( $i = 0 ; $i <=  count((array)$request->request->get('langue')[0]) - 1; $i ++){
                      $pieces1 = [] ;
                     $pieces1 = explode("DebutLan", $request->request->get('langue')[$i]);
                     for ($o=1; $o < count($pieces1)  ; $o++) { 
                       $pieces = substr($pieces1[$o], 0, strlen($pieces1[$o]));
                      $pieces = explode(" - ",substr($pieces, 0, -1));
                         $tempLan = new Langue();
                         $tempLan->setTitre($pieces[1]);
                         $tempLan->setDescription($pieces[2]);


                         $manager = $this->getDoctrine()->getManager();
                         $client = $manager->getRepository(Langue::class);
                        $tempLan->setClient($this->getUser());
                          $manager->persist($tempLan);
 
                     }
                   
                 }
                 
       $manager->flush();

           
       return $this->redirectToRoute('c_v');

                
                }




                 /**
            * @Route("/AddLoisir", name="AddLoisir")
            * @return response
            */
            public function AddLoisir(Request $request, EntityManagerInterface $manager )
            {
                $client = new Client();
             
                $pieces = [] ;
                // dump($request->request->get("loisir"));
                 for( $i = 0 ; $i <=  count((array)$request->request->get('loisir')[0]) - 1; $i ++){
                      $pieces1 = [] ;
                     $pieces1 = explode("DebutLoi", $request->request->get('loisir')[$i]);
                     for ($o=1; $o < count($pieces1)  ; $o++) { 
                       $pieces = substr($pieces1[$o], 0, strlen($pieces1[$o]));
                      $pieces = explode(" - ",substr($pieces, 0, -1));
                         $tempLoi = new Loisir();
                         $tempLoi->setTitre($pieces[1]);
                         $id=1;
                         $manager = $this->getDoctrine()->getManager();
                         $client = $manager->getRepository(Loisir::class);
                        $tempLoi->setClient($this->getUser());
                          $manager->persist($tempLoi);
                     }
                   
                 }
                 
       $manager->flush();

           
       return $this->redirectToRoute('c_v');

                
                }
}