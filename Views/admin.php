<?php

if (!isset($_SESSION['id']) || $_SESSION['role'] != 'admin') {
    header('/index.php');
}
require_once '../Models/Database/Database.php';
$title = 'admin';
require_once 'header.php';


?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Modifier Liste de Cours et Cours</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
<div class="container">
    <h1>Modifier Liste de Cours et Cours</h1>
    <form action="update_course_list.php" method="post">
        <input type="hidden" name="course_list_id" value="">
        <div>
            <label>Nom de la liste de cours:</label>
            <input type="text" name="course_list_name" value="">
        </div>
        <h2>Cours</h2>
        <div>
            <label>Nom du cours:</label>
            <input type="text" name="course_names[]" value="">
            <label>Description:</label>
            <textarea name="course_descriptions[]"></textarea>
        </div>
        <button type="submit">Mettre à jour</button>
    </form>
    <img src="../assets/img/construc.png">
    <div style="float: right; font-size: 50px">En Construction</div>
</div>
</body>
</html>



