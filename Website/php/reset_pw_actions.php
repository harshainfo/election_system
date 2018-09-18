<?php

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

header('Content-type: application/json; charset=UTF-8');

require_once 'dbcon.php';
require 'PHPMailer/Exception.php';
require 'PHPMailer/PHPMailer.php';
require 'PHPMailer/SMTP.php';

if (isset($_POST['pw']) && !empty($_POST['pw'])) {

   $pwd = strval($_POST['pw']);
   $reset_key = strval($_POST['reset_key']);
 

   $querySelect = "SELECT pr.user_id, u.email, u.first_name, u.last_name FROM password_reset pr, user u WHERE pr.reset_key=:reset_key AND pr.time_expiry > now() AND pr.time_reset IS NULL AND u.user_id = pr.user_id";
   $stmt1 = $DBcon->prepare( $querySelect ); 
   $stmt1->execute(array(':reset_key'=>$reset_key));
   $count = 0;
   $user_id = "";
   $email = "";
   $fname = "";
   $lname = "";
   while ($row = $stmt1->fetch(PDO::FETCH_NUM, PDO::FETCH_ORI_NEXT)) {
      // echo ('In While User ID='. $row[0]);
      // exit;
     $user_id = $row[0];
     $email = $row[1];
     $fname = $row[2];
     $lname = $row[3];
   }
   // echo 'After While';
   // exit;
   if( $user_id != "" ){
      
      $queryUpdatePWReset = "UPDATE password_reset pr SET pr.time_reset = now(), pr.result = 'Reset' WHERE pr.reset_id=:reset_key AND pr.time_expiry > now()";
      $stmt2 = $DBcon->prepare( $queryUpdatePWReset ); 
      $stmt2->execute(array(':reset_key'=>$reset_key));
      
      $queryUpdateUser = "UPDATE user u SET u.password = :password WHERE u.user_id = :user_id";
      $stmt2 = $DBcon->prepare( $queryUpdateUser ); 
      $stmt2->execute(array(':user_id'=>$user_id, ':password'=>$pwd));

      $subject = "EMS Password Reset Complete!";
      $txt = "Dear ". $fname . " " . $lname ."," . PHP_EOL ."You have successfully reset your password for EMS!" . PHP_EOL;
      
      $txt .= "Best regards," . PHP_EOL . PHP_EOL ."Support Team" . PHP_EOL ."EMS System";

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

      $msg = "Your password successfully reset!" . PHP_EOL . PHP_EOL;
      $msg .= "Go back to <a href='index.php'>login</a> page to log in.";
   }else{
      $msg = "The link seems to be invalid!" . PHP_EOL . PHP_EOL;
      $msg .= "Go back to <a href='forgotPassword.php'>forgot password</a> page to request a new reset e-mail.";
      
   }
     
   echo $msg;
   exit; 

}

?>