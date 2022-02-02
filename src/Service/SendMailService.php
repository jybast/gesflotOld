<?php

namespace App\Service;

use Symfony\Bridge\Twig\Mime\TemplatedEmail;
use Symfony\Component\Mailer\MailerInterface;

class SendMailService
{
    private $mailer;

    public function __construct(MailerInterface $mailer)
    {
        $this->mailer = $mailer;
    }

    public function send(
        string $from,
        string $to,
        //string $cc,            ('cc@example.com')
        //string $bcc,           ('bcc@example.com')
        //string $replyTo,      ('fabien@example.com')
        //string $priority,     (Email::PRIORITY_HIGH)
        //string $attachFile,   ('/path/to/documents/document.pdf')
        string $subject,
        string $template,
        array $context
    ): void {
        // On crée le mail
        $email = (new TemplatedEmail())
            ->from($from)
            ->to($to)
            //->cc($cc)
            //->bcc($bcc)
            //->replyTo($replyTo)
            //->priority($priority)
            //->attachFromPath("uploads/documents" . $attachFile . ".pdf")
            ->subject($subject)
            ->htmlTemplate("templated_emails/" . $template . ".html.twig")
            ->context($context);
        //->embedFromPath('../public/assets/img/login.jpg', 'image');
        // On envoie le mail
        $this->mailer->send($email);
    }
}
