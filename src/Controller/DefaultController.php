<?php
// src/Controller/DefaultController.php
namespace App\Controller;

use App\Repository\CategoryRepository;
use App\Repository\ProductRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class DefaultController extends AbstractController{

    public function index(ProductRepository $productRepository): Response{

        return $this->render('main/main.html.twig', [
            'products' => $productRepository->tendance()
        ]);
    }

    #[Route('/megaMenu', name: 'megaMenu')]
    public function CatMegaMenu(CategoryRepository $categoryRepository): Response
    {
        return $this->render('inc/megaMenu.html.twig', [
            'categories' => $categoryRepository->findAll(),
        ]);
    }  

    #[Route('/headerMenu', name: 'headerMenu')]
    public function CatHeaderMenu(CategoryRepository $categoryRepository): Response
    {
        return $this->render('inc/headerMenu.html.twig', [
            'categories' => $categoryRepository->findAll(),
        ]);
    }  
}
?>