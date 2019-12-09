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
            ->add('numero', null, [
                'label' => 'Numero du diplôme',
            ])
            ->add('date', null, [
                'label' => 'Date d\'obtention du diplôme',
                'widget' => 'single_text',
                'attr' => [
                    'class' => 'datetimepicker',
                ],
                'data' => new \DateTime('now'),
            ])
            ->add('diplome', null, [
                'label' => 'Diplôme',
            ])
            ->add('personnel', null, [
                'label' => 'Personnel',
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
