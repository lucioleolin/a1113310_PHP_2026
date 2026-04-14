<?php
session_start();

$userid = $_POST["userid"];
$pwd = $_POST["pwd"];
$role = $_POST["role"];

if ($pwd == "1234") {
    $_SESSION["userid"] = $userid;
    $_SESSION["role"] = $role;

    setcookie("userid", $userid, time()+3600);

    header("Location: home.php");
} else {
    echo "<html>";
    echo "<head><title>Login Failed</title></head>";
    echo "<body bgcolor='lightgreen'>";
    echo "<center>";
    echo "<h3>Login Failed</h3>";
    echo "<p>Wrong password</p>";
    echo "<a href='login.php'>Back to Login</a>";
    echo "</center>";
    echo "</body>";
    echo "</html>";
}
?>