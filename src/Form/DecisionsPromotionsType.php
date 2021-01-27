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
            ->add('reference_decision', null, [
                'label' => 'Reférence de la décision',
            ])
            ->add('date_decision', null, [
                'label' => 'Date de la décision',
                'widget' => 'single_text',
                'attr' => [
                    'class' => 'datetimepicker',
                ],
                //'data' => new \DateTime('now'),
            ])
            ->add('genre_decision', null, [
                'label' => 'Genre de la décision',
            ])
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => DecisionsPromotions::class,
        ]);
    }
}
