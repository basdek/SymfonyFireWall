<?php

namespace Quant\Utilities\MongoRouterBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Quant\Utilities\MongoRouterBundle\Document\Route;

class ResolveController extends Controller
{

    public $available_database_routes;
    protected $logger;
    
    public function resolveAction($path)
    {
        $found = false;
        $split_ch_pattern = str_split($path);
        $split_sl_pattern = explode('/', $path);
        $count_sl_pattern = count($split_sl_pattern);
        $count_ch_pattern = count($split_ch_pattern);
        $this->logger = $this->get('logger');
        
        $dm = $this->get('doctrine_mongodb')->getManager();
        $q = $dm->createQueryBuilder('QuantUtilitiesMongoRouterBundle:Route');
        $q->field('active')->equals(true);
        $q->sort('priority', 'ASC');
        
        $this->available_database_routes = $q->getQuery()->execute();

        foreach ($this->available_database_routes as $k => $r)
        {
           if (false === strpos($r->getPattern(), $path))
           {
               if(false === strpos($r->getPattern(), '{'))
               {
                    // no parameters, no literal match:
                  $this->logNonMatch($r, $path);
               }
               else
               {
                    if($count_sl_pattern == $r->getSlashCount())
                    {
                        preg_match_all('#.\{(\w+)\}#', $r->getPattern(), $matches, PREG_OFFSET_CAPTURE | PREG_SET_ORDER);
                        
                        $temp_path = $split_ch_pattern;
                        $unsetted_chars = 0;
                        
                        foreach($matches as $key => $url_variable)
                        {
                            $name = $url_variable[1][0];
                            $pos = $url_variable[0][1];
                            $r->setPattern(str_replace('{'.$name.'}', NULL, $r->getPattern()));
                            $r->setPattern(trim($r->getPattern(), '/'));
                            for($i = $pos-$unsetted_chars; $i <= $count_ch_pattern; $i++) // I really doubt if this line is correct!!! Why use the ch_pattern as evalution?
                            {
                                if($temp_path[$i] == '/')
                                {
                                    break;
                                }
                                unset($temp_path[$i]);
                                $unsetted_chars++;
                            }
                        }
                        if(array_values($temp_path) ==  str_split($r->getPattern()))
                        {
                            $found = true;
                            $this->logger->info(sprintf('QuantMongoRouter: Route %s matched request.', 'x'));
                        }
                       $this->logNonMatch($r, $path);
                    }
                    else
                    {
                        $this->logNonMatch($r, $path);
                    }
               }
            } 
            else
            {
                // we have found a match. 
                $found = true;
            }
        }
        if(!$found)
        {
            throw new \Symfony\Component\HttpKernel\Exception\NotFoundHttpException('Not found a match in the database with the QuantMongoRouter', NULL, 404);
        }
        else
        {
            
        }
        return new Symfony\Component\HttpFoundation\Response('', 200);
    }
    
    protected function logNonMatch(Route $r, $path)
    {
        if($this->get('kernel')->getEnvironment() == 'dev')
        {
            $this->logger->info(sprintf('QuantMongoRouter: route %s, with pattern "%s" was not a match to request "%s"', $r->getName(), $r->getPattern(), $path));
        }
        
    }

    private function parseMatchUrl()
    {
        
    }
    
}
