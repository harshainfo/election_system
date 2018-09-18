<?php
	session_start();
	session_destroy();
	// session_unset($_SESSION['un']);
	// session_unset($_SESSION['role']);
	header("Location : ..\index.php");
	
?>