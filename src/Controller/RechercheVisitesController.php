<?php

namespace App\Controller;

use App\Entity\AnnonceVisites;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use App\Repository\PaysRepository;
use App\Repository\VilleRepository;
use App\Entity\Pays;
use App\Entity\Ville;
use App\Form\AddVilleType;
use App\Data\SearchData;
use App\Repository\AnnonceVisitesRepository;
use Doctrine\Persistence\ObjectManager;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Serializer\Normalizer\AbstractNormalizer;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Serializer\SerializerInterface;
use App\Form\AnnonceVisitesType;
use App\Form\SearchVisitesType;
use Knp\Component\Pager\PaginatorInterface;

class RechercheVisitesController extends AbstractController
{
   //test 1:

   #[Route("/visites", name: 'visites')]
   public function visites( AnnonceVisitesRepository $repoAnnonce,PaginatorInterface $paginator,PaysRepository $paysRepository, VilleRepository $villeRepository, Request $req): Response
   {   $em =$this->getDoctrine()->getManager();
       $repoPays = $em->getRepository(Pays::class);
       $repoVille = $em->getRepository(Ville::class);
       $desPays = $repoPays->findAll();
       $villes = $repoVille->findAll();
      //  dump($desPays);

      // articles
      // $repoAnnonce = $this->getDoctrine()->getRepository(AnnonceVisites::class); // plus besoin grâce dépendance l 23
      
      //filtre:
      $data = new SearchData();
      $form = $this->createForm(SearchVisitesType::class, $data);

      $data->numeroPage = $req->get('page', 1);
      //$data->numeroPage = $req->query->getInt('page', 1);
      $form->handleRequest($req);

      $searchAnnoncesVisitesResult =[];

      if ($form->isSubmitted()) {
         // on vient d'un submit
        $searchAnnoncesVisitesResult = $repoAnnonce->obtenirResultatsFiltres($data);
      } else {
         $searchAnnoncesVisitesResult = $repoAnnonce->findAll();
      }

      // $annonces= $paginator->paginate( $data, $req->query->getInt('page', 1), 6 );
      
 
     //  vardump($vars);
      // dump($vars);
       return $this->render("recherche_visites/visites.html.twig",[
        'resultatRecherche'=>$searchAnnoncesVisitesResult,
        'form'=>$form->createView(),
        'desPays'=>$desPays,
        'villes'=>$villes,
        //'annonces'=>$annonces,
     ]);
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

  #[Route("/articleVisite/formVille", name:'formVille')]
  public function formVille( Request $requete): Response
  { $manager= $this->getDoctrine()->getManager();
    $ville = new Ville();
    $form = $this->createForm(AddVilleType::class, $ville);
    $form->handleRequest($requete);
    //dump($ville);

    if($form->isSubmitted() && $form->isValid()){
     $manager->persist($ville);
     $manager->flush();

    return $this->redirectToRoute('formArticle');
    }

    $vars = [
      'formVille'=> $form->createView(),
    ];

    return $this->render("recherche_visites/formVille.html.twig", $vars );
  }

  #[Route("/articleVisite/formArticle", name:'formArticle')]
  public function formArticle( Request $requete): Response
  {
      $manager= $this->getDoctrine()->getManager();

      $repoPays = $manager->getRepository(Pays::class);
      $repoVille = $manager->getRepository(Ville::class);

      $desPays = $repoPays->findAll();
      $villes = $repoVille->findAll();

      dump($desPays);
      $annonce = new AnnonceVisites();
      //  $form = $this->createFormBuilder($annonce)
      //               ->add('nomLieu',TextareaType::class)
      //               ->add('description')
      //               ->add('region')
      //               ->add('langue')
      //               ->add('email')
      //               ->add('telephone')
      //               ->add('rue')
      //               ->add('numero')
      //               ->add('codePostal')
      //               ->getForm();
      
              // //peux remplace par le form généré:
              // $form = $this->createForm(AnnonceVisitesType::class, $annonce);
            
              // $form->handleRequest($requete);
              // dump($annonce);

              // if($form->isSubmitted() && $form->isValid()){
              //   //$annonce->setMembre($this->getUser());
              //           //->setFormAnnonce($form);
          
              //   $manager->persist($annonce);
              //   $manager->flush();
              
          
              //  return $this->redirectToRoute('index');
              //  }

      return $this->render("recherche_visites/formArticle.html.twig",[
        // 'formAnnonce'=> $form->createView(),
        'membre'=> $this->getUser(),
        'desPays'=>$desPays,
        'villes'=>$villes,
      ] );
  }

  // #[Route("/articleVisite/formArticle", name: 'formArticle')]
  // public function formArticle(): Response
  // {
  //     $formAnnonce = $this->createForm(AnnonceVisitesType::class);
  //     $vars=["unFormulaire"=> $formAnnonce->createView()];
  //     return $this->render("front/formArticle.html.twig",$vars);
  // }


  // met id pour avoir celui de l'article cliqué dans la pg ds annonces visites
  #[Route("/articleVisite/{id}", name: 'articleVisite')]
  
  //peut encore plus simplifier avec injection de dépendance de symfony en enlevant:
  // public function ArticleVisite( AnnonceVisitesRepository $repoAnnonce, $id): Response
  // {
  //     //$repoAnnonce =$this->getDoctrine()->getRepository(AnnonceVisites::class);// plus besoin grâce dépendance l 81
  //     $annonce = $repoAnnonce->find($id);

  //pour ensuite passer une variable annonce de type annonceVisites => grace param converter
  public function ArticleVisite( AnnonceVisites $annonce): Response
  {     
      return $this->render("front/articleVisite.html.twig",[
        'annonce'=> $annonce,
      ]);
  }



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
