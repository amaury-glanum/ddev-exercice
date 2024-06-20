<?php

namespace Els\Controllers\projectsControllers;
if ($_SERVER['REQUEST_METHOD'] == 'GET' && realpath(__FILE__) == realpath($_SERVER['SCRIPT_FILENAME'])) {
    header('HTTP/1.0 403 Forbidden', TRUE, 403);
    die();
}

class deleteProject
{

    public function deleteProject()
    {

        $filePath = $_SERVER['DOCUMENT_ROOT'] . '/assets/data/project.json';
        $jsonProjects = file_get_contents($filePath);

        // Decode JSON data to an array
        $projects = json_decode($jsonProjects, true);

        // Search for the project with the specified id
        $projectId = $_GET['project-id'] ?? null;

        // Check if the project ID is set and not empty
        if ($projectId !== null && $projectId !== '') {
            // Use htmlspecialchars() only if the value is not null
            $safeProjectId = htmlspecialchars($projectId, ENT_QUOTES, 'UTF-8');
            try {
                $projectIdToDelete = $safeProjectId;
                $keyToDelete = array_search($projectIdToDelete, array_column($projects, 'id'));
            } catch (Exception $e) {
                throw new Exception("Erreur lors de la recherche de clé", $e->getMessage());
            }

        } else {
            header('Location: /els-cooking?error=id non-trouvé');
            exit();
        }


        // Check if the project was found
        if ($keyToDelete !== false) {
            // Remove the project from the array
            unset($projects[$keyToDelete]);

            // Reindex the array to fix the keys
            $projects = array_values($projects);

            $i = 1;
            foreach ($projects as &$project) {
                $project['id'] = 'project-' . $i;
                $project['project-img'] = '../uploads/' . $project['id'] . '.jpg';
                $i++;
            }
            // Encode the modified array back to JSON
            $jsonProjects = json_encode($projects, JSON_PRETTY_PRINT);

            // Write the updated JSON data back to the file
            file_put_contents($filePath, $jsonProjects);
            header("Location: /els-cooking?success=suppression-projet");
            exit();
        } else {
            echo 'Project not found or already deleted.';
            header("Location: /els-cooking?error=projet non trouvé ou déjà supprimé");
            exit();
        }
    }
}
