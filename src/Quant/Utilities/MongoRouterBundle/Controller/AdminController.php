<?php

namespace Quant\Utilities\MongoRouterBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Quant\Utilities\MongoRouterBundle\Document\Route;
use Quant\Utilities\MongoRouterBundle\Form\Type\RouteType;

class AdminController extends Controller
{
    /* 
     * @QUANT
     * @NOTE: temporary action to fill databaseclear
     */

//    public function qInsAction()
//    {
//        $em = $this->get('doctrine_mongodb')->getManager();
//
//        for ($i = 10; $i < 11; $i++)
//        {
//            $r = new Route();
//
//            $r->setDestinationController('MongoRouterBundle/AdminController');
//            $r->setDestinationAction('index');
//            $r->setPattern('/rtest' . $i);
//            $r->setPriority($i);
//            $r->setPostRequired(true);
//            $r->setActive(false);
//            $em->persist($r);
//            $em->flush();
//        }
//    }

    public function indexAction()
    {
        $em = $this->get('doctrine_mongodb')->getManager();
        $routes = $em->getRepository('QuantUtilitiesMongoRouterBundle:Route')->findAll();
        $test;
    }
    public function addRouteAction()
    {
        $form = $this->createForm(new RouteType, new Route);
        
        return $this->render('QuantUtilitiesMongoRouterBundle:Admin:add.html.twig', array('form' => $form->createView()));
    }
    public function createRouteAction()
    {
        
    }
    public function deleteRouteAction()
    {
        
    }

}