<?php
if ($_SERVER['REQUEST_METHOD'] == 'GET' && realpath(__FILE__) == realpath($_SERVER['SCRIPT_FILENAME'])) {
    header('HTTP/1.0 403 Forbidden', TRUE, 403);
    die();
}
class MainController
{
    // PUBLIC METHODS
    /**
     * Génère la data pour une page standard du site
     * @method setPage
     * @param array $pageData
     * @param array $headerLinks
     * @param array $footerLinks
     * @param array $assets
     * @return void
     */
    public function setPageData(array $pageData): void
    {
        $data_page = [
            "page_css_id" => $pageData["page_css_id"] ?? "",
            "page_description" => $pageData["meta"]["page_description"] ?? "",
            "page_title" => $pageData["meta"]["page_title"] ?? "",
            "view" => $pageData['view'],
            "template" => $pageData['template'],
            "data" => $pageData['data'] ?? [],
            "siteUrl" => $pageData['siteUrl'] ?? "https://els-togo.onrender.com/"
        ];

        $this->generatePage($data_page);
    }

    public function getJsonProjectData() {
        $filePath = $_SERVER['DOCUMENT_ROOT'] . '/assets/data/projects.json';

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

    public function uploadImage()
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            // Specify the directory where you want to store the uploaded images
            $uploadDir = $_ENV["ELS_SITE_URL"] . '/uploads/';

            // Check if the directory exists, create it if not
            if (!file_exists($uploadDir)) {
                mkdir($uploadDir, 0777, true);
            }

            // Check if a file was uploaded
            if (isset($_FILES['image']) && isset($_POST['project'])) {
                $uploadedFile = $_FILES['image'];
                $selectedProjectSlug = $_POST['project'];

                // Get the file extension
                $fileExtension = pathinfo($uploadedFile['name'], PATHINFO_EXTENSION);

                // Generate a unique filename based on the selected project's slug
                $newFilename = $selectedProjectSlug . '.' . $fileExtension;

                // Specify the path where the file will be saved
                $destination = $uploadDir . $newFilename;

                // Move the uploaded file to the destination folder
                if (move_uploaded_file($uploadedFile['tmp_name'], $destination)) {
                    // Success: Redirect with success messageS

                    header("Location: /els-cooking?error=image-nouvelle");
                    exit;
                } else {
                    // Error: Redirect with error message
                    header("Location: /els-cooking?error=Le fichier n'a pas été téléchargé");
                    exit();
                }
            } else {
                // No file selected or project not specified: Redirect with error message
                header("Location: /els-cooking?error=Pas de fichier sélectionné ou fichier non-trouvé");
                exit();
            }
        } else {
            header('/error');
        }
    }

    public function setJsonProjectFile() {

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {

            $baseUrl = $_ENV['ELS_SITE_URL'];
            $imageUrl = $baseUrl . '/uploads/project-1.jpg';

            // Read JSON data from the request body
            $jsonInput = file_get_contents('php://input');
            $formData = json_decode($jsonInput, true);
            $filePath = $baseUrl . '/assets/data/projects.json';

            // todo: Ensure the path is a real path, not a symbolic link

            // Read existing projects data from the file if it exists
            if (file_exists($filePath)) {
                $jsonProjects = file_get_contents($filePath);

                // Decode the existing JSON data to an array
                $projects = json_decode($jsonProjects, true);
                $nextProjectId = 'project-' . (count($projects) + 1);
            } else {
                die('project file need to be preexistant');
            }

            if(isset($_FILES['project-img']['tmp_name'])) {
                $contentType = mime_content_type($_FILES['project-img']['tmp_name']);
                $allowedExtensions = [
                    'image/jpeg' => 'jpg',
                    'image/png' => 'png',
                    'image/gif' => 'gif',
                ];
                // Default to jpg if content type is unknown
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
                'project-img' => $_SERVER['DOCUMENT_ROOT'] . '/uploads/' . $nextProjectId . '.' . $fileExtension
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

    public function deleteProject() {
        $filePath = $_SERVER['DOCUMENT_ROOT'] . '/assets/data/projects.json';
        $jsonProjects = file_get_contents($filePath);

        // Decode JSON data to an array
        $projects = json_decode($jsonProjects, true);

        // Identify the project to delete based on its id (replace 123 with the actual id)

        // Search for the project with the specified id
        $projectId = $_GET['project-id'] ?? null;

        // Check if the project ID is set and not empty
        if ($projectId !== null && $projectId !== '') {
            // Use htmlspecialchars() only if the value is not null
            $safeProjectId = htmlspecialchars($projectId, ENT_QUOTES, 'UTF-8');
            try {
                $projectIdToDelete =  $safeProjectId;
                $keyToDelete = array_search($projectIdToDelete, array_column($projects, 'id'));
            } catch(Exception $e) {
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


    public function pageError(array $pageData)
    {
        $data_page = [
            "page_css_id" => $pageData["page_css_id"],
            "page_description" => $pageData["meta"]["page_description"],
            "page_title" => $pageData["meta"]["page_title"],
            "view" => $pageData['view'],
            "template" => $pageData['template'],
            "messageError" => "Erreur 404"
        ];
        $this->generatePage($data_page);
    }

    private function generatePage(array $data)
    {
        extract($data);
        ob_start();
        require_once($view);
        $page_content = ob_get_clean();
        require_once($template);
    }

    public function generateCsrfToken() {
        return bin2hex(random_bytes(32));
    }
}
