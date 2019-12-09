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
            ->add('libelle', null, [
                'label' => 'Diplôme',
            ])
            ->add('abbreviation', null, [
                'label' => 'Abréviation',
            ])
            ->add('type', null, [
                'label' => 'Type',
            ])
            ->add('est_diplome_militaire', null, [
                'label' => 'Est un diplôme militaire : si le diplôme est obtenue au sein d\'un coprs militaire',
            ])
            ->add('domaine', null, [
                'label' => 'Domaine du diplôme',
            ])
            ->add('niveau', null, [
                'label' => 'Niveau du diplôme',
            ])
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Diplomes::class,
        ]);
    }
}
