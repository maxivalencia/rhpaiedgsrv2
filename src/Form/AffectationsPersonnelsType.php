<?php

namespace App\Form;

use App\Entity\AffectationsPersonnels;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class AffectationsPersonnelsType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('date_affectation')
            ->add('date_disponibilite')
            ->add('reference_disponibilite')
            ->add('date_reference_disponibilite')
            ->add('motif_affectation')
            ->add('situation')
            ->add('motif_annulation')
            ->add('annulation')
            ->add('fonction')
            ->add('personnel')
            ->add('decision_affectation')
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => AffectationsPersonnels::class,
        ]);
    }
}
