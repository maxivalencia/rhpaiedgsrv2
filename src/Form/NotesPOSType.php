<?php

namespace App\Form;

use App\Entity\NotesPOS;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class NotesPOSType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('annee')
            ->add('qf')
            ->add('vet')
            ->add('ags')
            ->add('niveau')
            ->add('potentiel')
            ->add('appreciation_complet')
            //->add('personnel')
            ->add('personnels')
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => NotesPOS::class,
        ]);
    }
}
