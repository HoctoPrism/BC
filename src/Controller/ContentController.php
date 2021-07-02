<?php
// src/Controller/ContentController.php
namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class ContentController extends AbstractController{
    public function page404(): Response{
        return $this->render('content/404.html.twig');
    }

    #[Route('/account', name: 'app_userAccount')]
    public function useraccount(): Response{
        return $this->render('content/userAccount.html.twig');
    }

    #[Route('/CGU', name: 'app_cgu')]
    public function CGU(): Response
    {
        return $this->render('content/CGU.html.twig');
    }

    #[Route('/mentions', name: 'app_mentions')]
    public function mention(): Response
    {
        return $this->render('content/mentions.html.twig');
    }
}; 
?>