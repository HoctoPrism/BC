<?php

namespace App\Controller;

use App\Entity\Brand;
use App\Form\BrandType;
use App\Repository\BrandRepository;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\IsGranted;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Security;
use Symfony\Component\HttpFoundation\File\Exception\FileException;
use Symfony\Component\HttpFoundation\File\UploadedFile;
use Symfony\Component\String\Slugger\SluggerInterface;

#[Route('/brand')] //comme un prefixe de route ici, on peut définir un droit
class BrandController extends AbstractController
{

    #[Route('/', name: 'brand_index', methods: ['GET'])]
    public function index(BrandRepository $brandRepository): Response
    {
        return $this->render('brand/index.html.twig', [
            'brands' => $brandRepository->findAll(),
        ]);
    }

    #[IsGranted("ROLE_ADMIN")]
    #[Route('/new', name: 'brand_new', methods: ['GET', 'POST'])]
    public function new(Request $request, SluggerInterface $slugger): Response
    {

        $this->denyAccessUnlessGranted('ROLE_ADMIN');

        $brand = new Brand();
        $form = $this->createForm(BrandType::class, $brand);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {

            //1. Je récupère le contenu de mon champ d'upload qui a été envoyé
            $imageFile = $form->get('Logo')->getData();

            //2. Si mon champ d'upload n'est pas vide : je vais faire traitement de mon fichier 
            if($imageFile) {

                //3. Je récupère le nom du fichier uploadé (JUSTE le nom du fichier)
                $originalFilename = pathinfo($imageFile->getClientOriginalName(), PATHINFO_FILENAME);

                //4. Je convertis le nom de mon fichier en Slug (nom de fichier sans espace, sans accent = utilisable dans une URL)
                $safeFilename = $slugger->slug($originalFilename);

                //5. Création d'un nouveau de fichier à partir du slug + un identifiant unique (evite les problemes d'upload de fichiers ayant des noms identiques) + extension du fichier d'origine
                $newFilename = $safeFilename.'-'.uniqid().'.'.$imageFile->guessExtension();
                try{

                //6.Copie du fichier uploadé qui est temporairement stocké quelque part dans sur le serveur avec renommage en utilisant le nouveau nom
                $imageFile->move($this->getParameter('upload_directory'), $newFilename);

                }
                catch (FileException $e) {

                    var_dump($e);
                    die('Erreur' );
                }

                //7. J'ajoute le nom du nouveau fichier à ma propriété Logo de mon brand
                $brand->setLogo($newFilename);

            }

            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($brand);
            $entityManager->flush();

            return $this->redirectToRoute('brand_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->renderForm('brand/new.html.twig', [
            'brand' => $brand,
            'form' => $form,
        ]);
    }

    #[Route('/{id}', name: 'brand_show', methods: ['GET'])]
    public function show(Brand $brand): Response
    {
        return $this->render('brand/show.html.twig', [
            'brand' => $brand,
        ]);
    }

    #[IsGranted("ROLE_ADMIN")]
    #[Route('/{id}/edit', name: 'brand_edit', methods: ['GET', 'POST'])]
    public function edit(Request $request, Brand $brand, SluggerInterface $slugger): Response
    {

        $this->denyAccessUnlessGranted('ROLE_ADMIN');

        $form = $this->createForm(BrandType::class, $brand);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {

            $imageFile = $form->get('Logo')->getData();

            if($imageFile) {
                $originalFilename = pathinfo($imageFile->getClientOriginalName(), PATHINFO_FILENAME);
                $safeFilename = $slugger->slug($originalFilename);
                $newFilename = $safeFilename.'-'.uniqid().'.'.$imageFile->guessExtension();

                try{
                    $imageFile->move($this->getParameter('upload_directory'), $newFilename);
                }

                catch (FileException $e) {
                    var_dump($e);
                    die('Erreur' );
                }

                $brand->setLogo($newFilename);
            }
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('brand_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->render('brand/edit.html.twig', [
            'brand' => $brand,
            'form' => $form->createView(),
        ]);
    }

    #[IsGranted("ROLE_ADMIN")]
    #[Route('/{id}', name: 'brand_delete', methods: ['POST'])]
    public function delete(Request $request, Brand $brand): Response
    {

        $this->denyAccessUnlessGranted('ROLE_ADMIN');

        if ($this->isCsrfTokenValid('delete'.$brand->getId(), $request->request->get('_token'))) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->remove($brand);
            $entityManager->flush();
        }

        return $this->redirectToRoute('brand_index');
    }
}
