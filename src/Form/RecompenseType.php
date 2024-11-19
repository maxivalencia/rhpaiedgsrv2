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
            ->add('personnel', null, [
                'label' => 'Personnel',
            ])
            ->add('nature', null, [
                'label' => 'Nature',
            ])
            ->add('autorite', null, [
                'label' => 'Autorité délivrant',
            ])
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
                'label' => 'Libellé recompense',
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
