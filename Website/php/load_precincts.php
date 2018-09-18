<?php
header('Content-type: application/json; charset=UTF-8');
    require_once 'dbcon.php';
	if(isset($_POST['state']) && !empty($_POST['state']) && isset($_POST['zip']) && !empty($_POST['zip'])){
 			//echo "Harsha";
			$state = $_POST['state'];
			$zip = $_POST['zip'];
			$query = "SELECT prec_id, prec_name FROM precinct WHERE state=:state AND zip_code=:zip";
			
			$stmt = $DBcon->prepare( $query ); 
			$stmt->execute(array(':state'=>$state, ':zip'=>$zip));
			$rows = $stmt->fetchAll();
			echo json_encode($rows);
			
	}

?>
