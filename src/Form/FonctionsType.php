<?php

namespace App\Form;

use App\Entity\Fonctions;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class FonctionsType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('libelle', null, [
                'label' => 'Fonction',
            ])
            ->add('abbreviation', null, [
                'label' => 'Abréviation',
            ])
            ->add('hierarchie', null, [
                'label' => 'Hierarchie',
            ])
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Fonctions::class,
        ]);
    }
}
