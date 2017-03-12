<?php

namespace AppBundle\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use AppBundle\Entity\Product;

class ProductController extends Controller
{
    /**
     * @Route("/product/index", name="product_index")
     */
    public function indexAction(Request $request)
    {
        $products = $this->getDoctrine()->getRepository('AppBundle:Product')->findBy([], [], 9, 0);
        return $this->render('product/index.html.twig', [
            'products' => $products,
        ]);
    }
    
    /**
     * @Route("/product/show/{id}", name="product_show")
     */
    public function showAction(Product $product)
    {
        return $this->render('product/show.html.twig', [
            'product' => $product,
        ]);
    }
}
