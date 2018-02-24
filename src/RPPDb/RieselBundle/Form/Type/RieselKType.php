<?php

namespace RPPDb\RieselBundle\Form\Type;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

use Symfony\Component\Form\Extension\Core\Type\CheckboxType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\CollectionType;
use Symfony\Component\Form\Extension\Core\Type\DateType;
use Symfony\Component\Form\Extension\Core\Type\IntegerType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\TextType;

class RieselKType extends AbstractType {
    /**
     * @param FormBuilderInterface $builder
     * @param array $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options) {
        $builder
            ->add('num', IntegerType::class, array('label' => 'Actual number', 'required' => false))
            ->add('value', TextType::class, array('label' => 'Table cell contents'))
            ->add('nashWeight', IntegerType::class)
            ->add('is3k', CheckboxType::class, array('label' => 'Is a multiple of 3', 'required' => false))
            ->add('is15k', IntegerType::class, array('label' => 'Multiple of 15', 'required' => false))
            ->add('is2145k', IntegerType::class, array('label' => 'Multiple of 2145', 'required' => false))
            ->add('is2805k', IntegerType::class, array('label' => 'Multiple of 2805', 'required' => false))
            ->add('isPrimorial', IntegerType::class, array('label' => 'Primorial (n#/2)', 'required' => false))
            ->add('ranges', TextType::class, array('required' => false))
            ->add('maxTested', IntegerType::class, array('label' => 'Location of ellipsis', 'required' => false))
            ->add('reserved', ChoiceType::class, array(
                'choices'   => array('Not currently reserved' => 'na', 'Reserved by individual' => 'res', 'Reserved by project' => 'prj'),
                'choices_as_values' => true,
                'required'  => true,
            ))
            ->add('reservedBy', TextType::class, array('required' => false))
            ->add('lastUpdate', DateType::class, array('required' => false, 'widget' => 'single_text'))
            ->add('coveringSet', TextType::class, array('required' => false))
            ->add('workRanges', CollectionType::class,  array(
                'entry_type'   => WorkRangeType::class,
                'allow_add'    => true,
                'allow_delete' => true,
                'by_reference' => false,
                'label'        => false,
                ))
            ->add('primes', CollectionType::class, array(
                'entry_type'   => RieselPrimeType::class,
                'allow_add'    => true,
                'allow_delete' => true,
                'by_reference' => false,
                'label'        => false,
                ))
            ->add('save', SubmitType::class)
        ;
    }
    
    /**
     * @param OptionsResolver $resolver
     */
    public function configureOptions(OptionsResolver $resolver) {
        $resolver->setDefaults(array(
            'data_class' => 'RPPDb\RieselBundle\Entity\RieselK'
        ));
    }
}
