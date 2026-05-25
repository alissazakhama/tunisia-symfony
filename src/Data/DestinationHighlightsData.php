<?php

namespace App\Data;

/**
 * Per-destination highlights: title, description, and image filename
 * (files live in public/images/destinations/highlights/).
 */
final class DestinationHighlightsData
{
    /**
     * @return list<array{title: string, description: string, image: string}>
     */
    public static function for(string $destinationId): array
    {
        return self::ALL[$destinationId] ?? [];
    }

    /** @var array<string, list<array{title: string, description: string, image: string}>> */
    private const ALL = [
        'tunis' => [
            [
                'title' => 'Medina of Tunis',
                'description' => 'A UNESCO World Heritage maze of souks, mosques, and palaces where centuries of Tunisian craft, spice, and daily life unfold behind ochre walls.',
                'image' => 'tunis-medina.jpg',
            ],
            [
                'title' => 'Bardo Museum',
                'description' => 'Home to one of the world\'s finest collections of Roman mosaics, housed in a 19th-century beylical palace on the outskirts of the capital.',
                'image' => 'tunis-bardo.jpg',
            ],
            [
                'title' => 'Carthage ruins',
                'description' => 'Ancient Punic and Roman remains overlooking the Gulf of Tunis — baths, amphitheatre, and tophets that tell the story of a legendary Mediterranean power.',
                'image' => 'tunis-carthage.jpg',
            ],
            [
                'title' => 'Sidi Bou Said',
                'description' => 'A cliff-top village of blue doors and white walls above the sea, beloved for its cafés, art galleries, and views toward Cape Carthage.',
                'image' => 'tunis-sidi-bou-said.jpg',
            ],
        ],
        'djerba' => [
            [
                'title' => 'El Ghriba Synagogue',
                'description' => 'One of the oldest synagogues in Africa, a pilgrimage site with distinctive blue tilework and a living testament to Djerba\'s Jewish heritage.',
                'image' => 'djerba-ghriba.jpg',
            ],
            [
                'title' => 'Houmt Souk',
                'description' => 'The island\'s main market town, where covered souks sell pottery, textiles, and fish, and the harbor bustles with ferries and fishing boats.',
                'image' => 'djerba-houmt-souk.jpg',
            ],
            [
                'title' => 'Beaches',
                'description' => 'Long sandy stretches and calm shallows along the east coast, ideal for swimming, kite sports, and relaxed resort stays.',
                'image' => 'djerba-beaches.jpg',
            ],
            [
                'title' => 'Djerba Explore Park',
                'description' => 'A family-friendly park blending culture and leisure with replicas, gardens, and activities that introduce Tunisian traditions in one place.',
                'image' => 'djerba-explore-park.jpg',
            ],
        ],
        'tozeur' => [
            [
                'title' => 'Chott el-Djerid',
                'description' => 'A vast salt lake whose shimmering flats and mirages create surreal landscapes, especially striking at sunrise and sunset.',
                'image' => 'tozeur-chott.jpg',
            ],
            [
                'title' => 'Palm Grove',
                'description' => 'Hundreds of thousands of date palms irrigated by ancient foggaras — a lush oasis heart perfect for walks and tasting local deglet nour dates.',
                'image' => 'tozeur-palm-grove.jpg',
            ],
            [
                'title' => 'Onk Jemel',
                'description' => 'Dramatic desert dunes near Nefta, famous as a filming location and for camel treks into the Sahara.',
                'image' => 'tozeur-onk-jemel.jpg',
            ],
            [
                'title' => 'Star Wars filming locations',
                'description' => 'Nearby sets and landscapes used in the saga, drawing fans to sandstone backdrops that feel otherworldly.',
                'image' => 'tozeur-star-wars.jpg',
            ],
        ],
        'hammamet' => [
            [
                'title' => 'Hammamet Beach',
                'description' => 'Wide Mediterranean sands backed by resorts and cafés, with calm water suited to families and summer holidays.',
                'image' => 'hammamet-beach.jpg',
            ],
            [
                'title' => 'Old Medina',
                'description' => 'A compact walled quarter of narrow streets, craft shops, and jasmine-scented corners steps from the sea.',
                'image' => 'hammamet-medina.jfif',
            ],
            [
                'title' => 'Kasbah',
                'description' => 'A 15th-century fortress at the medina edge offering sea views and a glimpse into Hammamet\'s defensive past.',
                'image' => 'hammamet-kasbah.jpg',
            ],
            [
                'title' => 'Yasmine Hammamet',
                'description' => 'A modern marina district with hotels, restaurants, and a promenade built around leisure and nightlife.',
                'image' => 'hammamet-yasmine.jpg',
            ],
        ],
        'sousse' => [
            [
                'title' => 'Medina of Sousse',
                'description' => 'A UNESCO-listed old town with ribbed vaults, traditional houses, and lively commerce at the heart of the Sahel.',
                'image' => 'sousse-medina.jpg',
            ],
            [
                'title' => 'Ribat of Sousse',
                'description' => 'An imposing Islamic-era fortress overlooking the port, among the oldest and best-preserved ribats in North Africa.',
                'image' => 'sousse-ribat.jpg',
            ],
            [
                'title' => 'Catacombs',
                'description' => 'Underground Christian burial galleries dating to late antiquity, revealing early community life beneath the modern city.',
                'image' => 'sousse-catacombs.webp',
            ],
            [
                'title' => 'Port El Kantaoui',
                'description' => 'A purpose-built marina resort with golf, beaches, and boat trips — a polished base for coastal exploration.',
                'image' => 'sousse-port-el-kantaoui.jpg',
            ],
        ],
        'monastir' => [
            [
                'title' => 'Ribat of Monastir',
                'description' => 'A seaside citadel with thick walls and a watchtower, central to Monastir\'s skyline and maritime history.',
                'image' => 'monastir-ribat.jpg',
            ],
            [
                'title' => 'Bourguiba Mausoleum',
                'description' => 'An elegant modern mausoleum and memorial complex honoring Tunisia\'s first president, set amid gardens and gold domes.',
                'image' => 'monastir-mausoleum.jpg',
            ],
            [
                'title' => 'Marina',
                'description' => 'Yachts and fishing boats share a lively waterfront lined with cafés and views across the Gulf of Hammamet.',
                'image' => 'monastir-marina.jpg',
            ],
            [
                'title' => 'Old Medina',
                'description' => 'Traditional lanes and workshops where local life continues between the ribat and the modern city.',
                'image' => 'monastir-medina.jpeg',
            ],
        ],
        'mahdia' => [
            [
                'title' => 'Cap Afrique',
                'description' => 'The eastern cape of the peninsula with lighthouse views and a sense of standing at the edge of the open Mediterranean.',
                'image' => 'mahdia-cap-afrique.jpg',
            ],
            [
                'title' => 'Old Medina',
                'description' => 'Built on a narrow cape, Mahdia\'s medina feels intimate and authentic, with gates, mosques, and sea breezes.',
                'image' => 'mahdia-medina.jpg',
            ],
            [
                'title' => 'Skifa el-Kahla gate',
                'description' => 'The historic sea gate and fortified entrance that once guarded the Fatimid capital\'s harbor quarter.',
                'image' => 'mahdia-skifa.jpg',
            ],
            [
                'title' => 'Beaches',
                'description' => 'Golden sands south of town, popular for swimming and seafood restaurants facing the shore.',
                'image' => 'mahdia-beaches.jpg',
            ],
        ],
        'tabarka' => [
            [
                'title' => 'Genoese Fort',
                'description' => 'A hilltop fortification from the 16th century with panoramic views over the coast and the old corniche.',
                'image' => 'tabarka-fort.jpg',
            ],
            [
                'title' => 'Coral Reefs',
                'description' => 'Clear waters and rocky coves that have long supported fishing and diving along Tunisia\'s northwest shore.',
                'image' => 'tabarka-reefs.jpeg',
            ],
            [
                'title' => 'Jazz Festival',
                'description' => 'An annual summer celebration that brings international artists to open-air stages by the sea.',
                'image' => 'tabarka-jazz.jpg',
            ],
            [
                'title' => 'Les Aiguilles rocks',
                'description' => 'Dramatic sandstone needles rising from the beach — a natural landmark and photographer\'s favorite.',
                'image' => 'tabarka-aiguilles.jfif',
            ],
        ],
        'bizerte' => [
            [
                'title' => 'Old Port',
                'description' => 'Colorful boats, seafood stalls, and Andalusian-influenced architecture around one of the Mediterranean\'s northernmost harbors.',
                'image' => 'bizerte-port.jpg',
            ],
            [
                'title' => 'Kasbah',
                'description' => 'A historic fort overlooking the canal and medina, marking Bizerte\'s strategic military past.',
                'image' => 'Kasbah_bizerte.jpg',
            ],
            [
                'title' => 'Cap Blanc',
                'description' => 'The northern tip of the African continent, with cliffs, lighthouse, and sweeping views toward Sicily on clear days.',
                'image' => 'bizerte-cap-blanc.jpg',
            ],
            [
                'title' => 'Bizerte Lake',
                'description' => 'A large lagoon and natural park rich in birds and quiet waters, separated from the sea by the canal.',
                'image' => 'Ichkeul-Lake-Bizerte.jpg',
            ],
        ],
        'kairouan' => [
            [
                'title' => 'Great Mosque of Kairouan',
                'description' => 'Founded in 670 AD, a spiritual and architectural cornerstone of the Maghreb with vast courtyards and ancient minarets.',
                'image' => 'kairouan-great-mosque.jpg',
            ],
            [
                'title' => 'Medina',
                'description' => 'Carpet workshops, brass souks, and sun-baked alleys where Kairouan\'s artisan reputation still thrives.',
                'image' => 'kairouan-medina.webp',
            ],
            [
                'title' => 'Aghlabid Basins',
                'description' => 'Monumental 9th-century water reservoirs that supplied the city and remain an engineering marvel.',
                'image' => 'kairouan-basins.webp',
            ],
            [
                'title' => 'Mosque of the Three Doors',
                'description' => 'A refined 9th-century mosque famed for its three decorated façades and Andalusian-influenced design.',
                'image' => 'kairouan-three-doors.jpg',
            ],
        ],
        'ain-draham' => [
            [
                'title' => 'Cork oak forests',
                'description' => 'Cool green hills covered in cork oaks and undergrowth — a distinctive landscape of northwest Tunisia.',
                'image' => 'ain-draham-forests.png',
            ],
            [
                'title' => 'Hunting',
                'description' => 'Traditional wild boar and bird hunting seasons draw visitors to the region\'s wooded mountains in autumn and winter.',
                'image' => 'ain-draham-hunting.webp',
            ],
            [
                'title' => 'Hiking trails',
                'description' => 'Marked paths through forests and ridges with fresh air and views toward Algeria on the horizon.',
                'image' => 'tabarka-hike-mountain-tunisia.png',
            ],
            [
                'title' => 'Mountain views',
                'description' => 'Panoramas over the Tell Atlas, misty mornings, and village terraces that make Ain Draham a summer escape.',
                'image' => 'ain-draham-views.jpg',
            ],
        ],
        'kelibia' => [
            [
                'title' => 'Kélibia Fort',
                'description' => 'A massive seaside citadel on Cap Bon with walls rising directly from the rocks and views over the strait.',
                'image' => 'Fort-Kelibia.jpg',
            ],
            [
                'title' => 'Crystal clear waters',
                'description' => 'Transparent coves and beaches along the peninsula, prized for swimming and snorkeling.',
                'image' => '68.jpg',
            ],
            [
                'title' => 'El Haouaria caves',
                'description' => 'Roman-era quarries and sea caves at the peninsula tip, linked to ancient stone export and local legend.',
                'image' => 'kelibia-caves.webp',
            ],
            [
                'title' => 'Falconry Festival',
                'description' => 'A spring gathering celebrating traditional falconry and Berber heritage on the Cap Bon coast.',
                'image' => 'barbary-falcon-haj.jpg',
            ],
        ],
    ];
}
