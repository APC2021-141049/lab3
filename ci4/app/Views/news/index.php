<link rel="stylesheet" type="text/css" href="news_style.css" />
<link rel="icon" href="image/profile_picture.png" />

<h2><?= esc($title) ?></h2>

<?php if (! empty($news) && is_array($news)): ?>

    <?php foreach ($news as $news_item): ?>

        <h3><?= esc($news_item['title']) ?></h3>

        <div class="main">
            <?= esc($news_item['body']) ?>
        </div>
        <p><a href="/news/<?= esc($news_item['slug'], 'url') ?>">View website</a></p>

    <?php endforeach ?>

<?php else: ?>

    <h3>No Guests</h3>

<?php endif ?>