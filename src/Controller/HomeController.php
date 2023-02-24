<?php

namespace App\Controller;

use Pagerfanta\Pagerfanta;
use App\Repository\TrickRepository;
use Pagerfanta\Adapter\ArrayAdapter;
use Doctrine\ORM\EntityManagerInterface;
use Pagerfanta\Doctrine\ORM\QueryAdapter;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

// use Pagerfanta\Adapter\ArrayAdapter;
// use Pagerfanta\Pagerfanta;

class HomeController extends AbstractController
{


    #[Route('/', name: 'app_home')]
    public function home(Request $request, EntityManagerInterface $entityManager, TrickRepository $trickRepository): Response
    {

        // create a query builder using the query builder of the repository
        $queryBuilder = $trickRepository->getAllTricksQueryBuilder();
        // create a new adapter to paginate the trick entities using the query builder
        $adapter = new QueryAdapter($queryBuilder);
        // create a new pagerfanta instance with the adapter and the current page set to 1 and the max number of tricks per page set to 9
        $pagerfanta = Pagerfanta::createForCurrentPageWithMaxPerPage(
            $adapter,
            1,
            9
        );

        // $tricks = $trickRepository->findAll();

        return $this->render('home.html.twig', [
            'tricks' => $tricks,
            'pagerfanta' => $pagerfanta,
        ]);
        // return $this->render('home.html.twig');
    }

    
}
