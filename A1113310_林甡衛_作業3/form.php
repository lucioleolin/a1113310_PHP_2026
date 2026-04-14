<?php
session_start();

if (!isset($_SESSION["userid"])) {
    header("Location: login.php");
}

if ($_SESSION["role"] != "student") {
    echo "You cannot enter this page.";
    exit();
}
?>

<html>
<head>
    <title>Camp Registration</title>
</head>

<body bgcolor="lightgreen">

<center>
    <h2><font color="darkgreen">2026 Summer Camp</font></h2>
    <p>Fill in the form below to join our camp!</p>
</center>

<form method="post" action="result.php">

<table border="1" align="center" cellpadding="10" bgcolor="white">

<tr>
    <td colspan="2"><b>Personal Information</b></td>
</tr>

<tr>
    <td colspan="2">
        Name:<br>
        <input type="text" name="name">
    </td>
</tr>

<tr>
    <td>
        Gender:<br>
        <input type="radio" name="gender" value="Male"> Male<br>
        <input type="radio" name="gender" value="Female"> Female
    </td>

    <td>
        Birthday:<br>
        <input type="date" name="birthday">
    </td>
</tr>

<tr>
    <td colspan="2">
        Email:<br>
        <input type="text" name="email">
    </td>
</tr>

<tr>
    <td colspan="2">
        Phone:<br>
        <input type="text" name="phone">
    </td>
</tr>

<tr>
    <td colspan="2"><b>Camp Details</b></td>
</tr>

<tr>
    <td>
        Location:<br>
        <select name="location">
            <option>Taipei</option>
            <option>Taichung</option>
            <option>Kaohsiung</option>
        </select>
    </td>

    <td>
        Session:<br>
        <select name="session">
            <option>Week 1</option>
            <option>Week 2</option>
        </select>
    </td>
</tr>

<tr>
    <td colspan="2">
        Activities:<br>
        <input type="checkbox" name="act1" value="Sports"> Sports
        <input type="checkbox" name="act2" value="Art"> Art
        <input type="checkbox" name="act3" value="Games"> Games
    </td>
</tr>

<tr>
    <td colspan="2">
        Message:<br>
        <textarea name="msg" rows="4" cols="35"></textarea>
    </td>
</tr>

<tr>
    <td align="center">
        <input type="submit" value="Send">
    </td>
    <td align="center">
        <input type="reset" value="Clear">
    </td>
</tr>

</table>

</form>

<br>
<center>
    <a href="home.php">Back to Home</a>
</center>

</body>
</html>