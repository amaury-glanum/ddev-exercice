<?php
if ($_SERVER['REQUEST_METHOD'] == 'GET' && realpath(__FILE__) == realpath($_SERVER['SCRIPT_FILENAME'])) {
header('HTTP/1.0 403 Forbidden', TRUE, 403);
die();
} ?>
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

</style>

<main id="homepage" class="<?php echo $page_css_id ?>">
    <form id="projectForm" method="post">

        <input type="hidden" name="csrf_token" value="">

        <label for="id">Identifiant unique du projet:</label>
        <input type="text" name="id" id="id" class="input-field" required><br>

        <label for="date">Date:</label>
        <input type="text" name="date" id="date" class="input-field"><br>

        <label for="place">Lieu:</label>
        <input type="text" name="place" id="place" class="input-field" ><br>

        <label for="category">Categorie de projet:</label>
        <input type="text" name="category" id="category" class="input-field"><br>

        <label for="title">Nom du projet:</label>
        <input type="text" name="title" id="title" class="input-field" ><br>

        <label for="accroche">Phrase d'accroche:</label>
        <input type="text" name="accroche" id="accroche" class="input-field"><br>

        <label for="description">Description du projet:</label>
        <textarea name="description" id="description" class="textarea-field"></textarea><br>

        <label for="goal">Objectifs du projet:</label>
        <textarea name="goal" id="goal" class="textarea-field" rows="12" cols="12"></textarea><br>

        <label for="how-we-do">Comment s'est passé le projet:</label>
        <textarea name="how-we-do" id="how-we-do" class="textarea-field" rows="12" cols="12" ></textarea><br>

        <label for="results">Resultats:</label>
        <textarea name="results" id="results" class="textarea-field"  rows="8" cols="12"></textarea><br>

        <button type="button" class="button js-project-submission" onclick="createProject()">Créer un projet</button>
    </form>
</main>
