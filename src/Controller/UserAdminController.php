<?php

namespace App\Controller;

use App\Entity\Useraccount;
use App\Form\UserAdminType;
use App\Repository\UseraccountRepository;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\IsGranted;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Security\Core\Encoder\UserPasswordEncoderInterface;


#[IsGranted('ROLE_ADMIN')]
#[Route('/user/admin')]
class UserAdminController extends AbstractController
{

    #[IsGranted('ROLE_ADMIN')]
    #[Route('/', name: 'user_admin_index', methods: ['GET'])]
    public function index(UseraccountRepository $useraccountRepository): Response
    {
        $this->denyAccessUnlessGranted('ROLE_ADMIN');

        return $this->render('user_admin/index.html.twig', [
            'useraccounts' => $useraccountRepository->findAll(),
        ]);
    }

    #[IsGranted('ROLE_ADMIN')]
    #[Route('/new', name: 'user_admin_new', methods: ['GET', 'POST'])]
    public function new(Request $request): Response
    {
        $this->denyAccessUnlessGranted('ROLE_ADMIN');

        $useraccount = new Useraccount();
        $form = $this->createForm(UserAdminType::class, $useraccount);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($useraccount);
            $entityManager->flush();

            return $this->redirectToRoute('user_admin_index');
        }

        return $this->render('user_admin/new.html.twig', [
            'useraccount' => $useraccount,
            'form' => $form->createView(),
        ]);
    }

    #[IsGranted('ROLE_ADMIN')]
    #[Route('/{iduser}/edit', name: 'user_admin_edit', methods: ['GET', 'POST'])]
    public function edit(Request $request, Useraccount $useraccount, UserPasswordEncoderInterface $passwordEncoder): Response
    {

        $this->denyAccessUnlessGranted('ROLE_ADMIN');

        $form = $this->createForm(UserAdminType::class, $useraccount);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {

            $useraccount->setPassword(
                $passwordEncoder->encodePassword(
                    $useraccount,
                    $form->get('pwduser')->getData()
                )
            );

            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('user_admin_index');
        }

        return $this->render('user_admin/edit.html.twig', [
            'useraccount' => $useraccount,
            'form' => $form->createView(),
        ]);
    }

    #[IsGranted('ROLE_ADMIN')]
    #[Route('/{iduser}', name: 'user_admin_delete', methods: ['POST'])]
    public function delete(Request $request, Useraccount $useraccount): Response
    {
        $this->denyAccessUnlessGranted('ROLE_ADMIN');

        if ($this->isCsrfTokenValid('delete'.$useraccount->getIduser(), $request->request->get('_token'))) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->remove($useraccount);
            $entityManager->flush();
        }

        return $this->redirectToRoute('user_admin_index');
    }
}
