
<label for="title">Title</label>
<input type="text" id="title" name="title" value="<?= old("title",esc($article->title))?>">
<label for="content">Content</label>
<textarea type="text" id="content" name="content"><?= old("content",esc($article->content))?></textarea>
<!-- <input type="hidden" name="<?= csrf_token()?>"value="Some invalid input"> -->
<button>Save</button>