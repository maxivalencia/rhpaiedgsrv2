<?php

namespace App\Form;

use App\Entity\NominationsPersonnels;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class NominationsPersonnelsType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('date_nomination')
            ->add('rang')
            ->add('echelon')
            ->add('class')
            ->add('indice')
            ->add('grade')
            ->add('personnel')
            ->add('decision')
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => NominationsPersonnels::class,
        ]);
    }
}
