<?php

namespace App\Controller;

use App\Repository\ProductRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class MainController extends AbstractController
{

    #[Route('/main', name: 'app_main', methods: ['GET'])]
    public function index(ProductRepository $productRepository): Response
    {
        return $this->render('main/main.html.twig', [
            'cats' => $productRepository->orderProductByCategory(12),
            'dogs' => $productRepository->orderProductByCategory(12),
            'birds' => $productRepository->orderProductByCategory(12),
            'rodents' => $productRepository->orderProductByCategory(12),
        ]);
    }
}
