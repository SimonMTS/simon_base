
<form action="" method="post">
    Id: <input class="form" type="text" value="<?=$user->_id ?>" disabled>
    <br>
    Username: <input class="form" type="text" name="user[name]" value="<?=$user->name ?>">
    <br>
    <input class="form" type="text" placeholder="Password" name="user[password]">
    <br>
    <input class="form" type="text" placeholder="Repeat password" name="user[passwordrep]">
    <br>
    Role:
    <select class="form" name="user[role]">
        <option <?php if ($user->role == 1) echo 'selected'; ?> value="parent">Parent</option>
        <option <?php if ($user->role == 2) echo 'selected'; ?> value="student">Student</option>
        <option <?php if ($user->role == 3) echo 'selected'; ?> value="teacher">Teacher</option>
        <option <?php if ($user->role == 777) echo 'selected'; ?> value="admin">Admin</option>
    </select>
    <br>
    Firstname:
    <input class="form" type="text" placeholder="Firstname" name="user[firstname]" value="<?=$user->firstname ?>">
    <br>
    Lastname:
    <input class="form" type="text" placeholder="Lastname" name="user[lastname]" value="<?=$user->lastname ?>">
    <br>
    Age:
    <input class="form" type="number" placeholder="Age" name="user[age]" value="<?=$user->age ?>">
    <br>
    Gender:
    <select class="form" name="user[gender]">
        <option <?php if ($user->gender == 'm') echo 'selected'; ?> value="male">Male</option>
        <option <?php if ($user->gender == 'f') echo 'selected'; ?> value="female">Female</option>
    </select>
    <br>
    <?php if ($user->class_code != false) : ?>
        Class code:
        <input class="form" type="text" placeholder="Class code" name="user[class_code]" value="<?=$user->class_code ?>">
        <br>
    <?php endif; if ($user->child_id != false) : ?>
        Child id:
        <input class="form" type="text" placeholder="Child id" name="user[child_id]" value="<?=$user->child_id ?>">
        <br>
    <?php endif; ?>
    <input class="btn" type="submit" value="Edit">
    <br>
    <br>
</form>
