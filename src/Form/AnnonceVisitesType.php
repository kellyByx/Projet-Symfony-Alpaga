<?php

namespace App\Form;

use App\Entity\AnnonceVisites;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use App\Repository\VilleRepository;
use App\Repository\MembreRepository;

class AnnonceVisitesType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('nomLieu', TextType::class)
            ->add('description',TextareaType::class)
            ->add('region', TextType::class)
            ->add('langue', TextType::class)
            ->add('email', TextType::class)
            ->add('telephone', TextType::class)
            ->add('rue', TextType::class)
            ->add('numero', TextType::class)
            ->add('codePostal', TextType::class)
            // ->add('membre',EntityType::class, [
            //     'class' => Membre::class,
            //     'choice_label' => function (MembreRepository $g) {
            //         return $g->findAll();
            //     }
            // ])
            // ->add('ville',EntityType::class, [
            //     'class' => Ville::class,
            //    // 'choice_label' => function (VilleRepository $g) {
            //    //     return $g->findAll();
            //    // }
             //      'choice_label'=>'Nom'
            // ]);
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => AnnonceVisites::class,
        ]);
    }
}
