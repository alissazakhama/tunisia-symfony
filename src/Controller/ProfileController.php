<?php

namespace App\Controller;

use App\Entity\User;
use App\Repository\ReviewRepository;
use App\Service\DestinationCatalog;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;
use Symfony\Component\Security\Http\Attribute\IsGranted;

#[IsGranted('ROLE_USER')]
final class ProfileController extends AbstractController
{
    public function __construct(
        private readonly ReviewRepository $reviewRepository,
        private readonly DestinationCatalog $destinations,
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
}