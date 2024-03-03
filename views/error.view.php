<?php if ($_SERVER['REQUEST_METHOD'] == 'GET' && realpath(__FILE__) == realpath($_SERVER['SCRIPT_FILENAME'])) {
    header('HTTP/1.0 403 Forbidden', TRUE, 403);
    die();
} ?>
<div className="error-page">
    <div className="error-wrapper">
        <h1> Erreur 404 </h1>
        <a class="" href="/">Retour à l'accueil</a>
    </div>
</div>
