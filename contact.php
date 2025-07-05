<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $to = "muhammedalikitir.tr@gmail.com"; // Buraya kendi e-posta adresini yaz
    $name = htmlspecialchars($_POST["name"]);
    $email = filter_var($_POST["email"], FILTER_SANITIZE_EMAIL);
    $project = htmlspecialchars($_POST["project"]);
    $message = htmlspecialchars($_POST["message"]);

    $subject = "Yeni İletişim Formu Mesajı - $project";
    $body = "Ad Soyad: $name\nE-posta: $email\nProje Türü: $project\n\nMesaj:\n$message";
    $headers = "From: $email";

    if (mail($to, $subject, $body, $headers)) {
        echo "success";
    } else {
        echo "error";
    }
} else {
    header("Location: index.html");
    exit();
}
?>