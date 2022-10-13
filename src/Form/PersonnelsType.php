<?php

namespace App\Form;

use App\Entity\Personnels;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\RadioType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\DateType;

class PersonnelsType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $sexe = [
            'Féminin' => true,
            'Masculin' => false
        ];
        $builder
            ->add('grade', null, [
                'label' => 'Grade',
            ])
            ->add('nom', null, [
                'label' => 'Nom',
            ])
            ->add('prenoms', null, [
                'label' => 'Prénom',
            ])
            ->add('date_naissance', DateType::class, [
                'label' => 'Date de naissance',
                'widget' => 'single_text',
                'attr' => [
                    'class' => 'datetimepicker',
                ],
                //'data' => new \DateTime('now'),
            ])
            ->add('lieu_naissance', null, [
                'label' => 'Lieu de naissance',
            ])
            ->add('nom_pere', null, [
                'label' => 'Nom et prénom du père',
            ])
            ->add('nom_mere', null, [
                'label' => 'Nom et prénom de la mère',
            ])
            ->add('num_cin', null, [
                'label' => 'Numéro de la carte d\'identité national',
            ])
            ->add('date_cin', null, [
                'label' => 'Date de réalisation de la carte d\'identité national',
                'widget' => 'single_text',
                'attr' => [
                    'class' => 'datetimepicker',
                ],
                //'data' => new \DateTime('now'),
            ])
            ->add('lieu_cin', null, [
                'label' => 'Lieu de réalisation de la carte d\'identité nationale',
            ])
            ->add('sexe', ChoiceType::class, [
                //'value' => false,
                'choices' => $sexe,
                'label' => "Sexe",
                'required' => true,
            ])
            ->add('est_marie', null, [
                'label' => 'Est marié(e) : situation matrimonial',
            ])
            ->add('adresse', null, [
                'label' => 'Adresse actuel du personnel',
            ])
            ->add('telephone', null, [
                'label' => 'Numéro de téléphone du personnel',
            ])
            ->add('telephone_ice', null, [
                'label' => 'Téléphone ICE : à contacter en cas d\'urgence',
            ])
            ->add('date_embauche', null, [
                'label' => 'Date d\'embauche au sein de l\'entreprise',
                'widget' => 'single_text',
                'attr' => [
                    'class' => 'datetimepicker',
                ],
                //'data' => new \DateTime('now'),
            ])
            ->add('dateDepartRetraite', null, [
                'label' => 'Date de départ à la retraite',
                'widget' => 'single_text',
                'attr' => [
                    'class' => 'datetimepicker',
                ],
                //'data' => new \DateTime('now'),
            ])
            ->add('matricule', null, [
                'label' => 'Numéro de matricule',
            ])
            ->add('numero_cnaps', null, [
                'label' => 'Numéro de la carte CNAPS (sécurité social)',
            ])
            ->add('est_militaire', null, [
                'label' => 'Est militaire : situation civique',
            ])
            ->add('actif', null, [
                'label' => 'Est actif : situation fonctionnelle',
            ])
            ->add('contrat', null, [
                'label' => 'Type de contrat au sein de l\'institution',
            ])
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Personnels::class,
        ]);
    }
}
