<?php
require 'config.php';
include 'header.php';


$id = isset($_GET['id']) ? (int) $_GET['id'] : 0;
$stmt = $pdo->prepare("SELECT * FROM animaux WHERE id = ?");
$stmt->execute([$id]);
$item = $stmt->fetch(PDO::FETCH_ASSOC);
?>

<main class="max-w-3xl mx-auto mt-8 px-4">
    <?php if ($item): ?>
        <article class="bg-white p-6 rounded-lg shadow-sm">
            <h1 class="text-2xl font-bold mb-2"><?= htmlspecialchars($item['nom']) ?></h1>
            <p class="text-gray-700"><?= nl2br(htmlspecialchars($item['description'])) ?></p>
        </article>
    <?php else: ?>
        <p class="text-gray-600">Élément introuvable.</p>
    <?php endif; ?>
</main>
</body>
</html>