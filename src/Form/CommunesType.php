<?php

namespace App\Form;

use App\Entity\Communes;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class CommunesType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('commune', null, [
                'label' => 'Commune',
            ])
            ->add('type', null, [
                'label' => 'Type',
            ])
            ->add('district', null, [
                'label' => 'District',
            ])
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Communes::class,
        ]);
    }
}
