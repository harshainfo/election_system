<?php
	session_start();
	session_destroy();
	unset($_SESSION['un']);
	unset($_SESSION['role']);
	header("Location : index.php");
	
?>