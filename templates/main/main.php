<?php include __DIR__ . '/../header.php'; ?>
<?php if (!empty($articles)) {
    foreach ($articles as $article): ?>
        <h2><a href="/articles/<?= $article->getId() ?>"><?= $article->getName() ?></a></h2>
        <p><?= $article->getText() ?></p>
        <hr>
        <hr>
    <?php endforeach;
} ?>
<?php include __DIR__ . '/../footer.php'; ?>