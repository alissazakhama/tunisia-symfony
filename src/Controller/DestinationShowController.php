<?php

namespace App\Controller;

use App\Entity\Review;
use App\Form\ReviewFormType;
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
    public function show(string $id, ReviewRepository $reviewRepository): Response
    {
        $destination = $this->destinations->get($id);

        if (null === $destination) {
            throw $this->createNotFoundException('Destination not found');
        }

        $reviews = $reviewRepository->findByDestination($id);
        $averageRating = $reviewRepository->getAverageRating($id);
        $reviewCount = $reviewRepository->countByDestination($id);

        $reviewForm = null;
        if ($this->getUser()) {
            $review = new Review();
            $review->setDestinationId($id);
            $reviewForm = $this->createForm(ReviewFormType::class, $review, [
                'action' => $this->generateUrl('app_destination_review', ['id' => $id]),
                'method' => 'POST',
            ]);
        }

        return $this->render('destination_show/index.html.twig', [
            'destination' => $destination,
            'id' => $id,
            'destination_image' => $this->destinations->imageAssetPath($destination['image']),
            'placeholder_image' => $this->destinations->imageAssetPath('placeholder.svg'),
            'reviews' => $reviews,
            'averageRating' => $averageRating,
            'reviewCount' => $reviewCount,
            'reviewForm' => $reviewForm,
        ]);
    }
}
