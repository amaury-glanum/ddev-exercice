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
            "page_css_id" => $pageData["page_css_id"],
            "page_description" => $pageData["meta"]["page_description"],
            "page_title" => $pageData["meta"]["page_title"],
            "view" => $pageData['view'],
            "template" => $pageData['template'],
            "data" => $pageData['data']
        ];

        $this->generatePage($data_page);
    }

    public function setJsonProjectFile() {

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {

            // Read JSON data from the request body
            $jsonInput = file_get_contents('php://input');
            $formData = json_decode($jsonInput, true);
            $filePath = $_SERVER['DOCUMENT_ROOT'] . '/assets/data/projects.json';

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
                'results' => htmlspecialchars($formData['results'])
            ];

            // Add the new project data to the existing array
            $projects[] = $projectData;

            // Convert the projects array to JSON
            $jsonProjects = json_encode($projects, JSON_PRETTY_PRINT);

            // Save the updated JSON data to the file
            file_put_contents($filePath, $jsonProjects);

            // Optionally, you can redirect the user or display a success message
            echo 'Form submitted successfully!' . $filePath;
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
