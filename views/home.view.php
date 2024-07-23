<?php
if ($_SERVER['REQUEST_METHOD'] == 'GET' && realpath(__FILE__) == realpath($_SERVER['SCRIPT_FILENAME'])) {
    header('HTTP/1.0 403 Forbidden', TRUE, 403);
    die();
}
use Els\Entity\Projects;

$members = $data['members'] ?? "";
$projects = $data['projects'] ?? "";


$jsonMembers = [
    [
        'nom' => 'Kpeglo Bessou',
        'prenom' => 'Kokou Jacques',
        'img' => ['src'=>'./assets/img/persons/persons-man.jpg', 'alt'=>"personne"],
        'email' => 'email@mail.com',
        'role' => 'Président du Conseil d\'Administration'
    ],
    [
        'nom' => 'Azanli',
        'prenom' => 'Koffi Djifa',
        'img' => ['src'=>'./assets/img/persons/persons-man.jpg', 'alt'=>"personne"],
        'email' => 'email@mail.com',
        'role' => 'Directeur exécutif'
    ],
    [
        'nom' => 'Dewa Kassa',
        'prenom' => 'Kodjo Akonta Florent',
        'img' => ['src'=>'./assets/img/persons/persons-man.jpg', 'alt'=>"personne"],
        'email' => 'email@mail.com',
        'role' => 'Responsable planification et suivi'
    ],
    [
        'nom' => 'Tate',
        'prenom' => 'Yawo Akponi',
        'img' => ['src'=>'./assets/img/persons/persons-man.jpg', 'alt'=>"personne"],
        'email' => 'email@mail.com',
        'role' => 'Coordonnateur de l\'association'
    ],
];

$partners = [
    [
        'link' => [ 'href' => '', 'text'=>''],
        'img' => ['src' =>'./assets/img/icons/handshake.png', 'alt'=> 'handshakes'],
        'partner-name' => 'partner'
    ],
    [
        'link' => [ 'href' => '', 'text'=>''],
        'img' => ['src' =>'./assets/img/icons/handshake.png', 'alt'=> 'handshakes'],
        'partner-name' => 'partner'
    ],
    [
        'link' => [ 'href' => '', 'text'=>''],
        'img' => ['src' =>'./assets/img/icons/handshake.png', 'alt'=> 'handshakes'],
        'partner-name' => 'partner'
    ],
    [
        'link' => [ 'href' => '', 'text'=>''],
        'img' => ['src' =>'./assets/img/icons/handshake.png', 'alt'=> 'handshakes'],
        'partner-name' => 'partner'
    ],
];

?>

