<?php

namespace App\Form;

use App\Entity\Recompense;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class RecompenseType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('reference', null, [
                'label' => 'Reférence',
            ])
            ->add('date', null, [
                'label' => 'Date',
                'widget' => 'single_text',
                'attr' => [
                    'class' => 'datetimepicker',
                ],
            ])
            ->add('libelle', null, [
                'label' => 'Recompense',
            ])
            ->add('autorite', null, [
                'label' => 'Autorité délivrant',
            ])
            ->add('nature', null, [
                'label' => 'Nature',
            ])
            ->add('personnel', null, [
                'label' => 'Personnel',
            ])
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Recompense::class,
        ]);
    }
}
