<?php

namespace App\Form;

use App\Entity\Photos;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class PhotosType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('photo', null, [
                'label' => 'Photo',
            ])
            ->add('type', null, [
                'label' => 'Type',
            ])
            ->add('taille', null, [
                'label' => 'Taille',
            ])
            ->add('personnel', null, [
                'label' => 'Personnel',
            ])
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Photos::class,
        ]);
    }
}
