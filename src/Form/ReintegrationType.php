<?php

namespace App\Form;

use App\Entity\Reintegration;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class ReintegrationType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('date_notification', null, [
                'label' => 'Date de notification',
            ])
            ->add('date_reintegration', null, [
                'label' => 'Date de réintegration',
            ])
            ->add('reference_rc_reintegration', null, [
                'label' => 'Reférence de réintegration',
            ])
            ->add('date_rc_reintegration', null, [
                'label' => 'Date de reférence de réintegration',
            ])
            ->add('date_prevu_reintegration', null, [
                'label' => 'Date prévue de réintégration',
            ])
            ->add('personnel', null, [
                'label' => 'Personnel',
            ])
            ->add('motif_reintegration', null, [
                'label' => 'Motid de réintegration',
            ])
            ->add('detail_motif_reintegration', null, [
                'label' => 'Détail du motif de réintegration',
            ])
            ->add('decision_reintegration', null, [
                'label' => 'Décision de réintégration',
            ])
            ->add('unite', null, [
                'label' => 'Unité',
            ])
            ->add('radiation', null, [
                'label' => 'Décision de radiation concerné',
            ])
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Reintegration::class,
        ]);
    }
}
