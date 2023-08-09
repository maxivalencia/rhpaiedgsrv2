<?php

namespace App\Form;

use App\Entity\Unites;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class ConsultationCentreType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('Unites', EntityType::class, [
                'class' => Unites::class,
                'multiple'     => true,
                ])
            //->add('libelle')
            //->add('abbreviation')
            //->add('localite')
            //->add('email')
            //->add('phone')
            //->add('commune')
            //->add('unite_superieur')
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Unites::class,
        ]);
    }
}
