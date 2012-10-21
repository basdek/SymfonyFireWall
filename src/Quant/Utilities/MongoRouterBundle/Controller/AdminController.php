<?php

namespace Quant\Utilities\MongoRouterBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Quant\Utilities\MongoRouterBundle\Document\Route;
use Quant\Utilities\MongoRouterBundle\Form\Type\RouteType;
use Symfony\Component\HttpFoundation\Response;

class AdminController extends Controller
{

    public function qInsAction()
    {
        $dm = $this->get('doctrine_mongodb')->getManager();

        for ($i = 1; $i < 25; $i++)
        {
            $r = new Route();
            $r->setName('name' . $i);
            $r->setDestinationController('MongoRouterBundle/AdminController');
            $r->setDestinationAction('index');
            $r->setPattern('/rtest' . $i);
            $r->setPriority($i);
            $dm->persist($r);
            $dm->flush();
        }
    }

    public function indexAction()
    {
        $dm = $this->get('doctrine_mongodb')->getManager();
        $routes = $dm->createQueryBuilder('QuantUtilitiesMongoRouterBundle:Route');
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
        $dm = $this->get('doctrine_mongodb')->getManager();
        $form = $this->createForm(new RouteType, new Route);
        $form->bindRequest($this->getRequest());
        if ($form->isValid())
        {
            $newroute = $form->getData();
            $dm->persist($newroute);
            $dm->flush();
        }
        return $this->redirect($this->generateUrl('QuantUtilitiesMongoRouterBundle_admin_index'));
    }

    public function deleteRouteAction($id)
    {
        /*
         * @TODO: make an undo function.
         */
        $dm = $this->get('doctrine_mongodb')->getManager();
        $route = $dm->getRepository('QuantUtilitiesMongoRouterBundle:Route')->find($id);
        if (!$route)
        {
            $answer = '404 error. Entity does not exist';
        } else
        {
            $dm->remove($route);
            $dm->flush();
            $answer = 'Success';
        }
        $response = new Response(json_encode(array('answer' => $answer)));
        $response->headers->set('Content-Type', 'application/json');
        return $response;
    }

    public function activateRouteAction($id)
    {
       return $this->changeActive($id, true);
    }
    public function deactivateRouteAction($id)
    {
       return $this->changeActive($id, false);
    }
    protected function changeActive($id, $active)
    {
        $dm = $this->get('doctrine_mongodb')->getManager();
        $route = $dm->getRepository('QuantUtilitiesMongoRouterBundle:Route')->find($id);
        if (!$route)
        {
            $answer = '404 error. Entity does not exist';
        } else
        {
            $route->setActive($active);
            $dm->persist($route);
            $dm->flush();
            $answer = 'Success';
        }
        $response = Response(json_encode(array('answer' => $answer)));
        $response->headers->set('Content-Type', 'application/json');
        return $response;
    }
}