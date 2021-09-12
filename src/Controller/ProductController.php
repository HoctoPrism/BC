<?php

namespace App\Controller;

use App\Entity\Product;
use App\Form\ProductType;
use App\Repository\ProductRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\IsGranted;
use Symfony\Component\HttpFoundation\File\Exception\FileException;
use Symfony\Component\String\Slugger\SluggerInterface;

#[Route('/product')]
class ProductController extends AbstractController
{
    #[IsGranted("ROLE_ADMIN")]
    #[Route('/', name: 'product_index', methods: ['GET'])]
    public function index(ProductRepository $productRepository): Response
    {
        $this->denyAccessUnlessGranted('ROLE_ADMIN');

        return $this->render('product/index.html.twig', [
            'products' => $productRepository->findAll(),
        ]);
    }

    #[IsGranted("ROLE_ADMIN")]
    #[Route('/new', name: 'product_new', methods: ['GET', 'POST'])]
    public function new(Request $request, SluggerInterface $slugger): Response
    {

        $this->denyAccessUnlessGranted('ROLE_ADMIN');

        $product = new Product();
        $form = $this->createForm(ProductType::class, $product);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {

            $imageFile1 = $form->get('image1')->getData();
            $imageFile2 = $form->get('image2')->getData();
            $imageFile3 = $form->get('image3')->getData();
            $imageFile4 = $form->get('image4')->getData();

            if($imageFile1) {

                $originalFilename = pathinfo($imageFile1->getClientOriginalName(), PATHINFO_FILENAME);
                $safeFilename = $slugger->slug($originalFilename);
                $newFilename = $safeFilename.'-'.uniqid().'.'.$imageFile1->guessExtension();
                
                try{

                $imageFile1->move($this->getParameter('upload_directory'), $newFilename);

                }
                catch (FileException $e) {

                    var_dump($e);
                    die('Erreur' );
                }

                $product->setImage1($newFilename);

            }

            if($imageFile2) {

                $originalFilename = pathinfo($imageFile2->getClientOriginalName(), PATHINFO_FILENAME);
                $safeFilename = $slugger->slug($originalFilename);
                $newFilename = $safeFilename.'-'.uniqid().'.'.$imageFile2->guessExtension();
                
                try{

                $imageFile2->move($this->getParameter('upload_directory'), $newFilename);

                }
                catch (FileException $e) {

                    var_dump($e);
                    die('Erreur' );
                }

                $product->setImage2($newFilename);

            }

            if($imageFile3) {

                $originalFilename = pathinfo($imageFile3->getClientOriginalName(), PATHINFO_FILENAME);
                $safeFilename = $slugger->slug($originalFilename);
                $newFilename = $safeFilename.'-'.uniqid().'.'.$imageFile3->guessExtension();
                
                try{

                $imageFile3->move($this->getParameter('upload_directory'), $newFilename);

                }
                catch (FileException $e) {

                    var_dump($e);
                    die('Erreur' );
                }

                $product->setImage3($newFilename);

            }

            if($imageFile4) {

                $originalFilename = pathinfo($imageFile4->getClientOriginalName(), PATHINFO_FILENAME);
                $safeFilename = $slugger->slug($originalFilename);
                $newFilename = $safeFilename.'-'.uniqid().'.'.$imageFile4->guessExtension();
                
                try{

                $imageFile4->move($this->getParameter('upload_directory'), $newFilename);

                }
                catch (FileException $e) {

                    var_dump($e);
                    die('Erreur' );
                }

                $product->setImage4($newFilename);

            }
            
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($product);
            $entityManager->flush();

            return $this->redirectToRoute('category_index');
        }

        return $this->render('product/new.html.twig', [
            'product' => $product,
            'form' => $form->createView(),
        ]);
    }

    #[Route('/{idproduct}', name: 'product_show', methods: ['GET'])]
    public function show(Product $product, ProductRepository $products): Response
    {
        $cat = $product->getIdcategory();
        $prod = $product->getIdproduct();

        return $this->render('product/show.html.twig', [
            'product' => $product,
            'products' => $products->similarProducts($cat, $prod)
        ]);
    }

    #[IsGranted("ROLE_ADMIN")]
    #[Route('/{idproduct}/edit', name: 'product_edit', methods: ['GET', 'POST'])]
    public function edit(Request $request, Product $product, SluggerInterface $slugger): Response
    {

        $this->denyAccessUnlessGranted('ROLE_ADMIN');

        $form = $this->createForm(ProductType::class, $product);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {

            $imageFile1 = $form->get('image1')->getData();
            $imageFile2 = $form->get('image2')->getData();
            $imageFile3 = $form->get('image3')->getData();
            $imageFile4 = $form->get('image4')->getData();

            if($imageFile1) {
                $originalFilename = pathinfo($imageFile1->getClientOriginalName(), PATHINFO_FILENAME);
                $safeFilename = $slugger->slug($originalFilename);
                $newFilename = $safeFilename.'-'.uniqid().'.'.$imageFile1->guessExtension();

                try{
                    $imageFile1->move($this->getParameter('upload_directory'), $newFilename);
                }

                catch (FileException $e) {
                    var_dump($e);
                    die('Erreur' );
                }

                $product->setImage1($newFilename);
            }

            if($imageFile2) {
                $originalFilename = pathinfo($imageFile2->getClientOriginalName(), PATHINFO_FILENAME);
                $safeFilename = $slugger->slug($originalFilename);
                $newFilename = $safeFilename.'-'.uniqid().'.'.$imageFile2->guessExtension();

                try{
                    $imageFile2->move($this->getParameter('upload_directory'), $newFilename);
                }

                catch (FileException $e) {
                    var_dump($e);
                    die('Erreur' );
                }

                $product->setImage2($newFilename);
            }

            if($imageFile3) {
                $originalFilename = pathinfo($imageFile3->getClientOriginalName(), PATHINFO_FILENAME);
                $safeFilename = $slugger->slug($originalFilename);
                $newFilename = $safeFilename.'-'.uniqid().'.'.$imageFile3->guessExtension();

                try{
                    $imageFile3->move($this->getParameter('upload_directory'), $newFilename);
                }

                catch (FileException $e) {
                    var_dump($e);
                    die('Erreur' );
                }

                $product->setImage3($newFilename);
            }

            if($imageFile4) {
                $originalFilename = pathinfo($imageFile4->getClientOriginalName(), PATHINFO_FILENAME);
                $safeFilename = $slugger->slug($originalFilename);
                $newFilename = $safeFilename.'-'.uniqid().'.'.$imageFile4->guessExtension();

                try{
                    $imageFile4->move($this->getParameter('upload_directory'), $newFilename);
                }

                catch (FileException $e) {
                    var_dump($e);
                    die('Erreur' );
                }

                $product->setImage4($newFilename);
            }
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('category_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->render('product/edit.html.twig', [
            'product' => $product,
            'form' => $form->createView(),
        ]);
    }

    #[IsGranted("ROLE_ADMIN")]
    #[Route('/{idproduct}', name: 'product_delete', methods: ['POST'])]
    public function delete(Request $request, Product $product): Response
    {

        $this->denyAccessUnlessGranted('ROLE_ADMIN');

        if ($this->isCsrfTokenValid('delete'.$product->getIdproduct(), $request->request->get('_token'))) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->remove($product);
            $entityManager->flush();
        }

        return $this->redirectToRoute('category_index');
    }
}
