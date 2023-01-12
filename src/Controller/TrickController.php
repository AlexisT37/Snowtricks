<?php

namespace App\Controller;

use DateTime;
use App\Entity\Trick;
use DateTimeImmutable;
use App\Repository\TrickRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use function Symfony\Component\String\u;
class TrickController extends AbstractController
{
    #[Route('/')]
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
    public function create(EntityManagerInterface $entityManager): Response
    {
        $trick = new Trick();
        $trick->setName('Ninja Vanish');
        $trick->setDescription('Stop the snowboard in a huge cloud of snow !');
        $trick->setTrickgroup('Beginner');
        $trick->setVideoLink('https://www.youtube.com/watch?v=QMrelVooJR4');
        $trick->setImageLink('https://peakleaders.com/wp-content/uploads/2014/03/Ninja-Vanish.jpg');
        $trick->setDiscussionChannel('ninja-vanish');
        $trick->setAuthor('Alexis');
        $trick->setCreatedAt(new DateTimeImmutable());
        $trick->setModifedAt(new DateTimeImmutable());
        $trick->setDeleted(0);
        
        $entityManager->persist($trick);
        $entityManager->flush();

        return new Response('create');
    }
}