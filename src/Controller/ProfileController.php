<?php

namespace App\Controller;

use App\Entity\User;
use App\Form\UpdatePasswordFormType;
use App\Form\UpdateUsernameFormType;
use App\Repository\ReviewRepository;
use App\Service\DestinationCatalog;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\PasswordHasher\Hasher\UserPasswordHasherInterface;
use Symfony\Component\Routing\Attribute\Route;
use Symfony\Component\Security\Http\Attribute\IsGranted;

#[IsGranted('ROLE_USER')]
final class ProfileController extends AbstractController
{
    public function __construct(
        private readonly ReviewRepository $reviewRepository,
        private readonly DestinationCatalog $destinations,
        private readonly EntityManagerInterface $em,
        private readonly UserPasswordHasherInterface $passwordHasher,
    ) {
    }

    #[Route('/profile', name: 'app_profile')]
    public function index(): Response
    {
        /** @var User $user */
        $user = $this->getUser();

        $reviews = $this->reviewRepository->findBy(
            ['user' => $user],
            ['createdAt' => 'DESC'],
        );

        $reviewsWithDestination = array_map(function ($review) {
            $dest = $this->destinations->get($review->getDestinationId());
            return [
                'review'          => $review,
                'destinationName' => $dest ? $dest['name'] : ucfirst($review->getDestinationId()),
            ];
        }, $reviews);

        return $this->render('profile/index.html.twig', [
            'user'                   => $user,
            'reviewsWithDestination' => $reviewsWithDestination,
            'reviewCount'            => count($reviews),
        ]);
    }

    #[Route('/profile/edit', name: 'app_profile_edit')]
    public function edit(Request $request): Response
    {
        /** @var User $user */
        $user = $this->getUser();

        // --- Username form ---
        $usernameForm = $this->createForm(UpdateUsernameFormType::class);
        $usernameForm->handleRequest($request);

        if ($usernameForm->isSubmitted() && $usernameForm->isValid()) {
            $user->setUsername($usernameForm->get('username')->getData());
            $this->em->flush();

            $this->addFlash('success', 'Username updated successfully.');
            return $this->redirectToRoute('app_profile_edit');
        }

        // --- Password form ---
        $passwordForm = $this->createForm(UpdatePasswordFormType::class);
        $passwordForm->handleRequest($request);

        if ($passwordForm->isSubmitted() && $passwordForm->isValid()) {
            if (!$this->passwordHasher->isPasswordValid($user, $passwordForm->get('currentPassword')->getData())) {
                $this->addFlash('error', 'Your current password is incorrect.');
                return $this->redirectToRoute('app_profile_edit');
            }

            $user->setPassword(
                $this->passwordHasher->hashPassword($user, $passwordForm->get('newPassword')->getData())
            );
            $this->em->flush();

            $this->addFlash('success', 'Password updated successfully.');
            return $this->redirectToRoute('app_profile_edit');
        }

        return $this->render('profile/edit.html.twig', [
            'usernameForm' => $usernameForm->createView(),
            'passwordForm' => $passwordForm->createView(),
        ]);
    }
}