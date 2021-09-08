<?php

namespace App\Controller;

use App\Service\Basket\BasketService;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

class BasketController extends AbstractController
{
    #[Route('/basket', name: 'basket_index', methods: ['GET'])]
    public function index(BasketService $basketService)
    {
        return $this->render('basket/index.html.twig', [
            'baskets' => $basketService->getFullBasket(),
            'total' => $basketService->getTotal()
        ]);
    }

    #[Route('/basket/add/{id}', name: 'basket_add', methods: ['GET', 'POST'])]
    public function add($id, BasketService $basketService)
    {
        $basketService->add($id);

        return $this->redirectToRoute('basket_index');
    }

    #[Route('/basket/decrement/{id}', name: 'basket_decrement', methods: ['GET', 'POST'])]
    public function decrement($id, BasketService $basketService)
    {
        $basketService->decrement($id);

        return $this->redirectToRoute('basket_index');
    }

    #[Route('/basket/remove/{id}', name: 'basket_remove', methods: ['GET'])]
    public function remove($id, BasketService $basketService)
    {
        $basketService->remove($id);

        return $this->redirectToRoute('basket_index');
    }
    

}
?>