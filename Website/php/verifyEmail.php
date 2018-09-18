<?php

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

header('Content-type: application/json; charset=UTF-8');

require_once 'dbcon.php';
require 'PHPMailer/Exception.php';
require 'PHPMailer/PHPMailer.php';
require 'PHPMailer/SMTP.php';

if (isset($_POST['key']) && !empty($_POST['key'])) {

   $key = strval($_POST['key']);
   
   $querySelect = "SELECT v.user_id, vh.vot_loc_hist_id, v.voter_id, u.first_name, u.last_name, u.email FROM voter v, voter_history vh, vot_loc_history vlh WHERE vh.comment =:comment AND vh.voter_id = v.voter_id AND v.user_id = u.user_id";

   $stmt1 = $DBcon->prepare( $querySelect ); 
   $stmt1->execute(array(':comment'=>$key));
   $user_id = "";
   $vot_loc_hist_id = "";
   $voter_id = "";
   $fname = "";
   $lname = "";
   $email = "";
   
   while ($row = $stmt1->fetch(PDO::FETCH_NUM, PDO::FETCH_ORI_NEXT)) {
      // echo ('In While User ID='. $row[0]);
      // exit;
     $user_id = $row[0];
     $vot_loc_hist_id = $row[1];
     $voter_id = $row[2];
     $fname = $row[3];
   	 $lname = $row[4];
   	 $email = $row[5];

    
   }
   // echo 'After While';
   // exit;
   if( $user_id != "" ){
      $queryUpdate = "UPDATE voter_history vh SET vh.end_date = now(), vh.ended_by = :ended_by WHERE vh.comment=:comment";


      $stmt2 = $DBcon->prepare( $queryUpdate ); 
      $stmt2->execute(array(':comment'=> $key,
  							':ended_by' => $user_id));
      
      $queryInsert = "INSERT INTO voter_history(voter_id, status, start_date, granted_by, vot_loc_hist_id) VALUES (:voter_id, 'Pending', now(), :granted_by, :vot_loc_hist_id)";
      $stmt3 = $DBcon->prepare( $queryInsert ); 
      $stmt3->execute(array(':voter_id'=>$voter_id,
      						':granted_by' =>$user_id,
      						'vot_loc_hist_id'=>$vot_loc_hist_id ));

      $subject = "EMS E-mail verified!";
      $txt = "Dear ". $fname . " " . $lname ."," . PHP_EOL ."You have successfully verified your e-mail for EMS!" . PHP_EOL;
      
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

      $msg = "Your e-mail verification was successfull!" . PHP_EOL . PHP_EOL;
      $msg .= "Go back to <a href='index.php'>login</a> page to log in.";
   }else{
      $msg = "The link seems to be invalid!" . PHP_EOL . PHP_EOL;
      $msg .= "Go back to <a href='forgotPassword.php'>login</a> page to re-register and receive a new verification e-mail.";
      
   }
     
   echo $msg;
   exit; 

}

?>