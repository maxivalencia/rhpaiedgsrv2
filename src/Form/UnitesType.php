<?php

namespace App\Form;

use App\Entity\Unites;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class UnitesType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('libelle')
            ->add('abbreviation')
            ->add('localite')
            ->add('email')
            ->add('phone')
            ->add('commune')
            ->add('unite_superieur')
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Unites::class,
        ]);
    }
}
