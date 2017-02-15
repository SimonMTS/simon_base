<p>Hello there <?= $name; ?>!</p>

<?php if (isset($_SESSION['user']['_id'])) : ?>
    <br><pre><?php var_dump($_SESSION); ?></pre>
<?php endif; ?>

<?php if (isset($GLOBALS['config']['landing']['action'])) : ?>
    <br><pre><?php var_dump($GLOBALS['config']); ?></pre><br>
<?php endif; ?>
