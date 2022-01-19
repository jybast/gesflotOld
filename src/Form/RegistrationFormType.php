<?php

namespace App\Form;

use App\Entity\User;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\Validator\Constraints\Regex;
use Symfony\Component\Validator\Constraints\IsTrue;
use Symfony\Component\Validator\Constraints\Length;
use Symfony\Component\Validator\Constraints\NotBlank;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Contracts\Translation\TranslatorInterface;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\EmailType;
use Symfony\Component\Form\Extension\Core\Type\CheckboxType;
use Symfony\Component\Form\Extension\Core\Type\PasswordType;

class RegistrationFormType extends AbstractType
{
    private $translator;

    public function __construct(TranslatorInterface $translator)
    {
        $this->translator = $translator;
    }

    public function buildForm(FormBuilderInterface $builder, array $options): void
    {

        $builder
            ->add('email', EmailType::class, [
                'label' => 'email',
                'constraints' => [
                    new Regex([
                        'pattern' => "#^[a-zA-Z0-9.!$\#%&'*+/=?^_`{|}~-]+@[a-zA-Z0-9-]+(?:\.[a-zA-Z0-9-]+)*$#",
                        'message' => $this->translator->trans('The format of your email is incorrect')
                    ])
                ]
            ])
            ->add('lastname', TextType::class, [
                'label' => $this->translator->trans('lastname'),
                'required' => false
            ])
            ->add('firstname', TextType::class, [
                'label' => $this->translator->trans('firstname'),
                'required' => false
            ])
            ->add('adress', TextType::class, [
                'label' => $this->translator->trans('Adress'),
                'required' => false
            ])
            ->add('city', TextType::class, [
                'label' => $this->translator->trans('city'),
                'required' => false
            ])
            ->add('postcode', TextType::class, [
                'label' => $this->translator->trans('postalcode'),
                'required' => false
            ])
            ->add('phone', TextType::class, [
                'label' => $this->translator->trans('phone'),
                'required' => false
            ])
            ->add('agreeTerms', CheckboxType::class, [
                'label' => $this->translator->trans('Agree terms'),
                'mapped' => false,
                'constraints' => [
                    new IsTrue([
                        'message' => $this->translator->trans('You should agree to our terms.'),
                    ]),
                ],
            ])
            ->add('plainPassword', PasswordType::class, [
                // instead of being set onto the object directly,
                // this is read and encoded in the controller
                'mapped' => false,
                'attr' => ['autocomplete' => 'new-password'],
                'constraints' => [
                    new NotBlank([
                        'message' => $this->translator->trans('Please enter a password'),
                    ]),
                    /*
                    new Length([
                        'min' => 6,
                        'minMessage' => "Your password should be at least {{ limit }} characters",
                        // max length allowed by Symfony for security reasons
                        'max' => 4096,
                    ]),
                    */
                    new Regex([
                        'pattern' => '#^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[@$!%*?&])[A-Za-z\d@$!%*?&]{8,}$#',
                        'message' => $this->translator->trans('At least eight characters, at least one uppercase letter, one lowercase letter, one number and one special character')

                    ])
                ],
            ]);
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => User::class,
        ]);
    }
}
