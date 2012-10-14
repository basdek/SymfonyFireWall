<?php

namespace Quant\Utilities\MongoRouterBundle\Form\Type;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilder;
use Symfony\Component\Form\FormBuilderInterface;
class RouteType extends AbstractType
{

    public function buildForm(FormBuilderInterface $builder, array $options)
    {
               $builder->add('priority', 'text', array('attr' => array('class' => 'two')))
                ->add('pattern', 'text')
                ->add('destinationController', 'text', array('label' => 'Destination'))
                ->add('destinationAction', 'text', array('label' => 'Destination Action'))
                ->add('destinationParameters', 'text', array ('label' => 'Parameters'))
                ->add('postRequired', 'checkbox', array('label' => '[POST] required', 'required' => false))
                ->add('active', 'checkbox', array('label' => 'Active', 'required' => false, 'property_path' => false));
               
               $builder->get('active')->setData(true);
    }

    public function getDefaultOptions(array $options)
    {
        return array('data_class' => 'Quant\Utilities\MongoRouterBundle\Document\Route');
    }

    public function getName()
    {
        return 'route';
    }

}
