<?php

namespace App\Controller;


use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;


class FrontController extends AbstractController
{
    #[Route("/", name: 'index')]
    public function index(): Response
    {
        return $this->render("front/index.html.twig");
    }

    #[Route("/alpagaLama", name: 'alpagaLama')]
    public function alpagaLama(): Response
    {
        return $this->render("front/alpagaLama.html.twig");
    }

    #[Route("/pointInfo", name: 'pointInfo')]
    public function pointInfo(): Response
    {
        return $this->render("front/pointInfo.html.twig");
    }

    //un article => le 4eme = pour faux
    //#[Route("/articleInfo/4", name: 'articleInfo')]
    
     #[Route("/articleInfo", name: 'articleInfo')]
     public function ArticleInfo(): Response
     {
         return $this->render("front/articleInfo.html.twig");
      }

    //  #[Route("/article", name: 'article')]
    //  public function article(): Response
    //  {
    //      return $this->render("front/article.html.twig");
    //  }

  
    #[Route("/contact", name: 'contact')]
    public function contact(): Response
    {
        return $this->render("front/contact.html.twig");
    }


}
