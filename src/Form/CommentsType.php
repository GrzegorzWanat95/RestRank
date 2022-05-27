<?php

namespace App\Form;

use App\Entity\Comments;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;



class CommentsType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('Text', TextareaType::class, [
                'label' => 'Treść:',
                'attr' => ['class' => 'widget__field'],
                'label_attr' => ['class' => 'label__field'],
                'row_attr' => ['class' => 'login__field__in__form'],
            ])
            ->add('Stars', ChoiceType::class, [
                'choices'  => [
                    '★★★★★' => 5,
                    '★★★★' => 4,
                    '★★★' => 3,
                    '★★' => 2,
                    '★' => 1,
                ],
                'label' => 'Moja ocena:',
                'attr' => ['class' => 'widget__field'],
                'label_attr' => ['class' => 'label__field'],
                'row_attr' => ['class' => 'login__field__in__form'],
            ])
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Comments::class,
        ]);
    }
}
