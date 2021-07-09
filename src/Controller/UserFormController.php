<?php

namespace App\Controller;

use App\Entity\Useraccount;
use App\Form\MyAccountType;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Security\Core\Encoder\UserPasswordEncoderInterface;

class UserFormController extends AbstractController
{
    #[Route('/account', name: 'app_account')]
    public function modify(Request $request, UserPasswordEncoderInterface $passwordEncoder): Response
    {
        $user = new Useraccount();
        $ModifyForm = $this->createForm(MyAccountType::class, $user);
        $ModifyForm->handleRequest($request);

        if ($ModifyForm->isSubmitted() && $ModifyForm->isValid()) {
            // encode the plain password
            $user->setPassword(
                $passwordEncoder->encodePassword(
                    $user,
                    $ModifyForm->get('pwduser')->getData()
                )
            );

            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($user);
            $entityManager->flush();

            // generate a signed url and email it to the user
     /*        $this->emailVerifier->sendEmailConfirmation('app_verify_email', $user,
                (new TemplatedEmail())
                    ->from(new Address('nemexxix@gmail.com', 'No Reply'))
                    ->to($user->getEmailuser())
                    ->subject('Please Confirm your Email')
                    ->htmlTemplate('registration/confirmation_email.html.twig')
            ); */
            // do anything else you need here, like send an email

            return $this->redirectToRoute('app_main');
        }

        return $this->render('content/userAccount.html.twig', [
            'ModifyForm' => $ModifyForm->createView(),
        ]);
    }
}
