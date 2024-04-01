<?php
if ($_SERVER['REQUEST_METHOD'] == 'GET' && realpath(__FILE__) == realpath($_SERVER['SCRIPT_FILENAME'])) {
header('HTTP/1.0 403 Forbidden', TRUE, 403);
die();
}
?>

<main class="container">
    <div class="mt-5 row">
        <div class="col-12">
            <h1 class="pre-title pre-title--centered">Images utilisées sur le site </h1>
        </div>
    </div>
    <div class="mt-5 row">
        <div class="col-12 col-md-6">
            <h2 class="els-text-lg"> Images pour la section des valeurs : </h2>
            <ul class="els-list">
                <li><a href="https://fr.freepik.com/vecteurs-libre/mains-assemblant-illustration-concept-puzzle_43310016.htm#query=values&position=7&from_view=search&track=sph&uuid=6fde67c5-e0b4-47a6-b02c-194a9a46c286">Image de storyset</a> sur Freepik</li>
                <li><a href="https://fr.freepik.com/vecteurs-libre/personnes-tenant-icones-arbres-pour-sensibiliser-environnement_3226144.htm#query=values&position=3&from_view=search&track=sph&uuid=fd1964ad-c29d-4247-ae02-0efcdb00a9b1#position=3&query=values">Image de rawpixel.com</a> sur Freepik</li>
                <li><a href="https://fr.freepik.com/vecteurs-libre/employes-donnant-mains-aidant-leurs-collegues-monter-escaliers_7732609.htm#query=valeurs&position=1&from_view=keyword&track=sph&uuid=a6d33d0f-07d6-45b1-af8e-fc67a23f27c5">Image de pch.vector</a> sur Freepik</li>
            </ul>
        </div>
        <div class="col-12 col-md-6">
            <h2 class="els-text-lg"> Images pour la section des projets et de la team : </h2>
            <ul class="els-list">
                <li><a href="https://fr.freepik.com/search?format=search&freeSvg=free&last_filter=freeSvg&last_value=free&query=person&type=icon">Icône de UIcons</a></li>
                <li><a href="https://fr.freepik.com/icone/utilisateur_3917711#fromView=search&page=1&position=52&uuid=44b56f94-79f0-48c2-9fed-3fe8f55c6976">Icône de UIcons</a></li>
                <li><a href="https://fr.freepik.com/vecteurs-libre/personnes-etreignant-design-plat_8706671.htm#fromView=search&page=1&position=0&uuid=8fa5bdf9-8767-4d87-9988-288eec69b2eb">Projet Image par défaut: Image de freepik</a></li>
                <li><a href="https://fr.freepik.com/vecteurs-libre/femme-afro-heureuse_136484680.htm#fromView=search&page=1&position=11&uuid=1382af89-a28e-4487-a0f9-58ff31decf95">Image de studiogstock sur Freepik</a></li>
                <li><a href="https://fr.freepik.com/vecteurs-libre/jeune-homme-afro-souriant_136480363.htm#fromView=search&page=1&position=18&uuid=1382af89-a28e-4487-a0f9-58ff31decf95">Image de studiogstock sur Freepik</a></li>
            </ul>
        </div>
    </div>
</main>
