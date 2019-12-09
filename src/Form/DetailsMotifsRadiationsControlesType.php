<?php

namespace App\Form;

use App\Entity\DetailsMotifsRadiationsControles;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class DetailsMotifsRadiationsControlesType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('detail_motif_radiation', null, [
                'label' => 'Détail du motif de radiation',
            ])
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => DetailsMotifsRadiationsControles::class,
        ]);
    }
}
