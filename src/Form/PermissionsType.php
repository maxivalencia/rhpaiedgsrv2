<?php

namespace App\Form;

use App\Entity\Permissions;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\DateTimeType;
use Symfony\Component\Form\Extension\Core\Type\DateType;

class PermissionsType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('personnel', null, [
                'label' => 'Persmission',
            ])
            ->add('annee', DateType::class, [
                'label' => 'Année',
                'widget' => 'single_text',
                'attr' => [
                    'class' => 'datetimepicker',
                ],
            ])
            ->add('lieu_jouissance', null, [
                'label' => 'Lieu de jouissance',
            ])
            ->add('date_depart', null, [
                'label' => 'Date de départ',
                'widget' => 'single_text',
                'attr' => [
                    'class' => 'datetimepicker',
                ],
            ])
            ->add('date_fin', null, [
                'label' => 'Date de fin',
                'widget' => 'single_text',
                'attr' => [
                    'class' => 'datetimepicker',
                ],
            ])
            ->add('duree', null, [
                'label' => 'Durée',
            ])
            ->add('reliquat', null, [
                'label' => 'Réliquat',
            ])
            ->add('type_permission', null, [
                'label' => 'Type de permission',
            ])

        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Permissions::class,
        ]);
    }
}
