<?php

require_once '../Models/Database/Database.php';
$title = 'Semestre';
require_once 'header.php';

?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Login EduLink</title>
    <link rel="stylesheet" href="../assets/style.css">
</head>
<body>
<main>
    <h1>Liste des semestres par classe</h1>

    <div class="list">
        <?php if (!empty($semesters)): ?>
            <ul class="group-list">

                <?php foreach ($semesters as $semester): ?>
                    <a href="list.php?semester_id=<?= $semester['semester_id'] ?>">
                        <li><?= htmlspecialchars($semester['name']) ?></li>
                    </a>
                <?php endforeach; ?>
            </ul>
        <?php else: ?>
            <p>Aucune catégorie trouvée pour cette classe.</p>
        <?php endif; ?>
    </div>

</main>
</body>
</html>