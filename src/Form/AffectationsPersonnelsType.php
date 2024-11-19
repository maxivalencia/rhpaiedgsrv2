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
            ->add('personnel', null, [
                'label' => 'Personnel à affecter',
            ])
            ->add('decision_affectation', null, [
                'label' => 'Décision d\'affectation',
            ])
            ->add('unite', null, [
                'label' => 'Unité d\'affectation',
            ])
            ->add('fonction', null, [
                'label' => 'Fonction',
            ])
            ->add('motif_affectation', null, [
                'label' => 'Motif de l\'affectation',
            ])
            ->add('date_affectation', null, [
                'label' => 'Date d\'affectation',
                'widget' => 'single_text',
                'attr' => [
                    'class' => 'datetimepicker',
                ],
                //'data' => new \DateTime('now'),
            ])
            ->add('date_disponibilite', null, [
                'label' => 'Date de disponibilité',
                'widget' => 'single_text',
                'attr' => [
                    'class' => 'datetimepicker',
                ],
                //'data' => new \DateTime('now'),
            ])
            ->add('reference_disponibilite', null, [
                'label' => 'Reférence de disponibilité',
            ])
            ->add('date_reference_disponibilite', null, [
                'label' => 'Date de la reférence de la disponibilité',
                'widget' => 'single_text',
                'attr' => [
                    'class' => 'datetimepicker',
                ],
                //'data' => new \DateTime('now'),
            ])
            ->add('situation', null, [
                'label' => 'Situation du personnel',
            ])
            ->add('motif_annulation', null, [
                'label' => 'Motif de l\'annulation',
                'data' => 'N/A',
            ])
            ->add('annulation', null, [
                'label' => 'Réf décision annulation',
            ])

        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => AffectationsPersonnels::class,
        ]);
    }
}
