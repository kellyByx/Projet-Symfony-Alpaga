<?php

namespace App\Controller;

use App\Entity\ArticleInfos;
use App\Form\ArticleInfosType;
use App\Repository\ArticleInfosRepository;
use Knp\Component\Pager\PaginatorInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Request;

class ArticleInfosController extends AbstractController
{
    #[Route("/pointInfo", name: 'pointInfo')]
    public function pointInfo(
        ArticleInfosRepository $articleInfosRepository,
        PaginatorInterface $paginator,
        Request $request,
        
        ): Response
    {
        $data = $articleInfosRepository->findAll();

        $articlesInfos =$paginator->paginate(
        $data,
        $request->query->getInt('page', 1 ),
        6
        );

        $vars = [
            'articlesInfos'=> $articlesInfos,
          ];
        return $this->render("article_infos/pointInfo.html.twig",$vars);
    }

    // //un article => le 4eme 
    // //#[Route("/articleInfo/4", name: 'articleInfo')]
    
    //  #[Route("/articleInfo/{id}", name: 'articleInfo')]
    //  public function ArticleInfo( $id): Response
    //  {
    //       $repo =$this->getDoctrine()->getRepository(ArticleInfo::class);
    //       $articleInfo = $repo->find($id);

    //      return $this->render("article_infos/articleInfo.html.twig",[
    //          'article'-> $articleInfo,
    //      ]);
    //   }

    
  #[Route("/articleInfos/{id}", name: 'articleInfos')]
  public function ArticleInfos(ArticleInfos $articleInfo): Response

  {     
      return $this->render("article_infos/articleInfo.html.twig",[
        'articleInformatif'=> $articleInfo,
      ]);
  }


    //  #[Route("/article", name: 'article')]
    //  public function article(): Response
    //  {
    //      return $this->render("front/article.html.twig");
    //  }

    #[Route("/formArticleInfo", name: 'formArticleInfo')]
     public function formArticleInfo(Request $req): Response
     {
        $articleInfo = new ArticleInfos();

         $manager= $this->getDoctrine()->getManager();

         $form = $this->createForm(ArticleInfosType::class, $articleInfo);
         $form->handleRequest($req);

        // dump($articleInfo);

         if($form->isSubmitted() && $form->isValid()){
              $articleInfo->setMembre($this->getUser())
                        ->setDateArticle(new \DateTime())
              ;
              //dump($articleInfo);        
               $manager->persist($articleInfo);
               $manager->flush();

             return $this->redirectToRoute('pointInfo');
             // return $this->redirectToRoute('articleInfo, ['id]' => $article->getId()]);
         }

         $vars = [
             'formInfo' => $form->createView()
         ];
         return $this->render("article_infos/formArticleInfos.html.twig", $vars);
      }
}
