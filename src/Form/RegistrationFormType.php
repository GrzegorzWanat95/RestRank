<?php

namespace App\Form;

use App\Entity\User;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\CheckboxType;
use Symfony\Component\Form\Extension\Core\Type\PasswordType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Validator\Constraints\IsTrue;
use Symfony\Component\Validator\Constraints\Length;
use Symfony\Component\Validator\Constraints\NotBlank;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\RepeatedType;

class RegistrationFormType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('email', TextType::class, [
                'label' => 'Email',
                'attr' => ['class' => 'widget__field'],
                'label_attr' => ['class' => 'label__field'],
                'row_attr' => ['class' => 'login__field__in__form'],
            ])

            ->add('Login', TextType::class, [
                'label' => 'Login',
                'attr' => ['class' => 'widget__field'],
                'label_attr' => ['class' => 'label__field'],
                'row_attr' => ['class' => 'login__field__in__form'],
            ])

            ->add('agreeTerms', CheckboxType::class, [
                'label' => 'Akceptuję zasady RestRank',
                'mapped' => false,
                'constraints' => [
                    new IsTrue([
                        'message' => 'Konieczna jest akceptacja warunków portalu.',
                    ]),
                ],
            ])

            ->add('plainPassword', RepeatedType::class, array(
                'type' => PasswordType::class,
                'mapped' => false,
                'constraints' => [
                    new NotBlank([
                        'message' => 'Please enter a password',
                    ]),
                    new Length([
                        'min' => 6,
                        'minMessage' => 'Hasło musi wynosić przynajmniej {{ limit }} znaków',
                        // max length allowed by Symfony for security reasons
                        'max' => 4096,
                    ]),
                ],
                'label' => 'Hasło',
                'attr' => ['autocomplete' => 'new-password'],
                'attr' => ['class' => 'widget__field'],
                'label_attr' => ['class' => 'label__field'],
                'invalid_message' => 'Hasła muszą być takie same.',
                'options' => array('attr' => array('class' => 'widget__field')),
                'required' => true,
                'first_options'  => array('label' => 'Hasło','attr' => ['class' => 'widget__field'],'label_attr' => ['class' => 'label__field'], 'row_attr' => ['class' => 'login_'], 'row_attr' => ['class' => 'login__field__in__form']),
                'second_options' => array('label' => 'Powtórz hasło','attr' => ['class' => 'widget__field'],'label_attr' => ['class' => 'label__field'], 'row_attr' => ['class' => 'login__field__in__form']),
            ));
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => User::class,
        ]);
    }
}
