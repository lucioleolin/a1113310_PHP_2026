<?php
session_start();

$item = $_SESSION["item"];
$qty = $_SESSION["qty"];

if ($item == "pc") {
    $price = 20000;
} elseif ($item == "phone") {
    $price = 12000;
} else {
    $price = 18000;
}

$expire = time() + 86400;

setcookie($item . "[name]", $item, $expire);
setcookie($item . "[qty]", $qty, $expire);
setcookie($item . "[price]", $price, $expire);

header("Location: cart.php");
?>