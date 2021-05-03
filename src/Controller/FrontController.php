<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class FrontController extends AbstractController
{
    #[Route("/index", name: 'index')]
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

    #[Route("/visites", name: 'visites')]
    public function visites(): Response
    {
        return $this->render("front/visites.html.twig");
    }

    #[Route("/inscription", name: 'inscription')]
    public function inscription(): Response
    {
        return $this->render("front/inscription.html.twig");
    }

    #[Route("/connexion", name: 'connexion')]
    public function connexion(): Response
    {
        return $this->render("front/connexion.html.twig");
    }

  
    #[Route("/contact", name: 'contact')]
    public function contact(): Response
    {
        return $this->render("front/contact.html.twig");
    }

   

    #[Route("/article", name: 'article')]
    public function article(): Response
    {
        return $this->render("front/article.html.twig");
    }
}

  // #[Route('/front', name: 'front')]
    // public function index(): Response
    // {
    //     return $this->render('front/index.html.twig', [
    //         'controller_name' => 'FrontController',
    //     ]);
    // }