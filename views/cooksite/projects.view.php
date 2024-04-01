<?php
if ($_SERVER['REQUEST_METHOD'] == 'GET' && realpath(__FILE__) == realpath($_SERVER['SCRIPT_FILENAME'])) {
header('HTTP/1.0 403 Forbidden', TRUE, 403);
die();
};
if($_SESSION['csrf_token'] !== $data['crsf_token']) {
    header('HTTP/1.0 403 Forbidden', TRUE, 403);
    exit();
}

$projects = $data['projects'];
$uploadsDir = $_SERVER['DOCUMENT_ROOT'] . '/uploads/';
?>

<main id="cooking-page" class="container <?php echo $page_css_id ?>">
    <div class="row">
        <div class="col-12 col-lg-6">
            <section class="project-form__wrapper">
                <div class="project-form__title-wrapper">
                    <div class="">
                        <h3 class="title title--secondary">I. Décrivez votre projet :</h3>
                    </div>
                </div>
                <div class="project-form__form-wrapper">
                    <div class="">
                        <form class="project-form" method="post" action="">

                            <input type="hidden" name="csrf_token" value="<?php echo $data['crsf_token'] ?>">

                            <label for="date">Date du projet:</label>
                            <input type="text" name="date" id="date" class="input-field"><br>

                            <label for="place">Lieu:</label>
                            <input type="text" name="place" id="place" class="input-field"><br>

                            <label for="category">Categorie de projet:</label>
                            <input type="text" name="category" id="category" class="input-field"><br>

                            <label for="title">Nom du projet<span style="color: red"> *</span> :</label>
                            <input type="text" name="title" id="title" class="input-field" required><br>

                            <label for="accroche">Phrase d'accroche:</label>
                            <input type="text" name="accroche" id="accroche" class="input-field"><br>

                            <label for="description">Description du projet:</label>
                            <textarea name="description" id="description" class="textarea-field" rows="12" cols="12"></textarea><br>

                            <label for="goal">Objectif du projet:</label>
                            <input type="text" name="goal" id="goal" class="input-field"><br>

                            <label for="how-we-do">Comment s'est passé le projet:</label>
                            <textarea name="how-we-do" id="how-we-do" class="textarea-field" rows="12" cols="12" ></textarea><br>

                            <label for="results">Resultats:</label>
                            <textarea name="results" id="results" class="textarea-field"  rows="8" cols="12"></textarea><br>

                            <button type="submit" class="button js-project-submission" onclick="createProject()">Créer un projet</button>
                        </form>
                    </div>
                </div>
            </section>
        </div>
        <div class="col-12 col-lg-6">
            <section class="els-projects-list">
                    <div class="projects-list-wrapper">
                        <h3 class="title title--secondary"> Liste des projets : </h3>
                        <ul class="els-list">
                            <?php
                            if(!empty($projects)) {
                                foreach ($projects as $project) {
                                    echo '<li>' . $project['id'] . ' : ' . $project['title'] . ' <a href="/delete-project?project-id=' . $project['id'] . '">Supprimer</a></li>';
                                }
                            }
                            ?>
                        </ul>
                    </div>
            </section>
        </div>
    </div>
    <div class="row">
        <div class="col-12 col-lg-6">
            <section class="els-image-form">
                <?php if(isset($projects)) {
                if(count($projects) > 0) { ?>
                    <div class="title-wrapper">
                        <h3 class="title title--secondary"> Allouer une image : </h3>
                    </div>
                    <div class="form-image-wrapper">
                            <form class="images-form" action="/upload" method="post" enctype="multipart/form-data">
                                <div class="select-wrapper">
                                    <p class="els-text-xs els-text--bold">Choisir un Projet:</p>
                                    <label class="custom-select input-label els-text-lg" for="project" aria-label="Sélectionner un des projets">
                                        <select name="project" id="project" required>
                                            <?php
                                            foreach ($projects as $project) {
                                                echo '<option value="' . $project['id'] . '">' . $project['id'] . ' : ' . $project['title']. '</option>';
                                            }
                                            ?>
                                        </select>
                                        <span class="select-icon">
                             <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-chevron-down"><path d="m6 9 6 6 6-6"/></svg>
                        </span>

                                    </label>
                                </div>
                                <div class="upload-wrapper">
                                    <p class="els-text-xs els-text--bold">Télécharger une image depuis vos dossiers&nbsp;: <br/><small class="els-text">(formats acceptés: jpeg, jpg, png, webp)</small></p>
                                    <label class="input-upload-label" for="image">
                            <span>
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-download">
                                    <path d="M21 15v4a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2v-4"/><polyline points="7 10 12 15 17 10"/>
                                    <line x1="12" x2="12" y1="15" y2="3"/>
                                </svg>
                            </span>
                                        <input type="file" name="image" id="image" accept="image/jpeg, image/webp, image/jpg, image/png" required>
                                    </label>
                                </div>
                                <div class="submit-container">
                                    <button class="button" type="submit">Valider</button>
                                </div>

                            </form>
                        </div>
                    <?php } ?>
                    <?php } ?>
            </section>
        </div>
        <div class="col-12 col-lg-6">
            <section class="els-cooking-img-list-wrapper">
                <div class="">
                    <div class="">
                        <h3 class="title title--secondary"> Vos images : </h3>
                    </div>
                </div>
                <div class="images-list">

                    <?php
                    $imgCleanPath = "";
                    foreach ($projects as $project) {
                        if($project['project-img']) {
                            $filename = basename($project['project-img']);
                            $dirname = dirname($project['project-img']);
                            $document_root = $_SERVER['DOCUMENT_ROOT'];
                            $imgCleanPath = str_replace('\\', '/', str_replace($document_root, '', $dirname . '/' . $filename));
                        }
                        ?>
                        <div class="">
                            <div class="images-list__text-wrapper tooltip" data-text="<?php echo $project['title'] ?>">
                                <p class="images-list-text text-nowrap text-ellipsis els-text-xs els-text--bold els-text--centered"><?php echo $project['title'] ?></p>
                            </div>
                            <div class="images-list__img-wrapper">
                                <img src="<?php echo $imgCleanPath ?? "" ?>" alt="" height="100" width="100">
                            </div>
                        </div>

                    <?php } ?>
                </div>

            </section>
        </div>
    </div>
