<?php

namespace App\Controller;

use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use App\Repository\TrickRepository;


class HomeController extends AbstractController
{


    #[Route('/', name: 'app_home')]
    public function home(Request $request, EntityManagerInterface $entityManager, TrickRepository $trickRepository): Response
    {

        $tricks = $trickRepository->findAll();

        return $this->render('home.html.twig', [
            'tricks' => $tricks,
        ]);
        // return $this->render('home.html.twig');
    }

    
}
