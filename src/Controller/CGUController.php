<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class CGUController extends AbstractController
{
    #[Route('CGU', name: 'app_cgu')]
    public function index(): Response
    {
        return $this->render('cgu/CGU.html.twig', [
       
        ]);
    }
}
