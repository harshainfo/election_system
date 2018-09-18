<?php



require_once 'dbcon.php';

if(isset($_POST['un']) && !empty($_POST['pw'])){
	$un = $_POST["un"];
	$pw = $_POST["pw"];
	//$result = $Dbcon->query("SELECT role FROM `user` WHERE `username` = '{$_POST["username"]}' and `password` = '{$_POST["password"]}';");
	$querySelect = "SELECT u.role FROM user u WHERE u.username = :un AND u.password = :pw";
	$stmt1 = $DBcon->prepare( $querySelect ); 
	$stmt1->execute(array(':un'=>$un, ':pw'=>$pw));
	$results = $stmt1->fetchAll();
	//$results = $querySelect->fetchAll(PDO::FETCH_ASSOC);
	$role = "";
	foreach($results as $row) {
	   $role = $row['role'];
	}
	if($role == "")
	{
		echo "Invalid Username or Password";
		exit;
	}
	else{
		
		session_start();
		
		$_SESSION['un'] = $un;
		$_SESSION['role'] = $role;
		echo json_encode($_SESSION);
	}
		
		
}
else
{
	//header("location: ../index.php");
	echo "Invalid Username or Password";
	exit;
	//echo("</br><button onclick=\"location.href='../index.php'\">Try Again</button>"); 
}
				
?>