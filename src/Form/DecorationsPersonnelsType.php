<?php

namespace App\Form;

use App\Entity\DecorationsPersonnels;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class DecorationsPersonnelsType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('personnel', null, [
                'label' => 'Personnel',
            ])
            ->add('decoration', null, [
                'label' => 'Décoration',
            ])
            ->add('date', null, [
                'label' => 'Date',
                'widget' => 'single_text',
                'attr' => [
                    'class' => 'datetimepicker',
                ],
                //'data' => new \DateTime('now'),
            ])
            ->add('reference', null, [
                'label' => 'Reférence',
            ])
            ->add('date_reference', null, [
                'label' => 'Date de la reférence',
                'widget' => 'single_text',
                'attr' => [
                    'class' => 'datetimepicker',
                ],
                //'data' => new \DateTime('now'),
            ])
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => DecorationsPersonnels::class,
        ]);
    }
}
