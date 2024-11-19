<?php

namespace App\Form;

use App\Entity\Regions;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class RegionsType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('province', null, [
                'label' => 'Province',
            ])
            ->add('region', null, [
                'label' => 'Région',
            ])
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Regions::class,
        ]);
    }
}
