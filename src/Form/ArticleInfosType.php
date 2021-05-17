<?php

namespace App\Form;

use App\Entity\ArticleInfos;
use App\Entity\TypeInformation;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use App\Entity\Theme;

class ArticleInfosType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('titre')
            ->add('resumer')
            ->add('messageInfo')
            // ->add('dateArticle')
            ->add('telephone')
            ->add('rue')
            ->add('ville')
            ->add('pays')
            ->add('codePostal')
            ->add('numero')
            ->add('email')
            // ->add('membre')
            ->add('typeInformation', EntityType::class, [
                'class' => TypeInformation::class,
                'placeholder'=> "Selectionner le type de l'information",
                'choice_label' => 'nom'
            ])
            ->add('theme', EntityType::class, [
                'class' => Theme::class,
                'placeholder'=> "Selectionner le theme",
                'choice_label' => 'nom'
            ])
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => ArticleInfos::class,
        ]);
    }
}