<main id="homepage" class="<?php echo $page_css_id ?>">

    <section id="hero" class="image-text">
        <div class="container">
            <div class="row mainRow">
                <div class="col-12 col-lg-6 image-text__textWrapper">
                    <div class="pre-title">Association ELS - Togo</div>
                    <div class="title">Nous aidons à développer l'éducation, les loisirs et la santé.</div>
                    <p class="els-text-lg">Nous pensons que chacun a le droit d'être éduqué, soigné et protégé. Nous apportons notre pierre pour que chacun puisse vivre dans un environnement sain.</p>
                    <a href="#contact" class="button">Je veux m'engager</a>
                </div>
                <div class="col-12 col-lg-6 ps-lg-5 image-text__imageWrapper">
                    <img src="/assets/img/livre-ecole.jpg" alt="école" />
                </div>
            </div>
        </div>
    </section>

    <?php if(!empty($projects)) { ?>
    <section id="nos-projets" class="projects-section">
        <div class="projects-section-inner container">
            <div class="content">
                <div class="image-text__textWrapper">
                    <div class="pre-title">Nos projets</div>
                    <div class="title">Découvrez nos projets.</div>
                    <p>Nos projets incarnent la force et la diversité de nos convictions. Nous nous engageons avec les populations locales afin d'avancer ensemble.
                        Nous mettons un point d'honneur à la coopération et l'autonomisation.</p>
                </div>
            </div>
            <div class="swiper-container els-swiper-projects <?php echo count($projects) < 3 ? "minimal-view" : "" ?>">
                <div class="swiper">
                    <div class="swiper-wrapper">
                        <?php
                            $i = 1;
                            foreach($projects as $project) { ?>
                                <div
                                    class="swiper-slide"
                                    data-imageid="<?php echo $project->getProjectImgUrl() ?>"
                                >
                                        <span><?php echo $project->getProjectDate() ?></span>

                                        <div class="swiper__inner-btn">
                                            <a class="button button--secondary button--radius-light" href="/project?project-page-id=<?php echo $i ?>">En savoir + </a>
                                        </div>
                                        <div class="slide-content">
                                            <h3 class="els-title"><?php echo $project->getProjectTitle() ?? "Aucun titre"; ?></h3>
                                            <p class="els-text els-text--white"><?php echo $project->getProjectPlace() ?? "Aucune ville" ?></p>
                                        </div>

                                </div>
                                <?php $i++; } ?>
                    </div>
                </div>
                <div class="swiper-pagination"></div>
            </div>
        </div>
    </section>
    <?php } ?>

    <?php /*
<!--<section id="nos-partenaires" class="items-rows">-->
<!--            <div class="container">-->
<!--                <div class="row">-->
<!--                    <div class="col-12">-->
<!--                        <div class="pre-title">Nos partenaires</div>-->
<!--                    </div>-->
<!--                </div>-->
<!--                <div class="row mainRow">-->
<!--                    --><?php //foreach ($partners as $partner) { ?>
<!--                    <div class="col-sm-6 col-md-4 col-xl-2">-->
<!--                        <img src="--><?php //echo $partner['img']['src'] ?? ""; ?><!--" alt="$partner['img']['alt'] ?? "";"/>-->
<!--                    </div>-->
<!--                    --><?php //} ?>
<!--                </div>-->
<!--            </div>-->
<!--        </section>-->
*/ ?>
    <section id="mission" class="mission-section">
        <div class="container">
            <div class="row">
                <div class="col-md-12 text-center">
                    <h2 class="pre-title pre-title--light pre-title--centered">Notre Mission & nos valeurs</h2>
                    <p class="my-5 els-text-lg els-text--light els-text--centered">Nous contribuons à l'amélioration du cadre de vie des personnes. <br/> Pour ce faire nous promouvons une éducation de qualité et inclusive.</p>
                </div>
            </div>
            <div class="row value-cards">
                <!-- Carte 1 -->
                <div class="col-lg-4">
                    <div class="card">
                        <div class="card-image">
                            <img src="/assets/img/icons/5236.jpg" alt="personnes tenant des feuilles" />
                        </div>
                        <div class="card-body">
                            <h5 class="card-title">Dignité</h5>
                            <p class="card-text">Nous respectons chaque personne et groupe que nous aidons. Nous préférons ainsi accompagner plutôt qu'assister au nom de la dignité.</p>
                        </div>
                    </div>
                </div>
                <!-- Carte 2 -->
                <div class="col-lg-4">
                    <div class="card">
                        <div class="card-image">
                            <img src="/assets/img/icons/5236.jpg" alt="mains assemblant un puzzle" />
                        </div>
                        <div class="card-body">
                            <h5 class="card-title">Amour</h5>
                            <p class="card-text">Nos engagements se font grâce à la formidable force que nous donne l'amour.</p>
                        </div>
                    </div>
                </div>
                <!-- Carte 3 -->
                <div class="col-lg-4">
                    <div class="mb-5 card">
                        <div class="card-image">
                            <img src="/assets/img/icons/5236.jpg" alt="mains assemblant un puzzle" />
                        </div>
                        <div class="card-body">
                            <h5 class="card-title">Franchise</h5>
                            <p class="card-text">Nous valorisons l'authenticité et l'intégrité. Nous mettons un point d'honneur à être transparent avec nos bénévoles, nos donateurs et nos parties prenantes.</p>
                        </div>
                    </div>
                </div>
                <!-- Carte 4 -->
                <div class="col-lg-4">
                    <div class="mb-5 card">
                        <div class="card-image">
                            <img src="/assets/img/icons/5236.jpg" alt="mains assemblant un puzzle" />
                        </div>
                        <div class="card-body">
                            <h5 class="card-title">Partage</h5>
                            <p class="card-text">Chaque mission est l'occasion de partager des choses ou des mots avec autrui peu importe d'où il vient. Ce partage s'incarne dans l'échange, la rencontre, le don.</p>
                        </div>
                    </div>
                </div>
            </div>
    </section>

    <?php if(!empty($members)) { ?>
    <section id="qui-sommes-nous" class="text-cards-horizon team-section">
        <div class="container">
            <div class="row mainRow">
                <div class="col-12 text-cards-horizon__textWrapper">
                    <div class="pre-title pre-title--centered">Notre équipe</div>
                    <div class="title title--centered">Une équipe engagée pour rendre le monde meilleur</div>
                    <p class="els-text-lg els-text-centered">Depuis 2010, nous nous sommes engagées ensemble et avons bâti pierre par pierre cette association. Découvrez le parcours des membres fondateurs.</p>
                </div>
                <div class="col-12 text-cards-horizon__cardsWrapper">
                    <?php foreach($members as $member) { ?>
                            <div data-typebtn="team-btn" class="box modal-open-btn"
                                 data-title="<?php echo $member->getNom() . $member->getPrenom() ?>">
                                <div class="top-bar"></div>
                                <div class="content">
                                    <img src="<?php echo $member->getImgPath() ?? "" ?>" alt="<?php echo $member->getPrenom() . " " . $member->getNom() ?? '' ?>">
                                    <strong><?php echo $member->getPrenom() ?? "" ?></strong>
                                    <p><?php echo $member->getNom() ?? "" ?></p>
                                    <?php echo $member->getEmail() ?? "" ?>
                                </div>
                                <div class="box-footer">
                                    <p><?php echo $member->getRole() ?? "" ?></p>
                                </div>
                            </div>

                        <?php } ?>
                </div>
            </div>
        </div>
    </section>
    <?php } ?>



    <?php /*
<!---->
<!--<section id="nos-valeurs" class="nos-avantages boxed section--centered">-->
<!--    <div class="container">-->
<!---->
<!--        <div class="boxedWrapper">-->
<!--            <div class="els-pre-title">Nos valeurs</div>-->
<!---->
<!--            <div class="row mainRow">-->
<!--            --><?php //foreach($items as $item) { ?>
<!--                <div class="col-12 col-md-6 col-xl-4">-->
<!--                    <div class="item__icon"><img src="./assets/img/icons/handshake.png" alt="handshake by @lakonicon" /></div>-->
<!--                    <div class="item__title">--><?php //echo $item['title']; ?><!--</div>-->
<!--                    <p class="item__text">--><?php //echo $item['description']; ?><!--</p>-->
<!--                </div>-->
<!--            --><?php //} ?>
<!--            </div>-->
<!--        </div>-->
<!--    </div>-->
<!--</section>-->

<!--<section id="nos-avantages">-->
<!--            <div class="container">-->
<!--                <div class="container__inner">-->
<!--                    <div class="row upperRow">-->
<!--                        <div class="col-12">-->
<!--                            <div class="pre-title-lg pre-title--centered">Nos Atouts</div>-->
<!--                            <h2 class="title-lg title-lg--centered">Nos atouts sont nombreux</h2>-->
<!--                        </div>-->
<!--                    </div>-->
<!--                    <div class="row mainRow">-->
<!--                        <div class="box-asset col-12 col-md-6 col-xl-4">-->
<!--                            <i class="box-asset__icon icon-home"></i>-->
<!--                            <h3 class="box-asset__title">Innovant</h3>-->
<!--                            <p class="box-asset__text">Lorem ipsum dolor sit amet, consectetur adipisicing elit. At quidem corporis,-->
<!--                                provident dolore cumque porro nostrum</p>-->
<!--                        </div>-->
<!--                        <div class="box-asset col-12 col-md-6 col-xl-4">-->
<!--                            <i class="box-asset__icon icon-home"></i>-->
<!--                            <h3 class="box-asset__title">Innovant</h3>-->
<!--                            <p class="box-asset__text">Lorem ipsum dolor sit amet, consectetur adipisicing elit. At quidem corporis,-->
<!--                                provident dolore cumque porro nostrum</p>-->
<!--                        </div>-->
<!--                        <div class="box-asset col-12 col-md-6 col-xl-4">-->
<!--                            <i class="box-asset__icon icon-home"></i>-->
<!--                            <h3 class="box-asset__title">Innovant</h3>-->
<!--                            <p class="box-asset__text">Lorem ipsum dolor sit amet, consectetur adipisicing elit. At quidem corporis,-->
<!--                                provident dolore cumque porro nostrum</p>-->
<!--                        </div>-->
<!--                        <div class="box-asset col-12 col-md-6 col-xl-4">-->
<!--                            <i class="box-asset__icon icon-home"></i>-->
<!--                            <h3 class="box-asset__title">Innovant</h3>-->
<!--                            <p class="box-asset__text">Lorem ipsum dolor sit amet, consectetur adipisicing elit. At quidem corporis,-->
<!--                                provident dolore cumque porro nostrum</p>-->
<!--                        </div>-->
<!--                        <div class="box-asset col-12 col-md-6 col-xl-4">-->
<!--                            <i class="box-asset__icon icon-home"></i>-->
<!--                            <h3 class="box-asset__title">Innovant</h3>-->
<!--                            <p class="box-asset__text">Lorem ipsum dolor sit amet, consectetur adipisicing elit. At quidem corporis,-->
<!--                                provident dolore cumque porro nostrum</p>-->
<!--                        </div>-->
<!--                        <div class="box-asset col-12 col-md-6 col-xl-4">-->
<!--                            <i class="box-asset__icon icon-home"></i>-->
<!--                            <h3 class="box-asset__title">Innovant</h3>-->
<!--                            <p class="box-asset__text">Lorem ipsum dolor sit amet, consectetur adipisicing elit. At quidem corporis,-->
<!--                                provident dolore cumque porro nostrum</p>-->
<!--                        </div>-->
<!--                    </div>-->
<!--                </div>-->
<!--            </div>-->
<!--        </section>-->

 */ ?>

    <section id="contact" class="main__section main__contact-section">
        <div class="container">
            <div class="row mb-5 col-12">
                <h2 class="pre-title pre-title--centered">Nous&nbsp;contacter</h2>
                <div class="my-3">
                    <p class="els-text-lg els-text--secondary els-text--centered">Si vous voulez vous engager avec nous, nous serons très heureux de vous accueillir: <br/> contactez-nous par email ou téléphone. </p>
                </div>
            </div>

            <div class="row">
                <div class="col-12 col-lg-6">
                    <div id="map" class="map"></div>
                </div>
                <div class="col-12 col-lg-6">
                    <div class="contact-container row justify-content-center">
                        <div class="contact-container__email">
                            <div class="">
                                <span class="pb-3 contact-address els-text els-text-lg">Basé à Tsévié, à 35km de Lomé.</span>
                                <span class="pb-3 contact-schedules els-text els-text-lg">Horaires d’ouverture : <br /> Nous n'avons pas d'horaires fixes. N'hésitez pas à nous laisser un message, nous vous rappellerons.</span>
                                <!--  need to be obfusctated -->
                                <a href="tel:+00000000000" class="pb-3 contact-tel els-text els-text-lg">(+000) 00 00 00 00</a>
                            </div>
                            <div class="contact-email-text els-text els-text-lg">
                                <a
                                    class="contact-email__link"
                                    href="#"
                                    data-email="ZWxzdG9nbzJAZ21haWwuY29t">
                                    [email-hidden]
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</main>
<!-- end homepage -->



<!-- MODAL  -->

<div class="modal">
    <article class="modal-container">
        <header class="modal-container-header">
            <div class="modal-container-title">
                <div class="title-wrapper">
                    <h1>Projet X</h1>
                </div>
            </div>
            <button class="modal-close-btn">
                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" width="24" height="24">
                    <path fill="none" d="M0 0h24v24H0z" />
                    <path fill="currentColor" d="M12 10.586l4.95-4.95 1.414 1.414-4.95 4.95 4.95 4.95-1.414 1.414-4.95-4.95-4.95 4.95-1.414-1.414 4.95-4.95-4.95-4.95L7.05 5.636z" />
                </svg>
            </button>
        </header>
        <section class="modal-container-body">
            <h2 class="title modal-body-title"></h2>

            <div class="modal-paragraph-wrapper">
                <p></p>
            </div>

        </section>
        <footer class="modal-container-footer">

        </footer>
    </article>
</div>
<!-- END MODAL  -->
