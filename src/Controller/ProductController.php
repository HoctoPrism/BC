<?php

namespace App\Controller;

use App\Entity\Category;
use App\Entity\Product;
use App\Form\AddProductType;
use App\Repository\ProductRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Validator\Validator\ValidatorInterface;
use Symfony\Component\HttpFoundation\Request;


class ProductController extends AbstractController
{
    #[Route('/product/update/{idproduct}', name: 'app_updateProduct')]
    public function updateProduct(ValidatorInterface $validator, $idproduct): Response
    {
        $entityManager = $this->getDoctrine()->getManager();
        $product = $entityManager->getRepository(Product::class)->find($idproduct);

        $product->setSaveur("humain");

        $error = $validator->validate($product);

        if (count($error) > 0){
            return new Response((string) $error, 400);
        } 

        else {
            $entityManager->persist($product);
            $entityManager->flush();

            return $this->redirectToRoute("app_oneProduct", [
                'idproduct' => $product->getIdproduct()
            ]);
        }
    }

    #[Route('/product/delete/{idproduct}', name: 'app_deleteProduct')]
    public function deleteProduct(ValidatorInterface $validator, $idproduct): Response
    {
        $entityManager = $this->getDoctrine()->getManager();
        $product = $entityManager->getRepository(Product::class)->find($idproduct);

        $error = $validator->validate($product);

        if (count($error) > 0){
            return new Response((string) $error, 400);
        } 

        else {
            $entityManager->remove($product);
            $entityManager->flush();

            return $this->redirectToRoute("app_listProduct");
        }
    }

    #[Route('/product/{idproduct}', name: 'app_oneProduct')]
    public function displayProduct($idproduct, ?Category $idcategory)
    {
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
                'product' => $product
            ]);
        }
    }

    #[Route('/product/', name: 'app_listProduct')]
    public function listProduct(): Response
    {
        $entityManager = $this->getDoctrine()->getManager();
        $product = $entityManager->getRepository(Product::class)->findAll();

        return $this->render('product/listproduct.html.twig', [
            'products' => $product
        ]);        
    }

    #[Route('/addproduct', name: 'app_addProduct')]
    public function newProduct(Request $request): Response
    {
        $product = new Product();
        $form = $this->createForm(AddProductType::class, $product);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {      

            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($product);
            $entityManager->flush();

            return $this->redirectToRoute("app_oneProduct", [
                'idproduct' => $product->getIdproduct()
            ]);
        }

        return $this->render('product/addProduct.html.twig', [
            'addProductForm' => $form->createView(),
        ]);
    }
}
