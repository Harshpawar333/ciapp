<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <title><?= $this->renderSection("title") ?></title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/water.css@2/out/water.css">




</head>

<body>
    <nav style="background-color: #f8f9fa; padding: 10px; border-bottom: 1px solid #e0e0e0;">
        <?php if (auth()->loggedIn()): ?>
            <div
                style="background-color: #e9ecef; padding: 10px; border-radius: 5px; margin-bottom: 10px; color: #343a40; text-align: center;">
                Hello <?= esc(auth()->user()->first_name) ?>
            </div>
        <?php endif ?>
        <div style="display: flex; align-items: center; justify-content: space-between;">
            <a href="<?= url_to("/") ?>" style="margin-right: 15px; text-decoration: none; color: #007bff;">Home</a>
            <?php if (auth()->loggedIn()): ?>

                <?php if (auth()->user()->inGroup("admin")): ?>
                    <a href="<?= url_to("admin/users") ?>"
                        style="margin-right: 15px; text-decoration: none; color: #007bff;">Users</a>
                <?php endif ?>
                <a href="<?= url_to("articles") ?>"
                    style="margin-right: 15px; text-decoration: none; color: #007bff;">Articles</a>
                <a href="<?= url_to("logout") ?>"
                    style="; text-decoration: none; color: #007bff;">Log-Out</a>
            <?php else: ?>
                <a href="<?= url_to("login") ?>" style="text-decoration: none; color: #007bff;">Log-In</a>
            <?php endif ?>
        </div>
    </nav>




    <?php if (session()->has("message")): ?>
        <p style="color: #ff0000; font-weight: bold; margin: 10px 0;"><?= session("message") ?></P>
    <?php endif; ?>
    <?php if (session()->has("error")): ?>
        <p style="color: #ff0000; font-weight: bold; margin: 10px 0;"><?= session("error") ?></P>
    <?php endif; ?>
    <?= $this->renderSection("content") ?>

</body>

</html>