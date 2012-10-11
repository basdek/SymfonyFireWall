<?php

namespace Quant\Utilities\MongoRouterBundle\Form\Type;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilder;
use Symfony\Component\Form\FormBuilderInterface;
class RouteType extends AbstractType
{

    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        /*
         * @QUANT
         * @TODO : 
         * 
         * Parameters => please note that these should be used as if they were the parameters to pass to the controller (a.k.a. destination Parameters.)
         * 
         */
        $builder->add('pattern', 'text')
                ->add('destinationController', 'text')
                ->add('destinationAction', 'text')
                ->add('destinationParameters', 'text')
                ->add('priority', 'text')
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