<?php

namespace App\Controller;

use App\Entity\Opinions;
use App\Form\OpinionsType;
use App\Repository\OpinionsRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

#[Route('/opinions')]
class OpinionsController extends AbstractController
{
    #[Route('/', name: 'app_opinions_index', methods: ['GET'])]
    public function index(OpinionsRepository $opinionsRepository): Response
    {
        return $this->render('opinions/index.html.twig', [
            'opinions' => $opinionsRepository->findAll(),
        ]);
    }

    #[Route('/new', name: 'app_opinions_new', methods: ['GET', 'POST'])]
    public function new(Request $request, OpinionsRepository $opinionsRepository): Response
    {
        $opinion = new Opinions();
        $form = $this->createForm(OpinionsType::class, $opinion);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $opinionsRepository->add($opinion, true);

            return $this->redirectToRoute('app_opinions_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->renderForm('opinions/new.html.twig', [
            'opinion' => $opinion,
            'form' => $form,
        ]);
    }

    #[Route('/{id}', name: 'app_opinions_show', methods: ['GET'])]
    public function show(Opinions $opinion): Response
    {
        return $this->render('opinions/show.html.twig', [
            'opinion' => $opinion,
        ]);
    }

    #[Route('/{id}/edit', name: 'app_opinions_edit', methods: ['GET', 'POST'])]
    public function edit(Request $request, Opinions $opinion, OpinionsRepository $opinionsRepository): Response
    {
        $form = $this->createForm(OpinionsType::class, $opinion);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $opinionsRepository->add($opinion, true);

            return $this->redirectToRoute('app_opinions_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->renderForm('opinions/edit.html.twig', [
            'opinion' => $opinion,
            'form' => $form,
        ]);
    }

    #[Route('/{id}', name: 'app_opinions_delete', methods: ['POST'])]
    public function delete(Request $request, Opinions $opinion, OpinionsRepository $opinionsRepository): Response
    {
        if ($this->isCsrfTokenValid('delete'.$opinion->getId(), $request->request->get('_token'))) {
            $opinionsRepository->remove($opinion, true);
        }

        return $this->redirectToRoute('app_opinions_index', [], Response::HTTP_SEE_OTHER);
    }
}
