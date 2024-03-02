<?php


if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Read JSON data from the request body
    $jsonInput = file_get_contents('php://input');
    $formData = json_decode($jsonInput, true);

    // Sanitize and validate inputs as needed

    // Create an array with the submitted data
    $projectData = [
        'id' => $formData['id'],
        'date' => $formData['date'],
        'place' => $formData['place'],
        'category' => $formData['category'],
        'title' => $formData['title'],
        'accroche' => $formData['accroche'],
        'description' => $formData['description'],
        'goal' => $formData['goal'],
        'how-we-do' => $formData['how-we-do'],
        'results' => $formData['results'],
        'img' => $formData['img'],
        'images' => $formData['images'],
        'banner' => $formData['banner'],
    ];

    // Read existing projects data from the file
    $jsonProjects = file_get_contents('projects.json');
    $projects = json_decode($jsonProjects, true);

    // Add the new project data to the existing array
    $projects[] = $projectData;

    // Convert the projects array to JSON
    $jsonProjects = json_encode($projects, JSON_PRETTY_PRINT);

    // Save the updated JSON data to the file
    file_put_contents('projects.json', $jsonProjects);

    // Optionally, you can redirect the user or display a success message
    echo 'Form submitted successfully!';
}


