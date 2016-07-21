<?php

require_once "PHPMailer/PHPMailerAutoload.php";

if(isset($_POST['title'])){
	$title = $_POST['title'];
}else{
	$title = NULL;
}

if(isset($_POST['subject'])){
	$subject = $_POST['subject'];
}else{
	$subject = NULL;
}


//PHPMailer Object
$mail = new PHPMailer;

//From email address and name
$mail->From = "admin@ssc.com";
$mail->FromName = "Satish Shah Corporation";

//To address and name
$mail->addAddress("gandhi.sarjak@gmail.com", "Recepient Name");
//$mail->addAddress("recepient1@example.com"); //Recipient name is optional

//Address to which recipient will reply
$mail->addReplyTo("no-reply@yourdomain.com", "Reply");

//CC and BCC
//$mail->addCC("cc@example.com");
//$mail->addBCC("bcc@example.com");

//Send HTML or Plain Text email
$mail->isHTML(true);

$mail->Subject = $title;
$mail->Body = $subject;
$mail->AltBody = $subject;

if(!$mail->send()) 
{
    echo "Mailer Error: " . $mail->ErrorInfo;
} 
else 
{
    echo "Message has been sent successfully";
}

?>