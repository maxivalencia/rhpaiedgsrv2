<?php

namespace App\Form;

use App\Entity\FonctionsConjoints;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class FonctionsConjointsType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('libelle')
            ->add('abbreviation')
            ->add('lieu_travail')
            ->add('employeur')
            ->add('adresse_employeur')
            ->add('est_fonctionnaire')
            ->add('type_contrat')
            ->add('conjoint')
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => FonctionsConjoints::class,
        ]);
    }
}
