<?php
$name = $_POST["name"];
$gender = $_POST["gender"];
$birthday = $_POST["birthday"];
$email = $_POST["email"];
$phone = $_POST["phone"];
$location = $_POST["location"];
$session = $_POST["session"];
$msg = $_POST["msg"];

echo "<center>";
echo "<h2>Registration Result</h2>";

echo "Name: $name <br>";
echo "Gender: $gender <br>";
echo "Birthday: $birthday <br>";
echo "Email: $email <br>";
echo "Phone: $phone <br>";
echo "Location: $location <br>";
echo "Session: $session <br>";

// checkbox check (simple way)
if (isset($_POST["act1"])) echo "Sports ";
if (isset($_POST["act2"])) echo "Art ";
if (isset($_POST["act3"])) echo "Games ";

echo "<br>";
echo "Message: $msg";

echo "</center>";
?>