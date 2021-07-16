<?php

namespace App\Form;

use App\Entity\Product;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\Extension\Core\Type\CheckboxType;

class ProductType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('nameproduct', TextType::class)
            ->add('brandproduct', TextType::class)
            ->add('descriptionproduct', TextareaType::class)
            ->add('htproduct')
            ->add('qtyproduct')
            ->add('isactive', CheckboxType::class, [
                'mapped' => false,
            ])
            ->add('quickdescript', TextareaType::class)
            ->add('saveur')
            ->add('composition', TextareaType::class)
            ->add('descriptionProduct2', TextareaType::class)
            ->add('descriptionProduct3', TextareaType::class)
            ->add('descriptionProduct4', TextareaType::class)
            ->add('idcategory')
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Product::class,
        ]);
    }
}
