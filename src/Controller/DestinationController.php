<?php

namespace App\Controller;

use App\Service\DestinationCatalog;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

final class DestinationController extends AbstractController
{
    public function __construct(private readonly DestinationCatalog $destinations)
    {
    }

    #[Route('/destinations', name: 'app_destinations')]
    public function index(): Response
    {
        return $this->render('destination/index.html.twig', [
            'destinations' => $this->destinations->listForIndex(),
            'placeholder_image' => $this->destinations->imageAssetPath('placeholder.svg'),
        ]);
    }
}
