<?php
if ($_SERVER['REQUEST_METHOD'] == 'GET' && realpath(__FILE__) == realpath($_SERVER['SCRIPT_FILENAME'])) {
    header('HTTP/1.0 403 Forbidden', TRUE, 403);
    die();
}

$activeProjectPageId = $_GET['project-page-id'];
$activeProject = $data['activeProject'];

$project = [
    'description' => $activeProject->getProjectDescription(),
    'goal' => $activeProject->getProjectGoal(),
    'result' => $activeProject->getProjectResults(),
    'how-we-do' => $activeProject->getProjectMethod(),
];

$projectElements = [
    'title' => $activeProject->getProjectTitle(),
    'date' => $activeProject->getProjectDate(),
    'category' => $activeProject->getProjectCategory(),
    'project-img' => $activeProject->getProjectImgUrl(),
];

$translateKeys = [
    'description' => 'description',
    'goal' => 'Objectifs',
    'result' => 'Nos résultats',
    'how-we-do' => 'Démarche'
];

$stringManager = $data['stringManager'];
$strProjectIdNext = strval(intval($activeProjectPageId) + 1);
$strProjectIdPrev = strval(intval($activeProjectPageId) - 1);
$intProjectIdNext = intval($activeProjectPageId) + 1;
$intProjectIdPrev = intval($activeProjectPageId) - 1;

$validProject = $intProjectIdNext > 0 && $intProjectIdNext <= count($data['projects']);
$indexNext = $intProjectIdNext - 1;
$indexPrev = $intProjectIdPrev - 1;
$validIndexNext = $indexNext >= 0 && $indexNext <= count($data['projects']);
$validIndexPrev = $indexPrev >= 0 && $indexPrev <= count($data['projects']);

$nextProject =  $validProject && $validIndexNext ? $data['projects'][$indexNext] : "";
$previousProject =  $validProject && $validIndexPrev ? $data['projects'][$indexPrev] : "";

?>

<main id="#main" class="project-page <?php echo $page_css_id ?>">
    <div class="container">
        <section class="row section-title">
            <div class="col-12">
                <h1 class="pre-title pre-title--centered"><?php echo $projectElements['title'] ?? "" ?></h1>
            </div>
        </section>
        <section class="inter-post-section">
                <div class="inter-post-wrapper">
                    <a class=" inter-post-link els-text-link els-text-link--blue  <?php echo intval($strProjectIdPrev) > 0 ? 'active' : '' ?>" href="/project?project-page-id=<?php echo $strProjectIdPrev ?>" >
                        <span class="inter-post-icon">
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                                 fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                 stroke-linejoin="round" class="lucide lucide-chevrons-left">
                                <path d="m11 17-5-5 5-5"/>
                                <path d="m18 17-5-5 5-5"/>
                            </svg>
                        </span>
                        <span class="inter-post-text"> Précèdent</span>
                    </a>

                    <a class="inter-post-link els-text-link els-text-link--blue <?php echo intval($strProjectIdNext) <= count($data['projects']) ? 'active': '' ?>" href="/project?project-page-id=<?php echo $strProjectIdNext ?>" >
                        <span class="inter-post-text">
                           Suivant
                        </span>
                        <span class="inter-post-icon">
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                                 fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                 stroke-linejoin="round" class="lucide lucide-chevrons-right">
                                <path d="m6 17 5-5-5-5"/>
                                <path d="m13 17 5-5-5-5"/>
                            </svg>
                        </span>
                    </a>

                </div>
        </section>
        <section class="row section-project">
            <div class="col-12 col-md-4 project__image">
                <div class="img-wrapper">
                    <img src="<?php echo $projectElements['project-img'] ?? "https://images.pexels.com/photos/547114/pexels-photo-547114.jpeg?auto=compress&cs=tinysrgb&w=1260&h=750&dpr=1" ?>" alt=""/>
                </div>
                <div class="subtext-wrapper">
                    <span class="els-text-xs els-text--bold els-text--light">
                        <?php echo empty($projectElements['date']) ? "" : $projectElements['date']; ?>
                    </span>
                </div>
            </div>
            <div class="col-12 col-md-8 project__content">
                <div class="content__tabs-wrapper">
                    <nav>
                        <?php if(!empty($project)) {
                        $i = 1;
                            foreach ($project as $key => $value) {
                                if(!empty($value) && $key !== 'title') { ?>
                                    <div data-tab="<?php echo $key ?>" class="tab-pill js-tab-pill <?php echo $i !== 1 ? '' : 'active' ?>">
                                        <?php echo $translateKeys[$key] ?? $key ?>
                                    </div>
                                <?php $i++; } ?>
                            <?php  } ?>
                        <?php } ?>
                    </nav>
                </div>
                <div class="content__text-wrapper">
                    <?php if(!empty($project)) {
                        $i = 1;
                        foreach ($project as $key => $value) {
                            if(!empty($value) && $key !== 'title') { ?>
                                <div data-content="<?php echo $key ?>" class="content__text js-content__text <?php echo $i !== 1 ? '' : 'active' ?>">
                                    <?php $newParagraphs = $stringManager->separateSentences($value, 6, 'els-text-lg els-text--light'); ?>
                                    <?php echo $newParagraphs ?>
                                </div>
                            <?php $i++; } ?>
                       <?php  } ?>
                    <?php } ?>
                </div>

            </div>
        </section>
    </div>
</main>


