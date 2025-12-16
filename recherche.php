<?php
require 'config.php';
include 'header.php';


$search = $_GET['search'] ?? '';
$stmt = $pdo->prepare("SELECT * FROM animaux WHERE nom LIKE ? ORDER BY nom ASC");
$stmt->execute(["%$search%"]);
$results = $stmt->fetchAll(PDO::FETCH_ASSOC);
?>
<main class="max-w-3xl mx-auto mt-8 px-4">
    <h2 class="text-2xl font-semibold mb-4">Résultats pour « <?= htmlspecialchars($search) ?> »</h2>
    <?php if (count($results) === 0): ?>
        <p class="text-gray-600">Aucun résultat trouvé.</p>
    <?php else: ?>
        <ul class="space-y-2">
            <?php foreach ($results as $r): ?>
                <li class="p-4 bg-white rounded-lg shadow-sm"><a href="element.php?id=<?= $r['id'] ?>" class="font-medium"><?= htmlspecialchars($r['nom']) ?></a>
                    <p class="text-sm text-gray-600 mt-1"><?= nl2br(htmlspecialchars($r['description'])) ?></p>
                </li>
            <?php endforeach; ?>
        </ul>
    <?php endif; ?>
</main>
</body>
</html>