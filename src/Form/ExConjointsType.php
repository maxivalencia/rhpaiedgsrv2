<?php

namespace App\Form;

use App\Entity\ExConjoints;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class ExConjointsType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('motif_rupture')
            ->add('date_rupture')
            ->add('reference_rupture')
            ->add('date_reference_rupture')
            ->add('adresse_veuve')
            ->add('conjoint')
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => ExConjoints::class,
        ]);
    }
}
