<?php

namespace App\DataFixtures;

use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
use Symfony\Component\Finder\Finder;


// fixture lance tous les fichiers sql qui se trouvent dans DataFixtures/sql

//tipsfichier sql: export + enlevez création de tables etc... ce qui compte ce sont les inserts!!
// class CustomFixtures extends Fixture 
// {
//     public function load(ObjectManager $manager)
//     {
//         // Bundle to manage file and directories
//         $finder = new Finder();
//         $finder->files()->in('src/DataFixtures/sql'); // si on veut charger plusieurs fichier sql
        
//         $content = "" ;
//         $cnx = $manager->getConnection();
//         $cnx->beginTransaction();
        
//         foreach ($finder as $file){
            
//             $content = $file->getContents();
//             $cnx->setAutoCommit(false);
//             $cnx->exec ($content);
  
//         }
    
//     }

// }