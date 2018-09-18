<?php

header('Content-type: application/json; charset=UTF-8');

require_once 'dbcon.php';

if (isset($_POST['username']) && !empty($_POST['username'])) {
	 	$query = "SELECT COUNT(username) FROM user WHERE username = :username";

	 	$stmt = $DBcon->prepare( $query ); 
	 	$count;
	   	$stmt->execute(array(':username'=>$_POST['username']));
	    while ($row = $stmt->fetch(PDO::FETCH_NUM, PDO::FETCH_ORI_NEXT)) {
         //$data = $row[0] . "\t" . $row[1] . "\t" . $row[2] . "\n";
         $count = $row[0];
         
      	}
      	if($count == 0){

      		echo "".$_POST['username']." is available";
      	}else{

      		echo "".$_POST['username']." is not available. Please try another!";
      	}
}