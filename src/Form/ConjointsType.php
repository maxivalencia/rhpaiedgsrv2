<?php

namespace App\Form;

use App\Entity\Conjoints;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;

class ConjointsType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $sexe = [
            'Féminin' => true,
            'Masculin' => false
        ];
        $builder
            ->add('rang', null, [
                'label' => 'Rang par rapport au nombre d\'exconjoint du personnel',
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
                'data' => new \DateTime('now'),
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
            ->add('sexe', ChoiceType::class, [
                //'value' => false,
                'choices' => $sexe,
                'label' => "Sexe",
                'required' => true,
            ])
            ->add('date_mariage', null, [
                'label' => 'Date du mariage',
                'widget' => 'single_text',
                'attr' => [
                    'class' => 'datetimepicker',
                ],
                'data' => new \DateTime('now'),
            ])
            ->add('numero_cin', null, [
                'label' => 'Numéro de la carte d\'identité national',
            ])
            ->add('date_cin', null, [
                'label' => 'Date de réalisation de la carte d\identité national',
                'widget' => 'single_text',
                'attr' => [
                    'class' => 'datetimepicker',
                ],
                'data' => new \DateTime('now'),
            ])
            ->add('lieu_cin', null, [
                'label' => 'Lieu de réalisation de la carte d\identité national',
            ])
            ->add('reference_autorisation_mariage', null, [
                'label' => 'Reférence de l\'autorisation de mariage',
            ])
            ->add('date_reference_autorisation_mariage', null, [
                'label' => 'Date de la reférence de l\'autorisarion de mariage',
                'widget' => 'single_text',
                'attr' => [
                    'class' => 'datetimepicker',
                ],
                'data' => new \DateTime('now'),
            ])
            ->add('lieu_mariage', null, [
                'label' => 'Lieu de mariage',
            ])
            ->add('reference_officiel_mariage', null, [
                'label' => 'Reférence officiel du mariage',
            ])
            ->add('date_reference_officiel_mariage', null, [
                'label' => 'Date de reférence officiel du mariage',
                'widget' => 'single_text',
                'attr' => [
                    'class' => 'datetimepicker',
                ],
                'data' => new \DateTime('now'),
            ])
            ->add('commune', null, [
                'label' => 'Commune du lieu de mariage',
            ])
            ->add('personnel', null, [
                'label' => 'Conjoint au sein de la DGSR',
            ])
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Conjoints::class,
        ]);
    }
}
