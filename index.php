<?php 
$members = [
    [
        'name' => 'Kpeglo Bessou',
        'firstname' => 'Kokou Jacques',
        'img' => ['src'=>'https://images.pexels.com/photos/1689731/pexels-photo-1689731.jpeg?auto=compress&cs=tinysrgb&dpr=2&h=650&w=940', 'alt'=>""],
        'email' => 'email@mail.com',
        'role' => 'Président du Conseil d\'Administration'
    ],
    [
        'name' => 'Azanli',
        'firstname' => 'Koffi Djifa',
        'img' => ['src'=>'https://images.pexels.com/photos/2570145/pexels-photo-2570145.jpeg?auto=compress&cs=tinysrgb&dpr=3&h=750&w=1260', 'alt'=>""],
        'email' => 'email@mail.com',
        'role' => 'Directeur exécutif'
    ],
    [
        'name' => 'Dewa Kassa',
        'firstname' => 'Kodjo Akonta Florent',
        'img' => ['src'=>'https://images.pexels.com/photos/2826131/pexels-photo-2826131.jpeg?auto=compress&cs=tinysrgb&dpr=3&h=750&w=1260', 'alt'=>""],
        'email' => 'email@mail.com',
        'role' => 'Responsable planification et suivi'
    ],
    [
        'name' => 'Tate',
        'firstname' => 'Yawo Akponi',
        'img' => ['src'=>'https://images.pexels.com/photos/2826131/pexels-photo-2826131.jpeg?auto=compress&cs=tinysrgb&dpr=3&h=750&w=1260', 'alt'=>""],
        'email' => 'email@mail.com',
        'role' => 'Coordonnateur de l\'association'
    ],
];

$projects = [
    [
        'date-start' => "Dés 2024",
        'place' => "Tsévié, Togo",
        'title' => "Création d'un centre optique",
        'description' => "Création d'un centre optique social et solidaire",
        'goal' => "Améliorer l'acuité visuelle des jeunes et des personnes âgées dans le but  d'aider les populations vulnérables",
        'how-we-do' => "Organisation des missions humanitaires dans les milieux ruraux pauvres"
    ]
]


?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, minimum-scale=1, user-scalable=yes" />
    <title>Association ELS-Togo</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,100..900;1,100..900&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css" />
    <link rel="stylesheet" href="assets/build/style.css" />
