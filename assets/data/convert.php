<?php

// Function to convert an associative array to a JSON file
function convertArrayToJson($array, $jsonFile)
{
    // Convert array to JSON with UTF-8 encoding
    $json = json_encode($array, JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE);

    // Check if the JSON encoding was successful
    if ($json === false) {
        die("Error: Unable to encode the array to JSON.");
    }

    // Save the JSON string to a file
    file_put_contents($jsonFile, $json);

    echo "Conversion successful. JSON file saved as $jsonFile\n";
}

// Your associative array

$projects = [
    [
        'date' => "Avril 2024",
        'place' => "Tsévié, Togo",
        'category' => "Santé",
        'title' => "Création d'un centre optique",
        'accroche' => '',
        'description' => "Création d'un centre optique social et solidaire",
        'goal' => "Améliorer l'acuité visuelle des jeunes et des personnes âgées dans le but  d'aider les populations vulnérables",
        'how-we-do' => "Nous recherchons des partenariats avec des opticiens afin de collecter du matériel. Nous créons avec des opticiens locaux ...",
        'results' => "",
        'img' => "https://images.pexels.com/photos/7014337/pexels-photo-7014337.jpeg?auto=compress&cs=tinysrgb&w=1260&h=750&dpr=1",
        'images' => 'images',
        'banner' => ''
    ],
    [
        'date' => "Juin - Septembre 2024",
        'place' => "Tsévié, Togo",
        'category' => "Volontariat",
        'title' => "Camp Chantier",
        'accroche' => '',
        'description' => "Organisation des missions humanitaires dans les milieux ruraux pauvres",
        'goal' => "",
        'how-we-do' => "Organisation des missions humanitaires dans les milieux ruraux pauvres",
        'results' => "",
        'img' => "https://images.pexels.com/photos/3183150/pexels-photo-3183150.jpeg?auto=compress&cs=tinysrgb&w=1260&h=750&dpr=1",
        'images' => 'images',
        'banner' => ''
    ],
    [
        'date' => "Depuis 2024",
        'place' => "Commune Moyen Mono 1, Togo",
        'category' => "Santé et environnement",
        'title' => "Collecte des ordures ménagères",
        'accroche' => '',
        'description' => "Pré-collecte et la valorisation des déchets ménagers.",
        'goal' => "Contribuer à l'amélioration du cadre de vie de la population",
        'how-we-do' => "En collaboration avec l'ONG ENGPRO spécialisée dans la pré-collecte et la valorisation des déchets ménagers.",
        'results' => "",
        'img' => "https://images.pexels.com/photos/3183153/pexels-photo-3183153.jpeg?auto=compress&cs=tinysrgb&w=1260&h=750&dpr=1",
        'images'=> "",
        'banner'=> ""
    ],
    [
        'date' => "Dés 2024",
        'place' => "Tsévié, Togo",
        'category' => "Environnement",
        'title' => "Reboisement transfrontalier",
        'accroche' => '',
        'description' => "Projet de reboisement autour du fleuve Mono dans les communes de Moyen Mono 1 (Togo) et Aplahoué (Bénin).",
        'goal' => "Contribuer au projet de reboisement du gouvernement togolais (Atteindre 1 milliard d'arbres d'ici 2030), à la lutte contre la faim et à la protection de l'environnement.",
        'how-we-do' => "Des arbres fruitiers seront plantés ...",
        'results' => "",
        'img' => "https://images.pexels.com/photos/8837496/pexels-photo-8837496.jpeg",
        'images' => "",
        'banner' => ""
    ]
];

// Output JSON file name
$outputFile = 'project.json';

// Convert the associative array to JSON
convertArrayToJson($projects, $outputFile);



