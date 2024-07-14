
<?php
	$Id = $_POST['Id'];
	$Password = $_POST['Password'];
	session_start();
	$_SESSION['Id'] = $Id;
	$_SESSION['Password'] = $Password;
	header("Location: http://localhost/Savar_Car_Rental_Service/loginconnect.php");
	exit();
   
?>