<?php

namespace App\Controller;

use App\Entity\User;
use App\Entity\Restaurant;
use App\Entity\Comments;
use App\Form\CommentsType;
use App\Repository\CommentsRepository;
use App\Repository\RestaurantRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;


#[Route('/opinie')]
class CommentsController extends AbstractController
{
    #[Route('/dodaj', name: 'app_comments_new', methods: ['GET', 'POST'])]
    public function new(Request $request, CommentsRepository $commentsRepository, RestaurantRepository $Restaurant): Response
    {
        $value = dump($request->query->get('id'));
        $restaurant = $Restaurant->find($value);
        $user = $this->getUser();
        $login = $this->getUser()->getLogin();
        $comment = new Comments();   
        $comment -> setRestaurant($restaurant);
        $comment -> setUserLogin($login);
        $comment -> setUser($this->getUser());
        $comment -> setDate(new \DateTime());
        $form = $this->createForm(CommentsType::class, $comment);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $commentsRepository->add($comment, true);

            return $this->redirectToRoute('app_restaurant_show', array('id' => $value,
            ));
        }

        return $this->renderForm('comments/new.html.twig',[
            'comment' => $comment,
            'form' => $form,
        ]);
    }


    #[Route('/{id}/edycja', name: 'app_comments_edit', methods: ['GET', 'POST'])]
    public function edit(Request $request, Comments $comment, CommentsRepository $commentsRepository): Response
    {
        $form = $this->createForm(CommentsType::class, $comment);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $commentsRepository->add($comment, true);

            return $this->redirectToRoute('app_user_panel', [], Response::HTTP_SEE_OTHER);
        }

        return $this->renderForm('comments/edit.html.twig', [
            'comment' => $comment,
            'form' => $form,
        ]);
    }

    #[Route('/{id}', name: 'app_comments_delete', methods: ['POST'])]
    public function delete(Request $request, Comments $comment, CommentsRepository $commentsRepository): Response
    {
        if ($this->isCsrfTokenValid('delete'.$comment->getId(), $request->request->get('_token'))) {
            $commentsRepository->remove($comment, true);
        }

        return $this->redirectToRoute('app_user_panel', [], Response::HTTP_SEE_OTHER);
    }
}
