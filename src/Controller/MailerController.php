<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Mailer\MailerInterface;
use Symfony\Component\Mime\Email;
use Symfony\Component\Routing\Annotation\Route;;

class MailerController extends AbstractController
{
    #[Route('/send-email')]
    public function index(MailerInterface $mailer)
    {
        $email = (new Email())
            ->from('yhhhgtub@gmail.com')
            ->to('jlsshrn8621@gmail.com')
            ->subject('Email Test')
            ->text('A sample email using mailtrap.')
            ->html('<p>See Twig integration for better HTML integration!</p>');


        try {
            $mailer->send($email);
        } catch (TransportExceptionInterface $e) {

        }
        return new Response(
            'Email sent successfully'
        );
    }
}