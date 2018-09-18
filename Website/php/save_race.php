<?php
	header('Content-type: application/json; charset=UTF-8');
    require_once 'dbcon.php';
 	if(isset($_POST['actionId']) && !empty($_POST['actionId'])){
 		$actionId = strval($_POST['actionId']);
		$action = substr($actionId, 0, 3);
		 
 		

 		if($action == 'edi'){

			$race_id = intval(substr($actionId, 3, (strlen($actionId)-3))); 	
			$race_title = $_POST['race_title'];
			$race_type =$_POST['race_type'];
			$elec_id =$_POST['elec_id'];
			$egu_id =$_POST['egu_id'];
			

			$queryUpdate = "UPDATE race SET race_title = :race_title, race_type = :race_type,elec_id = :elec_id, egu_id = :egu_id";
			$stmt1 = $DBcon->prepare( $queryUpdate ); 
			$stmt1->execute(array(':race_id'=>$race_id, ':race_title'=>$race_title, ':race_type'=>$race_type,:elec_id'=>$elec_id,:egu_id'=>$egu_id));

			$query = "SELECT * FROM race";
			$stmt = $DBcon->prepare( $query ); 
			$stmt->execute();
			$rows = $stmt->fetchAll();
			echo json_encode($rows);
			exit;
				
		}else if($action == 'del'){
			$race_id = intval(substr($actionId, 3, (strlen($actionId)-3)));
			$status;
			$querySelect = "SELECT status FROM race WHERE race_id=:race_id";
			$stmt1 = $DBcon->prepare( $querySelect ); 
			$stmt1->execute(array(':race_id'=>$race_id));
			$results = $stmt1->fetchAll();
			//$results = $querySelect->fetchAll(PDO::FETCH_ASSOC);
			foreach($results as $row) {
			   $status = $row['status'];
			}
			
			$query = "SELECT * FROM race";
			$stmt = $DBcon->prepare( $query ); 
			$stmt->execute();
			$rows = $stmt->fetchAll();
			echo json_encode($rows);
			exit();

		}
		
	}

?>
