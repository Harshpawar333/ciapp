<?= $this->extend("layouts/default") ?>
<?= $this->section("title") ?>Articles<?= $this->endSection() ?>
<?= $this->section("content") ?>
<h1>Articles</h1>

<h2><?= esc($article->title) ?></h2>
<?php if($article->image): ?>
        <img src="<?= url_to("Article\Image::get", $article->id)?>">
        <?=form_open("articles/" . $article->id . "/image/delete")?>
                <button>Delete</button>
</form>
<?php else: ?>
        <a href="<?=url_to("Article\Image::new",$article->id)?>">Edit Image</a>
<?php endif; ?>
<p><?= esc($article->content) ?></p>
<?php if($article->isOwner() || 
        auth()->user()->can("articles.edit")): ?>
<a href="<?= url_to("Articles::edit",$article->id)?>">Edit</a>
<?php endif; ?>
<?php if($article->isOwner()|| 
        auth()->user()->can("articles.delete")): ?>
<a href="<?=url_to("Articles::confirmDelete",$article->id)?>">Delete</a>
<?php endif; ?>
<?= $this->endSection() ?>