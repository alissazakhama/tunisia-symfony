<?php

namespace App\Controller;

use App\Service\DestinationCatalog;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

/**
 * Renders the interactive Tunisia map with destination pins.
 *
 * Each destination shown in the catalog is placed on the SVG map.
 * Coordinates (map_cx / map_cy) can be stored directly in your
 * destination data array.  If they are absent the Twig template
 * falls back to a built-in lookup table keyed by destination name.
 *
 * To add coordinates in your catalog data simply include:
 *   'map_cx'  => 152,   // x position on the 300-wide SVG viewBox
 *   'map_cy'  => 72,    // y position on the 520-tall SVG viewBox
 *
 * You may also add optional fields used by the hover card:
 *   'description' => 'Short text shown in the hover preview.',
 *   'region'      => 'Northern Tunisia',
 */
final class DestinationMapController extends AbstractController
{
    public function __construct(private readonly DestinationCatalog $destinations)
    {
    }

    #[Route('/map', name: 'app_destination_map')]
    public function map(): Response
    {
        return $this->render('destination/map.html.twig', [
            'destinations'      => $this->destinations->listForIndex(),
            'placeholder_image' => $this->destinations->imageAssetPath('placeholder.svg'),
        ]);
    }
}
