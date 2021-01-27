<?php

namespace App\Form;

use App\Entity\Enfants;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;

class EnfantsType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $sexe = [
            'Féminin' => true,
            'Masculin' => false
        ];
        $qualite = [
            'Légitime' => 'L',
            'Réconnu' => 'R',
            'Adopté' => 'A'
        ];
        $builder
            ->add('rang', null, [
                'label' => 'Rang de l\'enfant',
            ])
            ->add('nom', null, [
                'label' => 'Nom',
            ])
            ->add('prenom', null, [
                'label' => 'Prénom',
            ])
            ->add('date_naissance', null, [
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
            ->add('sexe', ChoiceType::class, [
                //'value' => false,
                'choices' => $sexe,
                'label' => "Sexe",
                'required' => true,
            ])
            ->add('qualite', ChoiceType::class, [
                //'value' => false,
                'choices' => $qualite,
                'label' => "Qualité de l'enfant",
                'required' => true
            ])
            ->add('est_decede', null, [
                'label' => 'Est décedé : si l\'enfant est décedé',
            ])
            ->add('date_dece', null, [
                'label' => 'Date de décé de l\'enfant si l\'enfant est décedé',
                'widget' => 'single_text',
                'attr' => [
                    'class' => 'datetimepicker',
                ],
                //'data' => new \DateTime('now'),
            ])
            ->add('personnel', null, [
                'label' => 'Personnel parent de l\'enfant',
            ])
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Enfants::class,
        ]);
    }
}
