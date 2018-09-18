<?php

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

header('Content-type: application/json; charset=UTF-8');

require_once 'dbcon.php';
require 'PHPMailer/Exception.php';
require 'PHPMailer/PHPMailer.php';
require 'PHPMailer/SMTP.php';
require 'keyGenerator.php';

if (isset($_POST['email']) && !empty($_POST['email'])) {

   $email = strval($_POST['email']);
 
   $queryEmail = "SELECT u.user_id, u.first_name, u.last_name FROM user u WHERE u.email=:email";
   $stmt1 = $DBcon->prepare( $queryEmail ); 
   $stmt1->execute(array(':email'=>$email));
   $fname = "";
   $lname = "";
   $userid = "";
   while ($row = $stmt1->fetch(PDO::FETCH_NUM, PDO::FETCH_ORI_NEXT)) {
      //$data = $row[0] . "\t" . $row[1] . "\t" . $row[2] . "\n";
      $userid = $row[0];
      $fname = $row[1];
      $lname = $row[2];
   }
   if($fname == "" && $lname == ""){

   }else{
      $key = GeraHash(20);

      $queryInsert = "INSERT INTO `password_reset`(`user_id`, `reset_key`, `time_created`, `time_expiry`) VALUES (:user_id, :reset_key, now(), DATE_ADD(now(), INTERVAL 1 DAY))";
      $stmt = $DBcon->prepare( $queryInsert ); 
      $stmt->execute(array(':user_id'=>$userid, ':reset_key'=>$key));


      $link = "localhost/ems/passwordReset.php?key=".$key;

      $subject = "EMS Password Reset Requested!";
      $txt = "Dear ". $fname . " " . $lname . "," ."\n" ."Click on the link below or paste it in your browser's address bar to reset your forgotten password!". PHP_EOL . PHP_EOL;
      $txt .= "<a href='". $link ."'>". $link ."</a>". PHP_EOL . PHP_EOL;
      $txt .= "Best regards,". PHP_EOL . PHP_EOL . "Support Team". PHP_EOL . "EMS System";

      $mail = new PHPMailer();
      $mail->IsSMTP();
      $mail->SMTPDebug = 0;
      $mail->SMTPAuth = TRUE;
      $mail->SMTPSecure = "tls";
      $mail->Port     = 587;  
      $mail->Username = "ems.team8";
      $mail->Password = "team8uiowa";
      $mail->Host     = "smtp.gmail.com";
      $mail->Mailer   = "smtp";
      $mail->SetFrom("ems.team8@gmail.com", "Election Management System");
      $mail->AddReplyTo("ems.team8@gmail.com", "PHPPot");
      $mail->AddAddress($email);
      $mail->Subject = $subject;
      $mail->WordWrap   = 80;
      $content = $txt; 
      $mail->MsgHTML($content);
      $mail->IsHTML(true);
      if(!$mail->Send()) 
      echo "Problem sending email.";
   }
   $msg = "We have sent an e-mail containing a password reset link. Please use that to reset your forgotten password.". PHP_EOL ."Note:The reset link will expire after 24 hours!" . PHP_EOL . PHP_EOL ;
   $msg .= "Go back to <a href='index.php'>login</a> page.";
   
   echo $msg;
   exit; 

}

?>