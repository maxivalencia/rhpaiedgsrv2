<?php

namespace App\Form;

use App\Entity\NotesPersonnels;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class NotesPersonnelsType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('date_note')
            ->add('note')
            ->add('appreciation_global')
            ->add('reference_note')
            ->add('date_reference')
            ->add('personnel')
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => NotesPersonnels::class,
        ]);
    }
}
