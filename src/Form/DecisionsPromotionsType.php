<?php

namespace App\Form;

use App\Entity\DecisionsPromotions;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class DecisionsPromotionsType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('reference_decision')
            ->add('date_decision')
            ->add('genre_decision')
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => DecisionsPromotions::class,
        ]);
    }
}
