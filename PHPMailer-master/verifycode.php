<?php
require 'PHPMailerAutoload.php';

$mail = new PHPMailer;

$to = $_POST['email'];
$verifycode = $_POST['verifycode'];
//$mail->SMTPDebug = 3;                               // Enable verbose debug output

$mail->isSMTP();                                      // Set mailer to use SMTP
$mail->Host = 'smtp1.example.com;smtp2.example.com';  // Specify main and backup SMTP servers
$mail->CharSet = 'UTF-8';
$mail->SMTPAuth = true;                               // Enable SMTP authentication
$mail->Port = 25;
$mail->Host = "smtp.163.com";

$mail->Username = 'xingzhecaojian@163.com';                 // SMTP username
$mail->Password = '53441436Aa';                           // SMTP password
$mail->SMTPSecure = 'tls';                            // Enable TLS encryption, `ssl` also accepted 

$mail->From = 'xingzhecaojian@163.com';
$mail->FromName = 'Mailer';
$mail->addAddress($to);     // Add a recipient
$mail->addReplyTo('xingzhecaojian@163.com', 'Information');

$mail->WordWrap = 50;                                 // Set word wrap to 50 characters
//$mail->addAttachment('/var/tmp/file.tar.gz');         // Add attachments
//$mail->addAttachment('/tmp/image.jpg', 'new.jpg');    // Optional name
//$mail->isHTML(true);                                  // Set email format to HTML

$mail->Subject = 'telesport:';
$mail->Body    = '验证码 '.$verifycode;
$mail->AltBody = 'This is the body in plain text for non-HTML mail clients';

if(!$mail->send()) {
    echo 'Message could not be sent.';
    echo 'Mailer Error: ' . $mail->ErrorInfo;
} else {
    echo 'Message has been sent';
}