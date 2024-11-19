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
                'label' => 'Reférence décision de la réintegration',
            ])
            ->add('date_reference', null, [
                'label' => 'Date de reférence de la réintegration',
                'widget' => 'single_text',
                'attr' => [
                    'class' => 'datetimepicker',
                ],                
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
