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
            ->add('conjoint', null, [
                'label' => 'L\'exconjoint',
            ])
            ->add('motif_rupture', null, [
                'label' => 'Motif de la rupture',
            ])
            ->add('date_rupture', null, [
                'label' => 'Date de la rupture',
                'widget' => 'single_text',
                'attr' => [
                    'class' => 'datetimepicker',
                ],
            ])
            ->add('reference_rupture', null, [
                'label' => 'Reférence de la rupture',
            ])
            ->add('date_reference_rupture', null, [
                'label' => 'Date de reférence de la rupture',
                'widget' => 'single_text',
                'attr' => [
                    'class' => 'datetimepicker',
                ],
            ])
            ->add('adresse_veuve', null, [
                'label' => 'Adresse du/de la veuf(veuve)',
            ])
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => ExConjoints::class,
        ]);
    }
}
