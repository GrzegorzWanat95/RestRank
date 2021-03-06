<?php

namespace App\Controller;

use App\Entity\Restaurant;
use App\Form\RestaurantType;
use App\Repository\RestaurantRepository;
use App\Repository\CommentsRepository;
use Doctrine\DBAL\Query;
use Doctrine\ORM\Query\AST\UpdateItem;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Knp\Component\Pager\PaginatorInterface; 


#[Route('/restauracje')]
class RestaurantController extends AbstractController
{
    #[Route('/', name: 'app_restaurant_index', methods: ['GET', 'POST'])]
    public function index(Request $request, PaginatorInterface $paginator, RestaurantRepository $restaurantRepository): Response
    {   
        $restaurants = $paginator->paginate($restaurantRepository->findAll(), $request->query->getInt('page', 1),5);

        return $this->render('restaurant/index.html.twig', [ 
            'restaurants' => $restaurants 
        ]); 
    }

    #[Route('/dodaj', name: 'app_restaurant_new', methods: ['GET', 'POST'])]
    public function new(Request $request, RestaurantRepository $restaurantRepository): Response
    {
        $restaurant = new Restaurant();
        $form = $this->createForm(RestaurantType::class, $restaurant);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $restaurantRepository->add($restaurant, true);

            return $this->redirectToRoute('app_restaurant_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->renderForm('restaurant/new.html.twig', [
            'restaurant' => $restaurant,
            'form' => $form,
        ]);
    }

    #[Route('/{id}', name: 'app_restaurant_show', methods: ['GET'])]
    public function show(Restaurant $restaurant, CommentsRepository $commentsRepository): Response
    {
        $comments=$commentsRepository->findByExampleField($restaurant);
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
        return $this->render('restaurant/show.html.twig', [
            'restaurant' => $restaurant,
        ]);
    }

    #[Route('/{id}/edycja', name: 'app_restaurant_edit', methods: ['GET', 'POST'])]
    public function edit(Request $request, Restaurant $restaurant, RestaurantRepository $restaurantRepository): Response
    {
        $form = $this->createForm(RestaurantType::class, $restaurant);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $restaurantRepository->add($restaurant, true);

            return $this->redirectToRoute('app_restaurant_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->renderForm('restaurant/edit.html.twig', [
            'restaurant' => $restaurant,
            'form' => $form,
        ]);
    }


    #[Route('/szukaj/{type}/{name}', name: 'app_restaurant_query_name', methods: ['GET', 'POST'])]
    public function searchByName(PaginatorInterface $paginator, RestaurantRepository $restaurantRepository, Request $request):response
    {

        $value = $request->query->get('type');
        $name = $request->query->get('name');

        switch ($value){
            case 1 :
                if($name == null)
                {
                    return $this->redirectToRoute('app_restaurant_index', [], Response::HTTP_SEE_OTHER);
                }
                else
                {
                    $restaurants = $paginator->paginate($restaurantRepository->findBy(
                        ['Name' => $name]), $request->query->getInt('page', 1), 5);
                        return $this->render('restaurant/index.html.twig', [
                        'restaurants' => $restaurants,]);
                }
                break;
            case 2 :
                if($name == null)
                {
                    return $this->redirectToRoute('app_restaurant_index', [], Response::HTTP_SEE_OTHER);
                }
                else
                {
                    $restaurants = $paginator->paginate($restaurantRepository->findBy(
                        ['City' => $name]), $request->query->getInt('page', 1), 5);
                        return $this->render('restaurant/index.html.twig', [
                        'restaurants' => $restaurants,]);
                }
                break;
        }
    }
}
