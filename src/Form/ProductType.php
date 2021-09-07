<?php

namespace App\Form;

use App\Entity\Product;
use App\Entity\Category;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\Extension\Core\Type\CheckboxType;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\Extension\Core\Type\FileType;
use Symfony\Component\Form\Extension\Core\Type\NumberType;
use Symfony\Component\Validator\Constraints\File;

class ProductType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('nameproduct', TextType::class)
            ->add('brandproduct', TextType::class)
            ->add('descriptionproduct', TextareaType::class)
            ->add('htproduct', NumberType::class)
            ->add('qtyproduct', NumberType::class, [
                "required" => false
            ])
            ->add('isactive', CheckboxType::class, [
                'mapped' => false,
                'required' => false
            ])
            ->add('quickdescript', TextareaType::class)
            ->add('saveur', TextType::class, [
                "required" => false
            ])
            ->add('composition', TextareaType::class, [
                'required' => false
            ])
            ->add('descriptionProduct2', TextareaType::class, [
                'required' => false
            ])
            ->add('descriptionProduct3', TextareaType::class, [
                'required' => false
            ])
            ->add('descriptionProduct4', TextareaType::class, [
                'required' => false
            ])
            ->add('idcategory', EntityType::class, [
                'class' => Category::class,
                /* 'choice_label' => 'nameCategory' */
            ])
            ->add('image1', FileType::class, [
                'label' => 'logo',
                'mapped' => false,
                'required' => false,
                'constraints' => [
                    new File([
                        'maxSize' => "1024k",
                        'mimeTypes' => [
                            'image/png',
                            'image/jpeg',
                            'image/webp'
                        ],
                        'mimeTypesMessage' => "Merci de charger une image valide d'un taille inférieur à 1mo et au format : JPEG, PNG, WEBP"
                    ])
                ]
            ])
            ->add('image2', FileType::class, [
                'label' => 'logo',
                'mapped' => false,
                'required' => false,
                'constraints' => [
                    new File([
                        'maxSize' => "1024k",
                        'mimeTypes' => [
                            'image/png',
                            'image/jpeg',
                            'image/webp'
                        ],
                        'mimeTypesMessage' => "Merci de charger une image valide d'un taille inférieur à 1mo et au format : JPEG, PNG, WEBP"
                    ])
                ]
            ])
            ->add('image3', FileType::class, [
                'label' => 'logo',
                'mapped' => false,
                'required' => false,
                'constraints' => [
                    new File([
                        'maxSize' => "1024k",
                        'mimeTypes' => [
                            'image/png',
                            'image/jpeg',
                            'image/webp'
                        ],
                        'mimeTypesMessage' => "Merci de charger une image valide d'un taille inférieur à 1mo et au format : JPEG, PNG, WEBP"
                    ])
                ]
            ])
            ->add('image4', FileType::class, [
                'label' => 'logo',
                'mapped' => false,
                'required' => false,
                'constraints' => [
                    new File([
                        'maxSize' => "1024k",
                        'mimeTypes' => [
                            'image/png',
                            'image/jpeg',
                            'image/webp'
                        ],
                        'mimeTypesMessage' => "Merci de charger une image valide d'un taille inférieur à 1mo et au format : JPEG, PNG, WEBP"
                    ])
                ]
            ])
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Product::class,
        ]);
    }
}
