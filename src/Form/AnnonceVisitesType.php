<?php

namespace App\Form;

use App\Entity\AnnonceVisites;
use App\Entity\Ville;
use App\Entity\Pays;
use App\Entity\Membre;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use App\Repository\VilleRepository;
use App\Repository\MembreRepository;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\FormEvent;
use Symfony\Component\Form\FormEvents;

class AnnonceVisitesType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('nomLieu')
            ->add('description')
            ->add('region')
            ->add('langue')
            ->add('email')
            ->add('telephone')
            ->add('rue')
            ->add('numero')
            ->add('codePostal')
            // ->add('pays', EntityType::class,[
            //     'class'=> Pays::class,
            //     'placeholder'=>"Selectionner le pays",
            //     'choice_label'=>'nom',
            //     'mapped'=>false,
            //     'required'=>false,
            // ])
             ->add('membre',EntityType::class, [
                 'class' => Membre::class,
               ])
            //  ->add ('ville', EntityType::class, [
            //      'class' => Ville::class,
            //      'placeholder'=> "Selectionner votre ville",
            //      'choice_label' => 'nom',
            //  ])
        ;

    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => AnnonceVisites::class,
        ]);
    }
}
