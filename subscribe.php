<?php
$host = "localhost";
$db = "ziftstudio"; // Veritabanı adın
$user = "root";     // Genelde root
$pass = "";         // Parolan (XAMPP için genelde boştur)

$conn = new mysqli($host, $user, $pass, $db);
if ($conn->connect_error) {
    die("Veritabanı bağlantı hatası: " . $conn->connect_error);
}

$email = filter_var($_POST['email'], FILTER_SANITIZE_EMAIL);
$password = password_hash($_POST['password'], PASSWORD_DEFAULT); // Şifreyi güvenli hashle

$stmt = $conn->prepare("INSERT INTO subscribers (email, password) VALUES (?, ?)");
$stmt->bind_param("ss", $email, $password);

if ($stmt->execute()) {
    echo "success";
} else {
    echo "error";
}

$stmt->close();
$conn->close();
?>