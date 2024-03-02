<?php


use Models\Database\Database;

session_start();
// Dans vos pages nécessitant la session
require_once '../Models/Database/Database.php';
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


$db = new Database($dbConfig);
$classId = $_GET['class_id'] ?? null;
$semesters = $db->getSemestersForClass($classId);
$semestersId = $_GET['semester_id'] ?? null;

$lists = $db->getListForSemester($semestersId);
$course_listId = $_GET['course_list_id'] ?? null;

$details = $db->getDetailsForCourseList($course_listId);


/*if ($classId === null) {
    // Rediriger ou afficher une erreur si l'ID de la classe n'est pas fourni
    header("Location: index.php");
    exit();
}*/
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
            <a class="link-nav" href="logout.php">Se deconnecter</a>
        </div>
    </div>
</header>
