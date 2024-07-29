<?= $this->extend("layouts/default") ?>
<?= $this->section("title") ?>set-password<?= $this->endSection() ?>
<?= $this->section("content") ?>
<h1>Reset Password</h1>

<?= form_open() ?>
<label for="password">password </label>
<input type="password" id="password" name="password">
<label for="confirm_password">Repeat Password</label>
<input type="password" id="password_confirmation" name="password_confirmation">
<button>Save</button>
</form>
<?php if (session()->has("errors")): ?>
    <ul>
        <?php foreach (session("errors") as $error): ?>
            <li><?= $error ?></li>
        <?php endforeach ?>
    </ul>

<?php endif; ?>

<?= $this->endSection() ?>