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
            $this->updateRestaurantDatabase($commentsRepository, $Restaurant, $restaurant);
            
            return $this->redirectToRoute('app_restaurant_show', array('id' => $value,
            ));
        }

        return $this->renderForm('comments/new.html.twig',[
            'comment' => $comment,
            'form' => $form,
        ]);
    }


    #[Route('/{id}/edycja', name: 'app_comments_edit', methods: ['GET', 'POST'])]
    public function edit(Request $request, Comments $comment, CommentsRepository $commentsRepository, RestaurantRepository $Restaurant): Response
    {
        $id = $comment->getRestaurant()->getId();
        $restaurant = $Restaurant->find($id);
        $form = $this->createForm(CommentsType::class, $comment);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $commentsRepository->add($comment, true);
            $this->updateRestaurantDatabase($commentsRepository, $Restaurant, $restaurant);
            return $this->redirectToRoute('app_restaurant_show', array('id' => $id,
        ));
        }

        return $this->renderForm('comments/edit.html.twig', [
            'comment' => $comment,
            'form' => $form,
        ]);
    }

    #[Route('/{id}', name: 'app_comments_delete', methods: ['POST'])]
    public function delete(Request $request, Comments $comment, CommentsRepository $commentsRepository, RestaurantRepository $Restaurant): Response
    {
        $id = $comment->getRestaurant()->getId();
        $restaurant = $Restaurant->find($id);
        $this->updateRestaurantDatabase($commentsRepository, $Restaurant, $restaurant);

        if ($this->isCsrfTokenValid('delete'.$comment->getId(), $request->request->get('_token'))) {
            $commentsRepository->remove($comment, true);
            $this->updateRestaurantDatabase($commentsRepository, $Restaurant, $restaurant);
        }

        return $this->redirectToRoute('app_user_panel', []);
    }

    public function updateRestaurantDatabase(CommentsRepository $commentsRepository, RestaurantRepository $restaurantRepository, Restaurant $restaurant)
    {
        $comments=$commentsRepository->findByExampleField($restaurant);
        if(is_null($comments) || ($comments < 1))
        {
            $restaurant->setAverage(0);
            $restaurant->setCountOpinions(0);
            $restaurantRepository->add($restaurant, true);
        }
        else
        {
            $number = count($comments);
            $sum=0;
            $average=0;
            foreach ($comments as &$comment) {
                $sum += $comment->getStars();
            }
            if ($number != 0) {
                $average = $sum/$number;
              }
            else
            {
                $average = 0;
            }
            $restaurant->setAverage($average);
            $restaurant->setCountOpinions($number);
            $restaurantRepository->add($restaurant, true);
        }
    }
}
