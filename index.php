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
    <title>Login EduLink</title>
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

            <?php if (isset($_SESSION['id']) && $_SESSION['role'] == 'admin'):?>
                <a class="link-nav" href="Views/admin.php">Admin</a>
            <?php endif; ?>
            <a class="link-nav" href="Views/logout.php">Deconnexion</a>
        </div>
    </div>
</header>

<main>
    <h1>Bienvenue sur <span>Edu Link <span></h1>
    <p class="present-name"><?= $username?></p>

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
</main>
</body>
</html>