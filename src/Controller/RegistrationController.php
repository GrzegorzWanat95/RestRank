<?php

namespace App\Controller;

use App\Entity\User;
use App\Repository\UserRepository;
use App\Form\RegistrationFormType;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\PasswordHasher\Hasher\UserPasswordHasherInterface;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Contracts\Translation\TranslatorInterface;
use Symfony\Component\Security\Http\Event\LogoutEvent;
use Symfony\Contracts\EventDispatcher\EventDispatcherInterface;
use Symfony\Component\Security\Core\Authentication\Token\Storage\TokenStorageInterface;

class RegistrationController extends AbstractController
{
    #[Route('/rejestracja', name: 'app_register')]
    public function register(Request $request, UserPasswordHasherInterface $userPasswordHasher, EntityManagerInterface $entityManager): Response
    {
        $user = new User();
        $form = $this->createForm(RegistrationFormType::class, $user);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            // encode the plain password
            $user->setPassword(
            $userPasswordHasher->hashPassword(
                    $user,
                    $form->get('plainPassword')->getData()
                )
            );

            $entityManager->persist($user);
            $entityManager->flush();
            // do anything else you need here, like send an email

            return $this->redirectToRoute('app_home_page');
        }

        return $this->render('registration/register.html.twig', [
            'registrationForm' => $form->createView(),
        ]);
    }

    //User panel - edit data/password

        #[Route('/{id}/edycja', name: 'app_user_edit', methods: ['GET', 'POST'])]
    public function edit(Request $request, User $user, UserRepository $userRepository): Response
    {
        $form = $this->createForm(RegistrationFormType::class, $user);
        $form['agreTersm']->setData(true); 
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $userRepository->add($user, true);
            return $this->redirectToRoute('app_user_panel', [], Response::HTTP_SEE_OTHER);
        }

        return $this->renderForm('users/edit.html.twig', [
            'user' => $user,
            'form' => $form,
        ]);
    }

    
    #[Route('/panel-uzytkownika', name: 'app_user_panel', methods: ['GET', 'POST'])]
    public function userPanel(): Response
    {
            return $this->renderForm('users/userPanel.html.twig');
    }

    #[Route('/usuwanie/{id}', name: 'app_user_delete', methods: ['POST'])]
    public function delete(Request $request, UserRepository $userRepository, EventDispatcherInterface $eventDispatcher, TokenStorageInterface $tokenStorage)
    {     
        $cUser = $this->getUser();
        $userRepository->remove($cUser, true);    
        $logoutEvent = new LogoutEvent($request, $tokenStorage->getToken());
        $eventDispatcher->dispatch($logoutEvent);
        $tokenStorage->setToken(null);
        return $this->redirectToRoute('app_logout');
    }
}
