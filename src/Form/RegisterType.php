<?php

namespace App\Form;

use App\Entity\Users;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\BirthdayType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\EmailType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\PasswordType;
use Symfony\Component\Form\Extension\Core\Type\RepeatedType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Validator\Constraints\Length;


class RegisterType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
        ->add('lastname', TextType::class, [
            'label' => 'Votre nom' ,
            'constraints' => new Length(20,2),
            'attr' => [
                'placeholder' => 'Merci de saisir votre nom',
                'class' => 'text-dark'
                ]
                ])
        ->add('firstname', TextType::class, [
            'label' => 'Votre Prénom' ,
            'constraints' => new Length(20,2),
            'attr' => [
                'placeholder' => 'Merci de saisir votre prénom'
            ]
    ])
            
    ->add('email', EmailType::class, [
        'label' => 'Votre email',
        'attr' => [
            'placeholder' => 'Merci de saisir votre adresse email'
        ]
    ])
    ->add('password', RepeatedType::class, [
        'type' => PasswordType::class,
        'constraints' => new Length(20,6),
        'invalid_message' => 'Le mot de passe et la confirmation doivent être identique.',
        'label' => 'Votre mot de passe',
        'required' => true,
        'first_options' => [
            'label' => 'Mot de passe',
            'attr' => [
                'placeholder' => 'Merci de saisir votre mot de passe.'
            ]
        ],
        'second_options' => [
            'label' => 'Confirmez votre mot de passe',
            'attr' => [
                'placeholder' => 'Merci de confirmer votre mot de passe.'
            ]
        ]
    ])
    ->add('adress', TextareaType::class, [
        'label' => 'Entrez votre adresse',
        'attr' => [
            'placeholder' => 'Merci de préciser votre adresse.'
            ]
            ])
    ->add('zipcode', null, [
        'label' => 'Entrez votre code postal',
        'attr' => [
            'placeholder' => 'Merci de préciser votre code postal.'
            ]
    ])
    ->add('city', TextType::class, [
        'label' => 'Votre Ville' ,
        'attr' => [
            'placeholder' => 'Merci de saisir votre ville'
        ]
])
    ->add('birthday', BirthdayType::class, [
        'label' => 'Entrez votre date de naissance',
        'attr' => [
            'placeholder' => 'Merci de préciser votre date de naissance.'
            ]
    ] )
    ->add('submit', SubmitType::class, [
                'label' => "S'inscrire",
                'attr' => [
                    'class' =>"btn text-white",
                    'style' => 'background:#5C636A'
                ]
            ])
    ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Users::class,
        ]);
    }
}

