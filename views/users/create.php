<form action="" method="post">
    <div class="login-form">
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
            <option value="admin">Admin</option>
        </select>
        <br>
        <input class="form" type="text" placeholder="Firstname" name="user[firstname]">
        <br>
        <input class="form" type="text" placeholder="Lastname" name="user[lastname]">
        <br>
        <input class="form" type="number" placeholder="Age" name="user[age]">
        <br>
        <select class="form" name="user[gender]">
            <option disabled selected>Gender</option>
            <option value="male">Male</option>
            <option value="female">Female</option>
        </select>
        <br>
        <input class="form" type="text" placeholder="Class code" name="user[class_code]">
        <br>
        <input class="form" type="text" placeholder="Child id" name="user[child_id]">
        <br>
        <input class="btn" type="submit" value="Register">
    </div>
</form>
