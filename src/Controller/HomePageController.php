<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class HomePageController extends AbstractController
{
    #[Route('/', name: 'app_home_page')]
    public function index(): Response
    {
        return $this->render('home_page/index.html.twig', [
            'controller_name' => 'HomePageController',
        ]);
    }

    //Contact
    #[Route('/kontakt', name: 'app_contatct', methods: ['GET'])]
    public function contact(): Response
    {
        return $this->render('home_page/contact.html.twig');
    }

    //Regulations
    #[Route('/regulamin', name: 'app_regulations', methods: ['GET'])]
    public function regulations(): Response
    {
        return $this->render('home_page/regulations.html.twig');
    }

    //Comment rules
    #[Route('/zasady-pisania-opinii', name: 'app_rules', methods: ['GET'])]
    public function rules(): Response
    {
        return $this->render('home_page/rules.html.twig');
    }
}
