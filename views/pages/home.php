<p>Hello there <?= $name; ?>!</p>

<p>You successfully landed on the home page.</p><br>

<?php if (isset($_SESSION['user']['id'])) : ?>
    <!-- <br><pre><?php var_dump($_SESSION); ?></pre> -->
<?php endif; ?>

<?php if (isset($GLOBALS['config']['landing']['action']) && $GLOBALS['config']['sql']['host'] == 'localhost') : ?>
    <!-- <br><pre><?php var_dump($GLOBALS['config']); ?></pre><br> -->
<?php endif; ?>
