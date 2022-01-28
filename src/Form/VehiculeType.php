<?php

namespace App\Form;

use App\Entity\Vehicule;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\Validator\Constraints\All;
use Symfony\Component\Validator\Constraints\File;
use Symfony\Component\Validator\Constraints\Image;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Contracts\Translation\TranslatorInterface;
use Symfony\Component\Form\Extension\Core\Type\DateType;
use Symfony\Component\Form\Extension\Core\Type\FileType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\MoneyType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\NumberType;
use Symfony\Component\Form\Extension\Core\Type\IntegerType;

class VehiculeType extends AbstractType
{
    private $translator;

    public function __construct(TranslatorInterface $translator)
    {
        $this->translator = $translator;
    }

    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('immatriculation', TextType::class, [
                'label' => $this->translator->trans('plate number')
            ])
            ->add('circulationAt', DateType::class, [
                'label' => $this->translator->trans('Date of 1st use')
            ])
            ->add('c1_titulaire', TextType::class, [
                'label' => $this->translator->trans('Owner\'s full name'),
            ])
            ->add('c4_proprietaire', ChoiceType::class, [
                'label' => $this->translator->trans('Is the owner'),
                'choices' => [
                    'Yes' => 1,
                    'No'  => 0
                ]
            ])
            ->add('c4_cotitulaire', TextType::class, [
                'label' => $this->translator->trans('Co-owner\'s full name')
            ])
            ->add('c3_adresse', TextType::class, [
                'label' => $this->translator->trans('Adress')
            ])
            ->add('d1_marque', TextType::class, [
                'label' => $this->translator->trans('Brand')
            ])
            ->add('d2_version', TextType::class, [
                'label' => $this->translator->trans('Version')
            ])
            ->add('d21_cnit', TextType::class, [
                'label' => $this->translator->trans('National type identification')
            ])
            ->add('d3_commercial', TextType::class, [
                'label' => $this->translator->trans('Brand trade name')
            ])
            ->add('e_identification', TextType::class, [
                'label' => $this->translator->trans('National identification number')
            ])
            ->add('f1_ptac', IntegerType::class, [
                'label' => $this->translator->trans('Technically permissible maximum laden mass')
            ])
            ->add('f2_masse', IntegerType::class, [
                'label' => $this->translator->trans('Authorized total laden mass')
            ])
            ->add('f3_ptra', IntegerType::class, [
                'label' => $this->translator->trans('Gross vehicle weight allowed')
            ])
            ->add('g_poidsmarche', IntegerType::class, [
                'label' => $this->translator->trans('Operating weight')
            ])
            ->add('g1_poidsvide', IntegerType::class, [
                'label' => $this->translator->trans('Unloaded weight')
            ])
            ->add('i_certificatAt', DateType::class, [
                'label' => $this->translator->trans('Date of establishment'),
                'widget' => 'choice',
                'format' => 'dd/MMM/yyyy',
                'years' => range(date('Y') - 20, date('Y') + 5),
                'required' => false
            ])
            ->add('j_categorie', TextType::class, [
                'label' => $this->translator->trans('Vehicle category')
            ])
            ->add('j1_genre', TextType::class, [
                'label' => $this->translator->trans('National style')
            ])
            ->add('j2_carrosserie', TextType::class, [
                'label' => $this->translator->trans('Bodywork (CE)')
            ])
            ->add('j3_nat', TextType::class, [
                'label' => $this->translator->trans('Bodywork (Nat)')
            ])
            ->add('k_reception', TextType::class, [
                'label' => $this->translator->trans('Type-approval number')
            ])
            ->add('p1_cylindree', IntegerType::class, [
                'label' => $this->translator->trans('displacement')
            ])
            ->add('p2_puissance', IntegerType::class, [
                'label' => $this->translator->trans('Maximum Net Power')
            ])
            ->add('p3_energie', TextType::class, [
                'label' => $this->translator->trans('Fuel type')
            ])
            ->add('p6_fiscal', IntegerType::class, [
                'label' => $this->translator->trans('National administrative power')
            ])
            ->add('q_kwkg', IntegerType::class, [
                'label' => $this->translator->trans('Power/mass ratio in kW/kg')
            ])
            ->add('s1_assis', IntegerType::class, [
                'label' => $this->translator->trans('Seating places')
            ])
            ->add('s2_debout', IntegerType::class, [
                'label' => $this->translator->trans('standing room')
            ])
            ->add('u1_sonore', IntegerType::class, [
                'label' => $this->translator->trans('Sound level')
            ])
            ->add('u2_moteur', IntegerType::class, [
                'label' => $this->translator->trans('Motor speed')
            ])
            ->add('v7_co2', IntegerType::class, [
                'label' => $this->translator->trans('CO2 release')
            ])
            ->add('v9_classe', TextType::class, [
                'label' => $this->translator->trans('environmental class')
            ])
            ->add('x1_visiteAt', DateType::class, [
                'label' => $this->translator->trans('Due date of the Technical Inspection'),
                'widget' => 'choice',
                'format' => 'dd/MMM/yyyy',
                'years' => range(date('Y') - 5, date('Y') + 5),
                'required' => false
            ])
            ->add('y1_region', NumberType::class, [
                'label' => $this->translator->trans('regional tax')
            ])
            ->add('y2_formation', NumberType::class, [
                'label' => $this->translator->trans('Professional tax')
            ])
            ->add('y3_ecotaxe', NumberType::class, [
                'label' => $this->translator->trans('additional CO2 tax')
            ])
            ->add('y4_gestion', NumberType::class, [
                'label' => $this->translator->trans('fixed fee for certificate management')
            ])
            ->add('y5_redevance', NumberType::class, [
                'label' => $this->translator->trans('delivery charge')
            ])
            ->add('y6_total', NumberType::class, [
                'label' => $this->translator->trans('Total tax amount')
            ])
            ->add('longueur', NumberType::class, [
                'label' => $this->translator->trans('Length')
            ])
            ->add('largeur', NumberType::class, [
                'label' => $this->translator->trans('Width')
            ])
            ->add('hauteur', NumberType::class, [
                'label' => $this->translator->trans('Height')
            ])
            ->add('coffre', NumberType::class, [
                'label' => $this->translator->trans('trunk volume')
            ])
            ->add('empattement', NumberType::class, [
                'label' => $this->translator->trans('wheelbase')
            ])
            ->add('porteafaux', NumberType::class, [
                'label' => $this->translator->trans('rear overhang')
            ])
            ->add('reservoir', NumberType::class, [
                'label' => $this->translator->trans('tank capacity')
            ])
            ->add('conso_urbaine', NumberType::class, [
                'label' => $this->translator->trans('max fuel consumption')
            ])
            ->add('conso_mixte', NumberType::class, [
                'label' => $this->translator->trans('average fuel consumption')
            ])
            ->add('transmission', TextType::class, [
                'label' => $this->translator->trans('mode of propulsion')
            ])
            ->add('boite', TextType::class, [
                'label' => $this->translator->trans('gear box')
            ])
            ->add('pneumatiques', TextType::class, [
                'label' => $this->translator->trans('tires')
            ])
            ->add('acheterAt', DateType::class, [
                'label' => $this->translator->trans('date of purchase'),
                'widget' => 'choice',
                'format' => 'dd/MMM/yyyy',
                'years' => range(date('Y') - 20, date('Y') + 5),
                'required' => false
            ])
            ->add('valeur_achat', MoneyType::class, [
                'label' => $this->translator->trans('purchase value'),
                'currency' => 'EUR'
            ])
            // Add "images" and "Documents" in form
            // not linked to database (mapped : false)
            ->add('images', FileType::class, [
                'label' => false,
                'multiple' => true,
                'mapped' => false,
                'required' => false,
                'constraints' => [
                    new All([
                        new Image([
                            'mimeTypes' => ['image/jpeg', 'image/png'],
                        ])
                    ])
                ]
            ])

            ->add('documents', FileType::class, [
                'label' => $this->translator->trans('Documents to download'),
                'mapped' => false,
                'multiple' => true,
                'required' => false,
                'constraints' => [
                    new All([
                        new File([
                            'mimeTypes' => ['application/pdf', 'application/x-pdf'],
                            'mimeTypesMessage' => $this->translator->trans('Please use a valid PDF file.')
                        ])
                    ])
                ]
            ]);
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Vehicule::class,
        ]);
    }
}
