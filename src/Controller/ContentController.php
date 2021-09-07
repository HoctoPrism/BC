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

    #[Route('/account', name: 'app_account')]
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
    #[Route('/propos', name: 'app_propos')]
    public function propos(): Response
    {
        return $this->render('content/propos.html.twig');
    }
    #[Route('/faq', name: 'app_faq')]
    public function faq(): Response
    {
        return $this->render('content/faq.html.twig');
    }
    #[Route('/conf', name: 'app_conf')]
    public function conf(): Response
    {
        return $this->render('content/conf.html.twig');
    }
    #[Route('/space', name: 'app_space')]
    public function space(): Response
    {
        return $this->render('content/space.html.twig');
    }   
};
?>