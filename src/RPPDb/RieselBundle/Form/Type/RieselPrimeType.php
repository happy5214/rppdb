<?php

namespace RPPDb\RieselBundle\Form\Type;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\Extension\Core\Type\CheckboxType;
use Symfony\Component\Form\Extension\Core\Type\DateType;
use Symfony\Component\Form\Extension\Core\Type\IntegerType;
use Symfony\Component\Form\Extension\Core\Type\TextType;

class RieselPrimeType extends AbstractType {
    /**
     * @param FormBuilderInterface $builder
     * @param array $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options) {
        $builder
            ->add('n', IntegerType::class)
            ->add('utm', IntegerType::class, array('required' => false))
            ->add('commentStr', TextType::class, array('required' => false, 'empty_data' => null))
            ->add('isTwin', CheckboxType::class, array('required' => false))
            ->add('isSG', CheckboxType::class, array('required' => false))
            ->add('is100th', CheckboxType::class, array('required' => false))
            ->add('isProvenPrime', CheckboxType::class, array('required' => false))
            ->add('testedPrime', EntityType::class, array(
                'class' => 'RPPDbRieselBundle:Program',
                'required' => false
                ))
            ->add('testedTwin', EntityType::class, array(
                'class' => 'RPPDbRieselBundle:Program',
                'required' => false
                ))
            ->add('foundBy', EntityType::class, array(
                'class' => 'RPPDbRieselBundle:Contributor',
                'choice_label' => 'name',
                'required' => false
                ))
            ->add('foundOn', DateType::class, array('required' => false, 'widget' => 'single_text'))
        ;
    }
    
    /**
     * @param OptionsResolver $resolver
     */
    public function configureOptions(OptionsResolver $resolver) {
        $resolver->setDefaults(array(
            'data_class' => 'RPPDb\RieselBundle\Entity\RieselPrime'
        ));
    }
}
