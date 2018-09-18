<?php
	header('Content-type: application/json; charset=UTF-8');
    require_once 'dbcon.php';
 	if(isset($_POST['actionId']) && !empty($_POST['actionId'])){
 		$actionId = strval($_POST['actionId']);
		 $action = substr($actionId, 0, 3);
		 
 		

 		if($action == 'edi'){

			$userId = intval(substr($actionId, 3, (strlen($actionId)-3)));
			$userName = $_POST['userName'];
			$password = $_POST['password'];
			$first_name = $_POST['first_name'];
            $last_name = $_POST['last_name'];
            $phone = $_POST['phone'];
            $email = $_POST['email'];
            $role = $_POST['role'];

			$queryUpdate = "UPDATE user SET username = :username, password = :password, first_name = :first_name, last_name = :last_name, phone = :phone, email = :email, role = :role WHERE user_id=:userId";
			$stmt1 = $DBcon->prepare( $queryUpdate ); 
			$stmt1->execute(array(':userId'=>$userId, ':userName'=>$userName, ':password'=>$password, ':first_name'=>$first_name, ':last_name'=>$last_name, ':phone'=>$phone, ':email'=>$email, ':role'=>$role));

			$query = "SELECT * FROM user";
			$stmt = $DBcon->prepare( $query ); 
			$stmt->execute();
			$rows = $stmt->fetchAll();
			echo json_encode($rows);
			exit;
				
		}else if($action == 'del'){
			$userId = intval(substr($actionId, 3, (strlen($actionId)-3)));
			$status;
			$querySelect = "SELECT status FROM user WHERE user_id=:userId";
			$stmt1 = $DBcon->prepare( $querySelect ); 
			$stmt1->execute(array(':userId'=>$userId));
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
			$queryUpdate = "UPDATE user SET status = :newStatus WHERE user_id=:userId";
			$stmt2 = $DBcon->prepare( $queryUpdate ); 
			$stmt2->execute(array(':userId'=>$userId, ':newStatus'=>$newStatus));

			$query = "SELECT * FROM user";
			$stmt = $DBcon->prepare( $query ); 
			$stmt->execute();
			$rows = $stmt->fetchAll();
			echo json_encode($rows);
			exit;

		}
		
	}

?>
