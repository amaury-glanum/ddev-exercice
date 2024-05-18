<?php

namespace controllers\projectsControllers;
if ($_SERVER['REQUEST_METHOD'] == 'GET' && realpath(__FILE__) == realpath($_SERVER['SCRIPT_FILENAME'])) {
    header('HTTP/1.0 403 Forbidden', TRUE, 403);
    die();
}

class createProject
{

    public function getJsonProjectData()
    {
        $filePath = $_SERVER['DOCUMENT_ROOT'] . '/assets/data/project.json';

        // todo: Ensure the path is a real path, not a symbolic link

        // Read existing projects data from the file if it exists
        if (file_exists($filePath)) {
            $jsonProjects = file_get_contents($filePath);

            // Decode the existing JSON data to an array
            $projects = json_decode($jsonProjects, true);

        } else {
            exit('Le fichier de projet est nécessaire mais manquant');
        }

        return $projects;
    }

    public function setJsonProjectFile()
    {
        // createProject Js script function created the project json content before
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {

            // Read JSON data from the request body
            $jsonInput = file_get_contents('php://input');
            $formData = json_decode($jsonInput, true);
            $filePath = $_SERVER['DOCUMENT_ROOT'] . '/assets/data/project.json';
            // todo: Ensure the path is a real path, not a symbolic link

            // Read existing projects data from the file if it exists
            if (file_exists($filePath)) {
                $jsonProjects = file_get_contents($filePath);

                // Decode the existing JSON data to an array
                $projects = json_decode($jsonProjects, true);
                if (count($projects) !== null) {
                    $nextProjectId = 'project-' . (count($projects) + 1);
                } else {
                    // Add a new project array to the Json that have no array
                    $projectArray = [];
                    $jsonProjectArray = json_encode($projectArray, JSON_PRETTY_PRINT);
                    file_put_contents($filePath, $jsonProjectArray);
                }

            } else {
                die('project file need to be preexistant');
            }

            if (isset($_FILES['project-img']['tmp_name'])) {
                $contentType = mime_content_type($_FILES['project-img']['tmp_name']);
                $allowedExtensions = [
                    'image/jpeg' => 'jpg',
                    'image/png' => 'png',
                    'image/gif' => 'gif',
                    'image/webp' => 'webp',
                ];
            }
            $fileExtension = $allowedExtensions[$contentType ?? ""] ?? 'jpg';

            $projectData = [
                'id' => htmlspecialchars($nextProjectId),
                'date' => htmlspecialchars($formData['date']),
                'place' => htmlspecialchars($formData['place']),
                'category' => htmlspecialchars($formData['category']),
                'title' => htmlspecialchars($formData['title']),
                'accroche' => htmlspecialchars($formData['accroche']),
                'description' => htmlspecialchars($formData['description']),
                'goal' => htmlspecialchars($formData['goal']),
                'how-we-do' => htmlspecialchars($formData['how-we-do']),
                'results' => htmlspecialchars($formData['results']),
                'project-img' => '../uploads/' . $nextProjectId . '.' . $fileExtension
            ];

            // Add the new project data to the existing array
            $projects[] = $projectData;

            // Convert the projects array to JSON
            $jsonProjects = json_encode($projects, JSON_PRETTY_PRINT);

            // Save the updated JSON data to the file
            file_put_contents($filePath, $jsonProjects);

            // Optionally, you can redirect the user or display a success message
            header("Location: /els-cooking?success=projet-nouveau");
            exit();
        }
    }
}
