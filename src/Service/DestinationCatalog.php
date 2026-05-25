<?php

namespace App\Service;

use App\Data\DestinationHighlightsData;

final class DestinationCatalog
{
    /** Web path segment under /public (files go in public/images/destinations/). */
    public const IMAGES_WEB_PATH = 'images/destinations';

    public const HIGHLIGHTS_WEB_PATH = 'images/destinations/highlights';

    /**
     * @return array<string, array{name: string, image: string, description: string, best_time: string, category: string}>
     */
    public function all(): array
    {
        return [
            'tunis' => [
                'name' => 'Tunis',
                'image' => 'tunis-bab-bahr.jpg',
                'description' => 'The capital city of Tunisia, Tunis is a vibrant mix of ancient medina and modern city life. Explore the UNESCO-listed medina, visit Bardo Museum, and discover the ruins of ancient Carthage nearby.',
                'best_time' => 'Spring and Autumn',
                'category' => 'City',
            ],
            'djerba' => [
                'name' => 'Djerba',
                'image' => 'djerba1.jpg',
                'description' => 'A beautiful island in southern Tunisia known for its white-washed buildings, beautiful beaches, and the famous El Ghriba synagogue — one of the oldest in the world.',
                'best_time' => 'April to October',
                'category' => 'Island',
            ],
            'tozeur' => [
                'name' => 'Tozeur',
                'image' => 'tozeur1.jpg',
                'description' => 'Gateway to the Sahara desert, Tozeur is famous for its unique brick architecture, vast palm groves, and proximity to stunning desert landscapes and salt lakes.',
                'best_time' => 'October to March',
                'category' => 'Desert',
            ],
            'hammamet' => [
                'name' => 'Hammamet',
                'image' => 'hammamet1.jpg',
                'description' => 'One of Tunisia\'s most popular beach resorts, Hammamet offers stunning Mediterranean beaches, a beautiful medina, and a lively tourist scene.',
                'best_time' => 'May to October',
                'category' => 'Beach',
            ],
            'sousse' => [
                'name' => 'Sousse',
                'image' => 'sousse.jpg',
                'description' => 'Known as the "Pearl of the Sahel", Sousse is a major coastal city with a UNESCO-listed medina, beautiful beaches, and a vibrant nightlife.',
                'best_time' => 'April to October',
                'category' => 'City & Beach',
            ],
            'monastir' => [
                'name' => 'Monastir',
                'image' => 'imagemonastir.jpg',
                'description' => 'A charming coastal city famous for its impressive Ribat fortress, beautiful marina, and the mausoleum of former president Habib Bourguiba.',
                'best_time' => 'April to October',
                'category' => 'Historical',
            ],
            'mahdia' => [
                'name' => 'Mahdia',
                'image' => 'mahdia.jpg',
                'description' => 'A hidden gem on Tunisia\'s coast, Mahdia is known for its authentic medina built on a narrow peninsula, beautiful beaches, and excellent seafood.',
                'best_time' => 'May to September',
                'category' => 'Beach',
            ],
            'tabarka' => [
                'name' => 'Tabarka',
                'image' => 'tabarka.jpeg',
                'description' => 'A coastal town in northwestern Tunisia known for its coral reefs, Genoese fort, and the famous Tabarka Jazz Festival held every summer.',
                'best_time' => 'June to September',
                'category' => 'Nature & Beach',
            ],
            'bizerte' => [
                'name' => 'Bizerte',
                'image' => 'bizerte.jpeg',
                'description' => 'Tunisia\'s northernmost city, Bizerte has a picturesque old port, beautiful beaches, and is close to Cap Blanc — the northernmost point of Africa.',
                'best_time' => 'May to September',
                'category' => 'City & Beach',
            ],
            'kairouan' => [
                'name' => 'Kairouan',
                'image' => 'kairouan.jpg',
                'description' => 'One of the holiest cities in Islam and a UNESCO World Heritage Site, Kairouan is home to the Great Mosque — one of the oldest and most important mosques in North Africa.',
                'best_time' => 'Spring and Autumn',
                'category' => 'Historical & Religious',
            ],
            'ain-draham' => [
                'name' => 'Ain Draham',
                'image' => 'ain_draham.jpeg',
                'description' => 'A mountain village in northwestern Tunisia surrounded by cork oak forests. Known for its cool climate, it\'s a popular escape from the summer heat and a great hiking destination.',
                'best_time' => 'Spring and Summer',
                'category' => 'Nature',
            ],
            'kelibia' => [
                'name' => 'Kélibia & El Haouaria',
                'image' => 'kelibia1.jpg',
                'description' => 'Located on the Cap Bon peninsula, Kélibia is known for its impressive fortress and crystal-clear waters, while El Haouaria is famous for its falconry festival and Roman caves.',
                'best_time' => 'May to September',
                'category' => 'Beach & Historical',
            ],
        ];
    }

    public function exists(string $id): bool
    {
        return isset($this->all()[$id]);
    }

    /**
     * @return array{name: string, image: string, description: string, highlights: list<array{title: string, description: string, image: string}>, best_time: string, category: string}|null
     */
    public function get(string $id): ?array
    {
        $destination = $this->all()[$id] ?? null;
        if (null === $destination) {
            return null;
        }

        $destination['highlights'] = DestinationHighlightsData::for($id);

        return $destination;
    }

    /**
     * Relative public path for a destination image filename (use with Twig asset()).
     */
    public function imageAssetPath(string $filename): string
    {
        return self::IMAGES_WEB_PATH.'/'.$filename;
    }

    public function highlightImageAssetPath(string $filename): string
    {
        return self::HIGHLIGHTS_WEB_PATH.'/'.$filename;
    }

    /**
     * @return list<array{id: string, name: string, image: string, image_path: string}>
     */
    public function listForIndex(): array
    {
        $items = [];
        foreach ($this->all() as $id => $data) {
            $items[] = [
                'id' => $id,
                'name' => $data['name'],
                'image' => $data['image'],
                'image_path' => $this->imageAssetPath($data['image']),
            ];
        }

        return $items;
    }
}
