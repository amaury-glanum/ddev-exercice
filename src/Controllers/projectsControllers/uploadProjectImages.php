<?php

namespace controllers\projectsControllers;
if ($_SERVER['REQUEST_METHOD'] == 'GET' && realpath(__FILE__) == realpath($_SERVER['SCRIPT_FILENAME'])) {
    header('HTTP/1.0 403 Forbidden', TRUE, 403);
    die();
}

class uploadProjectImages
{

    public function uploadImage()
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            // Specify the directory where you want to store the uploaded images
            $uploadDir = $_SERVER['DOCUMENT_ROOT'] . '/uploads/';

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

                    header("Location: /els-cooking?success=Image téléchargé");
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
}
