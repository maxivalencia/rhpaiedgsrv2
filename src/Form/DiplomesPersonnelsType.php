<?php

namespace App\Form;

use App\Entity\DiplomesPersonnels;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class DiplomesPersonnelsType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('personnel', null, [
                'label' => 'Personnel',
            ])
            ->add('diplome', null, [
                'label' => 'Diplôme',
            ])
            ->add('numero', null, [
                'label' => 'Numero du diplôme',
            ])
            ->add('date', null, [
                'label' => 'Date d\'obtention du diplôme',
                'widget' => 'single_text',
                'attr' => [
                    'class' => 'datetimepicker',
                ],
                //'data' => new \DateTime('now'),
            ])


        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => DiplomesPersonnels::class,
        ]);
    }
}
