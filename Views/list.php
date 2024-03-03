<?php
require_once '../Models/Database/Database.php';
$title = 'matieres';
require_once 'header.php';
?>

<main>
    <h1>Matieres</h1>
    <div class="list">
        <?php if (!empty($lists)): ?>
            <ul class="group-list">
                <?php foreach ($lists as $list): ?>
                    <a href="details.php?course_list_id=<?= $list['course_list_id'] ?>">
                        <li><?= htmlspecialchars($list['name']) ?></li>
                    </a>
                <?php endforeach; ?>
            </ul>
        <?php else: ?>
            <p>Aucune matiere trouvée pour ce semestre.</p>
        <?php endif; ?>
    </div>
</main>
</body>
</html>