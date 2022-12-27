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
            ['title' => 'Super flip', 'content' => 'This is a cool flip'],
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
}