</head>
<body>
    <header class="mainHeader">
        <div class="container">
            <div class="row align-items-center mainRow g-lg-0">
                <div class="col-auto logo">
                    <img src="assets/img/logo-els.jpg" alt="Logo ELS-TOGO">
                </div>
                <nav class="col nav">
                    <div class="row nav-and-cta g-lg-0">
                        <div class="col-auto me-lg-3">
                            <ul class="header-menu">
                                <li class="menu__nav-item"><a href="#mission">Notre mission</a></li>
                                <li class="menu__nav-item"><a href="#qui-sommes-nous">Qui sommes-nous ?</a></li>
                                <li class="menu__nav-item"><a href="#nos-projets">Nos projets</a></li>
                            </ul>
                        </div>
                        <div class="col-auto ms-lg-5">
                            <button class="button button--secondary">Nous contacter</button>
                        </div>
                    </div>
                </nav>
                <div class="col-auto burger-menu">
                    <button class="burger-menu__button" aria-label="Menu">
                        <svg viewBox="0 0 100 100">
                            <path class="line line1"
                                  d="M 20,29.000046 H 80.000231 C 80.000231,29.000046 94.498839,28.817352 94.532987,66.711331 94.543142,77.980673 90.966081,81.670246 85.259173,81.668997 79.552261,81.667751 75.000211,74.999942 75.000211,74.999942 L 25.000021,25.000058" />
                            <path class="line line2" d="M 20,50 H 80" />
                            <path class="line line3"
                                  d="M 20,70.999954 H 80.000231 C 80.000231,70.999954 94.498839,71.182648 94.532987,33.288669 94.543142,22.019327 90.966081,18.329754 85.259173,18.331003 79.552261,18.332249 75.000211,25.000058 75.000211,25.000058 L 25.000021,74.999942" />
                        </svg>
                    </button>
                </div>
            </div>
        </div>
    </header>


    <main id="homepage" class="page-home">
        <section id="hero" class="image-text">
            <div class="container">
                <div class="row mainRow">
                    <div class="col-12 col-lg-6 image-text__textWrapper">
                        <div class="pre-title">Association ELS - Togo</div>
                        <div class="title">Nous aidons à développer l'éducation, les loisirs et la santé.</div>
                        <p>Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua.</p>
                        <button class="button">Je veux m'engager</button>
                    </div>
                    <div class="col-12 col-lg-6 ps-lg-5 image-text__imageWrapper">
                        <img src="assets/img/livre-ecole.jpg" alt="école" />
                    </div>
                </div>
            </div>
        </section>
        <section id="mission" class="mission-section">
    <div class="container">
        <div class="row">
            <div class="col-md-12 text-center">
                <h2 class="pre-title--light">Notre Mission</h2>
                <p class="text-light-lg">Nous contribuons à l'amélioration du cadre de vie des personnes. Pour ce faire nous promouvons une éducation de qualité et inclusive.</p>
                <p class="text-light-lg">Nos champs d'action:</p>
                <ul>
                    <li class="els-text-xs--light">Sauver des vies</li>
                    <li class="els-text-xs--light">Protéger l'environnement</li>
                    <li class="els-text-xs--light">Lutter contre la faim</li>
                    <li class="els-text-xs--light">Offrir des moments de divertissements à tous</li>
                </ul>
            </div>
        </div>
        <div class="row">
            <div class="col-12 text-center">
                <h2 class="pre-title--light">Nos valeurs</h2>
            </div>
        <div class="row value-cards">
            <!-- Carte 1 -->
            <div class="col-md-4">
                <div class="card">
                    <div class="card-image">
                        <img src="/assets/img/icons/43089.jpg" alt="personnes tenant des feuilles" />
                    </div>
                    <div class="card-body">
                        <h5 class="card-title">Dignité</h5>
                        <p class="card-text">Lorem ipsum dolor sit amet, consectetur adipiscing elit.</p>
                    </div>
                </div>
            </div>
            <!-- Carte 2 -->
            <div class="col-md-4">
                <div class="card">
                <div class="card-image">
                        <img src="/assets/img/icons/9046651.jpg" alt="mains assemblant un puzzle" />
                    </div>
                    <div class="card-body">
                        <h5 class="card-title">Amour</h5>
                        <p class="card-text">Lorem ipsum dolor sit amet, consectetur adipiscing elit.</p>
                    </div>
                </div>
            </div>
            <!-- Carte 3 -->
            <div class="col-md-4">
                <div class="mb-5 card">
                    <div class="card-image">
                        <img src="/assets/img/icons/5236.jpg" alt="mains assemblant un puzzle" />
                    </div>
                    <div class="card-body">
                        <h5 class="card-title">Franchise</h5>
                        <p class="card-text">Lorem ipsum dolor sit amet, consectetur adipiscing elit.</p>
                    </div>
                </div>
            </div>
            <!-- Carte 4 -->
            <div class="col-md-4">
                <div class="mb-5 card">
                    <div class="card-image">
                        <img src="/assets/img/icons/5236.jpg" alt="mains assemblant un puzzle" />
                    </div>
                    <div class="card-body">
                        <h5 class="card-title">Partage</h5>
                        <p class="card-text">Lorem ipsum dolor sit amet, consectetur adipiscing elit.</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<section id="nos-projets" class="projects-section">
<div class="projects-section-inner container">
  <div class="content">
            <div class="image-text__textWrapper">
                <div class="pre-title">Nos projets</div>
                <div class="title">Découvrez nos projets.</div>
                <p>Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua.</p>
            </div>
  </div>
  <div class="swiper-container">
    <div class="swiper">
      <div class="swiper-wrapper">
        <div class="swiper-slide swiper-slide--one modal-open-btn">

          <span>15 avril - 12 mai</span>
          <div class="slide-content">
            <h3>Education</h3>
            <p>Tsévié</p>
          </div>
        </div>

        <div class="swiper-slide swiper-slide--two modal-open-btn">
          <span>15 avril - 12 mai</span>
          <div class="slide-content">
            <h3>Reboisement</h3>
            <p>Tsévié</p>

          </div>

        </div>
        <div class="swiper-slide swiper-slide--three modal-open-btn">
          <span>15 avril - 12 mai</span>

        </div>
        <div class="swiper-slide swiper-slide--four modal-open-btn">
          <span>15 avril - 12 mai</span>

        </div>
        <div class="swiper-slide swiper-slide--five modal-open-btn">
          <span>15 avril - 12 mai</span>

        </div>
        <div class="swiper-slide swiper-slide--six modal-open-btn">
          <span>15 avril - 12 mai</span>
          <div class="slide-content">
            <h3>Loisir</h3>
          </div>

        </div>

      </div>

    </div>

    <div class="swiper-pagination"></div>
  </div>
</div>
<section id="qui-sommes-nous" class="text-cards-horizon team-section">
  <div class="container">
      <div class="row mainRow">
          <div class="col-12 text-cards-horizon__textWrapper">
              <div class="pre-title">Notre équipe</div>
              <div class="title">Une équipe engagée pour rendre le monde meilleur</div>
              <p>Depuis 2010, nous nous sommes engagées ensemble et avons bâti pierre par pierre cette association. Découvrez le parcours des membres fondateurs.</p>
          </div>
          <div class="col-12 text-cards-horizon__cardsWrapper">
        <?php 
        if(!empty($members))
        foreach($members as $member) { ?>
          <div class="box modal-open-btn">
            <div class="top-bar"></div>
            <div class="content">
              <img src="<?php echo $member['img']['src'] ?? '' ?>" alt="<?php echo $member['img']['alt'] ?? '' ?>">
              <strong><?php echo $member['firstname'] ?? "" ?></strong>
              <i><?php echo $member['name'] ?? "" ?></i>
              <p><?php echo $member['email'] ?? "" ?></p>
            </div>
            <div class="box-footer">
              <p><?php echo $member['role'] ?? "" ?></p>
            </div>
          </div>
        <?php } ?>
          </div>
      </div>
  </div>
