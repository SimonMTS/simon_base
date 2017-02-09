<form action="" method="post">
    <input class="form " type="text" placeholder="Username" name="user[name]" autofocus>
    <br>
    <input class="form" type="text" placeholder="Password" name="user[password]">
    <br>
    <input class="form" type="text" placeholder="Repeat password" name="user[passwordrep]">
    <br>
    <select class="form" name="user[role]">
        <option disabled selected>User type</option>
        <option value="parent">Parent</option>
        <option value="student">Student</option>
        <option value="teacher">Teacher</option>
    </select>
    <br>
    <input class="btn" type="submit" value="Register">
</form>