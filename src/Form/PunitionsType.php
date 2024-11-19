<?php

namespace App\Form;

use App\Entity\Punitions;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class PunitionsType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('personnel', null, [
                'label' => 'Personnel concerné',
            ])
            ->add('sanction', null, [
                'label' => 'Sanction',
            ])
            ->add('libelle', null, [
                'label' => 'Punition',
            ])
            ->add('reference', null, [
                'label' => 'Reférence',
            ])
            ->add('date_reference', null, [
                'label' => 'Date de reférence',
                'widget' => 'single_text',
                'attr' => [
                    'class' => 'datetimepicker',
                ],
            ])
            ->add('date_effet', null, [
                'label' => 'Date de l\'effectivité',
                'widget' => 'single_text',
                'attr' => [
                    'class' => 'datetimepicker',
                ],
            ])
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Punitions::class,
        ]);
    }
}
