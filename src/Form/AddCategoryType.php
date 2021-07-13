<?php

namespace App\Form;

use App\Entity\Category;
use stdClass;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;

class AddCategoryType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('namecategory', TextType::class)
             ->add('idcategoryparent') 
     /*        ->add('idcategoryparent', EntityType::class,[
                'class'=>Category::class,
                'choice_label'=>'idcategory',
            ]) */
            ->add('Envoyer', SubmitType::class);
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Category::class,
            'idcategoryparent' => null,
        ]);
    }
}
