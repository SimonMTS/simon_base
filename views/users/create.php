<form action="" method="post">
    <div class="login-form">
        <input class="form " type="text" placeholder="Username" name="user[name]" required autofocus>
        <br>
        <input class="form" type="text" placeholder="Password" name="user[password]" required>
        <br>
        <input class="form" type="text" placeholder="Repeat password" name="user[passwordrep]" required>
        <br>
        <select class="form" name="user[role]" required>
            <option disabled selected>User type</option>
            <option value="parent">Parent</option>
            <option value="student">Student</option>
            <option value="teacher">Teacher</option>
            <option value="admin">Admin</option>
        </select>
        <br>
        <input class="form" type="text" placeholder="Firstname" name="todo" required>
        <br>
        <input class="form" type="text" placeholder="Lastname" name="todo" required>
        <br>
        <input class="form" type="text" placeholder="Age" name="todo" required>
        <br>
        <select class="form" name="todo" required>
            <option disabled selected>Gender</option>
            <option>Male</option>
            <option>Female</option>
        </select>
        <br>
        <select class="form" name="todo" required>
            <option disabled selected>Class Code</option>
        </select>
        <br>
        <input class="btn" type="submit" value="Register">
    </div>
</form>
