<?php

namespace App\Form;

use App\Entity\Regions;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class RegionsType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('code',TextType::class,[
                'label' => 'Code Régions  ',
                'attr'=> ['placeholder' => '','class' => 'form-control']
            ])
            ->add('region',TextType::class,[
                'label' => 'Régions :  ',
                'attr'=> ['placeholder' => '','class' => 'form-control']
            ])
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Regions::class,
        ]);
    }
}
