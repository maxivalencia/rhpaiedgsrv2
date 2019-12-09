<?php

namespace App\Form;

use App\Entity\Decorations;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class DecorationsType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('libelle', null, [
                'label' => 'Décoration',
            ])
            ->add('abbreviation', null, [
                'label' => 'Abréviation',
            ])
            ->add('ordre', null, [
                'label' => 'Ordre',
            ])
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Decorations::class,
        ]);
    }
}
