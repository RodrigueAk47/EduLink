<?php

use Models\Database\Database;

session_start();
// Dans vos pages nécessitant la session
require_once 'Models/Database/Database.php';
$dbConfig = [
    'host' => 'localhost',
    'dbname' => 'edulink',
    'username' => 'root',
    'password' => ''
];


// Vérifier si l'utilisateur est connecté
if (!isset($_SESSION['id'])) {
// Rediriger vers la page de connexion si l'utilisateur n'est pas connecté
    header("Location: /Views/login.php");
    exit();
}
$db = new Database($dbConfig);

// Récupérer le nom de l'utilisateur depuis la session
$username = $_SESSION['name'];
$matricule = $_SESSION['matricule'];
$email = $_SESSION['email'];


$classes = $db->getClasses();

// Remplacez par l'ID de la classe souhaitée

// Récupérez les semestres pour la classe donnée
$semesters = $db->getSemestersForClass($classes);
?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>EduLink</title>
    <link rel="stylesheet" href="assets/style.css">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
</head>
<body>
<header>
    <div class="header-nav">
        <img class="main-logo" src="/assets/img/esatic.webp" alt="esatic logo">
        <img class="center-logo" src="assets/img/e.png">
        <div class="main-link">
            <a class="link-nav" href="Views/../index.php">Cours</a>
            <a class="link-nav" href="Views/resultats.php">Resultats</a>

            <?php if (isset($_SESSION['id']) && $_SESSION['role'] == 'admin'): ?>
                <a class="link-nav" href="Views/admin.php">Admin</a>
            <?php endif; ?>
            <a class="link-nav" href="Views/logout.php">Deconnexion</a>
        </div>
    </div>
</header>

<main>
    <h1>Bienvenue sur <span>Edu Link <span></h1>
    <p class="present-name"><?= $username ?></p>
    <!-- Slideshow container -->

    <h1 style="margin-top: 50px">Cours, TD & Examens</h1>
    <div class="card-container">
        <?php /** @var TYPE_NAME $classes */
        foreach ($classes as $class): ?>
            <a href="Views/semester.php?class_id=<?= $class['class_id'] ?>" class="card">
                <img src="assets/img/l<?= $class['class_id'] ?>.png" alt="Image 1">
                <div class="card-content">
                    <h3><?= $class['name'] ?></h3>
                </div>
            </a>
        <?php endforeach; ?>

    </div>
    <h1 style="margin-top: 70px">Actualité ESATIC</h1>
    <div class="slideshow-container">

        <!-- Full-width images with number and caption text -->
        <div class="mySlides fade">
            <div class="numbertext">1 / 3</div>
            <img src="assets/img/carousel2.png" style="width:100%">

        </div>

        <div class="mySlides fade">
            <div class="numbertext">2 / 3</div>
            <img src="assets/img/carousel1.png" style="width:100%">

        </div>

        <div class="mySlides fade">
            <div class="numbertext">3 / 3</div>
            <img src="assets/img/carousel3.png" style="width:100%">

        </div>

        <!-- Next and previous buttons -->
        <a class="prev" onclick="plusSlides(-1)">&#10094;</a>
        <a class="next" onclick="plusSlides(1)">&#10095;</a>
    </div>
    <br>

    <!-- The dots/circles -->
    <div style="text-align:center">
        <span class="dot" onclick="currentSlide(1)"></span>
        <span class="dot" onclick="currentSlide(2)"></span>
        <span class="dot" onclick="currentSlide(3)"></span>
    </div>

</main>
<footer>By TEAM ASTRO &copy; 2024</footer>
<script>
    let slideIndex = 1;
    showSlides(slideIndex);

    // Next/previous controls
    function plusSlides(n) {
        showSlides(slideIndex += n);
    }

    // Thumbnail image controls
    function currentSlide(n) {
        showSlides(slideIndex = n);
    }


    function showSlides() {
        let i;
        let slides = document.getElementsByClassName("mySlides");
        for (i = 0; i < slides.length; i++) {
            slides[i].style.display = "none";
        }
        slideIndex++;
        if (slideIndex > slides.length) {
            slideIndex = 1
        }
        slides[slideIndex - 1].style.display = "block";
        setTimeout(showSlides, 10000); // Change image every 2 seconds
    }
</script>
</body>
</html>