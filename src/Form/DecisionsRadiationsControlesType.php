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
            ->add('reference_decision', null, [
                'label' => 'Reférence de la décision',
            ])
            ->add('date_reference', null, [
                'label' => 'Date de reférence de la décision',
                'widget' => 'single_text',
                'attr' => [
                    'class' => 'datetimepicker',
                ],
                'data' => new \DateTime('now'),
            ])
            ->add('reference_journal_officiel', null, [
                'label' => 'Reférence dans le journal officiel',
            ])
            ->add('date_journal_officiel', null, [
                'label' => 'Date du journal officiel',
                'widget' => 'single_text',
                'attr' => [
                    'class' => 'datetimepicker',
                ],
                'data' => new \DateTime('now'),
            ])
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => DecisionsRadiationsControles::class,
        ]);
    }
}
