<?php
session_start();
require_once(dirname(__FILE__) . '/controllers/MainController.php');

$mainController = new MainController();

try {
    if (empty($_GET['page'])) {
        $page = '';
    } else {
        $url = explode('/', filter_var($_GET['page'], FILTER_SANITIZE_URL));
        $page = $url[0];
    }

    switch ($page) {
        case '':
            $pageData = [
                "page_css_id" => 'page-home',
                "meta" => [
                    "page_title" => 'Association ELS-Togo',
                    "page_description" => 'Site web de els-Togo',
                ],
                "view" => 'views/home.view.php',
                "template" => "views/templates/template.php",
                "data" => []
            ];

            $mainController->setPageData($pageData);
            break;
        case 'els-cooking':

            $pageData = [
                "page_css_id" => 'page-cook',
                "meta" => [
                    "page_title" => 'Mon Espace - Association ELS-Togo',
                    "page_description" => 'Site web de els-Togo',
                ],
                "view" => 'views/cooksite/projects.view.php',
                "template" => "views/templates/template.php",
                "data" => []
            ];
            $_SESSION['csrf_token'] = $mainController->generateCsrfToken();
            $mainController->setPageData($pageData);
            break;
        case 'create-project':
            $mainController->setJsonProjectFile();
            break;
        default:
            throw new Exception("La page n'existe pas");
    }

} catch (Exception $e) {
    $pageData = [
        "page_css_id" => 'page-error',
        "meta" => [
            "page_title" => "Erreur 404 - Els Togo",
            "page_description" => 'Els-Togo - erreur 404',
        ],
        "view" => 'views/error.view.php',
        "template" => "views/templates/template.php"
    ];
    $mainController->pageError($pageData);
}

