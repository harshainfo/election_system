<?php
header('Content-type: application/json; charset=UTF-8');
    require_once 'dbcon.php';
	if(isset($_POST['state']) && !empty($_POST['state'])){
 			
			$state = $_POST['state'];
			
			$query = "SELECT distinct zip_code as zip FROM precinct WHERE state=:state";
			
			$stmt = $DBcon->prepare( $query ); 
			$stmt->execute(array(':state'=>$state));
			$rows = $stmt->fetchAll();
			

			echo json_encode($rows);
			
	}


	?>
