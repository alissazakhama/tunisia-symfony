<?php

namespace App\Controller;

use App\Entity\Review;
use App\Form\ReviewFormType;
use App\Repository\DestinationRepository;
use App\Repository\ReviewRepository;
use App\Service\DestinationCatalog;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

final class DestinationShowController extends AbstractController
{
    public function __construct(private readonly DestinationCatalog $destinations)
    {
    }

    #[Route('/destinations/{id}', name: 'app_destination_show')]
    public function show(string $id, ReviewRepository $reviewRepository, DestinationRepository $destinationRepository): Response
    {
        $destination = $destinationRepository->findBySlug($id);

        if (null === $destination) {
            throw $this->createNotFoundException('Destination not found');
        }

        $destinationId = $destination->getId();

        $reviews = $reviewRepository->findByDestination($destinationId);
        $averageRating = $reviewRepository->getAverageRating($destinationId);
        $reviewCount = $reviewRepository->countByDestination($destinationId);

        $reviewForm = null;
        if ($this->getUser()) {
            $review = new Review();
            $review->setDestinationId($destinationId);
            $reviewForm = $this->createForm(ReviewFormType::class, $review, [
                'action' => $this->generateUrl('app_destination_review', ['id' => $id]),
                'method' => 'POST',
            ]);
        }

        return $this->render('destination_show/index.html.twig', [
            'destination' => $destination,
            'id' => $id,
            'destination_image' => $this->destinations->imageAssetPath($destination->getHeroImage()),
            'placeholder_image' => $this->destinations->imageAssetPath('placeholder.svg'),
            'reviews' => $reviews,
            'averageRating' => $averageRating,
            'reviewCount' => $reviewCount,
            'reviewForm' => $reviewForm,
        ]);
    }
}