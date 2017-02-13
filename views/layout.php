<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="<?= $GLOBALS['config']['base_url'] ?>assets/css/site.css">
        <script type="text/javascript" src="<?= $GLOBALS['config']['base_url'] ?>assets/js/script.js"></script>
        <link href="https://fonts.googleapis.com/css?family=Ubuntu" rel="stylesheet">
        <link rel="shortcut icon" href="favicon.ico" />
		<link rel="icon" href="<?= $GLOBALS['config']['base_url'] ?>assets/favicon.ico" type="image/x-icon" />
        <title>The Rainbow</title>
    </head>
    <body>
        <?php if (isset($_SESSION['user']['role']) && $_SESSION['user']['role'] == 777) : ?>
            <div id="admin">
                <style> div#main-body { min-height: calc(100vh - 86px) !important; } </style>
                <a class="float-left">Admin</a>
                <a class="float-left">PHP version: <?=phpversion(); ?></a>
                <a href="<?= $GLOBALS['config']['base_url'] ?>" class="float-right">options</a>
            </div>
        <?php endif; ?>

        <header id="head">
            <a class="float-left" href="<?= $GLOBALS['config']['base_url'] ?>">Home</a>
            <a class="float-left" href="<?= $GLOBALS['config']['base_url'] ?>posts/index">Posts</a>

            <?php if (!isset($_SESSION['user']['_id'])) : ?>
                <a class="float-right" href="<?= $GLOBALS['config']['base_url'] ?>users/create">Register</a>
                <a class="float-right" href="<?= $GLOBALS['config']['base_url'] ?>users/login">Login</a>
            <?php else : ?>
                <a class="float-right" href="<?= $GLOBALS['config']['base_url'] ?>users/logout">Logout(<?=$_SESSION['user']['name'] ?>)</a>
                <a class="float-right" href="<?= $GLOBALS['config']['base_url'] ?>users/edit/<?=$_SESSION['user']['_id'] ?>">Edit</a>
            <?php endif; ?>
        </header>

        <div id="main-body">
            <div class="inner-body">
                <?php require_once('routes.php'); ?>
            </div>
        </div>

        <footer id="foot">
            By Simon Striekwold.
        </footer>
    </body>
<html>
