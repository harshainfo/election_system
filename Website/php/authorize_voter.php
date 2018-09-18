<?php

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;



header('Content-type: application/json; charset=UTF-8');

require_once 'dbcon.php';
require 'PHPMailer/Exception.php';
require 'PHPMailer/PHPMailer.php';
require 'PHPMailer/SMTP.php';

if (isset($_POST['actionId']) && !empty($_POST['actionId']) && isset($_POST['elecs']) && !empty($_POST['elecs'])) {
   echo "In php";
   exit;

 $actionId = strval($_POST['actionId']);
 $action = substr($actionId, 0, 3);
 $vid = intval(substr($actionId, 3, (strlen($actionId)-3)));

 $elecs = unserialize($_POST['elecs']);

   if($action == 'aut'){
         foreach ($elecs as $election) {
            $queryInsert = "INSERT INTO election_voter_log(elec_id, voter_id, status, date_time, granted_by) VALUES (:elect_id, :voter_id, :status, now(), :granted_by)";
            $stmt = $DBcon->prepare( $queryInsert ); 
            $stmt->execute(array('elec_id'=>$election,':vid'=>$vid, ':status'=>'Authorized', ':granted_by'=>'1'));
         }
         /*
         $queryEmail = "SELECT u.email, u.first_name, u.last_name FROM voter v, user u WHERE v.user_id = u.user_id AND v.voter_id=:vid";
         $stmt1 = $DBcon->prepare( $queryEmail ); 
         $stmt1->execute(array(':vid'=>$vid));
         while ($row = $stmt1->fetch(PDO::FETCH_NUM, PDO::FETCH_ORI_NEXT)) {
            //$data = $row[0] . "\t" . $row[1] . "\t" . $row[2] . "\n";
            $email = $row[0];
            $fname = $row[1];
            $lname = $row[2];
         }
         
         
         $subject = "Voter application Registered!";
         $txt = "Dear ". $fname . " " . $lname ."\n".",We are pleased to inform you that your voter application has been registered.";

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
         else 
         //echo "email sent.";

         $query = "SELECT * FROM voter_view WHERE status = 'Pending'";
         $stmt2 = $DBcon->prepare( $query ); 
         $stmt2-> execute();
         $rows = $stmt2->fetchAll();
         */
         echo json_encode(count($elecs));
         exit; 
   }



   }

   
?>