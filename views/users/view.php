<div class="overview-item" style="background-image: url(<?=$GLOBALS['config']['base_url'].'assets/noPicture.png' ?>);">
    <span><?=$_SESSION['user']['name'] ?></span>
    <span><?=user::role($_SESSION['user']['role']) ?></span>
    <a href="<?= $GLOBALS['config']['base_url'] ?>users/edit/<?=$_SESSION['user']['_id'] ?>" class="btn">edit</a>
</div>

<div class="overview-item" style="background-image: url(<?=$GLOBALS['config']['base_url'].'assets/user.png' ?>);">
    <a href="<?= $GLOBALS['config']['base_url'] ?>docs/create" class="btn">add document</a>
</div>

<?php foreach ($docs as $doc) :?>
    <div class="overview-item" style="background-image: url(<?=$GLOBALS['config']['base_url'].'assets/noPicture.png' ?>);">
        <span><?=$doc['name'] ?></span>
        <span><?=$doc['date'] ?></span>
        <a href="<?= $GLOBALS['config']['base_url'] ?>users/edit/<?=$user['_id'] ?>" class="btn">edit</a>
        <a href="<?= $GLOBALS['config']['base_url'] ?>users/delete/<?=$user['_id'] ?>" class="del">x</a>
    </div>

<?php endforeach; ?>
