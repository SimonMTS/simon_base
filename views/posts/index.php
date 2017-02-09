<p>Here is a list of all posts:</p>

<?php foreach($posts as $post) : ?>
    <p>
        <?= $post->user_id; ?>
        <a href="<?= $GLOBALS['config']['base_url'] ?>posts/show/<?= $post->id; ?>">See content</a>
    </p>
<?php endforeach; ?>