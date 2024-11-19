<?php

namespace App\Form;

use App\Entity\Districts;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class DistrictsType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('region', null, [
                'label' => 'Région',
            ])
            ->add('district', null, [
                'label' => 'District',
            ])
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Districts::class,
        ]);
    }
}
