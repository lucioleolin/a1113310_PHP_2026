<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    session_start();

    $item = $_POST["item"];
    $qty = $_POST["qty"];

    $_SESSION["item"] = $item;
    $_SESSION["qty"] = $qty;

    header("Location: process.php");
}
?>

<html>
<head>
    <title>Product Page</title>
</head>

<body>

<h2>Choose Product</h2>

<form method="post" action="product.php">
    Product:
    <select name="item">
        <option value="pc">PC - 20000</option>
        <option value="phone">Phone - 12000</option>
        <option value="tablet">Tablet - 18000</option>
    </select>

    <br><br>

    Quantity:
    <input type="text" name="qty">

    <br><br>

    <input type="submit" value="Add">
</form>

<br>
<a href="cart.php">View Shopping Cart</a>

</body>
</html>