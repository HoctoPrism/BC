<?php

namespace App\Form;

use App\Entity\Brand;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\FileType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Validator\Constraints\File;

class BrandType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('nameBrand', TextType::class)
            ->add('description', TextareaType::class, [
                'required' => false
            ])
            ->add('Logo', FileType::class, [
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
            'data_class' => Brand::class,
        ]);
    }
}
