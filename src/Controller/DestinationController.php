<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

final class DestinationController extends AbstractController
{
    #[Route('/destinations', name: 'app_destinations')]
    public function index(): Response
    {
        $destinations = [
            ['id' => 'tunis', 'name' => 'Tunis', 'image' => 'tunis-bab-bahr.jpg'],
            ['id' => 'djerba', 'name' => 'Djerba', 'image' => 'djerba1.jpg'],
            ['id' => 'tozeur', 'name' => 'Tozeur', 'image' => 'tozeur1.jpg'],
            ['id' => 'hammamet', 'name' => 'Hammamet', 'image' => 'hammamet1.jpg'],
            ['id' => 'sousse', 'name' => 'Sousse', 'image' => 'sousse.jpg'],
            ['id' => 'monastir', 'name' => 'Monastir', 'image' => 'imagemonastir.jpg'],
            ['id' => 'mahdia', 'name' => 'Mahdia', 'image' => 'mahdia.jpg'],
            ['id' => 'tabarka', 'name' => 'Tabarka', 'image' => 'tabarka.jpeg'],
            ['id' => 'bizerte', 'name' => 'Bizerte', 'image' => 'bizerte.jpeg'],
            ['id' => 'kairouan', 'name' => 'Kairouan', 'image' => 'kairouan.jpg'],
            ['id' => 'ain-draham', 'name' => 'Ain Draham', 'image' => 'ain_draham.jpeg'],
            ['id' => 'kelibia', 'name' => 'Kélibia & El Haouaria', 'image' => 'kelibia1.jpg'],
        ];

        return $this->render('destination/index.html.twig', [
            'destinations' => $destinations,
        ]);
    }
}