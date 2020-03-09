<?php
    $email = $_POST['email'];
    $message = $_POST['message'];
    $error = '';

    if(trim($email) == ""){
        $error = "Введите email";
    } elseif(trim($message) == "") {
        $error = "Введите сообщение";
    } elseif(strlen($message) < 15) {
        $error = "Введите больше символов";
    }

    if($error != ''){
        echo $error;
        exit;
    }

    $subject = "=?utf-8?B?".base64_encode("Сообщение")."?=";
    $headers = "From: $email\r\nReply-to: $email\r\nContent-type: text/plain;charset=utf-8\r\n";

    mail($email, $subject, $message, $headers);

    header('Location: /contact.php')
?>