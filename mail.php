<?php 
    use PHPMailer\PHPMailer\PHPMailer;
    use PHPMailer\PHPMailer\Exception;
    require 'PHPMailer-master/src/Exception.php';
    require 'PHPMailer-master/src/PHPMailer.php';
    require 'PHPMailer-master/src/SMTP.php';

function send_mail($recipient,$subject,$message){
        $mail = new PHPMailer(true);

        $mail -> isSMTP();
        $mail -> Host = "smtp.gmail.com";
        $mail -> SMTPAuth = TRUE;
        $mail -> Username = "andubaaaa.ek@gmail.com";
        $mail -> Password = "ggxcokwgtanzrcvq";
        $mail -> SMTPSecure = "ssl";
        $mail -> Port = 465;
       
        $mail -> isHTML(true);
        $mail -> addAddress($_POST["email"], "esteemed customer");
        $mail -> setFrom("andubaaaa.ek@gmail.com", "Vl4dAcademy");
        $mail -> Subject = $subject;
        $mail -> Body = "Acesta este codul dumneavoastra!";
        $content = $message;

        $mail -> MsgHTML($content);
        $mail -> send();
    }
    