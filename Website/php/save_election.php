<?php
	header('Content-type: application/json; charset=UTF-8');
    require_once 'dbcon.php';
 	if(isset($_POST['actionId']) && !empty($_POST['actionId'])){
 		$actionId = strval($_POST['actionId']);
		$action = substr($actionId, 0, 3);
		 
 		

 		if($action == 'edi'){

			$elec_id = intval(substr($actionId, 3, (strlen($actionId)-3))); 	
			$elec_date = $_POST['elec_date'];
			$elec_title =$_POST['elec_title'];
			

			$queryUpdate = "UPDATE election SET elec_date = :elec_date, elec_title = :elec_title";
			$stmt1 = $DBcon->prepare( $queryUpdate ); 
			$stmt1->execute(array(':elec_id'=>$elec_id, ':elec_date'=>$elec_date, ':elec_title'=>$elec_title));

			$query = "SELECT * FROM election";
			$stmt = $DBcon->prepare( $query ); 
			$stmt->execute();
			$rows = $stmt->fetchAll();
			echo json_encode($rows);
			exit;
				
		}else if($action == 'del'){
			$elec_id = intval(substr($actionId, 3, (strlen($actionId)-3)));
			$status;
			$querySelect = "SELECT status FROM election WHERE elec_id=:elec_id";
			$stmt1 = $DBcon->prepare( $querySelect ); 
			$stmt1->execute(array(':elec_id'=>$elec_id));
			$results = $stmt1->fetchAll();
			//$results = $querySelect->fetchAll(PDO::FETCH_ASSOC);
			foreach($results as $row) {
			   $status = $row['status'];
			}

			$queryUpdate = "UPDATE election SET status = :newStatus WHERE elec_id=:elec_id";
			$stmt2 = $DBcon->prepare( $queryUpdate ); 
			$stmt2->execute(array(':elec_id'=>$elec_id, ':newStatus'=>$newStatus));

			$query = "SELECT * FROM election";
			$stmt = $DBcon->prepare( $query ); 
			$stmt->execute();
			$rows = $stmt->fetchAll();
			echo json_encode($rows);
			exit();

		}
		
	}

?>
