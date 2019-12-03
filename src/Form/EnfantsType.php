<?php

namespace App\Form;

use App\Entity\Enfants;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class EnfantsType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('rang')
            ->add('nom')
            ->add('prenom')
            ->add('date_naissance')
            ->add('lieu_naissance')
            ->add('sexe')
            ->add('qualite')
            ->add('est_decede')
            ->add('date_dece')
            ->add('personnel')
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Enfants::class,
        ]);
    }
}
