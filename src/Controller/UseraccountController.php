<?php

namespace App\Controller;

use App\Entity\Useraccount;
use App\Form\ModifyPasswordType;
use App\Form\UseraccountType;
use App\Repository\AddressRepository;
use App\Repository\OrdersRepository;
use App\Repository\UseraccountRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\PasswordHasher\Hasher\UserPasswordHasherInterface;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Security\Core\Encoder\UserPasswordEncoderInterface;

#[Route('/useraccount')]
class UseraccountController extends AbstractController
{

    #[Route('/', name: 'useraccount_index', methods: ['GET'])]
    public function index(UseraccountRepository $useraccountRepository, AddressRepository $addressRepository, OrdersRepository $order): Response
    {
        return $this->render('useraccount/index.html.twig', [
            'useraccount' => $useraccountRepository->findAll(),
            'iduser' =>  $this->getUser(),
            'addresses' => $addressRepository->findAll(),
            'orders' => $order->findAll()
        ]);
    }

    #[Route('/{emailuser}/edit', name: 'useraccount_edit', methods: ['GET', 'POST'])]
    public function edit(Request $request, Useraccount $useraccount): Response
    {
        $form = $this->createForm(useraccountType::class, $useraccount);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('useraccount_index');
        }

        return $this->render('useraccount/edit.html.twig', [
            'useraccount' => $useraccount,
            'form' => $form->createView(),
        ]);
    }

    #[Route('/{emailuser}/passwordReset', name: 'useraccount_password', methods: ['GET', 'POST'])]
    public function passwordReset(Request $request, Useraccount $useraccount, UserPasswordHasherInterface $passwordEncoder): Response
    {
        $form = $this->createForm(ModifyPasswordType::class, $useraccount);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $password = $passwordEncoder->hashPassword($useraccount, $form->get('plainPassword')->getData());
            $useraccount->setPassword($password);
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('useraccount_index');
        }

        return $this->render('useraccount/password.html.twig', [
            'useraccount' => $useraccount,
            'form' => $form->createView(),
        ]);
    }

    #[Route('/{emailuser}', name: 'useraccount_delete', methods: ['POST'])]
    public function delete(Request $request, Useraccount $useraccount): Response
    {
        if ($this->isCsrfTokenValid('delete'.$useraccount->getUserIdentifier(), $request->request->get('_token'))) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->remove($useraccount);
            $entityManager->flush();
        }

        return $this->redirectToRoute('useraccount_index');
    }
}
