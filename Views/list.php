<?php
require_once '../Models/Database/Database.php';
require_once 'header.php';
?>

<main>
    <h1>Liste des cours</h1>
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
            <p>Aucune catégorie trouvée pour cette classe.</p>
        <?php endif; ?>
    </div>
</main>
</body>
</html>