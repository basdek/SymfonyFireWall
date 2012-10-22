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
        $q->field('active')->equals(true);
        $q->sort('priority', 'ASC');

        $this->available_database_routes = $q->getQuery()->execute();
        var_dump(count($this->available_database_routes));
        foreach ($this->available_database_routes as $k => $r)
        {
            /*
            Workflow idea:
            - check for a direct match
            - if existent, resolve
            - if not sanitize
            - if sanitized and resolvable, resolve (a.k.a. if the request was i.e. /bach/1054/show and it is
            resolvable since the number is now interpretable as a variable)
            else: throw 404
            */
           var_dump($r->getPattern());
           if (false === strpos($r->getPattern(), $path))
           {
               if(true === strpos($r->getPattern(), '{'))
               {
                    // apparently: things need to be sanitized:
                    preg_match_all('#.\{(\w+)\}#', $r->getPattern(), $matches, PREG_OFFSET_CAPTURE | PREG_SET_ORDER);
                    /*
                    A quick note on this one too:
                    this gives us the place where the variables are in the patterns, thus we can easily replace them,
                    or write a compare code, in order to be able to check up if there is a match.
                    */
                    var_dump($matches);
               }
               /*
               @TODO:
               logger!
               */
            } 
            else
            {
                // we have found a match. 
                
            }
        }
    }

    private function parseMatchUrl()
    {
        
    }

}
