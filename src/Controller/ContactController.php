<?php

namespace App\Controller;

use App\Form\ContactType;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Mailer\MailerInterface;
use Symfony\Component\Mime\Email;
use Symfony\Component\Routing\Annotation\Route;

class ContactController extends AbstractController
{
    #[Route('/contact', name: 'app_contact')]
    public function index(Request $request, MailerInterface $mailer)
    {
        $formContact = $this->createForm(ContactType::class);
        $formContact->handleRequest($request);

        if ($formContact->isSubmitted() && $formContact->isValid()){
            $data = $formContact->getData();

            $message = (new Email())
                ->from($data['Email'])
                ->to($_ENV['DATA_MAIL_FORM'])
                ->subject($data['Sujet'])
                ->text('Emetteur : '.$data['Email'].' Son message '.$data["Message"], 'text/plain');
                $mailer->send($message);
        }

        return $this->render('contact/contact.html.twig', [
            'form' => $formContact->createView(),
            'title' => "La Nimes'alerie - Contactez nous"
        ]);
    }
}
