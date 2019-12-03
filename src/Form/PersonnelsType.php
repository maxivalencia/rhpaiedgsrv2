<?php

namespace App\Form;

use App\Entity\Personnels;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class PersonnelsType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('nom')
            ->add('prenoms')
            ->add('date_naissance')
            ->add('lieu_naissance')
            ->add('nom_pere')
            ->add('nom_mere')
            ->add('num_cin')
            ->add('date_cin')
            ->add('lieu_cin')
            ->add('sexe')
            ->add('est_marie')
            ->add('adresse')
            ->add('telephone')
            ->add('telephone_ice')
            ->add('date_embauche')
            ->add('matricule')
            ->add('numero_cnaps')
            ->add('est_militaire')
            ->add('actif')
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Personnels::class,
        ]);
    }
}
