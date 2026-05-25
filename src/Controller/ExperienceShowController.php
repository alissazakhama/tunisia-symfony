<?php

namespace App\Controller;

use App\Service\DestinationCatalog;
use App\Service\ExperienceCatalog;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

final class ExperienceShowController extends AbstractController
{
    public function __construct(
        private readonly ExperienceCatalog $experiences,
        private readonly DestinationCatalog $destinations,
    ) {
    }

    #[Route('/experiences/{id}', name: 'app_experience_show')]
    public function show(string $id): Response
    {
        $experience = $this->experiences->get($id);

        if (null === $experience) {
            throw $this->createNotFoundException('Experience not found');
        }

        $relatedDestinations = [];
        foreach ($experience['related_destinations'] as $destinationId) {
            $destination = $this->destinations->get($destinationId);
            if (null !== $destination) {
                $relatedDestinations[] = [
                    'id' => $destinationId,
                    'name' => $destination['name'],
                    'image_path' => $this->destinations->imageAssetPath($destination['image']),
                    'category' => $destination['category'],
                ];
            }
        }

        return $this->render('experience_show/index.html.twig', [
            'experience' => $experience,
            'id' => $id,
            'experience_image' => $this->experiences->imageAssetPath($experience['image']),
            'placeholder_image' => $this->destinations->imageAssetPath('placeholder.svg'),
            'related_destinations' => $relatedDestinations,
        ]);
    }
}
