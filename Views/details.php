<?php
require_once '../Models/Database/Database.php';
$title = 'detail';
require_once 'header.php';


?>

<header>
    <?php if (!empty($details)): ?>
    <?php foreach ($details

    as $detail): ?>
    <h1><?= $detail['name'] ?></h1>
</header>
<main>
    <div class="course-container">
        <section class="course-details">
            <?= $detail['description'] ?>

    </div>
    <?php endforeach; ?>

    <?php else: ?>
        <p>Aucune catégorie trouvée pour cette classe.</p>
    <?php endif; ?>

</main>
</body>
</html>