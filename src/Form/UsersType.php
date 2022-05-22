<?php

namespace App\Form;

use App\Entity\Users;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\PasswordType;
use Symfony\Component\Form\Extension\Core\Type\RepeatedType;

class UsersType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('Login', TextType::class, [
                'label' => 'Login',
                'attr' => ['class' => 'widget__field'],
                'label_attr' => ['class' => 'label__field'],
                'row_attr' => ['class' => 'login__field__in__form'],
            ])
            ->add('Password', RepeatedType::class, array(
                'type' => PasswordType::class,
                'label' => 'Hasło',
                'attr' => ['class' => 'widget__field'],
                'label_attr' => ['class' => 'label__field'],
                'invalid_message' => 'Hasła muszą być takie same.',
                'options' => array('attr' => array('class' => 'widget__field')),
                'required' => true,
                'first_options'  => array('label' => 'Hasło','attr' => ['class' => 'widget__field'],'label_attr' => ['class' => 'label__field'], 'row_attr' => ['class' => 'login_'], 'row_attr' => ['class' => 'login__field__in__form']),
                'second_options' => array('label' => 'Powtórz hasło','attr' => ['class' => 'widget__field'],'label_attr' => ['class' => 'label__field'], 'row_attr' => ['class' => 'login__field__in__form']),
            ))
            ->add('Email', TextType::class, [
                'label' => 'Email',
                'attr' => ['class' => 'widget__field'],
                'label_attr' => ['class' => 'label__field'],
                'row_attr' => ['class' => 'login__field__in__form'],
            ])
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Users::class,
        ]);
    }
}
