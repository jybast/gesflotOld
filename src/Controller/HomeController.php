<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

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
    public function contact(): Response
    {
        return $this->render('home/contact.html.twig', [
            'controller_name' => 'HomeController',
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

        // step back to previous page where we come
        return $this->redirect($request->headers->get('referer'));
    }
}
