<?php
$expire = time() - 3600;

foreach ($_COOKIE as $key => $data) {
    if (is_array($data)) {
        foreach ($data as $subkey => $value) {
            setcookie($key . "[" . $subkey . "]", "", $expire);
        }
    } else {
        setcookie($key, "", $expire);
    }
}

header("Location: cart.php");
?>