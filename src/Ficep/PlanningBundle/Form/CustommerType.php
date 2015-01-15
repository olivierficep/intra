<?php

namespace Ficep\PlanningBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

class CustommerType extends AbstractType
{
    /**
     * @param FormBuilderInterface $builder
     * @param array $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('name',		'text')
            ->add('adress',		'text')
            ->add('zip',		'text')
            ->add('town',		'text')
            ->add('phone',		'text')
			->add('save',		'submit')
        ;
    }
    
    /**
     * @param OptionsResolverInterface $resolver
     */
    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'Ficep\PlanningBundle\Entity\Custommer'
        ));
    }

    /**
     * @return string
     */
    public function getName()
    {
        return 'ficep_planningbundle_custommer';
    }
}
