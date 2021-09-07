<?php

namespace App\Controller;

use App\Repository\ProductRepository;
use App\Service\Basket\BasketService;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\RequestStack;
use Symfony\Component\Routing\Annotation\Route;

class BasketController extends AbstractController
{
    #[Route('/basket', name: 'basket_index', methods: ['GET'])]
    public function index(RequestStack $request, ProductRepository $productRepository)
    {
        $basket = $request->getSession()->get('basket', []);

        $basketWithData = [];

        foreach ($basket as $id => $quantity) {
            $basketWithData[] = [
                'product' => $productRepository->find($id),
                'quantity' => $quantity
            ];
        }

        $total = 0;

        foreach ($basketWithData as $value) {
            $totalValue = ($value['product']->getHtproduct() * 1.2 ) * $value['quantity'];
            $total += $totalValue;
        }

        return $this->render('basket/index.html.twig', [
            'baskets' => $basketWithData,
            'total' => $total
        ]);
    }

    #[Route('/basket/add/{id}', name: 'basket_add', methods: ['GET', 'POST'])]
    public function add($id, BasketService $basketService)
    {
        $basketService->add($id);

        return $this->redirectToRoute('basket_index');
    }

    #[Route('/basket/remove/{id}', name: 'basket_remove', methods: ['GET'])]
    public function remove($id, RequestStack $request){

        $session = $request->getSession();
        $basket = $session->get('basket', []);

        if (!empty($basket[$id])) {
            unset($basket[$id]);
        }

        $session->set('basket', $basket);

        return $this->redirectToRoute('basket_index');

    }
    

}
?>