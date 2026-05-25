<?php

namespace App\Controller;

use App\Service\DestinationCatalog;
use App\Service\ExperienceCatalog;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

final class HomeController extends AbstractController
{
    public function __construct(
        private readonly ExperienceCatalog $experiences,
        private readonly DestinationCatalog $destinations,
    ) {
    }

    #[Route('/', name: 'app_home')]
    public function index(): Response
    {
        return $this->render('home/index.html.twig', [
            'experience_cards' => $this->experiences->listForHome(),
            'hero_image' => $this->destinations->imageAssetPath('tozeur1.jpg'),
            'placeholder_image' => $this->destinations->imageAssetPath('placeholder.svg'),
        ]);
    }
}
