<?php

namespace App\Form;

use App\Entity\FonctionsConjoints;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class FonctionsConjointsType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('libelle', null, [
                'label' => 'Fonction du conjoint',
            ])
            ->add('abbreviation', null, [
                'label' => 'Abréviation',
            ])
            ->add('lieu_travail', null, [
                'label' => 'Lieu de travail',
            ])
            ->add('employeur', null, [
                'label' => 'Employeur',
            ])
            ->add('adresse_employeur', null, [
                'label' => 'Adresse de l\'employeur',
            ])
            ->add('est_fonctionnaire', null, [
                'label' => 'Est fonctionnaire : si le conjoint est fonctionnaire au sein d\'une institution',
            ])
            ->add('type_contrat', null, [
                'label' => 'Type de contrat',
            ])
            ->add('conjoint', null, [
                'label' => 'Conjoint fonctionnelle',
            ])
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => FonctionsConjoints::class,
        ]);
    }
}
