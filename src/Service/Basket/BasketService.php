<?php

namespace App\Service\Basket;

use App\Repository\ProductRepository;
use Symfony\Component\HttpFoundation\RequestStack;

class BasketService 
{
    protected $session;
    protected $productRepository;

    public function __construct(RequestStack $request, ProductRepository $productRepository)
    { 
        $this->session = $request->getSession();
        $this->productRepository = $productRepository;

    }

    public function add(int $id)
    { 
        $basket = $this->session->get('basket', []); //si pas de panier, tableau vide

        if (!empty($basket[$id])) {
            $basket[$id]++;
        } else {
            $basket[$id] = 1;
        }

        $this->session->set('basket', $basket);
    }
    public function decrement(int $id)
    { 
        $basket = $this->session->get('basket', []); //si pas de panier, tableau vide

        if (!empty($basket[$id])) {
            $basket[$id]--;
            if ($basket[$id] == 0) {
                unset($basket[$id]);
            }
        }

        $this->session->set('basket', $basket);
    }

    public function remove(int $id)
    { 
        $basket = $this->session->get('basket', []);

        if (!empty($basket[$id])) {
            unset($basket[$id]);
        }

        $this->session->set('basket', $basket);
    }

    public function removeBasket()
    { 
        $basket = $this->session->get('basket', []);

        if (!empty($basket)) {
            unset($basket);
        }

        $this->session->set('basket', []);
    }

    public function getFullBasket() : array { 

        $basket = $this->session->get('basket', []);

        $basketWithData = [];

        foreach ($basket as $id => $quantity) {
            $basketWithData[] = [
                'product' => $this->productRepository->find($id),
                'quantity' => $quantity
            ];
        }

        return $basketWithData;
     }
    public function getTotal(): float {

        $total = 0;

        foreach ($this->getFullBasket() as $value) {
            $total += ($value['product']->getHtproduct() * 1.2 ) * $value['quantity'];
        }

        return $total;
    }
}
?>