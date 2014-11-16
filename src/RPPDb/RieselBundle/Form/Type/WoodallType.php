<?php

namespace RPPDb\RieselBundle\Form\Type;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

class WoodallType extends AbstractType {
    /**
     * @param FormBuilderInterface $builder
     * @param array $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options) {
        $builder
            ->add('primek', 'integer', array('label' => "k of normalized form", 'mapped' => false))
            ->add('primen', 'integer', array('label' => "n of normalized form", 'mapped' => false))
            ->add('n', 'integer', array('label' => "n"))
            ->add('digits', 'integer', array('label' => "number of digits"))
            ->add('save', 'submit')
        ;
    }
    
    /**
     * @param OptionsResolverInterface $resolver
     */
    public function setDefaultOptions(OptionsResolverInterface $resolver) {
        $resolver->setDefaults(array(
            'data_class' => 'RPPDb\RieselBundle\Entity\Woodall'
        ));
    }
    
    /**
     * @return string
     */
    public function getName() {
        return 'woodall';
    }
}
