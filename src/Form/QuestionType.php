<?php

namespace App\Form;

use App\Entity\Question;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Validator\Constraints\Length;
use Symfony\Component\Validator\Constraints\NotBlank;

class QuestionType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('name', null, [
                "constraints" =>[
                    new NotBlank([
                        "message" => "Your question may not be blank.",
                    ]),
                    new Length([
                        'max' => 255,
                        "maxMessage" => "Your question can only be {{ limit }} characters long.",
                    ])
                ]
            ])
            ->add('description', TextareaType::class, [
                "required" => false,
                'attr' => [
                    'rows' => 5,
                ],
                'label' => 'Description (optional)'
            ])
            ->add("submir", SubmitType::class, [
                'label' => 'Ask Question'
            ])
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Question::class,
        ]);
    }
}
