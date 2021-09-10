<?php

namespace App\Controller;

use App\Form\SearchType as FormSearchType;
use App\Entity\Category;
use App\Form\CategoryType;
use App\Repository\CategoryRepository;
use App\Repository\ProductRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\IsGranted;

#[Route('/category')]
class CategoryController extends AbstractController
{
    #[Route('/', name: 'category_index', methods: ['GET', 'POST'])]
    public function index(CategoryRepository $categoryRepository, ProductRepository $productRepository, Request $request): Response
    {
        $form = $this->createForm(FormSearchType::class);
        $form->handleRequest($request);

        $result = $productRepository->findAll();

        if($form->isSubmitted() && $form->isValid()){
            $result = $productRepository->searchProduct($form->getData());
        }

        return $this->render('category/index.html.twig', [
            'categories' => $categoryRepository->findAll(),
            'form' => $form->createView(),
            'results' => $result
        ]);
    }

    #[IsGranted("ROLE_ADMIN")]
    #[Route('/new', name: 'category_new', methods: ['GET', 'POST'])]
    public function new(Request $request, CategoryRepository $categoryRepository): Response
    {

        $this->denyAccessUnlessGranted('ROLE_ADMIN');

        $category = new Category();
        $form = $this->createForm(CategoryType::class, $category);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($category);
            $entityManager->flush();

            return $this->redirectToRoute('category_index');
        }

        return $this->render('category/new.html.twig', [
            'category' => $category,
            'form' => $form->createView(),
            'categories' => $categoryRepository->findAll(),
        ]);
    }

    #[Route('/{idcategory}', name: 'category_show', methods: ['GET', 'POST'])]
    public function show(Category $category, CategoryRepository $categoryRepository, ProductRepository $productRepository, Request $request): Response
    {
        $form = $this->createForm(FormSearchType::class);
        $form->handleRequest($request);

        $result = $productRepository->findAll();

        if($form->isSubmitted() && $form->isValid()){
            $result = $productRepository->searchProduct($form->getData());
        }

        return $this->render('category/show.html.twig', [
            'category' => $category,
            'categories' => $categoryRepository->findAll(),
            'product' => $productRepository->getProductsByCategory( $category->getIdcategory() ),
            'products' => $productRepository->findAll(),            
            'form' => $form->createView(),
            'results' => $result
        ]);
    }

    #[IsGranted("ROLE_ADMIN")]
    #[Route('/{idcategory}/edit', name: 'category_edit', methods: ['GET', 'POST'])]
    public function edit(Request $request, Category $category, CategoryRepository $categoryRepository): Response
    {

        $this->denyAccessUnlessGranted('ROLE_ADMIN');

        $form = $this->createForm(CategoryType::class, $category);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('category_index');
        }

        return $this->render('category/edit.html.twig', [
            'subCategory' => $category,
            'categories' => $categoryRepository->findAll(),
            'form' => $form->createView(),
        ]);
    }

    #[IsGranted("ROLE_ADMIN")]
    #[Route('/{idcategory}', name: 'category_delete', methods: ['POST'])]
    public function delete(Request $request, Category $category): Response
    {

        $this->denyAccessUnlessGranted('ROLE_ADMIN');

        if ($this->isCsrfTokenValid('delete'.$category->getIdcategory(), $request->request->get('_token'))) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->remove($category);
            $entityManager->flush();
        }

        return $this->redirectToRoute('category_index');
    }
}
