<?php

namespace App\Form;

use App\Entity\Diplomes;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class DiplomesType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('libelle')
            ->add('abbreviation')
            ->add('type')
            ->add('est_diplome_militaire')
            ->add('domaine')
            ->add('niveau')
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Diplomes::class,
        ]);
    }
}
