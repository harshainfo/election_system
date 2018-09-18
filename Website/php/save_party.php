<?php
	header('Content-type: application/json; charset=UTF-8');
    require_once 'dbcon.php';
 	if(isset($_POST['actionId']) && !empty($_POST['actionId'])){
 		$actionId = strval($_POST['actionId']);
		 $action = substr($actionId, 0, 3);
		 
 		

 		if($action == 'edi'){

			$partyId = intval(substr($actionId, 3, (strlen($actionId)-3)));
			$partyName = $_POST['partyName'];
			$dateCreated = $_POST['dateCreated'];
			$status = $_POST['status'];

			$queryUpdate = "UPDATE party SET party_name = :partyName, status = :status, date_created = :dateCreated WHERE party_id=:partyId";
			$stmt1 = $DBcon->prepare( $queryUpdate ); 
			$stmt1->execute(array(':partyId'=>$partyId, ':partyName'=>$partyName, ':dateCreated'=>$dateCreated, ':status'=>$status));

			$query = "SELECT * FROM party";
			$stmt = $DBcon->prepare( $query ); 
			$stmt->execute();
			$rows = $stmt->fetchAll();
			echo json_encode($rows);
			exit;
				
		}else if($action == 'del'){
			$partyId = intval(substr($actionId, 3, (strlen($actionId)-3)));
			$status;
			$querySelect = "SELECT status FROM party WHERE party_id=:partyId";
			$stmt1 = $DBcon->prepare( $querySelect ); 
			$stmt1->execute(array(':partyId'=>$partyId));
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
			$queryUpdate = "UPDATE party SET status = :newStatus WHERE party_id=:partyId";
			$stmt2 = $DBcon->prepare( $queryUpdate ); 
			$stmt2->execute(array(':partyId'=>$partyId, ':newStatus'=>$newStatus));

			$query = "SELECT * FROM party";
			$stmt = $DBcon->prepare( $query ); 
			$stmt->execute();
			$rows = $stmt->fetchAll();
			echo json_encode($rows);
			exit;

		}
		
	}

?>
