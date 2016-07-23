<?php

require_once "PHPMailer/PHPMailerAutoload.php";

if(isset($_POST['title'])){
	$subject = $_POST['title'];
}else{
	$subject = NULL;
}

if(isset($_POST['subject'])){
	$message = $_POST['subject'];
}else{
	$message = NULL;
}

if(isset($_POST['to'])){
	$to = $_POST['to'];
}else{
	$to = NULL;
}


$mail = new PHPMailer();
$body = $message;
//$body = file_get_contents('contents.html');
//$body = eregi_replace("[\]",'',$body);
$mail->SMTPOptions = array(
    'ssl' => array(
        'verify_peer' => false,
        'verify_peer_name' => false,
        'allow_self_signed' => true
    )
);

$mail->IsSMTP(); // telling the class to use SMTP
//$mail->Host       = "mail.yourdomain.com"; // SMTP server
$mail->SMTPDebug  = 1;                     // enables SMTP debug information (for testing)
                                           // 1 = errors and messages
                                           // 2 = messages only
$mail->SMTPAuth   = true;                  // enable SMTP authentication
$mail->SMTPSecure = "tls";                 // sets the prefix to the servier
$mail->Host       = "smtp.gmail.com";      // sets GMAIL as the SMTP server
$mail->Port       = 587;                   // set the SMTP port for the GMAIL server
$mail->Username   = "gandhi.sarjak42@gmail.com";  // GMAIL username
$mail->Password   = "99251317766";            // GMAIL password

$mail->SetFrom('sscorporation@gmail.com', 'Satish Shah');

$mail->AddReplyTo("no-reply-sscorporation@gmail.com","Satish Shah");

$mail->Subject    = $subject;

//$mail->AltBody    = "To view the message, please use an HTML compatible email viewer!"; // optional, comment out and test

$mail->MsgHTML($body);

$address = $to;
$mail->AddAddress($address);

//$mail->AddAttachment("images/phpmailer.gif");      // attachment
//$mail->AddAttachment("images/phpmailer_mini.gif"); // attachment

if(!$mail->Send()) {
  echo "Mailer Error: " . $mail->ErrorInfo;
} else {
  echo "Message sent!";
}

//$to = "gandhi.sarjak@gmail.com";

//$headers = 'From: admin@sscorporation.co.in' . "\r\n" .
//'X-Mailer: PHP/' . phpversion();
//$headers .= "MIME-Version: 1.0\r\n";
//$headers .= "Content-Type: text/html; charset=ISO-8859-1\r\n";

//if(mail($to, $subject, $message, $headers)){

//}


//PHPMailer Object
//$mail = new PHPMailer;

//From email address and name
//$mail->From = "admin@ssc.com";
//$mail->FromName = "Satish Shah Corporation";

//To address and name
//$mail->addAddress("gandhi.sarjak@gmail.com", "Recepient Name");
//$mail->addAddress("recepient1@example.com"); //Recipient name is optional

//Address to which recipient will reply
//$mail->addReplyTo("no-reply@yourdomain.com", "Reply");

//CC and BCC
//$mail->addCC("cc@example.com");
//$mail->addBCC("bcc@example.com");

//Send HTML or Plain Text email
//$mail->isHTML(true);

//$mail->Subject = $title;
//$mail->Body = $subject;
//$mail->AltBody = $subject;
//
//if(!$mail->send()) 
//{
  //  echo "Mailer Error: " . $mail->ErrorInfo;
//} 
//else 
//{
    //echo "Message has been sent successfully";
//}

?>