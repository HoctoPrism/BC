<?php
// src/Controller/DefaultController.php
namespace App\Controller;

use App\Repository\ProductRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;

class DefaultController extends AbstractController{

    public function index(ProductRepository $productRepository): Response{

        return $this->render('main/main.html.twig', [
            'products' => $productRepository->tendance()
        ]);
    }
}
?>