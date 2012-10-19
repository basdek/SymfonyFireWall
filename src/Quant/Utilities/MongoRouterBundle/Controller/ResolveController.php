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
        $em = $this->get('doctrine_mongodb')->getManager();
        $q = $em->createQueryBuilder('QuantUtilitiesMongoRouterBundle:Route');
        $q->field('active')->notEqual('NO');
        $q->sort('priority', 'ASC');

        $this->available_database_routes = $q->getQuery()->execute();

        foreach ($this->available_database_routes as $r)
        {
            preg_match_all('#.\{(\w+)\}#', $r->getPattern(), $matches, PREG_OFFSET_CAPTURE | PREG_SET_ORDER);
            var_dump($matches); 
            if (false === strpos($r->getPatternSmart(), $path))
            {
                continue;
            } else
            {
                print 'Match';
            }
        }
    }

    private function parseMatchUrl()
    {
        
    }

}