<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "emsdb";

// Create connection
$conn = mysqli_connect($servername, $username, $password, $dbname);
// Check connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

$sql = "INSERT INTO voter (username, first_name, last_name,password,id_no,address1,address2,city,state,zip_code,phone,email,status)
VALUES ('".$_POST["username"]."', '".$_POST["first_name"]."','".$_POST["last_name"]."','".$_POST["password"]."','".$_POST["id_no"]."','".$_POST["address1"]."','".$_POST["address2"]."','".$_POST["city"]."','".$_POST["state"]."','".$_POST["zip_code"]."','".$_POST["phone"]."','".$_POST["email"]."','pending')";

if (mysqli_query($conn, $sql)) {
    echo "New record created successfully";
} else {
    echo "Error: " . $sql . "<br>" . mysqli_error($conn);
}

mysqli_close($conn);
?>
