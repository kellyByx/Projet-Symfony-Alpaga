<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use App\Repository\PaysRepository;
use App\Repository\VilleRepository;
use App\Entity\Pays;
use App\Entity\Ville;
use Symfony\Component\Serializer\Normalizer\AbstractNormalizer;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Serializer\SerializerInterface;

class RechercheVisitesController extends AbstractController
{
   //test 1:

   #[Route("/visites", name: 'visites')]
   public function visites(PaysRepository $paysRepository, VilleRepository $villeRepository): Response
   {
       //filtre:
       $em =$this->getDoctrine()->getManager();

       $repoPays = $em->getRepository(Pays::class);
       $repoVille = $em->getRepository(Ville::class);

       $desPays = $repoPays->findAll();
       $villes = $repoVille->findAll();
       dump($desPays);

       $vars = [

           'desPays'=>$desPays,
           'villes'=>$villes,
       ];
     //  vardump($vars);
       dump($vars);
       return $this->render("recherche_visites/visites.html.twig",$vars);
   }

  //test2:
  // #[Route("/visites", name: 'visites')]
  // public function visites(): Response
  // {
  //     // filtre:
  //      $em = $this->getDoctrine()->getManager();

  //      $repoPays = $em->getRepository(Pays::class);
  //      $repoVille = $em->getRepository(Ville::class);

  //      return $this->render("front/visites.html.twig", [
  //         'desPays' => $repoPays->findAll(),
  //         'villes' => $repoVille->findAll(),
  //      ]);
  // }
  
  //test3:
  // #[Route("/visites", name: 'visites')]
  // public function visites( PaysRepository $paysRepository, VilleRepository $villeRepository): Response
  // {
     
  //     return $this->render("front/visites.html.twig", [
  //         'desPays' => $paysRepository->findAll(),
  //         'villes'=> $villeRepository->findAll(),
  //     ]);

     
  // }

  #[Route('ajax/axios/traitement/pays/visites', name:'traitement_pays_visites')]
  public function traitementPaysVisites(Request $req, SerializerInterface $serializer)
  {

     $paysId = $req->get('Pays');
     dump($paysId);
     $em = $this->getDoctrine()->getManager();
     $query = $em->createQuery ('SELECT pays, villes FROM App\Entity\Pays pays ' 
     . 'JOIN pays.villes villes WHERE pays.id = :paysId') ;     


     $query->setParameter ('paysId', $paysId);
     $paysChoisiAvecVilles = $query->getResult();
     //dd($paysChoisiAvecVilles);
 

    $paysChoisiAvecVillesJSON = $serializer->serialize($paysChoisiAvecVilles, 'json', 
    [AbstractNormalizer::ATTRIBUTES => ['villes'=>['id','nom']]]);
    //dd($paysChoisiAvecVillesJSON);
    return new Response($paysChoisiAvecVillesJSON);
  }
}
