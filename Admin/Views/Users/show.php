<?= $this->extend("layouts/default") ?>

<?= $this->section("title") ?>User<?= $this->endSection() ?>

<?= $this->section("content") ?>
<h1>User <?= $user->first_name ?></h1>
<dl>
    <dt>email</dt>
    <dd><?= esc($user->email)?></dd>

    <dt>First Name</dt>
    <dd><?= esc($user->first_name)?></dd>

    <dt>Created At</dt>
    <dd><?=$user->created_at->humanize()?></dd>
    <dt>Groups</dt>
    <dd><?=implode(",",$user->getGroups())?>
        <a href="<?= url_to("\Admin\Controllers\Users::groups",$user->id)?>">edit</a></dd>
        <dt>Permissions</dt>
    <dd><?=implode(",",$user->getPermissions())?>
        <a href="<?= url_to("\Admin\Controllers\Users::permissions",$user->id)?>">edit</a></dd>
</dl>
<?= form_open("admin/users/". $user->id."/toggle-ban") ?>
<button><?= $user->isBanned()?"Unban":"ban"?></button>

<?= $this->endSection() ?>