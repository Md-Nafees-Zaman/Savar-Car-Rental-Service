<!DOCTYPE html>
<html>
	<body>
<h1>
<p><center>
               Savar Car Rental Service</h1>
			   </center></p>
</body>
</html>


<?php

session_start();

if($_SERVER['REQUEST_METHOD'] == 'POST') {
	$errors = array();
	
	// Check if each field has been filled out
	if(empty($_POST['CCar_Id'])) {
	  $errors[] = 'Car ID is required!';
	}
// If there are errors, display them
if(!empty($errors)) {
  echo '<ul>';
  foreach($errors as $error) {
  echo '<li>' . $error . '</li>';
  }
  echo '</ul>';
}
else {
	$CCar_Id = $_POST['CCar_Id'];
	$_SESSION['CCar_Id'] = $CCar_Id;
  $val = 1;
	// Database connection
	$conn = new mysqli('localhost','root','','savar car rental service');
	if($conn->connect_error){
		echo "$conn->connect_error";
		die("Connection Failed : ". $conn->connect_error);
	} else {
	
    if ($_SESSION['Id'] == 0 && $_SESSION['Password'] == '1478') {

	$sql = "SELECT * FROM car_info WHERE Car_Id = $CCar_Id";
    
// Execute the query
$result = mysqli_query($conn, $sql);


if (mysqli_num_rows($result) > 0) {


header("Location: http://localhost/Savar_Car_Rental_Service/update_car_id1.php");
 exit();

}
    else {
      echo "<p><center>". "Car ID not Found!"."<br>"."<br>";
      $val = 0;
    }

    echo '<button onclick= "window.location.href=\'http://localhost/Savar_Car_Rental_Service/ShowCar.php\'">OK</button>'."<br>"."<br>";
	echo "</center></p>";
    //echo $k;
}
else "<p><center>". "Go to http: Savar_Car_Rental_Service/Admin.html"."</center></p>";
	$conn->close();
}}
	}