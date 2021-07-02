<?php

namespace App\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\EmailType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class SavType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('NumeroCommande', TextType::class)
            ->add('Email', EmailType::class)
            ->add('Sujet', ChoiceType::class, [
                    'choices' => [
                        'Produit défectueux' => true,
                        'Produit incomplet' => true,
                        'Pièce cassée' => true,
                        'Produit périmée' => true,
                    ],
/*                     "expanded" => true,
                    'choice_attr' => function(){ return ['class' => 'p-5'];}, */
                ]   
            )
            ->add('Message', TextareaType::class, [
                'attr' =>  ['rows' => 3, 'cols' => 50]
            ])
            ->add('Envoyer', SubmitType::class);
    }
    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
        ]);
    }
}
?>