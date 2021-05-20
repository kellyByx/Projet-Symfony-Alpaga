<?php

namespace App\DataFixtures;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
use Faker;
use App\Entity\Membre;
use App\Entity\AnnonceVisites;
use App\Entity\ArticleInfos;
use App\Entity\Pays;
use App\Entity\Ville;
use App\Entity\Theme;
use App\Entity\TypeInformation;
use DateTime;

class AppFixtures extends Fixture
{
    public function load(ObjectManager $manager)
    {      
        //création pays
          $pays1 = new Pays();
          $pays1->setNom("Belgique");

          $pays2 = new Pays();
          $pays2->setNom("France");
            
          $manager->persist($pays1);
          $manager->persist($pays2);

        //création ville
          $ville1 = new Ville();
          $ville1->setPays($pays1)
                  ->setNom("Bruxelles");
          $manager->persist($ville1);

          $ville2 = new Ville();
          $ville2->setPays($pays1)
                  ->setNom("Namur");
          $manager->persist($ville2);
         
          $ville3 = new Ville();
          $ville3->setPays($pays2)
                  ->setNom("Paris");
          $manager->persist($ville3);
           
          $ville4 = new Ville();
          $ville4->setPays($pays2)
                  ->setNom("Bordeaux");
          $manager->persist($ville4);

        //création theme

         $theme1 = new Theme();
         $theme1->setNom("Alimentation");

         $theme2 = new Theme();
         $theme2->setNom("Equipement");

         $theme3 = new Theme();
         $theme3->setNom("Comportement");

         $theme4 = new Theme();
         $theme4->setNom("Amenagement");

         $theme5 = new Theme();
         $theme5->setNom("Veterinaire");

         $theme6 = new Theme();
         $theme6->setNom("Tondeur");

         $theme7 = new Theme();
         $theme7->setNom("Laine");

         $manager->persist($theme1);
         $manager->persist($theme2);
         $manager->persist($theme3);
         $manager->persist($theme4);
         $manager->persist($theme5);
         $manager->persist($theme6);
         $manager->persist($theme7);

        //TypeInformation
        $TypeInfo1 = new TypeInformation();
        $TypeInfo1->setNom("Bonnes Adreses");

        $TypeInfo2 = new TypeInformation();
        $TypeInfo2->setNom("Conseils");
        
        $TypeInfo3 = new TypeInformation();
        $TypeInfo3->setNom("Expériences");

        $manager->persist($TypeInfo1);
        $manager->persist($TypeInfo2);
        $manager->persist($TypeInfo3);

        //-------utilisation de faker----------------

        $faker = Faker\Factory::create('fr_FR');

        //creation de membres
        for ($i = 0; $i < 7; $i++) {
               $membre = new Membre([
                   'username' => $faker->lastName,
                   'email' => $faker->email,
                   'telephone' => $faker->phoneNumber,
                   'password'=> ($i + 1111)
               ]);
           $manager->persist($membre);
      
        //création annonce visite
           //   for ($j=0; $j <4 ; $j++) { 
            $lieu= $i+1;
            $AnnonceVisite =  new AnnonceVisites();
            $AnnonceVisite->setMembre($membre)
                            ->setVille($ville1) 
                            ->setPays($pays1) 
                            ->setNomLieu("Lieux numéro $lieu")
                            ->setDescription($faker->paragraphs(2,true))//paragraph())//text(300))
                            ->setRegion($faker->region())
                            ->setLangue("Francais")
                            ->setEmail($faker->email())
                            ->setTelephone($faker->phoneNumber())
                            ->setRue($faker->streetAddress())
                            ->setNumero($faker->buildingNumber())
                            ->setCodePostal($faker->postcode());
            $manager->persist($AnnonceVisite);
        //}

          //création Articles infos
        // for ($j=1; $j <3 ; $j++) { 
               $titre= $i+1;
               $articleInfos =  new ArticleInfos();
               $date = new DateTime('06/06/2021');
               $articleInfos->setMembre($membre)
                            ->setTypeInformation($TypeInfo1)  
                            ->setTheme($theme1)           
                             ->setVille($faker->city()) 
                             ->setTitre("Titre d'article $titre")
                             ->setResumer($faker->paragraphs(2,true))//paragraph())//text(300))
                             ->setMessageInfo($faker->paragraphs(2,true))//paragraph())//text(300))
                             ->setPays($faker->country())
                             ->setEmail($faker->email())
                             ->setTelephone($faker->phoneNumber())
                             ->setRue($faker->streetAddress())
                             ->setNumero($faker->buildingNumber())
                             ->setCodePostal($faker->postcode())
                             ->setDateArticle($date)
                             ;
              $manager->persist($articleInfos);
        //   }
          }

         for ($i = 0; $i < 7; $i++) {
          $membre = new Membre([
              'username' => $faker->lastName,
              'email' => $faker->email,
              'telephone' => $faker->phoneNumber,
              'password'=> ($i + 1121)
          ]);

          $manager->persist($membre);
        
          //création annonce visite
              //   for ($j=0; $j <4 ; $j++) { 
              $lieu= $i+1;
              $AnnonceVisite =  new AnnonceVisites();
              $AnnonceVisite->setMembre($membre)
                              ->setVille($ville4) 
                              ->setPays($pays2) 
                              ->setNomLieu("Lieux numéro $lieu")
                              ->setDescription($faker->paragraphs(2,true))//paragraph())//text(300))
                              ->setRegion($faker->region())
                              ->setLangue("Francais")
                              ->setEmail($faker->email())
                              ->setTelephone($faker->phoneNumber())
                              ->setRue($faker->streetAddress())
                              ->setNumero($faker->buildingNumber())
                              ->setCodePostal($faker->postcode());
              $manager->persist($AnnonceVisite);

              $titre= $i+1;
              $articleInfos =  new ArticleInfos();
              $date = new DateTime('06/06/2021');
              $articleInfos->setMembre($membre)
                           ->setTypeInformation($TypeInfo2)  
                           ->setTheme($theme2)           
                            ->setVille($faker->city()) 
                            ->setTitre("Titre d'article $titre")
                            ->setResumer($faker->paragraphs(2,true))//paragraph())//text(300))
                            ->setMessageInfo($faker->paragraphs(2,true))//paragraph())//text(300))
                            ->setPays($faker->country())
                            ->setEmail($faker->email())
                            ->setTelephone($faker->phoneNumber())
                            ->setRue($faker->streetAddress())
                            ->setNumero($faker->buildingNumber())
                            ->setCodePostal($faker->postcode())
                            ->setDateArticle($date)
                            ;
             $manager->persist($articleInfos);
            
            }
            for ($i = 0; $i < 4; $i++) {
              $membre = new Membre([
                  'username' => $faker->lastName,
                  'email' => $faker->email,
                  'telephone' => $faker->phoneNumber,
                  'password'=> ($i + 1131)
              ]);
    
              $manager->persist($membre);
               
                  $titre= $i+1;
                  $articleInfos =  new ArticleInfos();
                  $date = new DateTime('06/06/2021');
                  $articleInfos->setMembre($membre)
                               ->setTypeInformation($TypeInfo3)  
                               ->setTheme($theme3)           
                                ->setVille($faker->city()) 
                                ->setTitre("Titre d'article $titre")
                                ->setResumer($faker->paragraphs(2,true))//paragraph())//text(300))
                                ->setMessageInfo($faker->paragraphs(2,true))//paragraph())//text(300))
                                ->setPays($faker->country())
                                ->setEmail($faker->email())
                                ->setTelephone($faker->phoneNumber())
                                ->setRue($faker->streetAddress())
                                ->setNumero($faker->buildingNumber())
                                ->setCodePostal($faker->postcode())
                                ->setDateArticle($date)
                                ;
                 $manager->persist($articleInfos);
                
                }

              
        
         $manager->flush();
     }
}





     //creation d' Articles Infos
        //   for ($i = 0; $i < 4; $i++) {
         
        //     $articleInfos = new ArticleInfos([
        //         'titre' => $faker->title,
        //         'resumer' => $faker->paragraphs();,                   
        //         'messageInfos' => $faker->paragraphs(5, true),         

        //         'dateArticle'=> ,                          // date automatique?

        //         'typeInformation' =>  ,                    // 3 choix possible: Bonne adresses, conseils, expériences
        //         'theme'=>     ,                            // 7 choix : comportement, amenagement, veterinaire, tondeur, equipement, alimentation, laine

        //         'telephone' => $faker->phoneNumber,

        //         // possibilité nullable pour les article sans adresse ( mais pas imporant pour test)
        //         'rue' => $faker->streetAddress,
        //         'numero' => $faker->buildingNumber,
        //         'codePostal' => $faker->postcode,
        //         'ville' => $faker->city,
        //         'pays' => 'Belgique',                      // belgique ou france = 2 choix possible

        //         'email' => $faker->email,

        //     ]);

     
    //     $manager->persist($membre);
    //  }
//     $manager->flush();
// }
// }




   //   $membre = new Membre();
                // [
                //     'nom' => $faker->lastName,
                //     'email' => $faker->email,
                //     'telephone' => $faker->firstName,
                //     'password' =>
                // ]

                //  $membre->setEmail($faker->email())
                //         ->setNom($faker->Name())
                //         ->setTelephone($faker->phoneNumber());
                //   );
