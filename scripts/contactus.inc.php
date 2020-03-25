<?php
    if(isset($_POST['send'])) {
        $mailFrom = trim($_POST['email']);
        $message = trim($_POST['message']);
        $subject = trim($_POST['subject']);

        if(trim($mailFrom) == ""){
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
        $message = wordwrap($message, 70, "\r\n");
        $mailTo = "mail@mail.com";

        $headers = "From: ".$mailFrom;
        $txt = "You have received an e-mail from ".$name.".\r\n".$message;

        mail($mailTo, $subject, $txt, $headers);

        header('Location: ../contactus?send=success');
    }
?>