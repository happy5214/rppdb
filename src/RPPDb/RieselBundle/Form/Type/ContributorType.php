<?php

namespace RPPDb\RieselBundle\Form\Type;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

class ContributorType extends AbstractType
{
        /**
     * @param FormBuilderInterface $builder
     * @param array $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('name', 'text', array('label' => "Contributor's name"))
            ->add('top5000', 'integer', array('label' => 'Prime Pages ID', 'required' => false))
            ->add('link', 'url', array('label' => 'Home page', 'required' => false))
            ->add('save', 'submit')
        ;
    }
    
    /**
     * @param OptionsResolverInterface $resolver
     */
    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'RPPDb\RieselBundle\Entity\Contributor'
        ));
    }

    /**
     * @return string
     */
    public function getName()
    {
        return 'contributor';
    }
}
