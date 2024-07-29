<?= $this->extend("layouts/default") ?>

<?= $this->section("title") ?>Delete Article<?=$this->endSection() ?>
<?=$this->section("content") ?>
<h1>Delete Article</h1>
<p>Are you sure?</p>
<?= form_open("articles/".$article->id) ?>
<input type="hidden" name="_method" value="DELETE">
<button>Yes</button>
</form>
<?=$this->endSection() ?>