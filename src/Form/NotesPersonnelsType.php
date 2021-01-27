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
            ->add('date_note', null, [
                'label' => 'Date de notation',
                'widget' => 'single_text',
                'attr' => [
                    'class' => 'datetimepicker',
                ],
                //'data' => new \DateTime('now'),
            ])
            ->add('note', null, [
                'label' => 'Note',
            ])
            ->add('appreciation_global', null, [
                'label' => 'Appréciation global',
            ])
            ->add('reference_note', null, [
                'label' => 'Reférence de la note',
            ])
            ->add('date_reference', null, [
                'label' => 'Date de reférence de la note',
                'widget' => 'single_text',
                'attr' => [
                    'class' => 'datetimepicker',
                ],
                //'data' => new \DateTime('now'),
            ])
            ->add('personnel', null, [
                'label' => 'Personnel noté',
            ])
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => NotesPersonnels::class,
        ]);
    }
}
