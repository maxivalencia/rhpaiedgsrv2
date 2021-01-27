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
            ->add('date_notification', null, [
                'label' => 'Date de notification',
                'widget' => 'single_text',
                'attr' => [
                    'class' => 'datetimepicker',
                ],
                //'data' => new \DateTime('now'),
            ])
            ->add('lieu_repli', null, [
                'label' => 'Lieu de repli',
            ])
            ->add('date_radiation', null, [
                'label' => 'Date de radiation',
                'widget' => 'single_text',
                'attr' => [
                    'class' => 'datetimepicker',
                ],
                //'data' => new \DateTime('now'),
            ])
            ->add('date_prevu_radiation', null, [
                'label' => 'Date prévu de radiation',
                'widget' => 'single_text',
                'attr' => [
                    'class' => 'datetimepicker',
                ],
                //'data' => new \DateTime('now'),
            ])
            ->add('reference_mrc_radiation', null, [
                'label' => 'Reférence compte rendue de radiation',
            ])
            ->add('date_mrc_radiation', null, [
                'label' => 'Date message reférence compte rendue de radiation',
                'widget' => 'single_text',
                'attr' => [
                    'class' => 'datetimepicker',
                ],
                //'data' => new \DateTime('now'),
            ])
            ->add('personnel', null, [
                'label' => 'Personnel',
            ])
            ->add('motif_radiation', null, [
                'label' => 'Motif de radiation',
            ])
            ->add('detail_motif_radiation', null, [
                'label' => 'Détail du motif de radiation',
            ])
            ->add('decision_radiation', null, [
                'label' => 'Décision de radiation',
            ])
            ->add('droit_pension', null, [
                'label' => 'Droit à la pension',
            ])
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => RadiationsPersonnels::class,
        ]);
    }
}
