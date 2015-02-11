<?php

namespace Ficep\PlanningBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

class EventType extends AbstractType
{
    /**
     * @param FormBuilderInterface $builder
     * @param array $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('name',		'text')
            ->add('dateStart',	'date')
            ->add('dateEnd',	'date')
            ->add('technicians','entity', array('class' => 'FicepPlanningBundle:Technician',
												'property' => 'name'))
            ->add('custommers',	'entity', array('class' => 'FicepPlanningBundle:Custommer',
												'property' => 'name'))
			->add('save',		'submit')			
        ;
    }
    
    /**
     * @param OptionsResolverInterface $resolver
     */
    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'Ficep\PlanningBundle\Entity\Event'
        ));
    }

    /**
     * @return string
     */
    public function getName()
    {
        return 'ficep_planningbundle_event';
    }
}
