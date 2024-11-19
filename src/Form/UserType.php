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
            '' => '',
            'Administrateur' => 'ADMIN',
            'Civil' => 'CIVIL',
            'Militaire' => 'MILITAIRE',
            'Personnel' => 'PERSONNEL',
            'Staff' => 'STAFF',
            'Superviseur' => 'SUPERVISEUR',
        ];
        $builder
            ->add('utilisateur', null, [
                'label' => 'Personnel utilisateur',
            ])
            ->add('username', null, [
                    'label' => 'Nom de l\'utilisateur',
            ])
            ->add('rolesimple', ChoiceType::class, [
                'choices' => $roles,
                'label' => 'Rôle de l\'utilisateur',
                'required' => true,
            ])
            ->add('password', RepeatedType::class, [
                'type' => PasswordType::class,
                'invalid_message' => 'Les mots de passe sont différent.',
                'options' => ['attr' => ['class' => 'password-field']],
                'required' => true,
                'first_options'  => ['label' => 'Veuillez entrer le mot de passe de l\'utilisateur'],
                'second_options' => ['label' => 'Veuillez repeter le mot de passe de l\'utilisateur'],
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
