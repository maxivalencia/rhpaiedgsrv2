<?php

namespace App\Form;

use App\Entity\NominationsPersonnels;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class NominationsPersonnelsType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('date_nomination', null, [
                'label' => 'Date de nomination du personnel',
                'widget' => 'single_text',
                'attr' => [
                    'class' => 'datetimepicker',
                ],
                //'data' => new \DateTime('now'),
            ])
            ->add('rang', null, [
                'label' => 'Rang du personnel',
            ])
            ->add('echelon', null, [
                'label' => 'Echélon du personnel',
            ])
            ->add('class', null, [
                'label' => 'Class du personnel',
            ])
            ->add('indice', null, [
                'label' => 'Indice du personnel',
            ])
            ->add('grade', null, [
                'label' => 'Grade du personnel',
            ])
            ->add('personnel', null, [
                'label' => 'Personnel',
            ])
            ->add('decision', null, [
                'label' => 'Décision de nomination du personnel',
            ])
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => NominationsPersonnels::class,
        ]);
    }
}
