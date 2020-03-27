<?php
    if(isset($_POST['send'])) {

        require_once __DIR__ ."/configDB.inc.php";
        require_once __DIR__ ."/functions.inc.php";

        $name = check_entered($_POST['name']);
        $mailFrom = check_entered($_POST['email']);
        $message = check_entered($_POST['message']);
        $subject = check_entered($_POST['subject']);

        if(empty($name) || empty($mailFrom) || empty($message) || empty($subject)) {
			header("Location: ../contactus?send=empty");
			exit();
        }
        elseif(strlen($message) < 15) {
            header("Location: ../contactus?send=message&name=$name&mail=$mailFrom&subject=$subject");
			exit();
        }
        elseif(!filter_var($email, FILTER_VALIDATE_EMAIL)) {
			header("Location: ../contactus?send=email&name=$name&message=$message&subject=$subject");
            exit();
        } else {
            $message = wordwrap($message, 70, "\r\n");
            $mailTo = "mail@mail.com"; //need real mail
            $headers = "From: ".$mailFrom;
            $txt = "You have received an e-mail from ".$name.".\r\n".$message;
    
            mail($mailTo, $subject, $txt, $headers);
    
            header('Location: ../contactus?send=success');
            exit();
        }
        
    } else {
        header('Location: ../contactus?send=error');
        exit();
    }
?>