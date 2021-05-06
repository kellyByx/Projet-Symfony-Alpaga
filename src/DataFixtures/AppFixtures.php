<?php

namespace App\DataFixtures;

use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
// use Faker\Factory;
use Faker;
use App\Entity\Membre;

class AppFixtures extends Fixture
{
    public function load(ObjectManager $manager)
    {
        // utilisation de faker
        $faker = Faker\Factory::create('fr_FR');

         //creation de membres
         for ($i = 0; $i < 4; $i++) {
         
                $membre = new Membre([
                    'nom' => $faker->lastName,
                    'email' => $faker->email,
                    'telephone' => $faker->phoneNumber,
                    'password'=> ($i + 1111)
                ]);

            $manager->persist($membre);
         }
         

         $manager->flush();
     }
}




     //creation d' Articles Infos
        //   for ($i = 0; $i < 5; $i++) {
         
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
