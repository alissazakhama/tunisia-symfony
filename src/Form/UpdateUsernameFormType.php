<?php

namespace App\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Validator\Constraints\NotBlank;
use Symfony\Component\Validator\Constraints\Length;

class UpdateUsernameFormType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('username', TextType::class, [
                'label' => 'New Username',
                'constraints' => [
                    new NotBlank(message:'Please enter a username.'),
                    new Length(
                        min: 3,
                        minMessage: 'Username must be at least {{ limit }} characters.',
                        max:  30,
                        maxMessage: 'Username cannot exceed {{ limit }} characters.',
                    ),
                ],
                'attr' => ['placeholder' => 'Enter new username'],
            ])
            ->add('save', SubmitType::class, [
                'label' => 'Update Username',
            ])
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([]);
    }
}
