<?php

namespace App\Controller;

use DateTime;
use App\Entity\Trick;
use DateTimeImmutable;
use App\Form\TrickType;
use App\Repository\TrickRepository;
use Doctrine\ORM\EntityManagerInterface;
use function Symfony\Component\String\u;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class TrickController extends AbstractController
{
    #[Route('/', name: 'home')]
    public function homepage(TrickRepository $trickRepository): Response
    {

        $tricks = $trickRepository->findAll();

        return $this->render('trick/homepage.html.twig', [
            'tricks' => $tricks,
        ]);
        
    }
    
    #[Route('/browse/{slug}')]
    public function browse(TrickRepository $trickRepository, $slug=null): Response
    {
        $group = $slug ? u(str_replace('-', ' ', $slug))->title(true) : null;

        $tricks = $trickRepository->findAll();

        return $this->render('trick/browse.html.twig', [
            'group' => $group,
            'tricks' => $tricks,
        ]);
    }

    #[Route('/login', name: 'login')]
    public function login(): Response
    {
        echo 'login';
        return new Response('login');
    }

    #[Route('/register', name: 'register')]
    public function register(): Response
    {
        echo 'register';
        return new Response('register');
    }

    #[Route('/create', name: 'create')]
    public function create(EntityManagerInterface $entityManager, Request $request): Response
    {
        $trick = new Trick();
        $form = $this->createForm(TrickType::class, $trick);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager->persist($trick);
            $entityManager->flush();

            return $this->redirectToRoute('home');
        }

        return $this->render('trick/create.html.twig', [
            'form' => $form->createView(),
        ]);
    }
}
