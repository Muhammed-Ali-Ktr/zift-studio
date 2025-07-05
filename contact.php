<?php
if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $name = htmlspecialchars($_POST["name"]);
    $email = htmlspecialchars($_POST["email"]);
    $project = htmlspecialchars($_POST["project"]);
    $message = htmlspecialchars($_POST["message"]);

    $to = "muhammedalikitir.tr@gmail.com"; // Buraya kendi mail adresini yaz
    $subject = "Yeni İletişim Mesajı - Zift Studio";
    $body = "
        <strong>Ad Soyad:</strong> $name<br>
        <strong>E-posta:</strong> $email<br>
        <strong>Proje Türü:</strong> $project<br>
        <strong>Mesaj:</strong><br>$message
    ";

    $headers = "MIME-Version: 1.0" . "\r\n";
    $headers .= "Content-type: text/html; charset=UTF-8" . "\r\n";
    $headers .= "From: $email" . "\r\n";

    if (mail($to, $subject, $body, $headers)) {
        echo "success";
    } else {
        echo "error";
    }
}
?>