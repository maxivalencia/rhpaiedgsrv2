<?php

namespace App\Form;

use App\Entity\Personnels;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class AnalyseType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('Personnels', EntityType::class, [
                'class' => Utilisateur::class,
                'multiple'     => true,
                /* 'choice_label' => function(Personnels $personnels) {
                    return $personnels->getGrade(). ' '.$personnels->getNom().' '.$personnels->getPrenoms(); 
                } */
            ])
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            // Configure your form options here
        ]);
    }
}
