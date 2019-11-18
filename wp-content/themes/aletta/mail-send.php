<?php
if (isset($_POST['name']) && isset($_POST['phone']) && isset($_POST['email']) && isset($_POST['product'])) {
    $name = $_POST['name'];
    $phone = $_POST['phone'];
    $email = $_POST['email'];
    $product = $_POST['product'];
    $to = 'aletta.com.ua@gmail.com';
    $subject = 'Форма заявки с сайта Aletta';
    $message = "
    <html>
        <head>
        <title>{$subject}</title>
        <style>body{font: normal 1rem/1.5 sans-serif;}</style>
        </head>
        <body>
        <h2>Заявка от {$name}</h2>
        <p>Телефон: {$phone}</p>
        <p>Email: {$email}</p>
        <p>Товар: {$product}</p>
        </body>
        </html>
    ";
    $headers = 'From: ' . $email . "\r\n" .
        'Reply-To: ' . $to . "\r\n" .
        'X-Mailer: PHP/' . phpversion();
    $headers = 'MIME-Version: 1.0' . "\r\n";
    $headers .= 'Content-type: text/html; charset=utf-8' . "\r\n";
    mail($to, $subject, $message, $headers);
    header('Location: /spasibo');
}