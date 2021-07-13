<?php

namespace App\Controller;

use App\Entity\Category;
use App\Repository\CategoryRepository;
use App\Form\AddCategoryType;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Validator\Validator\ValidatorInterface;
use Symfony\Component\HttpFoundation\Request;

class CategoryController extends AbstractController
{

    #[Route('/category/update/{idcategory}', name: 'app_updateCategory')]
    public function updateCategory(ValidatorInterface $validator, $idcategory): Response
    {
        $entityManager = $this->getDoctrine()->getManager();
        $category = $entityManager->getRepository(Category::class)->find($idcategory);

        $category->setNameCategory('humain');

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

            return $this->redirectToRoute("app_listCategory");
        }
    }

    #[Route('/category/', name: 'app_listCategory')]
    public function listCategory(): Response
    {
        $entityManager = $this->getDoctrine()->getManager();
        $category = $entityManager->getRepository(Category::class)->findAll();

        return $this->render('category/listCategory.html.twig', [
            'categories' => $category
        ]);        
    }

    #[Route('/category/add', name: 'app_addCategory')]
    public function addCategory(Request $request): Response
    {
        $category = new Category();
        $form = $this->createForm(AddCategoryType::class, $category);
        $form->handleRequest($request);

        $entityManager = $this->getDoctrine()->getManager();
        $categorylist = $entityManager->getRepository(Category::class)->findAll();

        if ($form->isSubmitted() && $form->isValid()) {      

            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($category);
            $entityManager->flush();

            return $this->redirectToRoute("app_listCategory");
        }

        return $this->render('category/addCategory.html.twig', [
            'categories' => $categorylist,
            'addCategoryForm' => $form->createView()
        ]);
    }

    #[Route('/category/{idcategory}', name: 'app_oneCategory')]
    public function displayCategory($idcategory){
        $category = $this->getDoctrine()
                    ->getRepository(Category::class)
                    ->find($idcategory);
        
        if(!$category){
            return $this->render('Bundles/TwigBundle/Exception/error400.html.twig', [
                'controller_name' => "La catégorie demandée n'existe pas",
            ]);
        }
        
        else {
            return $this->render('category/category.html.twig', [
                'category' => $category
            ]);
        }
    }
}
