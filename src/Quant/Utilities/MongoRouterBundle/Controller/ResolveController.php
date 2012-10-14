<?php

namespace Quant\Utilities\MongoRouterBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Quant\Utilities\MongoRouterBundle\Document\Route;

class ResolveController extends Controller
{

    protected $input_pattern;
    protected $available_database_routes;
    public function resolveAction($path)
    {
        $this->input_pattern = explode('/', $path);
        $em = $this->get('doctrine_mongodb')->getManager();
        
        $q = $em->createQueryBuilder('QuantUtilitiesMongoRouterBundle:Route');
        $q->field('active')->notEqual('NO');
        $q->sort('priority', 'ASC');
        $this->available_database_routes = $q->getQuery()->execute();
        
        /*
         * Deny requests that are not yet resolvable because the component is not yet finished.
         */
        return new \Symfony\Component\HttpFoundation\Response('QuantRouter temporary denied request.', 404);
    }

    private function parseMatchUrl()
    {
        
    }

}