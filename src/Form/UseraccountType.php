<?php

namespace App\Form;

use App\Entity\Useraccount;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Validator\Constraints\NotBlank;
use Symfony\Component\Validator\Constraints\Length;
use Symfony\Component\Form\Extension\Core\Type\DateType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\PasswordType;
use Symfony\Component\Form\Extension\Core\Type\TelType;
use Symfony\Component\Form\Extension\Core\Type\TextType;

class UseraccountType extends AbstractType
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
/*                 "expanded" => true,
                'choice_attr' => function(){ return ['class' => 'form-check-input'];} */
            ])
            ->add('emailuser', TextType::class)
            ->add('birthuser', DateType::class, [
                'widget' => 'single_text',
                // this is actually the default format for single_text
                'format' => 'yyyy-MM-dd',
            ])
            /* ->add('vauncheruser') */
/*             ->add('phoneuser', TelType::class, [
                'required' => false
            ]) */
            ->add('phonemobileuser', TelType::class)
            /* ->add('nborderuser') */
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Useraccount::class,
        ]);
    }
}
