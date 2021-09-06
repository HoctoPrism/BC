<?php

namespace App\Controller;

use App\Entity\Address;
use App\Entity\Useraccount;
use App\Form\AddressType;
use App\Repository\AddressRepository;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\IsGranted;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

#[Route('/address')]
class AddressController extends AbstractController
{
    #[IsGranted("ROLE_ADMIN")]
    #[Route('/', name: 'address_index', methods: ['GET'])]
    public function index(AddressRepository $addressRepository): Response
    {
        $this->denyAccessUnlessGranted('ROLE_ADMIN');

        return $this->render('address/index.html.twig', [
            'addresses' => $addressRepository->findAll(),
        ]);
    }

    #[Route('/new', name: 'address_new', methods: ['GET', 'POST'])]
    public function new(Request $request): Response
    {
        $address = new Address();
        $form = $this->createForm(AddressType::class, $address);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {

            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($address);
            $entityManager->flush();

            return $this->redirectToRoute('useraccount_index');
        }

        return $this->render('address/new.html.twig', [
            'address' => $address,
            'form' => $form->createView(),
        ]);
    }

    #[Route('/{idadress}', name: 'address_show', methods: ['GET'])]
    public function show(Address $address): Response
    {
        return $this->render('address/show.html.twig', [
            'address' => $address,
        ]);
    }

    #[Route('/{idadress}/edit', name: 'address_edit', methods: ['GET', 'POST'])]
    public function edit(Request $request, Address $address): Response
    {
        $form = $this->createForm(AddressType::class, $address);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('useraccount_index');
        }

        return $this->render('address/edit.html.twig', [
            'address' => $address,
            'form' => $form->createView(),
        ]);
    }

    #[Route('/{idadress}', name: 'address_delete', methods: ['POST'])]
    public function delete(Request $request, Address $address): Response
    {
        if ($this->isCsrfTokenValid('delete'.$address->getIdadress(), $request->request->get('_token'))) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->remove($address);
            $entityManager->flush();
        }

        return $this->redirectToRoute('useraccount_index');
    }
}
