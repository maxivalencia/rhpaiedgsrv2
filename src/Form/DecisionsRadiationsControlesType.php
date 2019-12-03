<?php

namespace App\Form;

use App\Entity\DecisionsRadiationsControles;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class DecisionsRadiationsControlesType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('reference_decision')
            ->add('date_reference')
            ->add('reference_journal_officiel')
            ->add('date_journal_officiel')
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => DecisionsRadiationsControles::class,
        ]);
    }
}
