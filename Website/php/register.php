<?php
$servername = "localhost";
$username = "root";
$password = "root";
$dbname = "emsdb";

// Create connection
$conn = mysqli_connect($servername, $username, $password, $dbname);
// Check connection

require_once 'php/dbcon.php';
/*if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}
if($_POST['password']!=$_POST['password2']){
	echo("The passwords do not match. Try again.");
}
elseif(!filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)) {
    echo("The entered email is not formatted correctly. Please enter a valid email.");
}
*/
	$sql0 = "SELECT "
	
	$sql1 = "INSERT INTO user (username, first_name, last_name,password, phone, email, role)
	VALUES ('".$_POST["username"]."', '".$_POST["first_name"]."','".$_POST["last_name"]."','".$_POST["password"]."','".$_POST["phone_no"]."','".$_POST["email"]."','voter')";
	
	$last_id = 0;

	if ($DBcon->query($sql1) === TRUE) {
	    $last_id = $DBcon->insert_id;
	} else {
	    echo "Error: " . $sql1 . "<br>" . $DBcon->error;
	}


	$sql2 = "INSERT INTO voter (id_no, address1, address2, city, state, zip_code,proof_id)
	VALUES ('".$_POST["id_no"]."','".$_POST["address1"]."','".$_POST["address2"]."','".$_POST["city"]."','".$_POST["state"]."','".$_POST["zip_code"]."','1')";



	if (mysqli_query($conn, $sql1) && mysqli_query($conn, $sql2)) {
		echo "New record created successfully";
	} else {
		echo "Error: " . $sql . "<br>" . mysqli_error($conn);
	}

	mysqli_close($conn);

?>
