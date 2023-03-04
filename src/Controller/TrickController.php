<?php

namespace App\Controller;

use App\Entity\Trick;
use DateTimeImmutable;
use App\Entity\Comment;
use App\Form\TrickType;
use App\Form\CommentType;
use App\Repository\TrickRepository;
use Pagerfanta\Adapter\ArrayAdapter;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class TrickController extends AbstractController
{
    #[Route('/viewdetail/{slug}', name: 'viewdetail')]
    public function viewdetail(Trick $trick, Request $request, TrickRepository $trickRepository): Response
    {
        $comments = $trick->getComments();
        $comments = $comments->getValues();
        // sort the comments by date from the newest to the oldest
        // using the usort function and a callback function that compares the dates of creation
        // it progressively, from the first to the last element, compares the dates of creation of two consecutive comments

        usort($comments, function ($a, $b) {
            return $a->getCreatedAt() < $b->getCreatedAt();
        });
        $adapter = new ArrayAdapter($comments);
        $pagerfanta = new \Pagerfanta\Pagerfanta($adapter);
        $pagerfanta->setMaxPerPage(5);
        $pagerfanta->setCurrentPage($request->query->get('page', 1));
        $comments = $pagerfanta->getCurrentPageResults();

        return $this->render('trick/viewdetail.html.twig', [
            'trick' => $trick,
            'comments' => $comments,
            'pagerfanta' => $pagerfanta,
        ]);
    }

    #[Route('/create', name: 'create')]
    public function create(EntityManagerInterface $entityManager, Request $request): Response
    {
        $trick = new Trick();
        $trick->setCreator($this->getUser());
        $trick->setCreatedAt(new DateTimeImmutable());
        $trick->setmodifiedAt(new DateTimeImmutable());
        $trick->setDeleted(0);
        $trick->setDiscussionChannel('empty');


        $form = $this->createForm(TrickType::class, $trick);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            dump($trick);
            dump($form);
            // dump($form->get('imageLinks')->getData());
            $entityManager->persist($trick);
            $entityManager->flush();

            $this->addFlash('success', 'Trick created !');
            return $this->redirectToRoute('app_home');
        }

        return $this->render('trick/create.html.twig', [
            'form' => $form->createView(),
        ]);
    }

    #[Route('/edit/{slug}', name: 'edit')]
    public function edit(TrickRepository $trickRepository, $slug, Request $request, EntityManagerInterface $entityManager): Response
    {
        $trick = $trickRepository->findOneBy(['slug' => $slug]);
        if ($trick->getCreator() == $this->getUser()) {
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
        } else {
            $this->addFlash('error', 'You can only edit your own tricks !');
            return $this->redirectToRoute('edit', ['slug' => $trick->getSlug()]);
        }
    }

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

    #[Route('/delete/{slug}', name: 'delete')]
    public function delete(TrickRepository $trickRepository, $slug, EntityManagerInterface $entityManager): Response
    {
        $trick = $trickRepository->findOneBy(['slug' => $slug]);
        if ($trick->getCreator() == $this->getUser()) {
            $trick->setDeleted(1);
            $entityManager->persist($trick);
            $entityManager->flush();
        } else {
            $this->addFlash('error', 'You can only delete your own tricks !');
        }

        return $this->redirectToRoute('app_home');
    }
}
