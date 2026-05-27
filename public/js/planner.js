document.addEventListener("DOMContentLoaded", function () {

const DESTINATIONS = [
    {
        id: "tunis", name: "Tunis", emoji: "🏛️", region: "North",
        link: "/destinations/tunis",
        lat: 36.8065, lng: 10.1815,
        places: [
            { name: "Medina of Tunis",       type: "Culture",  desc: "UNESCO-listed medieval city with 700+ monuments, covered souks and the Great Mosque of Zitouna." },
            { name: "Bardo National Museum",  type: "Museum",   desc: "World's finest Roman mosaic collection housed in a magnificent former Ottoman palace." },
            { name: "Carthage Ruins",         type: "Ruins",    desc: "Iconic ancient Phoenician capital: Antonine Baths, Punic ports and Byrsa Hill museum." },
            { name: "Avenue Habib Bourguiba", type: "Leisure",  desc: "Grand palm-lined boulevard with cafés, the Municipal Theatre and elegant colonial buildings." },
            { name: "Sidi Bou Said",          type: "Scenic",   desc: "Iconic blue-and-white hilltop village overlooking the Bay of Tunis — unmissable." }
        ]
    },
    {
        id: "djerba", name: "Djerba", emoji: "🏝️", region: "South-East",
        link: "/destinations/djerba",
        lat: 33.8075, lng: 10.9794,
        places: [
            { name: "El Ghriba Synagogue",    type: "Culture",  desc: "One of the world's oldest synagogues, a stunning pilgrimage site in the heart of the island." },
            { name: "Djerba Beaches",         type: "Beach",    desc: "Warm turquoise waters and white sandy shores stretching along the island's northern coast." },
            { name: "Houmt Souk",             type: "Culture",  desc: "Djerba's lively main town with colourful souks, pottery workshops and a historic Ottoman fort." },
            { name: "Guellala Museum",        type: "Museum",   desc: "Fascinating museum of Djerbian folklore and traditional pottery set in a hilltop village." },
            { name: "Borj El Kebir Fort",     type: "Ruins",    desc: "Imposing 13th-century coastal fortress overlooking the sea with panoramic island views." }
        ]
    },
    {
        id: "tozeur", name: "Tozeur", emoji: "🌴", region: "South-West",
        link: "/destinations/tozeur",
        lat: 33.9197, lng: 8.1335,
        places: [
            { name: "Chott el-Djerid",        type: "Scenic",   desc: "Vast salt lake stretching to the horizon — famous for mirages, vivid sunsets and salt crystal formations." },
            { name: "Tozeur Palm Oasis",      type: "Nature",   desc: "One of Tunisia's largest oases with over 200,000 palm trees — explore by horse-drawn calèche." },
            { name: "Medina of Tozeur",       type: "Culture",  desc: "Unique geometric yellow-brick architecture found nowhere else — every wall is a work of art." },
            { name: "Sahara Desert Dunes",    type: "Scenic",   desc: "Rolling golden dunes near Onk Jemal — camel treks, 4x4 excursions and unforgettable stargazing." },
            { name: "Dar Cherait Museum",     type: "Museum",   desc: "Beautifully designed museum showcasing Tunisian traditional arts, costumes and historical artefacts." }
        ]
    },
    {
        id: "hammamet", name: "Hammamet", emoji: "🏖️", region: "North-East",
        link: "/destinations/hammamet",
        lat: 36.4074, lng: 10.6219,
        places: [
            { name: "Hammamet Beach",         type: "Beach",    desc: "Golden Mediterranean sands stretching along the Gulf of Hammamet, warm and clear." },
            { name: "Hammamet Medina",        type: "Culture",  desc: "Charming whitewashed medina with colourful souks, local crafts and vibrant atmosphere." },
            { name: "Water Sports",           type: "Leisure",  desc: "Jet skiing, boat rides and seaside adventures — the coastline is a playground." },
            { name: "Yasmine Port",           type: "Leisure",  desc: "Beautiful marina walk with yachts bobbing on the water under the golden Tunisian sun." }
        ]
    },
    {
        id: "sousse", name: "Sousse", emoji: "⚓", region: "Centre-East",
        link: "/destinations/sousse",
        lat: 35.8245, lng: 10.6346,
        places: [
            { name: "Beaches of Sousse",         type: "Beach",    desc: "Long golden beaches lined with palms and turquoise Mediterranean waters." },
            { name: "Ribat of Sousse",           type: "Culture",  desc: "8th-century coastal fortress with sweeping sea views and deep Islamic heritage." },
            { name: "Medina of Sousse",          type: "Culture",  desc: "UNESCO site: winding streets, ancient mosques, jewellery souks and traditional pottery." },
            { name: "Marina & Coastal Life",     type: "Leisure",  desc: "Lively waterfront with seafood restaurants and cafés — perfect for a sunset dinner." },
            { name: "Nightlife & Entertainment", type: "Leisure",  desc: "Beachfront bars, live music and cultural events keeping Sousse alive after sunset." }
        ]
    },
    {
        id: "monastir", name: "Monastir", emoji: "🕌", region: "Centre-East",
        link: "/destinations/monastir",
        lat: 35.7643, lng: 10.8113,
        places: [
            { name: "Ribat of Monastir",           type: "Culture",  desc: "Legendary ancient ribat by the sea — used in films and offering breathtaking coastal views." },
            { name: "Mausoleum of Habib Bourguiba",type: "Culture",  desc: "Iconic golden-domed mausoleum surrounded by peaceful gardens in the heart of Monastir." },
            { name: "Monastir Marina",             type: "Leisure",  desc: "Colourful boats on calm water — perfect for a boat trip or magical sunset cruise." },
            { name: "Bourguiba Mosque",            type: "Culture",  desc: "Elegant Islamic architecture with arches, tall minaret and a serene peaceful courtyard." },
            { name: "Mediterranean Beaches",       type: "Beach",    desc: "Soft sandy shores with crystal-clear waters along the beautiful Monastir coastline." }
        ]
    },
    {
        id: "mahdia", name: "Mahdia", emoji: "🐟", region: "Centre-East",
        link: "/destinations/mahdia",
        lat: 35.5047, lng: 11.0622,
        places: [
            { name: "Mahdia Beach",            type: "Beach",    desc: "Peaceful golden sands with calm clear water — quieter and more authentic than big resorts." },
            { name: "Skifa El Kahla & Medina", type: "Culture",  desc: "Monumental Fatimid gateway into a labyrinthine medina of whitewashed houses and craft shops." },
            { name: "Great Fatimid Mosque",    type: "Culture",  desc: "10th-century mosque with precise geometric design, towering minaret and serene atmosphere." },
            { name: "Borj El Kebir",           type: "Ruins",    desc: "Massive 16th-century Ottoman fortress overlooking the sea with panoramic coastal views." }
        ]
    },
    {
        id: "tabarka", name: "Tabarka", emoji: "🎷", region: "North-West",
        link: "/destinations/tabarka",
        lat: 36.9544, lng: 8.7584,
        places: [
            { name: "Tabarka Coral Reefs",     type: "Nature",   desc: "Some of the Mediterranean's finest coral diving — crystal water, rich marine life and vibrant colours." },
            { name: "Genoese Fort",            type: "Ruins",    desc: "Dramatic 16th-century Genoese fortress perched on a rocky island linked to the town by a causeway." },
            { name: "Tabarka Jazz Festival",   type: "Leisure",  desc: "World-famous summer festival drawing international jazz artists to open-air stages by the sea." },
            { name: "Les Aiguilles",           type: "Scenic",   desc: "Spectacular needle-shaped rock formations rising from the sea just west of Tabarka's beach." },
            { name: "Tabarka Beach",           type: "Beach",    desc: "Long unspoilt beach backed by pine forests and hills — one of the most scenic in Tunisia." }
        ]
    },
    {
        id: "bizerte", name: "Bizerte", emoji: "⛵", region: "North",
        link: "/destinations/bizerte",
        lat: 37.2746, lng: 9.8739,
        places: [
            { name: "Old Port of Bizerte",     type: "Scenic",   desc: "Picturesque working port lined with colourful fishing boats, cafés and fresh seafood restaurants." },
            { name: "Kasbah of Bizerte",       type: "Ruins",    desc: "Ancient fortified kasbah overlooking the city — walk the ramparts for panoramic views over the lake and sea." },
            { name: "Cap Blanc",               type: "Scenic",   desc: "The northernmost point of Africa — dramatic cliffs, lighthouse and sweeping views of the Mediterranean." },
            { name: "Bizerte Beaches",         type: "Beach",    desc: "Calm, uncrowded sandy beaches ideal for swimming — less developed than Tunisia's resort towns." },
            { name: "Lake of Bizerte",         type: "Nature",   desc: "Vast coastal lagoon rich in birdlife — flamingos, herons and migratory species year-round." }
        ]
    },
    {
        id: "kairouan", name: "Kairouan", emoji: "🌙", region: "Centre",
        link: "/destinations/kairouan",
        lat: 35.6781, lng: 10.0963,
        places: [
            { name: "Great Mosque of Kairouan", type: "Culture",  desc: "One of Islam's most sacred mosques, founded in the 7th century — Africa's oldest." },
            { name: "Aghlabid Basins",          type: "Ruins",    desc: "9th-century circular water reservoirs — a stunning feat of early Islamic engineering." },
            { name: "Medina & Carpet Souks",    type: "Culture",  desc: "UNESCO medina famous for world-renowned handwoven carpets — the best in North Africa." },
            { name: "Makroud Tasting",          type: "Food",     desc: "Taste Kairouan's iconic semolina-and-date pastry soaked in honey — freshly made in the souks." }
        ]
    },
    {
        id: "ain-draham", name: "Aïn Draham", emoji: "🌲", region: "North-West",
        link: "/destinations/ain-draham",
        lat: 36.7817, lng: 8.6978,
        places: [
            { name: "Kroumir Forest & Hiking Trails", type: "Nature",   desc: "Dense cedar and cork-oak forests sheltering red deer — breathtaking trails at 900m altitude." },
            { name: "Aïn Draham Village & Market",    type: "Culture",  desc: "Mountain town known for Berber crafts: hand-woven blankets, leather goods and burnous robes." },
            { name: "Bulla Regia Roman Ruins",        type: "Ruins",    desc: "Unique underground Roman villas with brilliantly intact mosaic floors — a UNESCO gem." },
            { name: "Seasonal Mountain Scenery",      type: "Scenic",   desc: "Snow in winter, wildflowers in spring, cool summer refuge — every season is spectacular." }
        ]
    },
    {
        id: "kelibia", name: "Kélibia", emoji: "🏰", region: "North-East",
        link: "/destinations/kelibia",
        lat: 36.8479, lng: 11.1046,
        places: [
            { name: "Kelibia Beach",           type: "Beach",    desc: "Exceptionally clear turquoise waters and fine white sand — one of Tunisia's best beaches." },
            { name: "Fort of Kelibia",         type: "Ruins",    desc: "Imposing Byzantine fortress on a hilltop — panoramic views stretching to Pantelleria, Italy." },
            { name: "Kelibia Fishing Harbour", type: "Leisure",  desc: "Lively working harbour with waterside seafood restaurants serving whatever came in that morning." },
            { name: "Cap Bon Vineyards",       type: "Scenic",   desc: "Hillside vineyards producing Tunisia's celebrated Muscat de Kelibia — winery visits welcome." }
        ]
    }
];

const DIST = {
    "tunis":      { "djerba":510, "tozeur":450, "hammamet":65,  "kelibia":100, "sousse":140, "monastir":165, "mahdia":210, "tabarka":170, "bizerte":65,  "kairouan":180, "ain-draham":175 },
    "djerba":     { "tunis":510, "tozeur":210, "hammamet":450, "kelibia":540, "sousse":380, "monastir":355, "mahdia":310, "tabarka":670, "bizerte":575, "kairouan":300, "ain-draham":680 },
    "tozeur":     { "tunis":450, "djerba":210, "hammamet":390, "kelibia":480, "sousse":320, "monastir":295, "mahdia":270, "tabarka":530, "bizerte":515, "kairouan":190, "ain-draham":540 },
    "hammamet":   { "tunis":65,  "djerba":450, "tozeur":390, "kelibia":80,  "sousse":80,  "monastir":105, "mahdia":150, "tabarka":230, "bizerte":130, "kairouan":130, "ain-draham":230 },
    "kelibia":    { "tunis":100, "djerba":540, "tozeur":480, "hammamet":80, "sousse":175, "monastir":190, "mahdia":230, "tabarka":265, "bizerte":165, "kairouan":240, "ain-draham":265 },
    "sousse":     { "tunis":140, "djerba":380, "tozeur":320, "hammamet":80, "kelibia":175, "monastir":25,  "mahdia":70,  "tabarka":300, "bizerte":205, "kairouan":60,  "ain-draham":295 },
    "monastir":   { "tunis":165, "djerba":355, "tozeur":295, "hammamet":105,"kelibia":190, "sousse":25,   "mahdia":50,  "tabarka":325, "bizerte":230, "kairouan":80,  "ain-draham":315 },
    "mahdia":     { "tunis":210, "djerba":310, "tozeur":270, "hammamet":150,"kelibia":230, "sousse":70,   "monastir":50,"tabarka":370, "bizerte":275, "kairouan":120, "ain-draham":360 },
    "tabarka":    { "tunis":170, "djerba":670, "tozeur":530, "hammamet":230,"kelibia":265, "sousse":300,  "monastir":325,"mahdia":370, "bizerte":100, "kairouan":330, "ain-draham":80  },
    "bizerte":    { "tunis":65,  "djerba":575, "tozeur":515, "hammamet":130,"kelibia":165, "sousse":205,  "monastir":230,"mahdia":275, "tabarka":100, "kairouan":245, "ain-draham":235 },
    "kairouan":   { "tunis":180, "djerba":300, "tozeur":190, "hammamet":130,"kelibia":240, "sousse":60,   "monastir":80, "mahdia":120, "tabarka":330, "bizerte":245,  "ain-draham":310 },
    "ain-draham": { "tunis":175, "djerba":680, "tozeur":540, "hammamet":230,"kelibia":265, "sousse":295,  "monastir":315,"mahdia":360, "tabarka":80,  "bizerte":235,  "kairouan":310  }
};

let chosen = new Set();
let days   = 5;

function renderChips() {
    const grid = document.getElementById("destGrid");
    grid.innerHTML = "";
    DESTINATIONS.forEach(d => {
        const chip = document.createElement("div");
        chip.className = "dest-chip" + (chosen.has(d.id) ? " chosen" : "");
        chip.dataset.id = d.id;
        chip.innerHTML = `
            <div class="chip-emoji">${d.emoji}</div>
            <div class="chip-name">${d.name}</div>
            <div class="chip-region">${d.region}</div>
            <div class="chip-check">✓</div>`;
        chip.addEventListener("click", () => {
            chosen.has(d.id) ? chosen.delete(d.id) : chosen.add(d.id);
            chip.classList.toggle("chosen", chosen.has(d.id));
            chip.querySelector(".chip-check").style.display = chosen.has(d.id) ? "flex" : "none";
            document.getElementById("toStep2").disabled = chosen.size === 0;
            syncSelectAllBtn();
        });
        grid.appendChild(chip);
    });
}

function syncSelectAllBtn() {
    document.getElementById("selectAllBtn").textContent =
        chosen.size === DESTINATIONS.length ? "Deselect All" : "Select All";
}

document.getElementById("selectAllBtn").addEventListener("click", () => {
    const selectAll = chosen.size < DESTINATIONS.length;
    chosen.clear();
    document.querySelectorAll(".dest-chip").forEach(c => {
        if (selectAll) chosen.add(c.dataset.id);
        c.classList.toggle("chosen", selectAll);
        c.querySelector(".chip-check").style.display = selectAll ? "flex" : "none";
    });
    document.getElementById("toStep2").disabled = !selectAll;
    syncSelectAllBtn();
});

function goToStep(n) {
    document.querySelectorAll(".planner-step").forEach(s => s.classList.remove("active"));
    document.getElementById("step" + n).classList.add("active");
    [1,2,3].forEach(i => {
        const dot  = document.getElementById("dot"  + i);
        const line = document.getElementById("line" + i);
        dot.classList.remove("active","done");
        if (line) line.classList.remove("done");
        if (i < n)        { dot.classList.add("done");   if (line) line.classList.add("done"); }
        else if (i === n)   dot.classList.add("active");
    });
}

function sortByRoute(ids) {
    if (ids.length <= 2) return ids;
    const visited = new Set([ids[0]]);
    const route   = [ids[0]];
    while (route.length < ids.length) {
        const cur = route[route.length - 1];
        let best = null, bestDist = Infinity;
        ids.forEach(id => {
            if (visited.has(id)) return;
            const d = DIST[cur]?.[id] ?? 9999;
            if (d < bestDist) { bestDist = d; best = id; }
        });
        if (!best) break;
        route.push(best); visited.add(best);
    }
    return route;
}

const TYPE_BG  = { Culture:"#e8f0fe", Museum:"#fce8ff", Beach:"#e0f7ff", Ruins:"#fff3e0", Scenic:"#e8f5e9", Leisure:"#fdf3e3", Nature:"#e8f5e9", Food:"#fff8e1" };
const TYPE_COL = { Culture:"#0a4ea1", Museum:"#8b00b0", Beach:"#0077aa", Ruins:"#e65c00", Scenic:"#2e7d32", Leisure:"#c17900", Nature:"#2e7d32", Food:"#b58a00" };

const MEALS = {
    "tunis":      { lunch: ["Lunch: Café Mrabet in the Medina — try brik à l'oeuf and Tunisian salad.", "Lunch: Dar El Jeld restaurant — traditional Tunisian cuisine in a beautiful old house."], dinner: ["Dinner: Avenue Bourguiba terrace café — grilled fish and fresh mint tea.", "Dinner: Restaurant in the Medina — couscous with lamb and local wine."] },
    "djerba":     { lunch: ["Lunch: Houmt Souk restaurant — fresh grilled fish with Djerbian spices and local bread.", "Lunch: Guellala village café — octopus salad, brik and freshly squeezed orange juice."], dinner: ["Dinner: Beachfront restaurant near Sidi Mahrez — grilled sea bream and Djerbian couscous.", "Dinner: Traditional riad in Houmt Souk — lamb tagine with olives and preserved lemon."] },
    "tozeur":     { lunch: ["Lunch: Oasis café in the palm grove — dates, couscous with camel meat and mint tea.", "Lunch: Medina restaurant — traditional Tozeur brick-oven bread with harissa and olive oil."], dinner: ["Dinner: Desert camp dinner — mechoui lamb roasted over coals under the stars.", "Dinner: Dar Cherait restaurant — Saharan tagine with seasonal vegetables and local wine."] },
    "hammamet":   { lunch: ["Lunch: Beachside café — grilled sea bass with harissa and fresh bread.", "Lunch: Medina restaurant — brik, salads and Tunisian pastries."], dinner: ["Dinner: Yasmine Port restaurant — fresh seafood and pasta with a marina view.", "Dinner: Hotel terrace — grilled merguez, tabbouleh and local Celtia beer."] },
    "kelibia":    { lunch: ["Lunch: Harbour-side restaurant — catch of the day grilled over charcoal with lemon.", "Lunch: Local café — fried calamari, salad mechouia and fresh bread."], dinner: ["Dinner: Waterfront fish restaurant — whole bream baked in salt, paired with Muscat de Kelibia.", "Dinner: Harbour terrace — grilled octopus and sea bream with Tunisian spices."] },
    "sousse":     { lunch: ["Lunch: Medina café — couscous with vegetables and lamb, served with lben.", "Lunch: Ribat area restaurant — brik à l'oeuf, tuna salad and mint tea."], dinner: ["Dinner: Marina seafood restaurant — grilled prawns, calamari and local white wine.", "Dinner: Boujaffar beachfront — mixed grill with harissa, couscous and fresh lemonade."] },
    "monastir":   { lunch: ["Lunch: Old city café near the Ribat — traditional Tunisian sandwich (fricassee) and mint tea.", "Lunch: Marina café — tuna brik, grilled fish and local salad."], dinner: ["Dinner: Marina restaurant — fresh sea bream with grilled vegetables and local wine.", "Dinner: Beachfront terrace — seafood pasta, salad and Tunisian pastries."] },
    "mahdia":     { lunch: ["Lunch: Old port fish restaurant — grilled grouper with capers, olives and fresh bread.", "Lunch: Medina café near Skifa El Kahla — brik, lablabi soup and mint tea."], dinner: ["Dinner: Seafront restaurant — mixed seafood grill with harissa and local wine.", "Dinner: Traditional Mahdia restaurant — couscous with fish, seasonal vegetables."] },
    "tabarka":    { lunch: ["Lunch: Harbour restaurant — freshly caught red coral shrimp grilled with lemon and herbs.", "Lunch: Port café — grilled grouper, salad mechouia and Tabarka local bread."], dinner: ["Dinner: Beachfront restaurant — seafood platter with coral shrimp, calamari and sea bass.", "Dinner: Jazz Festival terrace — grilled fish, Tunisian salads and local Sicca wine."] },
    "bizerte":    { lunch: ["Lunch: Old port café — fried red mullet, salad and fresh bread by the waterfront.", "Lunch: Fish market restaurant — catch of the day with Tunisian spices and mint tea."], dinner: ["Dinner: Old port terrace — grilled sea bream, pasta with clams and local white wine.", "Dinner: Kasbah area restaurant — couscous with seafood, harissa and fresh lemonade."] },
    "kairouan":   { lunch: ["Lunch: Medina restaurant — lablabi (chickpea soup) and Kairouan bread with olive oil.", "Lunch: Souk café — makroud pastries, mint tea and traditional Tunisian salad."], dinner: ["Dinner: Local restaurant near the Great Mosque — couscous with lamb and roasted vegetables.", "Dinner: Medina riad — slow-cooked tagine with dates and almonds, traditional style."] },
    "ain-draham": { lunch: ["Lunch: Mountain café — grilled wild boar sausage, forest mushrooms and local bread.", "Lunch: Village restaurant — lamb chops with rosemary, mountain herbs and fresh salad."], dinner: ["Dinner: Ain Draham hotel restaurant — hearty mountain stew with root vegetables and local red wine.", "Dinner: Local grill — mixed mountain meats, grilled peppers and Tunisian flatbread."] }
};

const TIPS = {
    "tunis":      ["Visit the Medina early morning (before 9 AM) to beat the crowds and see vendors setting up their stalls.", "The Bardo Museum is closed on Mondays — plan accordingly.", "Take the TGM train from Tunis Marine station to reach Carthage and Sidi Bou Said easily."],
    "djerba":     ["Rent a bicycle or scooter — it's the best way to explore the island's villages and beaches at your own pace.", "El Ghriba Synagogue requires modest dress — bring a scarf or shawl.", "The island's best beaches are on the north-east coast near Sidi Mahrez — avoid the crowded resort strip."],
    "tozeur":     ["Book a desert excursion in advance — solo navigation in the dunes can be dangerous.", "Visit Chott el-Djerid at sunrise or sunset for the most extraordinary light and colours.", "The palm oasis is best explored by calèche (horse carriage) — negotiate the price before setting off."],
    "hammamet":   ["The Medina is most atmospheric in the early evening when the heat fades and locals come out.", "Hire a bike to explore the coast between Hammamet and Yasmine — flat roads and beautiful scenery.", "Bargaining is expected in the souks — start at half the asking price and be friendly."],
    "kelibia":    ["Visit the fort at sunset for the most spectacular light over the sea.", "The beach is calmer and less crowded on weekday mornings — perfect for swimming.", "Pick up a bottle of Muscat de Kelibia directly from the cooperative winery — much cheaper than shops."],
    "sousse":     ["The Ribat closes for midday prayer — plan your visit for the morning.", "Sousse Medina is most lively on Friday mornings when the weekly market is in full swing.", "Port El Kantaoui (10 km north) has a beautiful marina worth a quick visit."],
    "monastir":   ["The Bourguiba Mausoleum complex is free to enter — dress modestly.", "Monastir's beach is less crowded than Sousse — a great spot for a quiet morning swim.", "Take a calèche (horse carriage) ride around the old town for a unique experience."],
    "mahdia":     ["Mahdia's medina is one of the most authentic in Tunisia — far fewer tourists than Sousse or Kairouan.", "The fish market near the port opens at 6 AM — a vivid and memorable sight.", "Borj El Kebir offers the best sunset view in the city — arrive 30 minutes before sunset."],
    "tabarka":    ["The Jazz Festival runs every July — book accommodation months in advance if visiting then.", "Bring snorkelling gear — the coral reefs just offshore are easily accessible from the beach.", "Les Aiguilles rock formations are best photographed in the late afternoon golden light."],
    "bizerte":    ["The old port is most lively in the early evening — locals gather for coffee and a harbour walk.", "Cap Blanc is a short drive north — go for the dramatic cliffs and the claim of being Africa's northernmost point.", "Bizerte's beaches are far less crowded than Hammamet or Sousse — ideal for a peaceful swim."],
    "kairouan":   ["Non-Muslims cannot enter the Great Mosque interior but can view the courtyard — respectful dress required.", "Kairouan's makroud is best bought fresh from the souk bakeries — avoid the packaged versions.", "The Aghlabid Basins are most photogenic in the late afternoon golden light."],
    "ain-draham": ["Pack a layer even in summer — temperatures drop significantly at night at 900m altitude.", "The Bulla Regia underground villas are best visited in the morning when it is cooler underground.", "Spring (March–May) is the best season — wildflowers carpet the hillsides."]
};

const THEMES = {
    "tunis":      "Ancient Medinas & Roman Splendour",
    "djerba":     "Island Life & Timeless Traditions",
    "tozeur":     "Gateway to the Sahara",
    "hammamet":   "Sun, Sea & Coastal Charm",
    "kelibia":    "Hidden Gem of Cap Bon",
    "sousse":     "The Pearl of the Sahel",
    "monastir":   "History Meets the Mediterranean",
    "mahdia":     "Timeless Coastal Heritage",
    "tabarka":    "Coral, Jazz & Wild Nature",
    "bizerte":    "Northern Harbours & Untouched Shores",
    "kairouan":   "Faith, Crafts & Desert Soul",
    "ain-draham": "Mountain Forests & Cool Escapes"
};

const TIME_SLOTS = {
    "Culture":  ["9:00 AM", "10:30 AM", "2:00 PM", "4:00 PM"],
    "Museum":   ["9:00 AM", "11:00 AM"],
    "Ruins":    ["9:00 AM", "10:30 AM", "3:00 PM"],
    "Beach":    ["2:30 PM", "3:00 PM",  "4:00 PM"],
    "Leisure":  ["3:00 PM", "4:30 PM",  "6:00 PM"],
    "Scenic":   ["8:00 AM", "5:00 PM",  "6:30 PM"],
    "Nature":   ["8:00 AM", "9:00 AM"],
    "Food":     ["12:30 PM","7:00 PM"]
};

function pickTime(type, usedTimes) {
    const slots = TIME_SLOTS[type] || ["10:00 AM"];
    for (const t of slots) { if (!usedTimes.has(t)) return t; }
    return slots[slots.length - 1];
}

function generatePlanLocal(routeDests) {
    const totalPlaces = routeDests.reduce((s, d) => s + d.places.length, 0);
    let dayBudgets = routeDests.map(d => Math.max(1, Math.round(days * d.places.length / totalPlaces)));

    let diff = days - dayBudgets.reduce((a,b)=>a+b,0);
    while (diff > 0) { dayBudgets[0]++; diff--; }
    while (diff < 0) { const i = dayBudgets.findIndex(b=>b>1); if(i>=0) dayBudgets[i]--; diff++; }

    const planDays = [];
    let dayNum = 1;

    routeDests.forEach((dest, destIdx) => {
        const budget    = dayBudgets[destIdx];
        const allPlaces = [...dest.places];

        for (let i = allPlaces.length - 1; i > 0; i--) {
            const j = Math.floor(Math.random() * (i + 1));
            [allPlaces[i], allPlaces[j]] = [allPlaces[j], allPlaces[i]];
        }

        const usedPlaceNames = new Set(planDays.flatMap(d => d.places.map(p => p.name)));

        const prevDest     = destIdx > 0 ? routeDests[destIdx - 1] : null;
        const travelKm     = prevDest ? (DIST[prevDest.id]?.[dest.id] ?? 0) : 0;
        const isLongTravel = travelKm > 100;

        const placesPerDay = Math.ceil(allPlaces.length / budget);
        let placeIdx = 0;

        for (let d = 0; d < budget; d++) {
            const isFirstDay = d === 0;
            const travelDay  = isFirstDay && isLongTravel;
            const maxPlaces  = travelDay ? 2 : Math.min(placesPerDay, 3);
            const dayPlaces  = [];
            const usedTimes  = new Set();

            let travelNote = null;
            if (isFirstDay && prevDest) {
                const hrs = travelKm > 250 ? "~3 hrs" : travelKm > 150 ? "~2 hrs" : travelKm > 80 ? "~1.5 hrs" : "~1 hr";
                travelNote = `🚗 Drive ~${travelKm} km from ${prevDest.name} to ${dest.name} (${hrs})`;
            }

            const morning   = allPlaces.slice(placeIdx).filter(p => ["Culture","Museum","Ruins","Nature"].includes(p.type));
            const afternoon = allPlaces.slice(placeIdx).filter(p => ["Beach","Leisure"].includes(p.type));
            const evening   = allPlaces.slice(placeIdx).filter(p => ["Scenic"].includes(p.type));
            const ordered   = [...morning, ...afternoon, ...evening,
                               ...allPlaces.slice(placeIdx).filter(p => !["Culture","Museum","Ruins","Nature","Beach","Leisure","Scenic"].includes(p.type))];

            const seen = new Set();
            const uniqueOrdered = ordered.filter(p => { if(seen.has(p.name)) return false; seen.add(p.name); return true; });

            const toVisit = uniqueOrdered.filter(p => !usedPlaceNames.has(p.name)).slice(0, maxPlaces);

            toVisit.forEach(p => usedPlaceNames.add(p.name));
            placeIdx += toVisit.length;

            toVisit.forEach((place, pi) => {
                let time;
                if (travelDay && pi === 0) time = "2:00 PM";
                else if (["Culture","Museum","Ruins","Nature"].includes(place.type)) time = pi === 0 ? "9:00 AM" : "11:00 AM";
                else if (["Beach","Leisure"].includes(place.type)) time = "3:00 PM";
                else if (place.type === "Scenic") time = pi === 0 ? "8:00 AM" : "5:30 PM";
                else time = pickTime(place.type, usedTimes);
                if (usedTimes.has(time)) time = `${parseInt(time)+1}:00 ${time.includes("AM")?"AM":"PM"}`;
                usedTimes.add(time);
                dayPlaces.push({ time, name: place.name, type: place.type, desc: place.desc });
            });

            const timeToMins = t => {
                const [hm, ap] = t.split(" ");
                let [h,m] = hm.split(":").map(Number);
                if (ap === "PM" && h !== 12) h += 12;
                if (ap === "AM" && h === 12) h = 0;
                return h * 60 + (m||0);
            };
            dayPlaces.sort((a,b) => timeToMins(a.time) - timeToMins(b.time));

            const mealData   = MEALS[dest.id] || MEALS["tunis"];
            const lunchText  = mealData.lunch[Math.floor(Math.random() * mealData.lunch.length)];
            const dinnerText = mealData.dinner[Math.floor(Math.random() * mealData.dinner.length)];
            const lunchName  = lunchText.replace(/^Lunch: /, "").split(" — ")[0];
            const dinnerName = dinnerText.replace(/^Dinner: /, "").split(" — ")[0];

            let lunchInserted = false;
            for (let i = 0; i < dayPlaces.length; i++) {
                if (!lunchInserted && timeToMins(dayPlaces[i].time) >= timeToMins("12:00 PM")) {
                    dayPlaces.splice(i, 0, { time: "12:30 PM", name: "Lunch: " + lunchName, type: "Food", desc: lunchText.replace(/^Lunch: [^—]+— ?/, "") || "Enjoy a traditional Tunisian lunch." });
                    lunchInserted = true;
                    break;
                }
            }
            if (!lunchInserted) {
                dayPlaces.push({ time: "12:30 PM", name: "Lunch: " + lunchName, type: "Food", desc: lunchText.replace(/^Lunch: [^—]+— ?/, "") || "Enjoy a traditional Tunisian lunch." });
            }

            dayPlaces.push({ time: "7:30 PM", name: "Dinner: " + dinnerName, type: "Food", desc: dinnerText.replace(/^Dinner: [^—]+— ?/, "") || "Enjoy a traditional Tunisian dinner." });

            dayPlaces.sort((a,b) => timeToMins(a.time) - timeToMins(b.time));

            const destTips = TIPS[dest.id] || ["Explore at your own pace and enjoy the local atmosphere."];
            const tip = destTips[dayNum % destTips.length];

            planDays.push({
                day: dayNum++,
                destination: dest.name,
                theme: THEMES[dest.id] || dest.name,
                travelNote,
                places: dayPlaces,
                tip
            });
        }
    });

    const totalPlaceVisits = planDays.reduce((s, d) => s + d.places.filter(p => p.type !== "Food").length, 0);
    const overallTips = [
        "Book accommodation in advance, especially in Sousse and Hammamet during summer.",
        "Carry cash (Tunisian Dinar) — many medina shops and small restaurants don't accept cards.",
        "Dress modestly when visiting mosques and religious sites — shoulders and knees covered.",
        "The best time to visit Tunisia is April–June or September–October for ideal weather.",
        "A hired car gives you the most flexibility — roads between cities are well-maintained."
    ];

    return {
        totalDays: days,
        summary: {
            destinations: routeDests.length,
            places: totalPlaceVisits,
            tip: overallTips[Math.floor(Math.random() * overallTips.length)]
        },
        days: planDays
    };
}

function generatePlan() {
    goToStep(3);
    document.getElementById("generatingBox").style.display  = "block";
    document.getElementById("planOutput").classList.remove("show");
    document.getElementById("planActions").style.display    = "none";
    document.getElementById("errorBanner").classList.remove("show");

    const selectedDests = DESTINATIONS.filter(d => chosen.has(d.id));
    const routeIds      = sortByRoute(selectedDests.map(d => d.id));
    const routeDests    = routeIds.map(id => selectedDests.find(d => d.id === id));

    setTimeout(() => {
        try {
            const plan = generatePlanLocal(routeDests);
            renderPlan(plan, routeDests);
        } catch(err) {
            document.getElementById("generatingBox").style.display = "none";
            const b = document.getElementById("errorBanner");
            b.textContent = "⚠️ Something went wrong building your plan. Please try again.";
            b.classList.add("show");
            document.getElementById("planActions").style.display = "block";
        }
    }, 900);
}

function renderPlan(plan, routeDests) {
    document.getElementById("generatingBox").style.display = "none";
    const out = document.getElementById("planOutput");
    let html  = "";

    html += `<div class="plan-summary">
        <div class="sum-item"><div class="sum-num">${plan.totalDays}</div><div class="sum-lbl">Days</div></div>
        <div class="sum-item"><div class="sum-num">${plan.summary.destinations}</div><div class="sum-lbl">Destinations</div></div>
        <div class="sum-item"><div class="sum-num">${plan.summary.places || "—"}</div><div class="sum-lbl">Places to Visit</div></div>
    </div>`;

    html += `<div class="plan-route"><span class="route-label">📍 Your route:</span>`;
    routeDests.forEach((d, i) => {
        html += `<a class="route-chip" href="${d.link}">${d.emoji} ${d.name}</a>`;
        if (i < routeDests.length - 1) html += `<span class="route-arrow">→</span>`;
    });
    html += `</div>`;

    if (plan.summary.tip) {
        html += `<div class="plan-tip">💡 <span><strong>Key tip:</strong> ${plan.summary.tip}</span></div>`;
    }

    plan.days.forEach(day => {
        html += `<div class="plan-day-card">
            <div class="plan-day-header">
                <div class="plan-day-num">${day.day}</div>
                <div>
                    <div class="plan-day-title">Day ${day.day} · ${day.destination}</div>
                    <div class="plan-day-theme">${day.theme || ""}</div>
                </div>
            </div>`;

        if (day.travelNote) {
            html += `<div class="travel-note-bar">${day.travelNote}</div>`;
        }

        html += `<div class="plan-day-body">`;
        day.places.forEach(p => {
            const bg  = TYPE_BG[p.type]  || "#f0f4fb";
            const col = TYPE_COL[p.type] || "#444";
            html += `<div class="place-item">
                <div class="place-time">${p.time}</div>
                <div class="place-info">
                    <h4>${p.name}</h4>
                    <p>${p.desc}</p>
                    <span class="place-tag" style="background:${bg};color:${col};">${p.type}</span>
                </div>
            </div>`;
        });
        if (day.tip) {
            html += `<div class="day-tip"><strong>💡 Tip:</strong> ${day.tip}</div>`;
        }
        html += `</div></div>`;
    });

    out.innerHTML = html;
    out.classList.add("show");
    document.getElementById("planActions").style.display = "flex";
    out.scrollIntoView({ behavior: "smooth", block: "start" });
}

//Event listeners
document.getElementById("openPlannerBtn").addEventListener("click", e => {
    e.preventDefault();
    document.getElementById("plannerOverlay").classList.add("open");
    renderChips();
    goToStep(1);
});
document.getElementById("plannerClose").addEventListener("click", () =>
    document.getElementById("plannerOverlay").classList.remove("open"));
document.getElementById("plannerOverlay").addEventListener("click", e => {
    if (e.target === document.getElementById("plannerOverlay"))
        document.getElementById("plannerOverlay").classList.remove("open");
});

document.getElementById("toStep2").addEventListener("click",  () => { updateDaysUI(); goToStep(2); });
document.getElementById("toStep1").addEventListener("click",  () => goToStep(1));
document.getElementById("toStep1b").addEventListener("click", () => goToStep(1));
document.getElementById("toStep2b").addEventListener("click", () => goToStep(2));
document.getElementById("toStep3").addEventListener("click",  generatePlan);
document.getElementById("replanBtn").addEventListener("click", generatePlan);

function getMaxDays() {
    const total = DESTINATIONS.filter(d => chosen.has(d.id))
                              .reduce((s, d) => s + d.places.length, 0);
    return Math.max(1, total);
}

function updateDaysUI() {
    const max = getMaxDays();
    if (days > max) days = max;
    if (days < 1)   days = 1;
    document.getElementById("daysVal").value = days;
    const destCount = chosen.size;
    document.getElementById("daysHint").innerHTML =
        `Maximum <strong>${max} days</strong> for your ${destCount} selected destination${destCount>1?"s":""} — based on available places. We recommend at least 1 day per destination.`;
}

document.getElementById("daysDown").addEventListener("click", () => {
    if (days > 1) { days--; updateDaysUI(); }
});
document.getElementById("daysUp").addEventListener("click", () => {
    if (days < getMaxDays()) { days++; updateDaysUI(); }
});

});