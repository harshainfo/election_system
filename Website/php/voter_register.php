<?php
$servername = "localhost";
$username = "root";
$password = "root";
$dbname = "emsdb";

// Create connection
$conn = mysqli_connect($servername, $username, $password, $dbname);
// Check connection

require_once 'dbcon.php';
/*if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}
if($_POST['password']!=$_POST['password2']){
	echo("The passwords do not match. Try again.");
}
elseif(!filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)) {
    echo("The entered email is not formatted correctly. Please enter a valid email.");
}
*/
	$sql0 = "SELECT "
	
	$sql1 = "INSERT INTO user (username, first_name, last_name,password, phone, email, role)
	VALUES ('".$_POST["username"]."', '".$_POST["first_name"]."','".$_POST["last_name"]."','".$_POST["password"]."','".$_POST["phone_no"]."','".$_POST["email"]."','voter')";
	
	$last_user_id = 0;

	$msg = "";

	if ($DBcon->query($sql1) === TRUE) {
	    $last_user_id = $DBcon->insert_id;

	    echo $last_user_id;
	    exit;
	    $sql2 = "INSERT INTO voter(user_id) VALUES (:user_id)";
	    if($DBcon->query($sql2) === TRUE){
	    	$last_voter_id = $DBcon->insert_id;

	    	$sql3 = "INSERT INTO vot_loc_history(address1, address2, city, state, zip_code, proof_id, id_no, prec_id) VALUES (:address1, :address2, :city, :state, :zip_code, :proof_id, :id_no, :prec_id)";
	    	$stmt = $DBcon->prepare( $$sql3 );
	    	$arr = array(':address1'=>$_POST["address1"],
      							 ':address2'=>$_POST["address2"],
      							 ':city'=>$_POST["city"],
      							 ':state'=>$_POST["state"],
      							 ':zip_code'=>$_POST["zip_code"],
      							 ':proof_id'=>$_POST["proof_id"],
      							 ':id_no'=>$_POST["id_no"],
      							 ':prec_id'=>$_POST["prec_id"]);
      		

      		$last_vot_loc_id = 0;	
		    if($stmt->execute($arr) === TRUE){
		    	$last_vot_loc_id = $DBcon->insert_id;
		    	 $key = GeraHash(20);

		    	$sql4 = "INSERT INTO voter_history(status, start_date, granted_by, comment, vot_loc_hist_id) VALUES (:status, now(), :granted_by, :comment, :vot_loc_hist_id)";
		    	$stmt1 = $DBcon->prepare( $$sql4 );
		    	$arr1 = array(':status'=>'Unverified',
	      							 ':granted_by'=>$last_user_id,
	      							 ':comment'=>$key,
	      							 ':vot_loc_hist_id' =>$last_vot_loc_id);
		    	if($stmt1->execute($arr1) === TRUE ){

		    	 
		    	  
		    	  $link = "localhost/ems/verifyEmail.php?key=".$key;	
		    		
		    	  $subject = "EMS E-mail Verification Link!";
			      $txt = "Dear ". $fname . " " . $lname ."," . PHP_EOL ."Click on the link below or visit that by pasting it in your browser's address bar to verify your e-mail." . PHP_EOL;
			      $txt .= $link;
			      $txt .= "\n";
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

		    		$msg = "Your records were added to the database."
		    		$msg .= "However before you can proceed you should verify your e-mail address, by clicking on the link we have sent to you to the e-mail address you provided. Click here to go to <a href='index.php'>login</a> page." 
		    	}else{
		    		$msg = "There was an error in your registration."
		    		$msg .= "Click here to start a fresh registration <a href='registration_1.php'>register</a> page." 
		    	}

		    	
		    }else{
	    		$msg = "There was an error in your registration."
	    		$msg .= "Click here to start a fresh registration <a href='registration_1.php'>register</a> page." 
		    }
	    }else{
    		$msg = "There was an error in your registration."
    		$msg .= "Click here to start a fresh registration <a href='registration_1.php'>register</a> page." 
		}

	} else{
		$msg = "There was an error in your registration."
		$msg .= "Click here to start a fresh registration <a href='registration_1.php'>register</a> page." 
	}

	echo $msg;
	exit;

	// $sql2 = "INSERT INTO voter (id_no, address1, address2, city, state, zip_code,proof_id)
	// VALUES ('".$_POST["id_no"]."','".$_POST["address1"]."','".$_POST["address2"]."','".$_POST["city"]."','".$_POST["state"]."','".$_POST["zip_code"]."','1')";



	// if (mysqli_query($conn, $sql1) && mysqli_query($conn, $sql2)) {
	// 	echo "New record created successfully";
	// } else {
	// 	echo "Error: " . $sql . "<br>" . mysqli_error($conn);
	// }

	// mysqli_close($conn);

?>
