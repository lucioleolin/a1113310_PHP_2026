<?php
session_start();

if (!isset($_SESSION["userid"])) {
    header("Location: login.php");
}

if ($_SESSION["role"] != "admin") {
    echo "You cannot enter this page.";
    exit();
}
?>

<html>
<head>
    <title>Administrator Page</title>
</head>

<body bgcolor="orange">

<center>
    <h2>Administrator Page</h2>
    <p>Welcome administrator: <?php echo $_SESSION["userid"]; ?></p>
    <p>This page is only for administrator.</p>

    <a href="home.php">Back to Home</a>
</center>

</body>
</html>