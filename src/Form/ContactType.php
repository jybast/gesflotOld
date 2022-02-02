<?php

namespace App\Form;

use Symfony\Component\Form\AbstractType;
//use FOS\CKEditorBundle\Form\Type\CKEditorType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Contracts\Translation\TranslatorInterface;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\EmailType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;

class ContactType extends AbstractType
{
    private $translator;

    public function __construct(TranslatorInterface $translator)
    {
        $this->translator = $translator;
    }
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('email', EmailType::class, [
                'label' => $this->translator->trans('Your email adress'),
                'label_attr' => ['class' => 'formulaire-label',],

                'attr' => [
                    'class' => 'form-control',
                    'placeholder' =>  $this->translator->trans('Your email adress')
                ]
            ])
            ->add('sujet', TextType::class, [
                'label' => $this->translator->trans('Subject'),
                'label_attr' => ['class' => 'formulaire-label',],

                'attr' => [
                    'class' => 'form-control',
                    'placeholder' => $this->translator->trans('Subject')
                ]
            ])
            ->add('message', TextareaType::class, [
                'label' => $this->translator->trans('Enter your message'),
                'label_attr' => ['class' => 'formulaire-label',],

                'attr' => [
                    'class' => 'form-control',
                    'placeholder' => $this->translator->trans('Enter your message')
                ]
                //'config' => ['toolbar' => 'basic']
            ])

            ->add('Envoyer', SubmitType::class, [
                'label' => $this->translator->trans('Send message'),
                'attr' => [
                    'class' => 'btn btn-primary mt-5 rounded-0 py-2 px-4',

                ]
            ]);
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            // Configure your form options here
        ]);
    }
}
