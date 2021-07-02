<?php

namespace App\Controller;

use App\Form\SavType;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Mailer\MailerInterface;
use Symfony\Component\Mime\Email;
use Symfony\Component\Routing\Annotation\Route;

class SavController extends AbstractController
{
    #[Route('/sav', name: 'app_SAV')]
    public function index(Request $request, MailerInterface $mailer)
    {
        $formSav = $this->createForm(SavType::class);
        $formSav->handleRequest($request);
        
        if($formSav->isSubmitted() && $formSav->isValid()){
            $data = $formSav->getData();
            
            $message = (new Email())
                ->from($data['Email'])
                ->to($_ENV['DATA_MAIL_FORM'])
                ->subject($data['Sujet'])
                ->text('from '.$data['Email'].' message : '.$data['Message'], 'text/plain');
                $mailer->send($message);
        }

        return $this->render('sav/SAV.html.twig', [
            'form' => $formSav->createView(),
            'title' => "la Nimes'alerie - SAV"
        ]);
    }
}
