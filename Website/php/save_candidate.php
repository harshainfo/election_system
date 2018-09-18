<?php
	header('Content-type: application/json; charset=UTF-8');
    require_once 'dbcon.php';
 	if(isset($_POST['actionId']) && !empty($_POST['actionId'])){
 		$actionId = strval($_POST['actionId']);
		$action = substr($actionId, 0, 3);
		 
 		

 		if($action == 'edi'){

			$cand_id = intval(substr($actionId, 3, (strlen($actionId)-3))); 	
			$cand_fname = $_POST['cand_fname'];
			$cand_lname =$_POST['cand_lname'];
			$cand_dob = $_POST['cand_dob'];
			$gender = $_POST['gender'];
			$civil_status = $_POST['civil_status'];
			$cand_add1 = $_POST['cand_add1'];
			$cand_add2 = $_POST['cand_add2'];
			$cand_city = $_POST['cand_city'];
			$cand_state = $_POST['cand_state'];
			$cand_zipcode = $_POST['cand_zipcode'];
			$cand_phone = $_POST['cand_phone'];
			$cand_email = $_POST['cand_email'];
			$curr_party = $_POST['curr_party'];

			$queryUpdate = "UPDATE candidate SET cand_fname = :cand_fname, cand_lname = :cand_lname, cand_dob = :cand_dob, gender = :gender, civil_status = :civil_status, cand_add1 = :cand_add1,
			cand_add2 = :cand_add2, cand_city = :cand_city, cand_state = :cand_state, cand_zipcode = :cand_zipcode, cand_phone = :cand_phone, cand_email = :cand_email,
			curr_party = :curr_party, WHERE cand_id=:cand_id";
			$stmt1 = $DBcon->prepare( $queryUpdate ); 
			$stmt1->execute(array(':cand_id'=>$cand_id, ':cand_fname'=>$cand_fname, ':cand_lname'=>$cand_lname, ':cand_dob'=>$cand_dob, ':gender'=>$gender, ':civil_status'=>$civil_status, ':cand_add1'=>$cand_add1,
			':cand_add2'=>$cand_add2, ':cand_city'=>$cand_city, ':cand_state'=>$cand_state, ':cand_zipcode'=>$cand_zipcode, ':cand_phone'=>$cand_phone, ':cand_email'=>$cand_email, ':cand_party'=>$cand_party));

			$query = "SELECT * FROM candidate";
			$stmt = $DBcon->prepare( $query ); 
			$stmt->execute();
			$rows = $stmt->fetchAll();
			echo json_encode($rows);
			exit;
				
		}else if($action == 'del'){
			$cand_id = intval(substr($actionId, 3, (strlen($actionId)-3)));
			$status;
			$querySelect = "SELECT status FROM party WHERE party_id=:partyId";
			$stmt1 = $DBcon->prepare( $querySelect ); 
			$stmt1->execute(array(':cand_id'=>$partyId));
			$results = $stmt1->fetchAll();
			//$results = $querySelect->fetchAll(PDO::FETCH_ASSOC);
			foreach($results as $row) {
			   $status = $row['status'];
			}
			$newStatus;
			if($status == 'active') {
				$newStatus = 'inactive';
			}else{
				$newStatus = 'active';
			}
			$queryUpdate = "UPDATE party SET status = :newStatus WHERE cand_id=:candId";
			$stmt2 = $DBcon->prepare( $queryUpdate ); 
			$stmt2->execute(array(':partyId'=>$partyId, ':newStatus'=>$newStatus));

			$query = "SELECT * FROM candidate";
			$stmt = $DBcon->prepare( $query ); 
			$stmt->execute();
			$rows = $stmt->fetchAll();
			echo json_encode($rows);
			exit();

		}
		
	}

?>
