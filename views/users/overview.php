<div class="overview-item" style="background-image: url(<?=$GLOBALS['config']['base_url'].'assets/user.png' ?>);">
    <a href="<?= $GLOBALS['config']['base_url'] ?>/users/create" class="btn">add user</a>
</div>

<?php foreach ($users as $user) :
    if ($user['_id'] != $_SESSION['user']['_id']) :?>
    <div class="overview-item" style="background-image: url(<?=$GLOBALS['config']['base_url'].'assets/noPicture.png' ?>);">
        <span><?=$user['name'] ?></span>
        <span><?=user::role($user['role']) ?></span>
        <a href="<?= $GLOBALS['config']['base_url'] ?>users/edit/<?=$user['_id'] ?>" class="btn">edit</a>
        <a href="<?= $GLOBALS['config']['base_url'] ?>users/delete/<?=$user['_id'] ?>" class="del">x</a>
    </div>
<?php endif;
 endforeach; ?>
