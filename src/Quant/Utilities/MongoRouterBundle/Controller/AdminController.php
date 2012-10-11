<?php

namespace Quant\Utilities\MongoRouterBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Quant\Utilities\MongoRouterBundle\Document\Route;
use Quant\Utilities\MongoRouterBundle\Form\Type\RouteType;

class AdminController extends Controller
{

    public function indexAction()
    {
        $em = $this->get('doctrine_mongodb')->getManager();
        $routes = $em->getRepository('QuantUtilitiesMongoRouterBundle:Route')->findAll();
    }

    public function addRouteAction()
    {
        $form = $this->createForm(new RouteType, new Route);
        return $this->render('QuantUtilitiesMongoRouterBundle:Admin:add.html.twig', array('form' => $form->createView()));
    }

    public function createRouteAction()
    {
        
    }

    public function deleteRouteAction($id)
    {
        
    }

}