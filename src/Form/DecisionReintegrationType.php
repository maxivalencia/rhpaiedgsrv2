<?php

namespace App\Form;

use App\Entity\DecisionReintegration;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class DecisionReintegrationType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('libelle', null, [
                'label' => 'reférence décision de la réintegration',
            ])
            ->add('date_reference', null, [
                'label' => 'date de reférence de la Réintegration',
            ])
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => DecisionReintegration::class,
        ]);
    }
}
