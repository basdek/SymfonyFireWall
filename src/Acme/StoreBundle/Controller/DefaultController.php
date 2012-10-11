<?php

namespace Acme\StoreBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Response;
use Acme\StoreBundle\Document\Product;

class DefaultController extends Controller
{

    public function indexAction($name)
    {
        return $this->render('AcmeStoreBundle:Default:index.html.twig', array('name' => $name));
    }

    public function createAction()
    {
        $p = new Product;
        $p->setName('MBP 15 inch');
        $p->setPrice('8.99');

        $dm = $this->get('doctrine_mongodb')->getManager();
        $dm->persist($p);
        $dm->flush();

        return new Response('<html><body>Product ' . $p->getId() . ' added succesfully.</body></html>', 200);
    }

    public function showAction($id)
    {
        $product = $this->get('doctrine_mongodb')
                ->getRepository('AcmeStoreBundle:Product')
                ->find($id);
        if (!$product)
        {
            throw $this->createNotFoundException('Not an entity could be found for id:' . $id);
        }
        var_dump($product);
    }

}
