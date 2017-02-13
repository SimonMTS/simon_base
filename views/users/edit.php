
<form action="" method="post">
    id: <input class="form" type="text" value="<?=$user->_id ?>" disabled>
    <br>
    username: <input class="form" type="text" name="user[name]" value="<?=$user->name ?>">
    <br>
    password: <input class="form" type="text" name="user[password]" value="<?=$user->password ?>">
    <br>
    role:
    <select class="form" name="user[role]">
        <option <?php if ($user->role == 1) echo 'selected'; ?> value="parent">Parent</option>
        <option <?php if ($user->role == 2) echo 'selected'; ?> value="student">Student</option>
        <option <?php if ($user->role == 3) echo 'selected'; ?> value="teacher">Teacher</option>
        <option <?php if ($user->role == 777) echo 'selected'; ?> value="admin">Admin</option>
    </select>
    <br>
    <input class="btn" type="submit" value="Edit">
</form>
