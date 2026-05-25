<?php

namespace App\Service;

final class ExperienceCatalog
{
    public const IMAGES_WEB_PATH = 'images/experiences';

    public const HIGHLIGHTS_WEB_PATH = 'images/experiences/highlights';

    /**
     * @return array<string, array{
     *     name: string,
     *     emoji: string,
     *     summary: string,
     *     image: string,
     *     description: string,
     *     category: string,
     *     best_time: string,
     *     highlights: list<array{title: string, description: string, image: string}>,
     *     related_destinations: list<string>
     * }>
     */
    public function all(): array
    {
        return [
            'ancient-cities' => [
                'name' => 'Ancient Cities',
                'emoji' => '🏛️',
                'summary' => 'Explore the ruins of Carthage and Dougga.',
                'image' => 'ancient-cities-hero.webp',
                'description' => 'Tunisia holds some of the Mediterranean\'s richest ancient heritage — from Phoenician Carthage and Roman Dougga to Islamic Kairouan and coastal ribats. Walk through stone theatres, paved streets, and hilltop capitals that shaped North African history for over two millennia.',
                'category' => 'History & Archaeology',
                'best_time' => 'March to May and September to November',
                'highlights' => [
                    [
                        'title' => 'Carthage',
                        'description' => 'Legendary rival of Rome, with baths, villas, and the Tophet overlooking the Gulf of Tunis — a must for ancient history lovers.',
                        'image' => 'ancient-carthage.jpg',
                    ],
                    [
                        'title' => 'Dougga',
                        'description' => 'A UNESCO-listed Roman city on a hilltop in the northwest, famed for its capitol, theatre, and Libyo-Punic mausoleums.',
                        'image' => 'ancient-dougga.jpg',
                    ],
                    [
                        'title' => 'Kairouan',
                        'description' => 'The spiritual heart of the Maghreb, where the Great Mosque and old medina reveal early Islamic architecture and craft traditions.',
                        'image' => 'ancient-kairouan.jpg',
                    ],
                    [
                        'title' => 'Coastal ribats',
                        'description' => 'Fortified monasteries at Monastir and Sousse that guarded the Sahel — imposing walls, towers, and sea views.',
                        'image' => 'ancient-ribats.jpg',
                    ],
                ],
                'related_destinations' => ['tunis', 'kairouan', 'monastir', 'sousse'],
            ],
            'sahara-adventures' => [
                'name' => 'Sahara Adventures',
                'emoji' => '🏜️',
                'summary' => 'Journey into the vast dunes of the Sahara.',
                'image' => 'sahara-adventures-hero.jpeg',
                'description' => 'South of the Atlas, Tunisia opens into golden desert, salt lakes, and palm oases. Ride camels at sunset, sleep under stars in Berber camps, and cross the chotts that mirror the sky — adventures that feel timeless and vast.',
                'category' => 'Desert & Adventure',
                'best_time' => 'October to April',
                'highlights' => [
                    [
                        'title' => 'Chott el-Djerid',
                        'description' => 'An immense salt lake between Tozeur and Kebili, known for mirages, salt crystals, and unforgettable dawn colours.',
                        'image' => 'sahara-chott.webp',
                    ],
                    [
                        'title' => 'Grand Erg dunes',
                        'description' => 'Rolling sand seas near Onk Jemel and Nefta — camel treks, 4x4 excursions, and silence broken only by the wind.',
                        'image' => 'sahara-dunes.jpg',
                    ],
                    [
                        'title' => 'Desert camps',
                        'description' => 'Traditional tents, music around the fire, and nights so clear the Milky Way feels within reach.',
                        'image' => 'sahara-camp.jpg',
                    ],
                    [
                        'title' => 'Oasis towns',
                        'description' => 'Tozeur and Nefta with brick architecture, date palms, and gateways to film-famous desert landscapes.',
                        'image' => 'sahara-oasis.jpg',
                    ],
                ],
                'related_destinations' => ['tozeur', 'ain-draham'],
            ],
            'beautiful-beaches' => [
                'name' => 'Beautiful Beaches',
                'emoji' => '🏖️',
                'summary' => 'Relax on stunning Mediterranean shores.',
                'image' => 'beautiful-beaches-hero.webp',
                'description' => 'From the Cap Bon peninsula to Djerba island, Tunisia\'s coast blends soft sand, turquoise water, and resort comfort with authentic fishing towns. Swim, dive, sail, or simply unwind with fresh seafood and sea breezes.',
                'category' => 'Coast & Sea',
                'best_time' => 'May to October',
                'highlights' => [
                    [
                        'title' => 'Hammamet & Yasmine',
                        'description' => 'The country\'s classic beach resort strip — marinas, golf, and long sandy bays east of Tunis.',
                        'image' => 'beaches-hammamet.jpg',
                    ],
                    [
                        'title' => 'Djerba island',
                        'description' => 'Calm shallows, island culture, and villages where the pace slows to match the tides.',
                        'image' => 'beaches-djerba.jpg',
                    ],
                    [
                        'title' => 'Mahdia & Monastir',
                        'description' => 'Historic capes and peninsulas where medinas meet uncrowded beaches and excellent seafood.',
                        'image' => 'beaches-mahdia.png',
                    ],
                    [
                        'title' => 'Tabarka & Bizerte',
                        'description' => 'Northwestern coves, coral reefs, and ports with a cooler breeze and greener hills behind the shore.',
                        'image' => 'beaches-tabarka.jpg',
                    ],
                ],
                'related_destinations' => ['hammamet', 'djerba', 'mahdia', 'tabarka', 'bizerte', 'kelibia'],
            ],
            'rich-culture' => [
                'name' => 'Rich Culture',
                'emoji' => '🍽️',
                'summary' => 'Savor traditional Tunisian food and heritage.',
                'image' => 'rich-culture.jpg',
                'description' => 'Tunisian culture lives in the medina souks, the scent of harissa and couscous, the rhythm of malouf music, and festivals from desert towns to coastal ports. Discover craftsmanship, hospitality, and traditions passed down through generations.',
                'category' => 'Culture & Gastronomy',
                'best_time' => 'Year-round (Ramadan & festival dates vary)',
                'highlights' => [
                    [
                        'title' => 'Tunisian cuisine',
                        'description' => 'Couscous, brik, lablabi, and seafood pastillas — each region adds its own spice and story to the table.',
                        'image' => 'culture-cuisine.jpg',
                    ],
                    [
                        'title' => 'Medina souks',
                        'description' => 'Copper, carpets, perfumes, and ceramics in labyrinths of covered streets in Tunis, Sousse, and Kairouan.',
                        'image' => 'culture-souks.jfif',
                    ],
                    [
                        'title' => 'Craft & design',
                        'description' => 'Pottery from Sejnane, silver jewelry, leather work, and the distinctive blue-and-white of Sidi Bou Said.',
                        'image' => 'culture-crafts.avif',
                    ],
                    [
                        'title' => 'Festivals & music',
                        'description' => 'From Tabarka Jazz to Kélibia falconry and Sahara gatherings — celebrations that blend Berber, Arab, and Mediterranean roots.',
                        'image' => 'culture-festivals.jpg',
                    ],
                ],
                'related_destinations' => ['tunis', 'kairouan', 'sousse', 'tabarka', 'kelibia'],
            ],
        ];
    }

    public function exists(string $id): bool
    {
        return isset($this->all()[$id]);
    }

    /**
     * @return array{
     *     name: string,
     *     emoji: string,
     *     summary: string,
     *     image: string,
     *     description: string,
     *     category: string,
     *     best_time: string,
     *     highlights: list<array{title: string, description: string, image: string}>,
     *     related_destinations: list<string>
     * }|null
     */
    public function get(string $id): ?array
    {
        return $this->all()[$id] ?? null;
    }

    public function imageAssetPath(string $filename): string
    {
        return self::IMAGES_WEB_PATH.'/'.$filename;
    }

    /**
     * @return list<array{id: string, name: string, emoji: string, summary: string, image_path: string}>
     */
    public function listForHome(): array
    {
        $items = [];
        foreach ($this->all() as $id => $data) {
            $items[] = [
                'id' => $id,
                'name' => $data['name'],
                'emoji' => $data['emoji'],
                'summary' => $data['summary'],
                'image_path' => $this->imageAssetPath($data['image']),
            ];
        }

        return $items;
    }
}
