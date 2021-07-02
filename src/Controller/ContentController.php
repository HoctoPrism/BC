<?php
// src/Controller/ContentController.php
namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;

class ContentController extends AbstractController{
    public function page404(): Response{
        return $this->render('content/404.html.twig');
    }
    public function useraccount(): Response{
        return $this->render('content/userAccount.html.twig');
    }
}
?>