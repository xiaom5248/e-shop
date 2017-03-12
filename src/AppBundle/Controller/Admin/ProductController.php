<?php

namespace AppBundle\Controller\Admin;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use AppBundle\Entity\Product;
use AppBundle\Form\Type\ProductType;

class ProductController extends Controller
{

    /**
     * @Route("/admin/product/new", name="admin_product_new")
     */
    public function indexAction(Request $request)
    {
        $product = new Product();
        $form = $this->createForm(ProductType::class, $product);

        $form->handleRequest($request);
        $uploadDirectory = $this->getParameter('upload_directory');

        if ($form->isSubmitted() && $form->isValid()) {

            $extension = $form->get('image')->getData()->guessExtension();
            $fileName = uniqid() . '.' . $extension;
            $form['image']->getData()->move($uploadDirectory, $fileName);
            $product->setImage('upload/' . $fileName);

            $em = $this->getDoctrine()->getManager();
            $em->persist($product);
            $em->flush();

            return $this->redirectToRoute('product_index', []);
        }

        return $this->render('admin/product/new.html.twig', [
                    'form' => $form->createView(),
        ]);
    }

}
