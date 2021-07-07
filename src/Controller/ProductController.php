<?php

namespace App\Controller;

use App\Entity\Category;
use App\Entity\Product;
use App\Repository\ProductRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Validator\Validator\ValidatorInterface;

class ProductController extends AbstractController
{

    #[Route('/product/{idproduct}', name: 'app_product')]
    public function displayProduct($idproduct, ?Category $idcategory){
        $product = $this->getDoctrine()
                    ->getRepository(Product::class)
                    ->find($idproduct);

/*         $category = $this->getDoctrine()
                    ->getRepository(Category::class)
                    ->find($idcategory);              

        if($product->getIdcategory() == $category->getIdcategory()){
            $product_cat = $category->getNamecategory();
        } */
        
        if(!$product){
            return $this->render('bundles/TwigBundle/Exception/error400.html.twig', [
                'controller_name' => "Le produit demandé n'existe pas",
            ]);
        }

        else {
            return $this->render('product/product.html.twig', [
                'product_name' => $product->getNameproduct(),
                'product_brand' => $product->getBrandproduct(),
                'product_quantity' => $product->getQtyproduct(),
                'product_price' => $product->getHtproduct(),
                'product_q_descript' => $product->getQuickdescript(),
                'product_descript' =>$product->getDescriptionproduct(),
                'product_descript2' =>$product->getDescriptionproduct2(),
                'product_descript3' =>$product->getDescriptionproduct3(),
                'product_descript4' =>$product->getDescriptionproduct4(),
                'product_compo' => $product->getComposition(),
                'product_saveur' => $product->getSaveur(),
                /* 'product_category' => $product_cat->getNamecategory() */
            ]);
        }
    }

    #[Route('/addProduct', name: 'app_addProduct')]
    public function addProduct(ValidatorInterface $validator): Response
    {
        $entityManager = $this->getDoctrine()->getManager();

        $product = new Product();
        $product->setNameproduct("Chips");
        $product->setBrandproduct("MEGA");
        $product->setDescriptionproduct("description compète du produit");
        $product->setHtproduct("20");
        $product->setQtyproduct("0.2");
        $product->setIsactive(1);
        $product->setQuickdescript("petit description des chips");
        $product->setSaveur("caca");
        $product->setComposition("tu veux pas savoir");

        $error = $validator->validate($product);

        if (count($error) > 0){
            return new Response((string) $error, 400);
        } 

        else {
            $entityManager->persist($product);
            $entityManager->flush();

            return new Response ('le produit suivant a été ajouté : '.$product->getNameproduct());
        }
    }
}
