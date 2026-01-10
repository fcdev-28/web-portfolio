<?php

namespace App\Controller;

use App\Entity\ContactMessage;
use App\Form\ContactType;
use App\Repository\ContactMessageRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

final class WebController extends AbstractController
{
    #[Route('/', name: 'root')]
    public function root(Request $request): Response
    {
        $preferredLocale = $request->getPreferredLanguage(['es', 'en']);
        
        return $this->redirectToRoute('home', ['_locale' => $preferredLocale]);
    }

    #[Route('/{_locale}', name: 'home', requirements: ['_locale' => 'es|en'])]
    public function home(): Response
    {
        return $this->render('home.html.twig');
    }

    #[Route('/{_locale}/about', name: 'about', requirements: ['_locale' => 'es|en'])]
    public function about(): Response
    {
        return $this->render('about.html.twig');
    }

    #[Route('/{_locale}/services', name: 'services', requirements: ['_locale' => 'es|en'])]
    public function services(): Response
    {
        return $this->render('services.html.twig');
    }

    #[Route('/{_locale}/projects', name: 'projects', requirements: ['_locale' => 'es|en'])]
    public function projects(): Response
    {
        return $this->render('projects.html.twig');
    }

    #[Route('/{_locale}/contact', name: 'contact', requirements: ['_locale' => 'es|en'])]
    public function contact(Request $request, ContactMessageRepository $contactMessageRepository): Response
    {
        $contactMessage = new ContactMessage();
        $form = $this->createForm(ContactType::class, $contactMessage);

        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $contactMessageRepository->add($contactMessage);
            $timestamp = new \DateTimeImmutable('now', new \DateTimeZone('UTC'));
            $contactMessage->setCreated($timestamp);

            $this->addFlash('success', 'contact.form.success');
            $contactMessageRepository->add($contactMessage);
        }

        return $this->render('contact.html.twig', [
            'form' => $form->createView()
        ]);
    }

    #[Route('/{_locale}/legal_notice', name: 'legal_notice', requirements: ['_locale' => 'es|en'])]
    public function legal_notice(): Response
    {
        return $this->render('legal/legal-notice.html.twig');
    }

    #[Route('/{_locale}/privacy_policy', name: 'privacy_policy', requirements: ['_locale' => 'es|en'])]
    public function privacy_policy(): Response
    {
        return $this->render('legal/privacy-policy.html.twig');
    }

    #[Route('/{_locale}/cookies_policy', name: 'cookies_policy', requirements: ['_locale' => 'es|en'])]
    public function cookies_policy(): Response
    {
        return $this->render('legal/cookies-policy.html.twig');
    }
}