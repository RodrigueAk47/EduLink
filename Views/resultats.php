<?php
require_once '../Models/Database/Database.php';
$title = 'Resultats d\'examens';
require_once 'header.php';
?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Bulletin Scolaire</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
<div class="bulletin">
    <h1 class="bulletin1">Bulletin Scolaire</h1>
    <h2>Semestre 1</h2>
    <table>
        <tr>
            <th>Matières</th>
            <th>Coefficients</th>
            <th>Notes</th>
        </tr>
        <tr>
            <td>Logique mathematique</td>
            <td>2</td>
            <td>15</td>
        </tr>
        <tr>
            <td>Optique Geometrique</td>
            <td>3</td>
            <td>14</td>
        </tr>
        <tr>
            <td>Achitectures des ordinateurs</td>
            <td>1</td>
            <td>15</td>
        </tr>
        <tr>
            <td>Electrostatique</td>
            <td>4</td>
            <td>14</td>
        </tr>

    </table>
    <p>Moyenne du semestre: <span id="moyenne">14.75</span></p>
</div>
</body>
</html>
</body>
</html>
