<?php

namespace App\Form;

use App\Entity\User;
use App\Entity\Roles;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\RepeatedType;
use Symfony\Component\Form\Extension\Core\Type\PasswordType;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;

class UserType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $roles = [
            'Administrateur' => 'ADMIN',
            'Superviseur' => 'SUPERVISEUR',
            'Militaire' => 'MILITAIRE',
            'Civil' => 'CIVIL'
        ];
        $builder
            ->add('username', null, [
                'label' => 'Nom de l\'utilisateur',
            ])
            /* ->add('roles', null, [
                'label' => 'Rôle de l\'utilisateur',
            ]) */
            ->add('rolesimple', ChoiceType::class, [
                'choices' => $roles,
                'label' => "Rôle de l\'utilisateur",
                'required' => true,
            ])
            ->add('password', RepeatedType::class, [
                'type' => PasswordType::class,
                'invalid_message' => 'Les mots de pass sont différent.',
                'options' => ['attr' => ['class' => 'password-field']],
                'required' => true,
                'first_options'  => ['label' => 'Veuillez entrer le Mot de pass de l\'utilisateur'],
                'second_options' => ['label' => 'Veuillez repeter le mot de pass de l\'utilisateur'],
            ])
            ->add('utilisateur', null, [
                'label' => 'Personnel utilisateur',
            ])
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => User::class,
        ]);
    }
}
