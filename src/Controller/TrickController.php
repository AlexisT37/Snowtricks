<?php

namespace App\Controller;


use Symfony\Component\HttpFoundation\Response;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

class TrickController extends AbstractController {

    #[Route('/', name: 'app_homepage')]
    public function homepage(): Response {
        echo 'homepage';

        $tracks = [
            ['song' => 'trick 1', 'artist' => 'alex'],
            ['song' => 'trick 2', 'artist' => 'shashou'],
        ];
        return $this->render('trick/homepage.html.twig', [
            'title' => 'Snowtricks',
            'tracks' => $tracks,
        ]);
    }

    #[Route('/browse/{slug}', name: 'app_browse')]
    public function browse(string $slug = null): Response
    {
        echo $slug;
        return $this->render('trick/browse.html.twig', [
            'genre' => $genre
        ]);
    }
}