<?php
session_start();

if (!isset($_SESSION["userid"])) {
    header("Location: login.php");
}
?>

<html>
<head>
    <title>Camp Home</title>
</head>

<body bgcolor="lightyellow">

<center>
    <h2>Summer Camp Home Page</h2>

    <?php
    echo "Welcome, " . $_SESSION["userid"] . "<br>";
    echo "Your role: " . $_SESSION["role"] . "<br><br>";

    if (isset($_COOKIE["userid"])) {
        echo "Cookie User ID: " . $_COOKIE["userid"] . "<br><br>";
    }

    if ($_SESSION["role"] == "student") {
        echo "<a href='form.php'>Go to Registration Form</a><br><br>";
    }

    if ($_SESSION["role"] == "teacher") {
        echo "<a href='teacher.php'>Go to Teacher Page</a><br><br>";
    }

    if ($_SESSION["role"] == "admin") {
        echo "<a href='admin.php'>Go to Admin Page</a><br><br>";
    }
    ?>

    <a href="delete_cookie.php">Delete Cookie</a><br><br>
    <a href="logout.php">Logout</a>
</center>

</body>
</html>