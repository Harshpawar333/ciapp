<?= $this->extend("layouts/default")?>
<?= $this->section("title") ?>New Article<?= $this->endSection() ?>
<?= $this->section("content")?>
<h1>New Article</h1>

<?= form_open("articles")?>
<?= $this->include("Articles/form")?>
</form>
<?php if (session()->has("errors")): ?>
    <ul>
        <?php foreach (session("errors") as $error): ?>
            <li><?=$error?></li>
        <?php endforeach ?>
    </ul>

<?php endif; ?>
<?= $this->endSection() ?>
