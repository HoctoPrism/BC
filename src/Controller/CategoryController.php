<?php

namespace App\Controller;

use App\Entity\Category;
use App\Repository\CategoryRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class CategoryController extends AbstractController
{
    #[Route('/category', name: 'category')]
    public function index(): Response
    {
        return $this->render('category/index.html.twig', [
            'controller_name' => 'CategoryController',
        ]);
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
