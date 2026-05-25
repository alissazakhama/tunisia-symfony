<?php

namespace App\Form;

use App\Entity\Review;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Validator\Constraints\Length;
use Symfony\Component\Validator\Constraints\NotBlank;
use Symfony\Component\Validator\Constraints\Range;

class ReviewFormType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('rating', ChoiceType::class, [
                'label' => 'Your rating',
                'choices' => [
                    '5 stars' => 5,
                    '4 stars' => 4,
                    '3 stars' => 3,
                    '2 stars' => 2,
                    '1 star' => 1,
                ],
                'expanded' => true,
                'multiple' => false,
                'constraints' => [
                    new NotBlank(message: 'Please select a star rating.'),
                    new Range(min: 1, max: 5),
                ],
            ])
            ->add('comment', TextareaType::class, [
                'label' => 'Your comment',
                'attr' => [
                    'rows' => 4,
                    'placeholder' => 'Share your experience visiting this destination...',
                ],
                'constraints' => [
                    new NotBlank(message: 'Please write a comment.'),
                    new Length(min: 3, max: 2000),
                ],
            ]);
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Review::class,
        ]);
    }
}
