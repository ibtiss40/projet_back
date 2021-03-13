<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;
use App\Repository\ClientRepository;
use App\Repository\CvRepository;
use App\Repository\PortfolioRepository;
use App\Repository\FormationRepository;
use App\Repository\ExperienceRepository;
use Doctrine\ORM\EntityManagerInterface;
use App\Entity\Client;
use App\Entity\Cv;
use App\Entity\Portfolio;
use Symfony\Component\Security\Core\Encoder\UserPasswordEncoderInterface;



class BackEndController extends AbstractController
{
      

        

    /**
     * @Route("/backend", name="back_end")
     */
    public function index(): Response
    {
        return $this->render('back_end/index.html.twig', [
            'controller_name' => 'BackEndController',
        ]);
    }

    /**
     * @Route("/clients", name="liste_clients")
     */
     public function Client( ClientRepository $repo)
     {
         return $this->render('back_end/Client.html.twig', [
             'clients' => $repo->findAll(),
         ]);
     }

   /**
     * @Route("/clients/{id}/delete", name="deleteC")
     */
     public function deleteC(Client $client , EntityManagerInterface $manager)
     {
         $manager->remove($client);
         $manager ->flush();
         return $this->redirectToRoute('liste_clients');
 
     }

      /**
     * @Route("/cv", name="cv")
     */
    public function cv(ClientRepository $client )
    {
        return $this->render('back_end/cv3.html.twig', [
            'controller_name' => 'BackEndController',
             'client' => $client->find($this->getUser()),
        ]);
    }
    ////////////////////////////////////CV//////////////////


     /**
     * @Route("/gestion_cv", name="gestion_cv")
     */
     public function list_cv( CvRepository $repo)
     {
         return $this->render('back_end/GestionCv.html.twig', [
             'cvs' => $repo->findAll(),

         ]);
     }

   /**
     * @Route("/gestion_cv/{id}/delete", name="deleteCv")
     */
     public function deleteCv(Cv $cv , EntityManagerInterface $manager)
     {
         $manager->remove($cv);
         $manager ->flush();
         return $this->redirectToRoute('gestion_cv');
 
     }

           /**
            * @Route("/AddCv", name="AddCv")
            * @return response
            */
            public function AddCV(Request $request, EntityManagerInterface $manager )
            {
             $cv= new Cv();
             $repo = $this->getDoctrine()->getRepository(Cv::class);
            $cv->setTitre($request->request->get("titre"));
            $cv->setUrl($request->request->get("url"));
          
                 $manager->persist($cv);
                 $manager->flush();
                 return $this->redirectToRoute('gestion_cv');
   
            }  

        ////////////////////////////////////////////////////    
     /**
     * @Route("/gestion_portfolio", name="gestion_portfolio")
     */
     public function list_portfolio( PortfolioRepository $repo)
     {
         return $this->render('back_end/GestionPortfolio.html.twig', [
             'portfolios' => $repo->findAll(),
         ]);
     }

   /**
     * @Route("/gestion_portfolio/{id}/delete", name="deletePortfolio")
     */
     public function deletePortfoloi(Portfolio $portfolio , EntityManagerInterface $manager)
     {
         $manager->remove($portfolio);
         $manager ->flush();
         return $this->redirectToRoute('gestion_portfolio');
 
     }

           /**
            * @Route("/AddPortfolio", name="AddPortfolio")
            * @return response
            */
            public function AddPortfolio(Request $request, EntityManagerInterface $manager )
            {
             $portfolio= new Portfolio();
             $repo = $this->getDoctrine()->getRepository(Portfolio::class);
            $portfolio->setTitre($request->request->get("titre"));
            $portfolio->setUrl($request->request->get("url"));
          
                 $manager->persist($portfolio);
                 $manager->flush();
                 return $this->redirectToRoute('gestion_portfolio');
   
            }  

             /**
     * @Route("/clients/{id}/profile", name="profile.")
     */
     public function proflife(Client $client )
     {
       
        return $this->render('back_end/profile.html.twig');
        }

}
