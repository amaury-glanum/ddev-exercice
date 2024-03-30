<?php
if ($_SERVER['REQUEST_METHOD'] == 'GET' && realpath(__FILE__) == realpath($_SERVER['SCRIPT_FILENAME'])) {
header('HTTP/1.0 403 Forbidden', TRUE, 403);
die();
};
if($_SESSION['csrf_token'] !== $data['crsf_token']) {
    header('HTTP/1.0 403 Forbidden', TRUE, 403);
    exit();
}

if(isset($_GET['success'])) {
    if($_GET['success'] === 'projet-nouveau' || $_GET['success'] === 'image-nouvelle' || $_GET['success'] === 'suppression-projet') {
//        echo '<script type="text/JavaScript">
//            setTimeout(() => {
//                location.reload();
//            }, 10);
//
//
//           </script>';
    }
}


$projectsJson = file_get_contents($_SERVER['DOCUMENT_ROOT'] . '/assets/data/project.json');
$projects = json_decode($projectsJson, true);
$uploadsDir = $_SERVER['DOCUMENT_ROOT'] . '/uploads/';
?>
<style>

    #cooking-page {
        background: #fff;
    }

    .project-form__wrapper {
        background: #fff;
        margin-top: 150px;
        padding-bottom: 30px;
    }

    .project-form__title-wrapper {
        margin-bottom: 30px;
    }

    form {
        margin-top: 20px auto;
        max-width: 100%;
        padding: 20px;
        background-color: #fff;
        box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
    }

    label {
        display: block;
        margin-bottom: 8px;
        font-weight: bold;
    }

    .input-field {
        width: 100%;
        padding: 8px;
        margin-bottom: 16px;
        box-sizing: border-box;
    }

    .textarea-field {
        width: 100%;
        padding: 8px;
        margin-bottom: 16px;
        box-sizing: border-box;
    }

    .button {
        background-color: #4caf50;
        color: #fff;
        padding: 10px 15px;
        border: none;
        cursor: pointer;
        font-size: 16px;
    }

    .button:hover {
        background-color: #45a049;
    }

    /* Image upload form */

    .els-image-form {
        background: #fff;
    }

    .els-image-form form {
        max-width: 600px;
        margin: 20px 0;
        background-color: #fff;
        box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        display: flex;
        flex-direction: column;
    }

    .els-image-form label {
        margin-bottom: 8px;
        font-weight: bold;
    }

    .els-image-form select,
    .els-image-form input[type="file"] {
        width: 100%;
        padding: 8px;
        margin-bottom: 16px;
        box-sizing: border-box;
    }

    .els-image-form button {
        background-color: #4caf50;
        color: #fff;
        padding: 10px 15px;
        border: none;
        cursor: pointer;
        font-size: 16px;
    }

    .els-image-form button:hover {
        background-color: #45a049;
    }

    .els-image-form a {
        color: #4caf50;
        text-decoration: none;
    }

    .els-image-form a:hover {
        text-decoration: underline;
    }

    .els-image-form img {
        width: 100%;
        object-fit: contain;
        margin-right: 10px;
        margin-bottom: 10px;
        border: 1px solid #ddd;
        border-radius: 4px;
        padding: 5px;
    }

    /* project list */
    .els-projects-list {
        padding: 20px;
        background: #fff;
    }

    .els-cooking-img-wrapper {
        background: #fff;
        margin-bottom: 150px;
    }

    .els-cooking-img-wrapper .img-wrapper {
        margin: 10px;
        padding: 10px;
        border: 1px solid #000b21;
        border-radius: 10px;
    }

</style>

<main id="cooking-page" class="<?php echo $page_css_id ?>">

    <section class="container project-form__wrapper">
        <div class="row project-form__title-wrapper">
            <div class="col-12">
                <h3 class="title title--secondary">Décrivez votre projet :</h3>
            </div>
        </div>
        <div class="row">
            <div class="col-12">
                <form id="projectForm" method="post">

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

                    <button type="button" class="button js-project-submission" onclick="createProject()">Créer un projet</button>
                </form>
            </div>
        </div>
    </section>

    <section class="els-image-form container">
    <?php if(count($projects) !== null && count($projects) > 0) { ?>
        <div class="row">
            <div class="col-12">
                <h3 class="els-text"> Une fois le projet créé, il faut lui allouer une image pour sa slide ici. </h3>
            </div>
        <div/>
        <div class="row">
            <div class="col-12">
                <form action="/upload" method="post" enctype="multipart/form-data">
                    <label for="project">Choisir un Project:</label>
                    <select name="project" id="project" required>
                        <!-- Populate the dropdown with projects from projects.json -->
                        <?php


                        foreach ($projects as $project) {
                            echo '<option value="' . $project['id'] . '">' . $project['id'] . ' : ' . $project['title']. '</option>';
                        }
                        ?>
                    </select>

                    <label for="image">Choisir une image pour le projet choisi:</label>
                    <input type="file" name="image" id="image" accept="image/jpeg, image/webp, image/jpg, image/png" required>
                    <button type="submit">Upload</button>
                </form>
            </div>
        </div>

    <?php } ?>
    </section>

    <section class="els-projects-list container">
        <div class="row">
            <div class="col-12">
                <?php if(!empty($_GET["success"])) { ?>
                    <p class="cooking-success-text els-text-lg els-text--centered els-text--blue"><?php echo $_GET['success'] ?? "" ?></p>
                    <script>
                        const success = document.querySelector(".cooking-success-text");
                        setTimeout(() => {
                            success.style.display = "none";
                        }, 2000)
                    </script>
                <?php } ?>
                <?php if(!empty($_GET["error"])) { ?>
                    <p class="els-text-lg els-text--centered" style="color:red"><?php echo $_GET['error'] ?></p>
                <?php } ?>
            </div>
        </div>
        <div class="row">
          <div class="col-12">
              <h3 class="els-text-lg els-text--bold"> Liste des projets créés: </h3>
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
        </div>
    </section>
    <section class="els-cooking-img-wrapper container">
        <div class="row">
            <div class="col-12">
                <h3 class="els-text-lg els-text--bold"> Vos images : </h3>
            </div>
        </div>
        <div class="row">
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
                <div class="col-auto img-wrapper">
                    <img src="<?php echo $imgCleanPath ?? "" ?>" alt="" height="100" width="100">
                </div>

            <?php } ?>
        </div>

    </section>
</main>
