<?php
    $name = $_POST['name'];
    $email = $_POST['email'];
    $temat = $_POST['temat'];
    $message = $_POST['message'];
    $formcontent="Od: $name \n Temat: $temat \n Wiadomość: $message";
    $recipient = "admin@mateuszmigot.pl";
    $subject = "Contact Form";
    $mailheader = "From: $email \r\n";
    mail($recipient, $subject, $formcontent, $mailheader) or die("Error!");
    header("Location: http://mateuszmigot.pl");
?>