<?php
session_start();

if (!isset($_SESSION["userid"])) {
    header("Location: login.php");
}

if ($_SESSION["role"] != "teacher") {
    echo "You cannot enter this page.";
    exit();
}
?>

<html>
<head>
    <title>Teacher Page</title>
</head>

<body bgcolor="lightpink">

<center>
    <h2>Teacher Page</h2>
    <p>Welcome teacher: <?php echo $_SESSION["userid"]; ?></p>
    <p>This page is only for teacher.</p>

    <a href="home.php">Back to Home</a>
</center>

</body>
</html>