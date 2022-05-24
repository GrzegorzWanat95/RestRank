<?php

namespace App\Form;

use App\Entity\Restaurant;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\PasswordType;
use Symfony\Component\Form\Extension\Core\Type\RepeatedType;
use Symfony\Component\HttpFoundation\File\File;


class RestaurantType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('Name', TextType::class, [
                'label' => 'Nazwa',
                'attr' => ['class' => 'widget__field'],
                'label_attr' => ['class' => 'label__field'],
                'row_attr' => ['class' => 'login__field__in__form'],
            ])
            ->add('City',TextType::class, [
                'label' => 'Miasto',
                'attr' => ['class' => 'widget__field'],
                'label_attr' => ['class' => 'label__field'],
                'row_attr' => ['class' => 'login__field__in__form'],
            ])
            ->add('Street',TextType::class, [
                'label' => 'Ulica',
                'attr' => ['class' => 'widget__field'],
                'label_attr' => ['class' => 'label__field'],
                'row_attr' => ['class' => 'login__field__in__form'],
            ])
            ->add('AddressNumber',TextType::class, [
                'label' => 'Numer budynku',
                'attr' => ['class' => 'widget__field'],
                'label_attr' => ['class' => 'label__field'],
                'row_attr' => ['class' => 'login__field__in__form'],
            ])
            ->add('Description',TextType::class, [
                'label' => 'Opis',
                'attr' => ['class' => 'widget__field'],
                'label_attr' => ['class' => 'label__field'],
                'row_attr' => ['class' => 'login__field__in__form'],
            ])
            ->add('Type',TextType::class, [
                'label' => 'Typ',
                'attr' => ['class' => 'widget__field'],
                'label_attr' => ['class' => 'label__field'],
                'row_attr' => ['class' => 'login__field__in__form'],
            ])
            ->add('image',TextType::class, [
                'label' => 'Zdjęcie',
                'attr' => ['class' => 'img__field'],
                'label_attr' => ['class' => 'label__field'],
                'row_attr' => ['class' => 'login__field__in__form'],
            ])
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Restaurant::class,
        ]);
    }
}
