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
    public function index(MailerInterface $mailer): Response
    {
        $email = (new Email())
            ->from('yhhhgtub@gmail.com')
            ->to('jlsshrn8621@gmail.com')
            ->subject('Email Test')
            ->text('A sample email using mailtrap.')
            ->html('<p>See Twig integration for better HTML integration!</p>');


        try {
            $mailer->send($email);
        } catch (\Exception $e) {
            // Log or print the exception message and stack trace
            echo 'Error: ' . $e->getMessage();
            echo 'Stack Trace: ' . $e->getTraceAsString();
        }
        return $this->render('mailer/index.html.twig');
    }
}