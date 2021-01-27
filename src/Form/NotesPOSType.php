<?php

namespace App\Form;

use App\Entity\NotesPOS;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class NotesPOSType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('annee', null, [
                'label' => 'Année',
                'widget' => 'single_text',
                'attr' => [
                    'class' => 'datetimepicker',
                ],
                //'data' => new \DateTime('now'),
            ])
            ->add('qf', null, [
                'label' => 'QF',
            ])
            ->add('vet', null, [
                'label' => 'VET',
            ])
            ->add('ags', null, [
                'label' => 'AGS',
            ])
            ->add('niveau', null, [
                'label' => 'Niveau',
            ])
            ->add('potentiel', null, [
                'label' => 'Potentiel',
            ])
            ->add('appreciation_complet', null, [
                'label' => 'Appréciation global',
            ])
            //->add('personnel')
            ->add('personnels', null, [
                'label' => 'Personnel Officier Supérieur',
            ])
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => NotesPOS::class,
        ]);
    }
}
