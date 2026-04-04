<?php
$user = $_POST["user"];
$pass = $_POST["pass"];

if ($user == "student" && $pass == "123") {
    header("Location: form.php");
} else {
    echo "<center>";
    echo "<h3>Login Failed</h3>";
    echo "<a href='login.php'>Try Again</a>";
    echo "</center>";
}
?>