</section>
</main>
    <!-- end homepage -->
    <footer class="mainFooter">
        <div class="container">

            <div class="row FooterMainRow g-lg-0">
                <div class="col-4 col-sm-auto logo">
                    <img src="assets/img/logo-els.jpg" alt="Logo ELS-TOGO">
                </div>
                <nav class="col-auto nav">
                    <ul class="footer-menu">
                        <li><a href="#politique-confidentialite">Politique de confidentialité</a></li>
                        <li><a href="#mentions-legales">Mentions légales</a></li>
                    </ul>
                </nav>
                <div class="col-auto footer-copyright">
                  <p class="els-text-link">&copy Els-Togo - Tous droit réservés</p>
                </div>
            </div>

        </div>
    </footer>

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
            <section class="modal-container-body rtf">
                <h2>Quarum ambarum rerum cum medicinam pollicetur, luxuriae licentiam pollicetur.</h2>

                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Unum nescio, quo modo possit, si luxuriosus sit, finitas cupiditates habere. 
                    Hoc est non modo cor non habere, sed ne palatum quidem. Sic, et quidem diligentius saepiusque ista loquemur inter nos agemusque communiter. 
                    Paulum, cum regem Persem captum adduceret, eodem flumine invectio? Quid igitur dubitamus in tota eius natura quaerere quid sit effectum? 
                    Duo Reges: constructio interrete. </p>
                    <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Unum nescio, quo modo possit, si luxuriosus sit, finitas cupiditates habere. 
                    Hoc est non modo cor non habere, sed ne palatum quidem. Sic, et quidem diligentius saepiusque ista loquemur inter nos agemusque communiter. 
                    Paulum, cum regem Persem captum adduceret, eodem flumine invectio? Quid igitur dubitamus in tota eius natura quaerere quid sit effectum? 
                    Duo Reges: constructio interrete. </p>
                    <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Unum nescio, quo modo possit, si luxuriosus sit, finitas cupiditates habere. 
                    Hoc est non modo cor non habere, sed ne palatum quidem. Sic, et quidem diligentius saepiusque ista loquemur inter nos agemusque communiter. 
                    Paulum, cum regem Persem captum adduceret, eodem flumine invectio? Quid igitur dubitamus in tota eius natura quaerere quid sit effectum? 
                    Duo Reges: constructio interrete. </p>
                    <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Unum nescio, quo modo possit, si luxuriosus sit, finitas cupiditates habere. 
                    Hoc est non modo cor non habere, sed ne palatum quidem. Sic, et quidem diligentius saepiusque ista loquemur inter nos agemusque communiter. 
                    Paulum, cum regem Persem captum adduceret, eodem flumine invectio? Quid igitur dubitamus in tota eius natura quaerere quid sit effectum? 
                    Duo Reges: constructio interrete. </p>
                    <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Unum nescio, quo modo possit, si luxuriosus sit, finitas cupiditates habere. 
                    Hoc est non modo cor non habere, sed ne palatum quidem. Sic, et quidem diligentius saepiusque ista loquemur inter nos agemusque communiter. 
                    Paulum, cum regem Persem captum adduceret, eodem flumine invectio? Quid igitur dubitamus in tota eius natura quaerere quid sit effectum? 
                    Duo Reges: constructio interrete. </p>
                    <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Unum nescio, quo modo possit, si luxuriosus sit, finitas cupiditates habere. 
                    Hoc est non modo cor non habere, sed ne palatum quidem. Sic, et quidem diligentius saepiusque ista loquemur inter nos agemusque communiter. 
                    Paulum, cum regem Persem captum adduceret, eodem flumine invectio? Quid igitur dubitamus in tota eius natura quaerere quid sit effectum? 
                    Duo Reges: constructio interrete. </p>
                    <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Unum nescio, quo modo possit, si luxuriosus sit, finitas cupiditates habere. 
                    Hoc est non modo cor non habere, sed ne palatum quidem. Sic, et quidem diligentius saepiusque ista loquemur inter nos agemusque communiter. 
                    Paulum, cum regem Persem captum adduceret, eodem flumine invectio? Quid igitur dubitamus in tota eius natura quaerere quid sit effectum? 
                    Duo Reges: constructio interrete. </p>
            </section>
            <footer class="modal-container-footer">
      
            </footer>
        </article>
    </div>
    <!-- END MODAL  -->

    <script src="assets/lib/jquery/jquery-3.7.1.min.js"></script>
    <script src="assets/build/script.umd.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js"></script>
</body>
</html>
