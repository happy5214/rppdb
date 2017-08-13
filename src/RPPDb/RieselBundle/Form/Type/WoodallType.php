<?php

namespace RPPDb\RieselBundle\Form\Type;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

use Symfony\Component\Form\Extension\Core\Type\IntegerType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;

class WoodallType extends AbstractType {
    /**
     * @param FormBuilderInterface $builder
     * @param array $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options) {
        $builder
            ->add('primek', IntegerType::class, array('label' => "k of normalized form", 'mapped' => false))
            ->add('primen', IntegerType::class, array('label' => "n of normalized form", 'mapped' => false))
            ->add('n', IntegerType::class, array('label' => "n"))
            ->add('digits', IntegerType::class, array('label' => "number of digits"))
            ->add('save', SubmitType::class)
        ;
    }
    
    /**
     * @param OptionsResolver $resolver
     */
    public function configureOptions(OptionsResolver $resolver) {
        $resolver->setDefaults(array(
            'data_class' => 'RPPDb\RieselBundle\Entity\Woodall'
        ));
    }
}
