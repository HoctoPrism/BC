<?php

namespace App\Form;

use App\Entity\Orders;
use App\Entity\Address;
use App\Entity\Useraccount;
use App\Entity\Paymentmethod;
use App\Entity\Status;
use Doctrine\Common\Collections\ArrayCollection;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\DateType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class OrdersType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('promoorder')
            ->add('orderdate', DateType::class, [
                'widget' => 'single_text',
                // this is actually the default format for single_text
                'format' => 'yyyy-MM-dd',
            ])
            ->add('idadress', EntityType::class, [
                'class' => Address::class,
                'choice_label' => 'postadress'
            ])
            ->add('iduser', EntityType::class, [
                'class' => Useraccount::class,
                'choice_label' => 'iduser'
            ])
            ->add('idpayment', EntityType::class, [
                'class' => Paymentmethod::class,
                'choice_label' => 'namepayment'
            ])
            ->add('idstatus', EntityType::class, [
                'class' => Status::class,
                'choice_label' => 'namestatus'
            ])
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Orders::class,
        ]);
    }
}
