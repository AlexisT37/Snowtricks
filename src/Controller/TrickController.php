<?php

namespace App\Controller;

use App\Entity\Trick;
use DateTimeImmutable;
use App\Entity\Comment;
use App\Form\TrickType;
use App\Form\CommentType;
use App\Repository\TrickRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class TrickController extends AbstractController
{
    #[Route('/viewdetail/{slug}', name: 'viewdetail')]
    public function viewdetail(TrickRepository $trickRepository, $slug): Response
    {
        $trick = $trickRepository->findOneBy(['slug' => $slug]);
        

        return $this->render('trick/viewdetail.html.twig', [
            'trick' => $trick,
        ]);
    }

    #[Route('/create', name: 'create')]
    public function create(EntityManagerInterface $entityManager, Request $request): Response
    {
        $trick = new Trick();
        $trick->setCreator($this->getUser());
        $trick->setCreatedAt(new DateTimeImmutable());
        $trick->setModifedAt(new DateTimeImmutable());
        $trick->setDeleted(0);
        $trick->setDiscussionChannel('empty');


        $form = $this->createForm(TrickType::class, $trick);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager->persist($trick);
            $entityManager->flush();

            return $this->redirectToRoute('app_home');
        }

        return $this->render('trick/create.html.twig', [
            'form' => $form->createView(),
        ]);
    }

    // function to edit a trick, the trick will be the trick where the user is
    #[Route('/edit/{slug}', name: 'edit')]
    public function edit(TrickRepository $trickRepository, $slug, Request $request, EntityManagerInterface $entityManager): Response
    {
        $trick = $trickRepository->findOneBy(['slug' => $slug]);
        $form = $this->createForm(TrickType::class, $trick);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager->persist($trick);
            $entityManager->flush();

            return $this->redirectToRoute('viewdetail', ['slug' => $trick->getSlug()]);
        }

        return $this->render('trick/edit.html.twig', [
            'form' => $form->createView(),
        ]);
    }

    // function to add a comment to a trick, author of the comment will be the current user, the trick will be the trick where the comment is added
    #[Route('/addcomment/{slug}', name: 'addcomment')]
    public function addcomment(TrickRepository $trickRepository, $slug, Request $request, EntityManagerInterface $entityManager): Response
    {
        $trick = $trickRepository->findOneBy(['slug' => $slug]);
        $comment = new Comment();
        $comment->setAuthorName($this->getUser());
        $comment->setTrick($trick);
        $form = $this->createForm(CommentType::class, $comment);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager->persist($comment);
            $entityManager->flush();

            return $this->redirectToRoute('viewdetail', ['slug' => $trick->getSlug()]);
        }

        return $this->render('trick/addcomment.html.twig', [
            'form' => $form->createView(),
        ]);
    }


}
