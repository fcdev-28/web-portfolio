<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

final class WebController extends AbstractController
{
    #[Route('/', name: 'home')]
    public function home(): Response
    {
        return $this->render('home.html.twig');
    }

    #[Route('/about', name: 'about')]
    public function about(): Response
    {
        return $this->render('about.html.twig');
    }

    #[Route('/services', name: 'services')]
    public function services(): Response
    {
        return $this->render('services.html.twig');
    }

    #[Route('/projects', name: 'projects')]
    public function projects(): Response
    {
        return $this->render('projects.html.twig');
    }

    #[Route('/contact', name: 'contact')]
    public function contact(): Response
    {
        return $this->render('contact.html.twig');
    }

    #[Route('/legal_notice', name: 'legal_notice')]
    public function legal_notice(): Response
    {
        return $this->render('legal/legal-notice.html.twig');
    }

    #[Route('/privacy_policy', name: 'privacy_policy')]
    public function privacy_policy(): Response
    {
        return $this->render('legal/privacy-policy.html.twig');
    }

    #[Route('/cookies_policy', name: 'cookies_policy')]
    public function cookies_policy(): Response
    {
        return $this->render('legal/cookies-policy.html.twig');
    }
}
