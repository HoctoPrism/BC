<?php

namespace App\Service\Basket;

use Symfony\Component\HttpFoundation\RequestStack;

class BasketService 
{
    protected $session;

    public function __construct(RequestStack $request)
    { 
        $this->session = $request->getSession();

    }

    public function add(int $id)
    { 
        $basket = $this->session->get('basket', []); //si pas de panier, tableau vide

        if (!empty($basket[$id])) {
            $basket[$id]++;
        } else {
            $basket[$id] = 1;
        }
        
        $basket[$id] = 1;

        $this->session->set('basket', $basket);
    }
/*     public function remove(int $id){ }
    public function getFullBasket() : array { }
    public function getTotal(float $id): float { } */
}
?>