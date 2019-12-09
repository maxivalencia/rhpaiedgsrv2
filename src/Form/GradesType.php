<?php

namespace App\Form;

use App\Entity\Grades;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class GradesType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('grade', null, [
                'label' => 'Grade',
            ])
            ->add('abbreviation', null, [
                'label' => 'Abréviation',
            ])
            ->add('rang', null, [
                'label' => 'Rang du grade',
            ])
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Grades::class,
        ]);
    }
}
