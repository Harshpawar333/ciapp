<?= $this->extend("layouts/default") ?>
<?= $this->section("title") ?>Articles<?= $this->endSection() ?>
<?= $this->section("content") ?>
<h1>Articles</h1>
<a href="<?= url_to("Articles::new") ?>">New Article</a>
<?php foreach ($articles as $article): ?>
    <article>
        <h2><a href="<?= site_url('/articles/' . $article->id) ?>"><?= esc($article->title) ?></a></h2>
        <em>By <?= esc($article->first_name) ?></em>
        <p><?= esc($article->content) ?></p>
    </article>
<?php endforeach ?>
<div style="text-align: center; margin-top: 20px; padding: 10px; background-color: black; border-radius: 5px;">
    <span style="color:white ;margin-right: 10px;">Pages:</span>
    <?= $pager->simpleLinks() ?>
</div>



<?= $this->endSection() ?>