<?php
session_start();
error_reporting(E_ALL);
ini_set('display_errors', 1);
require_once 'vendor/autoload.php';
use Els\Factory\PDOFactory;
use Els\Manager\MembersManager\MembersManagerPdo;
use Els\Manager\ProjectsManager\ProjectsManagerPdo;
use Els\Controllers\projectsControllers\createProject;
use Els\Controllers\projectsControllers\deleteProject;
use Els\Controllers\projectsControllers\uploadProjectImages;
use Els\Controllers\utilsControllers\flashMessagesManager;
use Els\Controllers\utilsControllers\stringManager;
use Els\Controllers\viewControllers\createPage;
use Els\Manager\MembersManager\MembersApiManager;
use Els\Manager\ProjectsManager\ProjectsApiManager;
use Els\Manager\SectionsManager\SectionsApiManager;

$sections = [
    "project" => [], "members" => []
];

try {
    $pdoConn = new PDOFactory(
        getenv('DB_HOST'),
        getenv('DB_PORT'),
        getenv('DB_DATABASE'),
        getenv('DB_USERNAME'),
        getenv('DB_PASSWORD')
    );

//    $showMembers = new MembersManagerPdo($pdoConn);
//    $members = $showMembers->getMembers();

    $showMembers = new MembersApiManager("https://nextjs-with-supabase-ebon-six.vercel.app/api/members");
    $members = $showMembers->getMembersFromUrl();

    // https://jsonplaceholder.typicode.com/todos
    $showProjects = new ProjectsApiManager("https://nextjs-with-supabase-ebon-six.vercel.app/api/projects");
    $projects = $showProjects->getProjectsFromUrl();

    foreach ($sections as $key => $value) {
        $temp = new SectionsApiManager("https://nextjs-with-supabase-ebon-six.vercel.app/api/sections/". $key);
        $sections[$key] = $temp->getSectionsFromUrl();
    }

} catch (PDOException $e) {
    $errorMessage = $e->getMessage();
    $members = [];
    $projects = [];
    $sectionsTexts = [];

}




$mainController = new createPage();
$createProject = new createProject();
$uploadProjectImages = new uploadProjectImages();
$deleteProject = new deleteProject();
$stringManager = new stringManager();
$flashMessageManager = new flashMessagesManager();

try {
    if (empty($_GET['page'])) {
        $page = '';
    } else {
        $url = explode('/', filter_var($_GET['page'], FILTER_SANITIZE_URL));
        $page = $url[0];
    }

    //$siteUrl = getenv("ELS_SITE_URL") ?? "https://els-togo.ddev.site:8443";
    $siteUrl = (!empty($_SERVER['HTTPS']) ? 'https' : 'http') . '://' . $_SERVER['HTTP_HOST'];

    switch ($page) {
        case '':
            $jsonProjects = $createProject->getJsonProjectData();
            $pageData = [
                "bodyId" => 'route-home',
                "page_css_id" => 'page-home',
                "meta" => [
                    "page_title" => 'Association ELS-Togo',
                    "page_description" => 'Site web de els-Togo',
                ],
                "view" => 'views/home.view.php',
                "template" => "views/templates/template.php",
                "siteUrl" => $siteUrl || "localhost:7000",
                "data" => [
                    'jsonProjects' => $jsonProjects,
                    'projects' => $projects,
                    'members' => $members,
                    'sectionsProject' => $sections['project'],
                    'sectionsMembers' => $sections['members']
                ]
            ];

            $mainController->setPageData($pageData);
            break;
        case 'legal':
            $pageData = [
                "bodyId" => $page,
                "page_css_id" => 'page-legal',
                "meta" => [
                    "page_title" => 'Mentions légales - Association ELS-Togo',
                    "page_description" => 'Mentions légales du site web de els-Togo',
                ],
                "view" => 'views/legal.view.php',
                "template" => "views/templates/template.php",
                "siteUrl" => $siteUrl
            ];
            $mainController->setPageData($pageData);
            break;
        case 'project':
            $projectId = $_GET['project-page-id'];
            $activeProject = null;
            $apiProjectIds = [];
            $i = 0;
            foreach ($projects as $project) {
                $i++;
                if(strval($i) === $projectId) {
                    $activeProject = $project;
                    break;
                } else {
                    $activeProject = null;
                }
            }

            $pageData = [
                "bodyId" => $page,
                "page_css_id" => 'page-project-'.$projectId,
                "meta" => [
                    "page_title" => 'Association ELS-Togo',
                    "page_description" => 'Site web de els-Togo',
                ],
                "view" => 'views/single/project.view.php',
                "template" => "views/templates/template.php",
                "siteUrl" => $siteUrl,
                "data" => [
                    'projects' => $projects,
                    'activeProject' => $activeProject,
                    'stringManager' => $stringManager,
                    'flashMessageManager' => $flashMessageManager
                ],
            ];
            if($activeProject) {
                $mainController->setPageData($pageData);
                break;
            } else {
                $pageData = [
                    "bodyId" => 'route-error',
                    "page_css_id" => 'page-error',
                    "meta" => [
                        "page_title" => "Erreur 404 - Els Togo",
                        "page_description" => 'Els-Togo - erreur 404',
                    ],
                    "view" => 'views/error.view.php',
                    "template" => "views/templates/template.php",
                    "siteUrl" => $siteUrl,
                    "data" => [
                        "css-footer" => "els-footer--fixed",
                        "message" => "Ce projet n'existe pas"
                    ]
                ];
                $mainController->pageError($pageData);
                break;
            }

        case 'credits':
            $pageData = [
                "bodyId" => $page,
                "page_css_id" => 'page-credit',
                "meta" => [
                    "page_title" => 'Crédits - Association ELS-Togo',
                    "page_description" => 'Crédits du site web de els-Togo',
                ],
                "view" => 'views/credit.view.php',
                "template" => "views/templates/template.php",
                "siteUrl" => $siteUrl
            ];
            $mainController->setPageData($pageData);
            break;
        case 'els-cooking':
            $_SESSION['csrf_token'] = $mainController->generateCsrfToken();
            $projects = $createProject->getJsonProjectData();
            $pageData = [
                "bodyId" => $page,
                "page_css_id" => 'page-cook',
                "meta" => [
                    "page_title" => 'Mon Espace - Association ELS-Togo',
                    "page_description" => 'Site web de els-Togo',
                ],
                "view" => 'views/cooksite/projects.view.php',
                "template" => "views/templates/template.php",
                "siteUrl" => $siteUrl,
                "data" => [
                    'crsf_token' => $_SESSION['csrf_token'],
                    'projects' => $projects,
                    'flashMessageManager' => $flashMessageManager
                ]
            ];

            $mainController->setPageData($pageData);
            break;
        case 'create-project':
            $createProject->setJsonProjectFile();
            break;
        case 'upload':
            $uploadProjectImages->uploadImage();
            break;
        case 'delete-project':
            $deleteProject->deleteProject();
            break;
        default:
            throw new Exception("La page n'existe pas");
    }

} catch (Exception $e) {
    $pageData = [
        "bodyId" => 'route-error',
        "page_css_id" => 'page-error',
        "meta" => [
            "page_title" => "Erreur 404 - Els Togo",
            "page_description" => 'Els-Togo - erreur 404',
        ],
        "view" => 'views/error.view.php',
        "template" => "views/templates/template.php",
        "siteUrl" => $siteUrl,
        "data" => [
            "css-footer" => "els-footer--fixed",
            "message" => $e->getMessage()
        ]
    ];
    $mainController->pageError($pageData);
}

