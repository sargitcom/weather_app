<?php

namespace App\Form\Type;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;

class FormType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('city', TextType::class, [])
            ->add(
                'country', 
                ChoiceType::class, 
                [
                    'choices'  => [
                        'Polska' => 'pl',
                        'Niemcy' => 'de',
                        'Francja' => 'fr',
                        'Wielka brytania' => 'gb',
                    ],
                ]
            );
        ;
    }
}