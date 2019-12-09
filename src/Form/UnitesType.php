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
            ->add('libelle', null, [
                'label' => 'Unité',
            ])
            ->add('abbreviation', null, [
                'label' => 'Abréviation de l\'unité',
            ])
            ->add('localite', null, [
                'label' => 'Localité de l\'unité',
            ])
            ->add('email', null, [
                'label' => 'Email de l\'unité',
            ])
            ->add('phone', null, [
                'label' => 'Téléphone de l\'unité',
            ])
            ->add('commune', null, [
                'label' => 'Commune de la localité de l\'unité',
            ])
            ->add('unite_superieur', null, [
                'label' => 'Unité supérieur de l\'unité',
            ])
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Unites::class,
        ]);
    }
}
