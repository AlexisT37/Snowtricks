<?php

namespace App\Controller;

use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class TrickController extends AbstractController
{
    #[Route('/')]
    public function homepage(): Response
    {

        $tricks = [
            ['name' => 'Super flip', 'description' => 'This is a cool flip'],
        ];

        return $this->render('trick/homepage.html.twig', [
            'title' => 'Snowtricks',
            'tricks' => $tricks,
        ]);
    }
    
    #[Route('/browse/{slug}')]
    public function browse($slug): Response
    {
        return new Response('Figure: '.$slug);
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
    public function create()
    {
        

        return new Response('create');
    }
}
