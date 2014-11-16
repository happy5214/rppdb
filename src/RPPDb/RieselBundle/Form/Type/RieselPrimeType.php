<?php

namespace RPPDb\RieselBundle\Form\Type;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

class RieselPrimeType extends AbstractType {
    /**
     * @param FormBuilderInterface $builder
     * @param array $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options) {
        $builder
            ->add('n', 'integer')
            ->add('utm', 'integer', array('required' => false))
            ->add('commentStr', 'text', array('required' => false, 'empty_data' => null))
            ->add('isTwin', 'checkbox', array('required' => false))
            ->add('isSG', 'checkbox', array('required' => false))
            ->add('is100th', 'checkbox', array('required' => false))
            ->add('isProvenPrime', 'checkbox', array('required' => false))
            ->add('testedPrime', 'entity', array(
                'class' => 'RPPDbRieselBundle:Program',
                'required' => false
                ))
            ->add('testedTwin', 'entity', array(
                'class' => 'RPPDbRieselBundle:Program',
                'required' => false
                ))
            ->add('foundBy', 'entity', array(
                'class' => 'RPPDbRieselBundle:Contributor',
                'property' => 'name',
                'required' => false
                ))
            ->add('foundOn', 'date', array('required' => false, 'widget' => 'single_text'))
        ;
    }
    
    /**
     * @param OptionsResolverInterface $resolver
     */
    public function setDefaultOptions(OptionsResolverInterface $resolver) {
        $resolver->setDefaults(array(
            'data_class' => 'RPPDb\RieselBundle\Entity\RieselPrime'
        ));
    }
    
    /**
     * @return string
     */
    public function getName() {
        return 'rieselprime';
    }
}
