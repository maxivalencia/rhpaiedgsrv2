<?php

namespace App\Form;

use App\Entity\RadiationsPersonnels;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class RadiationsPersonnelsType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('date_notification')
            ->add('lieu_repli')
            ->add('date_radiation')
            ->add('date_prevu_radiation')
            ->add('reference_mrc_radiation')
            ->add('date_mrc_radiation')
            ->add('personnel')
            ->add('motif_radiation')
            ->add('detail_motif_radiation')
            ->add('decision_radiation')
            ->add('droit_pension')
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => RadiationsPersonnels::class,
        ]);
    }
}
