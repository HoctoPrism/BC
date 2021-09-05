<?php

namespace App\Controller;

use App\Repository\ProductRepository;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class SearchController extends AbstractController
{
    #[Route('/search', name: 'search')]
    public function index(): Response
    {
        return $this->render('search/index.html.twig');
    }

    public function searchBar()
    {
        $searchBar = $this->createFormBuilder()
        ->setAction($this->generateUrl('handleSearch'))
        ->add('query', TextType::class, [
            'attr' => [
                'placeholder' => 'Chercher un produit, une marque...'
            ]
        ])
        ->getForm();
        return $this->render('search/searchBar.html.twig', [
            'searchBar' => $searchBar->createView()
        ]);
    }

    #[Route('/handleSearch', name: 'handleSearch')]
    public function handleSearch(Request $request, ProductRepository $repo)
    {
        $query = $request->request->get('form')['query'];
        if($query) {
            $products = $repo->searchProductsByName($query);
        }
        return $this->render('search/index.html.twig', [
            'productsSearched' => $products,
            'query' => $query
        ]);
    }
}
