<?php
if ($_SERVER['REQUEST_METHOD'] == 'GET' && realpath(__FILE__) == realpath($_SERVER['SCRIPT_FILENAME'])) {
header('HTTP/1.0 403 Forbidden', TRUE, 403);
die();
} ?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, minimum-scale=1, user-scalable=yes" />
    <meta name="description" content="<?= $page_description ?? "" ?>">
    <title><?= $page_title ?? "" ?></title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,100..900;1,100..900&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css" />
    <link rel="stylesheet" href="assets/build/style.css" />
    <link rel="stylesheet" href="https://unpkg.com/leaflet@1.9.4/dist/leaflet.css"
          integrity="sha256-p4NxAoJBhIIN+hmNHrzRCf9tD/miZyoHS5obTRR9BMY="
          crossorigin=""/>
    <script src="https://unpkg.com/leaflet@1.9.4/dist/leaflet.js"
            integrity="sha256-20nQCchB9co0qIjJZRGuk2/Z9VM+kNiyxNV1lvTlZBo="
            crossorigin=""></script>
</head>

<?php require_once(__DIR__ . '/partials/header.php'); ?>
<?= $page_content ?? "" ?>
<?php require_once(__DIR__ . '/partials/footer.php'); ?>

<script src="assets/lib/jquery/jquery-3.7.1.min.js"></script>
<script src="assets/build/script.umd.js"></script>
<script src="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js"></script>
<script>
async function createProject() {
    console.log('clic sur fetch project')
    const formData = new FormData(document.getElementById('projectForm'));
    const jsonData = {};

    formData.forEach(function(value, key){
    jsonData[key] = value;
    });

    const jsonString = JSON.stringify(jsonData);

    // Fetch API Request
    try {
    const siteUrl = 'https://els-togo.onrender.com'
    const response = await fetch(`${siteUrl}/create-project`, {
    method: 'POST',
    headers: {
    'Content-Type': 'application/json',
    },
    body: jsonString,
    });

    if (!response.ok) {
    console.error('Network response was not ok');
    }

    const result = await response.text();
    console.log(result); // Display the response from the server

    } catch (error) {
    console.error('Error during fetch:', error);
    }
}
</script>
<script>
    const emaildecode = (e) => {
        let email = atob(e.dataset.email);
        e.href = 'mailto:'+email;
        e.innerHTML = email;
    }
    const emailtag = document.querySelector('.contact-email__link');
    let observer = new IntersectionObserver((entries) => {
        entries.map((entry) => {
            if (entry.isIntersecting) {
                let script = document.createElement('script');
                script.onload = function () {
                    emaildecode(entry.target)
                };
                script.src = 'decode-email.js';
                document.head.appendChild(script);
            }
        });
    }).observe(emailtag);
</script>
</body>
</html>
