<?php

namespace App\Form;

use App\Entity\Permissions;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class PermissionsType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('annee')
            ->add('date_depart')
            ->add('date_fin')
            ->add('duree')
            ->add('reliquat')
            ->add('type_permission')
            ->add('lieu_jouissance')
            ->add('personnel')
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Permissions::class,
        ]);
    }
}
