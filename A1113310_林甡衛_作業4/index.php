<?php
session_start();

$host = "localhost";
$dbname = "gmail_clone";
$username = "root";
$password = "";

try {
    $pdo = new PDO("mysql:host=$host;dbname=$dbname;charset=utf8mb4", $username, $password);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    die("Database connection failed: " . $e->getMessage());
}

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $action = $_POST["action"] ?? "";

    if ($action === "add_email") {
        $email = trim($_POST["email"] ?? "");

        if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            echo json_encode(["success" => false, "message" => "Email format is wrong"]);
            exit;
        }

        $stmt = $pdo->prepare("INSERT INTO emails (email) VALUES (?)");
        $stmt->execute([$email]);

        echo json_encode(["success" => true]);
        exit;
    }

    if ($action === "get_emails") {
        $stmt = $pdo->query("SELECT * FROM emails ORDER BY id ASC");
        echo json_encode($stmt->fetchAll(PDO::FETCH_ASSOC));
        exit;
    }

    if ($action === "delete_email") {
        $id = $_POST["id"] ?? 0;

        $stmt = $pdo->prepare("DELETE FROM emails WHERE id = ?");
        $stmt->execute([$id]);

        echo json_encode(["success" => true]);
        exit;
    }
}

include "trash.php";
?>