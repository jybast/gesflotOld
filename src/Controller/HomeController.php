<?php

namespace App\Controller;

use App\Form\ContactType;
use App\Service\SendMailService;
use Symfony\Bridge\Twig\Mime\TemplatedEmail;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Mailer\MailerInterface;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Mailer\Exception\TransportExceptionInterface;

class HomeController extends AbstractController
{
    #[Route('/home', name: 'home')]
    public function home(Request $request): Response
    {


        return $this->render('home/home.html.twig', [
            'controller_name' => 'HomeController',
        ]);
    }

    #[Route('/contact', name: 'contact')]
    public function contact(SendMailService $mailerService, Request $request): Response
    {
        // set form contact
        $form = $this->createForm(ContactType::class);

        // Handle form
        $contact = $form->handleRequest($request);
        $token = $request->attributes->get('token');

        // operates with datas
        if ($form->isSubmitted() && $form->isValid()) {
            // prepare context of the mail       

            $context = [
                'mail' => $contact->get('email')->getData(),
                'sujet' => $contact->get('sujet')->getData(),
                'message' => $contact->get('message')->getData(),
            ];

            try {


                // create email with template
                $mailerService->send(
                    $contact->get('email')->getData(),
                    'Gesflot@domaine.fr',
                    'Contact depuis le site Gesflot',
                    'email-contact',
                    $context,
                    'image'
                );
            } catch (TransportExceptionInterface $e) {
                // confirm and redirect
                $this->addFlash('error', 'Your mail was not sent successfully');
                dd($token);
            }

            // confirm and redirect
            $this->addFlash('message', 'Your mail was sent successfully');

            // return on route
            return $this->redirectToRoute('home');
        }

        return $this->render('home/contact.html.twig', [
            'form' => $form->createView(),
        ]);
    }

    #[Route('/about', name: 'about')]
    public function about(): Response
    {
        return $this->render('home/about.html.twig', [
            'controller_name' => 'HomeController',
        ]);
    }

    #[Route('/change-locale/{locale}', name: 'change-locale')]
    public function changeLocale($locale, Request $request)
    {
        // store locale in session
        $request->getSession()->set('_locale', $locale);
        // TODO: check if locale is in array app_locales
        // in_array($locale, $request->getParameter('app.locales'))

        // step back to previous page where we come from
        return $this->redirect($request->headers->get('referer'));
    }
}
