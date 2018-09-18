<?php

header('Content-type: application/json; charset=UTF-8');

require_once 'dbcon.php';

if (isset($_POST['status']) && !empty($_POST['status'])) {

  $status = $_POST['status'];

  if($action == 'pending'){
   $query = "SELECT v.voter_id, u.first_name, u.last_name, v.proof_id, v.id_no, v.address1, v.address2, v.city, v.state, v.zip_code, u.phone, u.email, vh.status, vh.start_date, VH.end_date FROM voter_history vh, voter v, user u WHERE vh.status = 'Pending' AND u.user_id=v.USER_id AND vh.voter_id = v.voter_id";
   $stmt = $DBcon->prepare( $query ); 
   $stmt->execute(array(':vid'=>$vid));
   $row=$stmt->fetch(PDO::FETCH_ASSOC);       
   echo json_encode($row);
   exit; 
}else if($action == 'reg'){
   /*
   $queryUpdate = "UPDATE voter SET status = 'registered' WHERE voter_id=:vid";
   $stmt = $DBcon->prepare( $queryUpdate ); 
   $stmt->execute(array(':vid'=>$vid));
   $query = "SELECT * FROM voter WHERE status='pending'";
   $stmt = $DBcon->prepare( $query ); 
   $stmt -> execute();
   $rows = $stmt->fetchAll();
   echo json_encode($rows);
   exit; 
   */
}else if($action == 'rej'){
   //echo "In rej";
   if(isset($_POST['comment']) && !empty($_POST['comment'])){
      //echo $_POST['comment'];
      $comment = $_POST['comment'];

      $queryUpdate = "UPDATE voter SET status = 'rejected', comment = :comment WHERE voter_id=:vid";
      $stmt = $DBcon->prepare( $queryUpdate ); 
      $stmt->execute(array(':vid'=>$vid,':comment'=>$comment));

      $queryEmail = "SELECT email, first_name, last_name FROM voter WHERE voter_id=:vid";
      $stmt1 = $DBcon->prepare( $queryEmail ); 
      $stmt1->execute(array(':vid'=>$vid));
      while ($row = $stmt1->fetch(PDO::FETCH_NUM, PDO::FETCH_ORI_NEXT)) {
         //$data = $row[0] . "\t" . $row[1] . "\t" . $row[2] . "\n";
         $email = $row[0];
         $fname = $row[1];
         $lname = $row[2];
      }
      
      
      $subject = "Voter application Rejected!";
      $txt = "Dear ". $fname . " " . $lname ."\n".",We regret to inform you that your voter application has been rejected. Please find below mentioned details for comments:\n". $comment;
      

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

         $query = "SELECT * FROM voter WHERE status='pending'";
      $stmt2 = $DBcon->prepare( $query ); 
      $stmt2-> execute();
      $rows = $stmt2->fetchAll();
      echo json_encode($rows);
      exit; 
      //mail($email,$subject,$txt);
      
      
   }



}else if($action == 'pen'){
   $queryUpdate = "UPDATE voter SET status = 'pending' WHERE voter_id=:vid";
   $stmt = $DBcon->prepare( $queryUpdate ); 
   $stmt->execute(array(':vid'=>$vid));
   $query = "SELECT * FROM voter WHERE status='pending'";
   $stmt = $DBcon->prepare( $query ); 
   $stmt->execute();
   $rows = $stmt->fetchAll();
   echo json_encode($rows);
   exit; 

}

}


?>