<?php

namespace App\Services;

use Symfony\Bridge\Twig\Mime\TemplatedEmail;
use Symfony\Component\Mailer\MailerInterface;
use Symfony\Component\Mime\Address;
use Symfony\Component\PasswordHasher\Hasher\UserPasswordHasherInterface;

class Mailer
{
    private $mailer;
    public function __construct(MailerInterface $mailer)
    {
        $this->mailer = $mailer ;
    }
    public function generateRandomNumbers() {
        $randomNumbers = array();
        for ($i = 0; $i < 5; $i++) {
            $randomNumbers[] = rand(); // Generates a random number
        }
        return $randomNumbers;
    }

    public function sendMail($email)
    {
        $generateNumber = $this->generateRandomNumbers();
        $numberString = implode(", ", $generateNumber);
        $email = (new TemplatedEmail())
            ->from('support_codologie@example.com')
            ->to(new Address($email))
            ->subject('Thanks for signing up!')
            ->htmlTemplate('emails/signup.html.twig')
            // pass variables (name => value) to the template
            ->context([
                'number' => $numberString
            ])
        ;
        $this->mailer->send($email);
    }
}