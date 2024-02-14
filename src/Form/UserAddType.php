<?php

namespace App\Form;

use App\Entity\User;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\DateType; // Import DateType from Symfony form component
use Symfony\Component\Form\Extension\Core\Type\PasswordType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Validator\Constraints as Assert;

class UserAddType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('nom', TextType::class)
            ->add('prenom', TextType::class)
            ->add('mail', TextType::class)
            ->add('date_birthday', DateType::class, [
                'widget' => 'single_text',
                'years' => range(1960, date('Y')),
            ])
            ->add('tel', TextType::class)
            ->add('gender', ChoiceType::class, [
                'choices' => [
                    'Man' => 'Man',
                    'Women' => 'Women',
                ],
            ])
            ->add('password', PasswordType::class)
            ->add('Confirmpassword', PasswordType::class)
            ->add('age', TextType::class)
            ->add('Register', SubmitType::class, [
                'attr' => [
                    'class' => 'btn btn-primary font-weight-bold mt-3',
                ],
            ]); //class lkol homa nafshom eli mwjoudin fi template bootstrap
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => User::class,
        ]);
    }
}
