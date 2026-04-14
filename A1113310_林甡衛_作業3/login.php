<html>
<head>
    <title>Camp Login</title>
</head>

<body bgcolor="lightgreen">

<center>
    <h2><font color="darkgreen">2026 Summer Camp Login</font></h2>
    <p>Please login first</p>

    <form method="post" action="check.php">
        User ID: <input type="text" name="userid"><br><br>
        Password: <input type="password" name="pwd"><br><br>

        Role:
        <select name="role">
            <option value="student">Student</option>
            <option value="teacher">Teacher</option>
            <option value="admin">Administrator</option>
        </select>
        <br><br>

        <input type="submit" value="Login">
    </form>
</center>

</body>
</html>