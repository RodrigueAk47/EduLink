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
    <link rel="stylesheet" href="../assets/style.css">
</head>
<body>
<header>
    <div class="header-nav">
        <img class="main-logo" src="/assets/img/esatic.webp" alt="esatic logo">
        <div class="main-link">
            <a class="link-nav" href="#">Resultats</a>
            <a class="link-nav" href="Views/logout.php">Se deconnecter</a>
        </div>
    </div>
</header>

<main>
    <div>Bienvenue sur ton espace Edu Link <?= /** @var TYPE_NAME $username */
        $username ?></div>
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