<?php include __DIR__ . '/../header.php'; ?>
<?php foreach ($articles as $article): ?>
    <h2><a href="/articles/<?= $article['id'] ?>"><?= $article['name'] ?></a></h2>
    <p><?= $article['text'] ?></p>
    <p>Имя автора: <?= $nickname ?></p>
<?php endforeach; ?>
<?php include __DIR__ . '/../footer.php'; ?>