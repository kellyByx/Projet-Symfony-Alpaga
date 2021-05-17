<?php

namespace App\Controller;

use App\Entity\Membre;
use App\Form\InscriptionType;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Security\Core\Encoder\UserPasswordEncoderInterface;

class SecuriteController extends AbstractController
{
    
    /**
     * @Route("/inscription", name="inscription")
     */
    public function inscription( Request $req, UserPasswordEncoderInterface $encoder): Response
    {
        $membre = new Membre();
        //test bug manager pas reconnu avec le use correct
        // $membre-> setUserName("test")
        //        ->setEmail("email@test.be")
        //        ->setTelephone("1686165135156")
        //        ->setPassword("nvejvbeor");

         $manager= $this->getDoctrine()->getManager();

         $form = $this->createForm(InscriptionType::class, $membre);
         $form->handleRequest($req);

         //dump($membre);

         if($form->isSubmitted() && $form->isValid()){
              $hash = $encoder->encodePassword( $membre, $membre->getPassword() );

              $membre->setPassword($hash);

              $manager->persist($membre);
              $manager->flush();

            return $this->redirectToRoute('loginMembre');
         }

         $vars = [
             'form' => $form->createView()
         ];

        return $this->render("securite/inscription.html.twig", $vars);
    }

     /**
     * @Route("/login", name="loginMembre")
     */
    public function login(): Response
    {
        return $this->render("securite/login.html.twig");
    }
    

    /**
     *  @Route("/deconnexion", name="logoutMembre")
     */
    public function logout() {}

}
