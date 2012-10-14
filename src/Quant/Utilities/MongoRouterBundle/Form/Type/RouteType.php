<?php

namespace Quant\Utilities\MongoRouterBundle\Form\Type;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilder;
use Symfony\Component\Form\FormBuilderInterface;
class RouteType extends AbstractType
{

    public function buildForm(FormBuilderInterface $builder, array $options)
    {
               $builder->add('priority', 'text')
                ->add('pattern', 'text')
                ->add('destinationController', 'text', array('label' => 'Destination'))
                ->add('destinationAction', 'text', array('label' => 'Destination Action'))
                ->add('destinationParameters', 'text', array ('label' => 'Parameters'))
                ->add('postRequired', 'checkbox', array('label' => 'Is post required?'))
                ->add('active', 'checkbox', array('label' => 'Is this route active?'));
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