<!--    <section class="project-form__wrapper">-->
<!--        <div class="row project-form__title-wrapper">-->
<!--            <div class="col-12">-->
<!--                <h3 class="title title--secondary">I. Décrivez votre projet :</h3>-->
<!--            </div>-->
<!--        </div>-->
<!--        <div class="row project-form__form-wrapper">-->
<!--            <div class="col-12">-->
<!--                <form class="project-form" method="post" action="">-->
<!---->
<!--                    <input type="hidden" name="csrf_token" value="--><?php //echo $data['crsf_token'] ?><!--">-->
<!---->
<!--                    <label for="date">Date du projet:</label>-->
<!--                    <input type="text" name="date" id="date" class="input-field"><br>-->
<!---->
<!--                    <label for="place">Lieu:</label>-->
<!--                    <input type="text" name="place" id="place" class="input-field"><br>-->
<!---->
<!--                    <label for="category">Categorie de projet:</label>-->
<!--                    <input type="text" name="category" id="category" class="input-field"><br>-->
<!---->
<!--                    <label for="title">Nom du projet<span style="color: red"> *</span> :</label>-->
<!--                    <input type="text" name="title" id="title" class="input-field" required><br>-->
<!---->
<!--                    <label for="accroche">Phrase d'accroche:</label>-->
<!--                    <input type="text" name="accroche" id="accroche" class="input-field"><br>-->
<!---->
<!--                    <label for="description">Description du projet:</label>-->
<!--                    <textarea name="description" id="description" class="textarea-field" rows="12" cols="12"></textarea><br>-->
<!---->
<!--                    <label for="goal">Objectif du projet:</label>-->
<!--                    <input type="text" name="goal" id="goal" class="input-field"><br>-->
<!---->
<!--                    <label for="how-we-do">Comment s'est passé le projet:</label>-->
<!--                    <textarea name="how-we-do" id="how-we-do" class="textarea-field" rows="12" cols="12" ></textarea><br>-->
<!---->
<!--                    <label for="results">Resultats:</label>-->
<!--                    <textarea name="results" id="results" class="textarea-field"  rows="8" cols="12"></textarea><br>-->
<!---->
<!--                    <button type="submit" class="button js-project-submission" onclick="createProject()">Créer un projet</button>-->
<!--                </form>-->
<!--            </div>-->
<!--        </div>-->
<!--    </section>-->



<!--    <section class="els-projects-list">-->
<!--        <div class="row">-->
<!--            <div class="col-12">-->
<!--                --><?php //if(!empty($_GET["success"])) { ?>
<!--                    <p class="cooking-success-text els-text-lg els-text--centered els-text--blue">--><?php //echo $_GET['success'] ?? "" ?><!--</p>-->
<!--                    <script>-->
<!--                        const success = document.querySelector(".cooking-success-text");-->
<!--                        setTimeout(() => {-->
<!--                            success.style.display = "none";-->
<!--                        }, 2000)-->
<!--                    </script>-->
<!--                --><?php //} ?>
<!--                --><?php //if(!empty($_GET["error"])) { ?>
<!--                    <p class="els-text-lg els-text--centered" style="color:red">--><?php //echo $_GET['error'] ?><!--</p>-->
<!--                --><?php //} ?>
<!--            </div>-->
<!--        </div>-->
<!--        <div class="row">-->
<!--          <div class="col-12">-->
<!--              <h3 class="els-text-lg els-text--bold"> Liste des projets créés: </h3>-->
<!--              <ul class="els-list">-->
<!--                  --><?php
//                  if(!empty($projects)) {
//                      foreach ($projects as $project) {
//                          echo '<li>' . $project['id'] . ' : ' . $project['title'] . ' <a href="/delete-project?project-id=' . $project['id'] . '">Supprimer</a></li>';
//                      }
//                  }
//                  ?>
<!--              </ul>-->
<!--          </div>-->
<!--        </div>-->
<!--    </section>-->

</main>
