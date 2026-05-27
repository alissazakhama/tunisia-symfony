<?php

namespace App\Controller;

use App\Entity\Review;
use App\Form\ReviewFormType;
use App\Repository\DestinationRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;
use Symfony\Component\Security\Http\Attribute\IsGranted;

final class ReviewController extends AbstractController
{
    #[Route('/destinations/{id}/reviews', name: 'app_destination_review', methods: ['POST'])]
    #[IsGranted('ROLE_USER')]
    public function submit(
        string $id,
        Request $request,
        EntityManagerInterface $entityManager,
        DestinationRepository $destinationRepository,
    ): Response {
        $destination = $destinationRepository->findBySlug($id);

        if (!$destination) {
            throw $this->createNotFoundException('Destination not found');
        }

        $review = new Review();
        $form = $this->createForm(ReviewFormType::class, $review);
        $form->handleRequest($request);

        $review->setDestinationId($destination->getId());
        $review->setUsername($this->getUser()->getUsername());

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager->persist($review);
            $entityManager->flush();
            $this->addFlash('success', 'Thank you! Your review has been posted.');
        } else {
            $this->addFlash('error', 'Could not save your review. Please check your rating and comment.');
        }

        return $this->redirectToRoute('app_destination_show', ['id' => $id]);
    }
}