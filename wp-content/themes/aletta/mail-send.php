<?php
if (isset($_POST['name']) && isset($_POST['phone']) && isset($_POST['email']) && isset($_POST['product']) && isset($_POST['city']) && isset($_POST['branch'])) {
    $name = $_POST['name'];
    $phone = $_POST['phone'];
    $email = $_POST['email'];
    $lang = $_POST['lang'];
    $product = $_POST['product'];
    $city = $_POST['city'];
    $branch = $_POST['branch'];
    $to = 'aletta.com.ua@gmail.com';
    $subject = 'Форма заявки с сайта Aletta';
    $user_message = "";
    if (!empty($_POST['message'])) {
        $user_message = "<p>Коментарий к заказу: {$_POST['message']}</p>";
    }
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
        <p>Город: {$city}</p>
        <p>Отделение: {$branch}</p>
        {$user_message}
        </body>
        </html>
    ";
    $headers = 'From: ' . $email . "\r\n" .
        'Reply-To: ' . $to . "\r\n" .
        'X-Mailer: PHP/' . phpversion();
    $headers = 'MIME-Version: 1.0' . "\r\n";
    $headers .= 'Content-type: text/html; charset=utf-8' . "\r\n";
    mail($to, $subject, $message, $headers);
    header('Location: /' . $lang . '/spasibo');
}