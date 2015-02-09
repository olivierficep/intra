<?php

namespace Ficep\PlanningBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

class MachineType extends AbstractType
{
    /**
     * @param FormBuilderInterface $builder
     * @param array $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('type',		'text')
            ->add('mat',		'text')
            ->add('custommers',	'entity', array('class' => 'FicepPlanningBundle:Custommer',
												'property' => 'name',
												'required' => false))
			->add('save',		'submit')
        ;
    }
    
    /**
     * @param OptionsResolverInterface $resolver
     */
    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'Ficep\PlanningBundle\Entity\Machine'
        ));
    }

    /**
     * @return string
     */
    public function getName()
    {
        return 'ficep_planningbundle_machine';
    }
}
