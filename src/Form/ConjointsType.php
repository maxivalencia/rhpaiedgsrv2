<?php

namespace App\Form;

use App\Entity\Conjoints;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class ConjointsType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('rang')
            ->add('nom')
            ->add('prenom')
            ->add('date_naissance')
            ->add('lieu_naissance')
            ->add('nom_pere')
            ->add('nom_mere')
            ->add('sexe')
            ->add('date_mariage')
            ->add('numero_cin')
            ->add('date_cin')
            ->add('lieu_cin')
            ->add('reference_autorisation_mariage')
            ->add('date_reference_autorisation_mariage')
            ->add('lieu_mariage')
            ->add('reference_officiel_mariage')
            ->add('date_reference_officiel_mariage')
            ->add('commune')
            ->add('personnel')
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Conjoints::class,
        ]);
    }
}
