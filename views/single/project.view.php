<?php
if ($_SERVER['REQUEST_METHOD'] == 'GET' && realpath(__FILE__) == realpath($_SERVER['SCRIPT_FILENAME'])) {
    header('HTTP/1.0 403 Forbidden', TRUE, 403);
    die();
}
$project = [
    'description' => "",
    'goal' => "",
    'result' => "",
    'how-we-do' => ""
];

$projectElements = [
    'title' =>"",
    'date' => "",
    'category' => "",
    'project-img' => ""
];

$translateKeys = [
    'description' => 'description',
    'goal' => 'Objectifs',
    'result' => 'Nos résultats',
    'how-we-do' => 'Démarche'
];

if(!empty($data['activeProject'])) {
    foreach ($data['activeProject'] as $key => $value) {
        if(array_key_exists($key, $project))  {
            $project[$key] = $value;
        }
        if(array_key_exists($key, $projectElements))  {
            $projectElements[$key] = $value;
        }
    };
}

$utils = $data['displayProject']

?>
<main id="#main" class="project-page <?php echo $page_css_id ?>">
    <div class="container">
        <section class="row section-title">
            <div class="col-12">
                <h1 class="pre-title pre-title--centered"><?php echo $projectElements['title'] ?? "" ?></h1>
            </div>
        </section>
        <section class="row section-project">
            <div class="col-12 col-md-4 project__image">
                <div class="img-wrapper">
                    <img src="<?php echo $projectElements['project-img'] ?? "https://images.pexels.com/photos/547114/pexels-photo-547114.jpeg?auto=compress&cs=tinysrgb&w=1260&h=750&dpr=1" ?>" alt=""/>
                </div>
                <div class="subtext-wrapper">
                    <span class="els-text-xs els-text--bold">
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
<!--                                    <p class="els-text-lg">--><?php //echo $value ?><!--</p>-->
                                    <?php $newParagraphs = $utils->separateSentences($value, 6); ?>
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


