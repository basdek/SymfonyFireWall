<?php

namespace Quant\Utilities\MongoRouterBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Quant\Utilities\MongoRouterBundle\Document\Route;
use Quant\Utilities\MongoRouterBundle\Form\Type\RouteType;

class AdminController extends Controller
{

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
        $routes = $em->createQueryBuilder('QuantUtilitiesMongoRouterBundle:Route');
        $routes->sort('active', 'DESC');
        $routes->sort('priority', 'ASC');
        return $this->render('QuantUtilitiesMongoRouterBundle:Admin:index.html.twig', array('routes' => $routes->getQuery()->execute()));
    }

    public function addRouteAction()
    {
        $route = new Route;
        $form = $this->createForm(new RouteType, $route);
        return $this->render('QuantUtilitiesMongoRouterBundle:Admin:add.html.twig', array('form' => $form->createView()));
    }

    public function createRouteAction()
    {
        $em = $this->get('doctrine_mongodb')->getManager();
        $form = $this->createForm(new RouteType, new Route);
        $form->bindRequest($this->getRequest());
        if ($form->isValid()) 
        {
            $newroute = $form->getData();
            $em->persist($newroute);
            $em->flush();
        }
        //return $this->redirect;
    }
    public function deleteRouteModalAction($id)
    {
        
    }
    public function deleteRouteAction($id)
    {
       
    }

}