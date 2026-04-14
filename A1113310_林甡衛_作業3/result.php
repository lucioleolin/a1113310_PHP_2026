<?php
session_start();

if (!isset($_SESSION["userid"])) {
    header("Location: login.php");
}

if ($_SESSION["role"] != "student") {
    echo "You cannot enter this page.";
    exit();
}

$name = $_POST["name"];
$gender = $_POST["gender"];
$birthday = $_POST["birthday"];
$email = $_POST["email"];
$phone = $_POST["phone"];
$location = $_POST["location"];
$session = $_POST["session"];
$msg = $_POST["msg"];
?>

<html>
<head>
    <title>Registration Result</title>
</head>

<body bgcolor="lightblue">

<center>
    <h2>Registration Result</h2>

    <table border="1" cellpadding="8" bgcolor="white">
        <tr><td>Name</td><td><?php echo $name; ?></td></tr>
        <tr><td>Gender</td><td><?php echo $gender; ?></td></tr>
        <tr><td>Birthday</td><td><?php echo $birthday; ?></td></tr>
        <tr><td>Email</td><td><?php echo $email; ?></td></tr>
        <tr><td>Phone</td><td><?php echo $phone; ?></td></tr>
        <tr><td>Location</td><td><?php echo $location; ?></td></tr>
        <tr><td>Session</td><td><?php echo $session; ?></td></tr>
        <tr><td>Activities</td><td>
            <?php
            if (isset($_POST["act1"])) echo "Sports ";
            if (isset($_POST["act2"])) echo "Art ";
            if (isset($_POST["act3"])) echo "Games ";
            ?>
        </td></tr>
        <tr><td>Message</td><td><?php echo $msg; ?></td></tr>
    </table>

    <br>
    <a href="home.php">Back to Home</a>
</center>

</body>
</html>