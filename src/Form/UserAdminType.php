<?php

namespace App\Form;

use App\Entity\Useraccount;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\CheckboxType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\DateType;
use Symfony\Component\Form\Extension\Core\Type\PasswordType;
use Symfony\Component\Form\Extension\Core\Type\TelType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Validator\Constraints\Length;
use Symfony\Component\Validator\Constraints\NotBlank;

class UserAdminType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('firstnameuser', TextType::class)
                ->add('lastnameuser', TextType::class)
                ->add('gender', ChoiceType::class, [
                    'choices' => [
                        'Homme' => 'Homme',
                        'Femme' => 'Femme',
                    ],
                ])
                ->add('emailuser', TextType::class)
                ->add('birthuser', DateType::class, [
                    'widget' => 'single_text',
                    'format' => 'yyyy-MM-dd',
                ])
                ->add('pwduser', PasswordType::class, [
                    'mapped' => false,
                    'required' => false,
                    'attr' => ['autocomplete' => 'new-password'],
                    'constraints' => [
                        new NotBlank([
                            'message' => 'Please enter a password',
                        ]),
                        new Length([
                            'min' => 6,
                            'minMessage' => 'Your password should be at least {{ limit }} characters',
                            'max' => 4096,
                        ]),
                    ],
                ])
                ->add('phonemobileuser', TelType::class)
                ->add('phoneuser', TelType::class, [
                    'required' => false
                ])
                ->add('roles', ChoiceType::class, [
                    'choices'   => [
                        'ROLE_ADMIN'   => 'ROLE_ADMIN',
                        'ROLE_ANON'      => 'ROLE_ANON'
                    ],
                    'expanded' => true,
                    'multiple'  => true,
                    'choice_attr' => function($choice, $key, $value) {
                        return ['class' => 'p_checkbox form-check-input mx-2'];
                    },
                ])
                ->add('isverified', CheckboxType::class, [
                    'required' => false
                ])
                ;
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Useraccount::class,
        ]);
    }
}
