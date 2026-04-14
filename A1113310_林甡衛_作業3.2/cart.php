<?php
echo "<h2>My Cart</h2>";

foreach ($_COOKIE as $data) {
    if (is_array($data)) {
        if (isset($data["name"]) && isset($data["qty"]) && isset($data["price"])) {
            echo "Item: " . $data["name"] . "<br>";
            echo "Qty: " . $data["qty"] . "<br>";
            echo "Total: " . ($data["price"] * $data["qty"]) . "<br><br>";
        }
    }
}

echo "<a href='clearcart.php'>Clear Cart</a><br><br>";
echo "<a href='product.php'>Back</a>";
?>