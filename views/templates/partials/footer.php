<?php if ($_SERVER['REQUEST_METHOD'] == 'GET' && realpath(__FILE__) == realpath($_SERVER['SCRIPT_FILENAME'])) {
    header('HTTP/1.0 403 Forbidden', TRUE, 403);
    die();
}
?>
<footer class="els-footer">
    <div class="container">
        <div class="row mainRow">
            <div class="col-12 col-lg-6">
                <div class="text--light text-xs">
                    <span>&copy;</span> 2024 Els-Togo
                </div>
            </div>
            <div class="col-12 col-lg-6">
                <ul class="footer-list">
                    <li class="text--light text-xs modal-open-btn"><a href="/legal">Mentions légales</a></li>
                    <li class="text--light text-xs modal-open-btn"><a href="/confidentiality">Politique de confidentialité</a></li>
                    <li class="text--light text-xs modal-open-btn"><a href="/credits">Crédits</a></li>
                </ul>
            </div>
        </div>
    </div>
</footer>
