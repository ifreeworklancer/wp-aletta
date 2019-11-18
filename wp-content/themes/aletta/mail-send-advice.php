<?php
if (isset($_POST['name_advice']) && isset($_POST['phone_advice']) && isset($_POST['email_advice'])) {
    $name = $_POST['name_advice'];
    $phone = $_POST['phone_advice'];
    $email = $_POST['email_advice'];
    $to = 'aletta.com.ua@gmail.com';
    $subject = 'Форма обратной связи с сайта Aletta';
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