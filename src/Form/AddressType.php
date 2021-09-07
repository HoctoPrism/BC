<?php

namespace App\Form;

use App\Entity\Address;
use App\Entity\Useraccount;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\NumberType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class AddressType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        {
            $builder
                ->add('typeadress', ChoiceType::class, [
                    'choices' => [
                        'Perso' => 'Perso',
                        'Pro' => 'Pro',
                    ],
                    'required' => true
                ])
                ->add('postadress', TextType::class, [
                    'required' => true
                ])
                ->add('postadress2', TextType::class, [
                    'required' => true
                ])
                ->add('cpadress', NumberType::class, [
                    'required' => true
                ])
                ->add('countryadress', TextType::class, [
                    'required' => true
                ])
/*                 ->add('iduser', EntityType::class, [
                    'class' => Useraccount::class,
                    'choice_label' => 'firstnameuser'

                ]) */
            ;
        }
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Address::class,
        ]);
    }
}
