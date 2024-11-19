<?php

namespace App\Form;

use App\Entity\SituationSanitaire;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class SituationSanitaireType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('personnel', null, [
                'label' => 'Personnel',
            ])
            ->add('personne_concerner', null, [
                'label' => 'Personne concerner',
            ])
            ->add('hopital_medecin_traitant', null, [
                'label' => 'Hopital ou médecin traitant',
            ])
            ->add('date_debut_traitement', null, [
                'label' => 'Date de début du traitement',
                'widget' => 'single_text',
                'attr' => [
                    'class' => 'datetimepicker',
                ],
            ])
            ->add('date_fin_traitement', null, [
                'label' => 'Date de fin du traitement',
                'widget' => 'single_text',
                'attr' => [
                    'class' => 'datetimepicker',
                ],
            ])
            ->add('maladie', null, [
                'label' => 'Maladie',
            ])
            ->add('lieu_traitement', null, [
                'label' => 'Lieu de traitement',
            ])
            ->add('disponibilite_traitement', null, [
                'label' => 'Disponibilité du traitement',
            ])
            ->add('adresse_traitant', null, [
                'label' => 'Adresse de l\'hopital ou du médecin traitant',
            ])
            ->add('controle_periodique', null, [
                'label' => 'Nécessité de controle périodique',
            ])
            ->add('niveau_danger', null, [
                'label' => 'Niveau de danger',
            ])
            ->add('type_maladie', null, [
                'label' => 'Type de maladie',
            ])
            ->add('type_traitement', null, [
                'label' => 'Type de traitement',
            ])
            ->add('frequence_traitement', null, [
                'label' => 'Fréquence de traitement',
            ])
            ->add('controleur_periodique', null, [
                'label' => 'Controleur périodique',
            ])
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => SituationSanitaire::class,
        ]);
    }
}
