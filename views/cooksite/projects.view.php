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


$projectsJson = file_get_contents($_SERVER['DOCUMENT_ROOT'] . '/assets/data/projects.json');
$projects = json_decode($projectsJson, true);
$uploadsDir = $_SERVER['DOCUMENT_ROOT'] . '/uploads/';
?>
<style>
    /* styles.css */

    form {
        max-width: 600px;
        margin: 150px auto;
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

    .els-form form {
        max-width: 600px;
        margin: 20px auto;
        padding: 20px;
        background-color: #fff;
        box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        display: flex;
        flex-direction: column;
    }

    .els-form label {
        margin-bottom: 8px;
        font-weight: bold;
    }

    .els-form select,
    .els-form input[type="file"] {
        width: 100%;
        padding: 8px;
        margin-bottom: 16px;
        box-sizing: border-box;
    }

    .els-form button {
        background-color: #4caf50;
        color: #fff;
        padding: 10px 15px;
        border: none;
        cursor: pointer;
        font-size: 16px;
    }

    .els-form button:hover {
        background-color: #45a049;
    }

    /* Container Styles */
    .els-form .containerForm {
        max-width: 800px;
        margin: 20px auto;
    }

    .els-form h2 {
        color: #333;
    }

    .els-form ul {
        list-style-type: none;
        padding: 0;
    }

    .els-form li {
        margin-bottom: 10px;
    }

    .els-form a {
        color: #4caf50;
        text-decoration: none;
    }

    .els-form a:hover {
        text-decoration: underline;
    }

    .els-form img {
        margin-right: 10px;
        margin-bottom: 10px;
        border: 1px solid #ddd;
        border-radius: 4px;
        padding: 5px;
    }

</style>

<main id="cooking-page" class="<?php echo $page_css_id ?>">
    <form id="projectForm" method="post">

        <input type="hidden" name="csrf_token" value="<?php echo $data['crsf_token'] ?>">

        <label for="date">Date du projet:</label>
        <input type="text" name="date" id="date" class="input-field" required><br>

        <label for="place">Lieu:</label>
        <input type="text" name="place" id="place" class="input-field" required><br>

        <label for="category">Categorie de projet:</label>
        <input type="text" name="category" id="category" class="input-field"><br>

        <label for="title">Nom du projet:</label>
        <input type="text" name="title" id="title" class="input-field" required><br>

        <label for="accroche">Phrase d'accroche:</label>
        <input type="text" name="accroche" id="accroche" class="input-field"><br>

        <label for="description">Description du projet:</label>
        <textarea name="description" id="description" class="textarea-field" rows="12" cols="12"></textarea><br>

        <label for="goal">Objectif du projet:</label>
        <input type="text" name="goal" id="goal"><br>

        <label for="how-we-do">Comment s'est passé le projet:</label>
        <textarea name="how-we-do" id="how-we-do" class="textarea-field" rows="12" cols="12" ></textarea><br>

        <label for="results">Resultats:</label>
        <textarea name="results" id="results" class="textarea-field"  rows="8" cols="12"></textarea><br>

        <button type="button" class="button js-project-submission" onclick="createProject()">Créer un projet</button>
    </form>

    <section class="els-form">
        <p class="pre-title--centered"> Une fois le projet créé, il faut lui allouer une image pour sa slide ici. </p>
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
        <input type="file" name="image" id="image" accept="image/jpeg, image/webp" required>
        <button type="submit">Upload</button>
    </form>

    <div class="containerForm container">

        <div class="row">
            <?php if(!empty($_GET["success"])) { ?>
            <p class="els-text-lg els-text--centered els-text--blue"><?php echo $_GET['success'] === "image-nouvelle" ? "Nouvelle image créé" : "" ?></p>
            <p class="els-text-lg els-text--centered els-text--blue"><?php echo $_GET['success'] === "projet-nouveau" ? "Nouveau projet créé" : "" ?></p>
            <?php } ?>
            <?php if(!empty($_GET["error"])) { ?>
            <p class="els-text-lg els-text--centered" style="color:red"><?php echo $_GET['error'] ?></p>
            <?php } ?>
        </div>
        <div class="row">
            <h3 class="els-text-lg"> Liste des projets créés: </h3>
            <ul>
                <?php
                foreach ($projects as $project) {
                    echo '<li>' . $project['id'] . ' : ' . $project['title'] . ' <a href="/delete-project?project-id=' . $project['id'] . '">Supprimer</a></li>';
                }
                ?>
            </ul>
            <h3 class="els-text-lg"> Vos images de projets: </h3>
                <?php
                   foreach ($projects as $project) { ?>
                    <img src="<?php echo $project['project-img'] ?? "" ?>" alt="" height="100" width="100">
                <?php } ?>
        </div>
    </div>
    </section>
</main>
