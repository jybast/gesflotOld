<?php

namespace App\Form;

use App\Entity\Assurance;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class AssuranceType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('compagnie')
            ->add('adresse')
            ->add('mail')
            ->add('valideAt')
            ->add('expireAt')
            ->add('montant')
            ->add('vehicule')
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Assurance::class,
        ]);
    }
}
