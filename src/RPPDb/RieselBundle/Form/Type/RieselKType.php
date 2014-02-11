<?php

namespace RPPDb\RieselBundle\Form\Type;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

class RieselKType extends AbstractType
{
        /**
     * @param FormBuilderInterface $builder
     * @param array $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('num', 'integer', array('label' => 'Actual number', 'required' => false))
            ->add('value', 'text', array('label' => 'Table cell contents'))
            ->add('nashWeight', 'integer')
            ->add('is3k', 'checkbox', array('label' => 'Is a multiple of 3', 'required' => false))
            ->add('is15k', 'checkbox', array('label' => 'Is a multiple of 15', 'required' => false))
            ->add('is2145k', 'checkbox', array('label' => 'Is a multiple of 2145', 'required' => false))
            ->add('is2805k', 'checkbox', array('label' => 'Is a multiple of 2805', 'required' => false))
            ->add('isPrimorial', 'checkbox', array('label' => 'Is a primorial', 'required' => false))
            ->add('ranges', 'text', array('required' => false))
            ->add('maxTested', 'integer', array('label' => 'Location of ellipsis', 'required' => false))
            ->add('reserved', 'choice', array(
                'choices'   => array('na' => 'Not currently reserved', 'res' => 'Reserved by individual', 'prj' => 'Reserved by project'),
                'required'  => true,
            ))
            ->add('reservedBy', 'text', array('required' => false))
            ->add('lastUpdate', 'date', array('required' => false))
            ->add('coveringSet', 'text', array('required' => false))
            ->add('primes', 'collection', array(
                'type'         => new RieselPrimeType(),
                'allow_add'    => true,
                'by_reference' => false,
                'label'        => false,
                ))
            ->add('save', 'submit')
        ;
    }
    
    /**
     * @param OptionsResolverInterface $resolver
     */
    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'RPPDb\RieselBundle\Entity\RieselK'
        ));
    }

    /**
     * @return string
     */
    public function getName()
    {
        return 'rieselk';
    }
}
