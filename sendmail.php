<?php

include "../../config/database.php";
foreach($_POST as $key=>$val){$$key = $val;}

 $subj   = "This is a subject";
 $body   = "Good Day!. <br /> Sorry your registration has been declined.";


if($status == "accept"){
    require("../../phpmailer/class.phpmailer.php");
    $mail = new PHPMailer();
    $mail->IsSMTP();                                                       // set mailer to use SMTP
    $mail->Host = "ssl://smtp.gmail.com";                                  // Host 
    $mail->Port = 465;                                                     // Port
    $mail->SMTPAuth = true;                                                // turn on SMTP authentication
    $mail->Username = "email";                                 // SMTP username
    $mail->Password = "email password";                                    // SMTP password
    $mail->setFrom('email', 'your name');
    $mail->AddAddress("receiver email here","receiver name");                       // name is optional
    #$mail->addReplyTo('email', 'your name');                     // reply
    #$mail->addCC('receiver email here');
    #$mail->addCC($a_email);
    $mail->WordWrap = 50;                                                  // set word wrap to 50 characters
    #$mail->AddAttachment("/var/tmp/file.tar.gz");                         // add attachments
    #$mail->AddAttachment("/tmp/image.jpg", "new.jpg");                    // optional name
    $mail->IsHTML(true);                                                   // set email format to HTML
    $mail->Subject = $subj;
    $mail->Body    = $body;
    if(!$mail->Send())
    {
       echo "Message could not be sent. <p>";
       echo "Mailer Error: " . $mail->ErrorInfo;
       exit;
    }else   echo "$msgid Accepted.. Email has been sent to $a_email";
}
?>
