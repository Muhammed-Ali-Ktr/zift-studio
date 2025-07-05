<?php
require_once("../db/config.php");

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $email = trim($_POST["email"]);
    $password = password_hash($_POST["password"], PASSWORD_BCRYPT);

    try {
        $stmt = $pdo->prepare("INSERT INTO newsletter_subscribers (email, password) VALUES (?, ?)");
        $stmt->execute([$email, $password]);
        echo "success";
    } catch (PDOException $e) {
        if ($e->getCode() == 23000) {
            echo "duplicate";
        } else {
            echo "error";
        }
    }
}
?>