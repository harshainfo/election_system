<?php

$username = $_POST["username"];
$password = $_POST["password"];

include '../include.dbcon.php';

echo $DBcon;


				
				
	$result = $db->query("SELECT username FROM `user` WHERE `username` = :username and `password` = :password;");
	$stmt = $DBcon->prepare( $query ); 
	$stmt->execute($array(':username'=>$username, ':password'=>$password));
	$rows = $stmt->fetchAll();
	if($rows ){


	}
	echo json_encode($rows);
	if($result == FALSE)
	{
		echo "error select: $db->error";
	}
	elseif($result->num_rows != 0)
	{
		echo "Welcome {$_POST['username']!}</br>";
		$_SESSION["username"] = $_POST['username'];
		$_SESSION["password"] = $_POST['password'];
		echo("</br><button onclick=\"location.href='homepage.php'\">Back to Home</button>");   
	}
	else
	{
		echo"Invalid Email or Password</br>";
		echo("</br><button onclick=\"location.href='index3.php'\">Try Again</button>"); 
	}
				

?>