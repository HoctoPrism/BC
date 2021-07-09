<?php

namespace App\Controller;

use App\Entity\Category;
use App\Repository\CategoryRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Validator\Validator\ValidatorInterface;

class CategoryController extends AbstractController
{
    #[Route('/category', name: 'category')]
    public function index(): Response
    {
        return $this->render('category/index.html.twig', [
            'controller_name' => 'CategoryController',
        ]);
    }

    #[Route('/category/add', name: 'app_addCategory')]
    public function addCategory(ValidatorInterface $validator): Response
    {
        $entityManager = $this->getDoctrine()->getManager();

        $category = new Category();
        $category->setNameCategory("Chips");

        $error = $validator->validate($category);

        if (count($error) > 0){
            return new Response((string) $error, 400);
        } 

        else {
            $entityManager->persist($category);
            $entityManager->flush();

            return new Response ('la catégory suivant a été ajoutée : '.$category->getNameCategory());
        }
    }

    #[Route('/category/update/{idcategory}', name: 'app_updateCategory')]
    public function updateCategory(ValidatorInterface $validator, $idcategory): Response
    {
        $entityManager = $this->getDoctrine()->getManager();
        $category = $entityManager->getRepository(Category::class)->find($idcategory);

        $category->setNameCategory("humain");

        $error = $validator->validate($category);

        if (count($error) > 0){
            return new Response((string) $error, 400);
        } 

        else {
            $entityManager->persist($category);
            $entityManager->flush();

            return new Response ('le nom de la catégorie a été modifié pour : '.$category->getNameCategory());
        }
    }

    #[Route('/category/delete/{idcategory}', name: 'app_deleteCategory')]
    public function deleteProduct(ValidatorInterface $validator, $idcategory): Response
    {
        $entityManager = $this->getDoctrine()->getManager();
        $category = $entityManager->getRepository(Category::class)->find($idcategory);

        $error = $validator->validate($category);

        if (count($error) > 0){
            return new Response((string) $error, 400);
        } 

        else {
            $entityManager->remove($category);
            $entityManager->flush();

            return $this->redirectToRoute("app_main", [
                /* 'idcategory' => $product->getIdcategory() */
            ]);
        }
    }

    #[Route('/category/{idcategory}', name: 'app_category')]
    public function displayCategory($idcategory){
        $category = $this->getDoctrine()
                    ->getRepository(Category::class)
                    ->find($idcategory);
        
        if(!$category){
            return $this->render('Bundles/TwigBundle/Exception/error400.html.twig', [
                'controller_name' => "La catégorie demandée n'existe pas",
            ]);
        }
        
        return new Response('Nom de la Catégorie : '.$category->getNamecategory());
    }
}
