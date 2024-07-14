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
	

	// Database connection
	$conn = new mysqli('localhost','root','','savar car rental service');
	if($conn->connect_error){
		echo "$conn->connect_error";
		die("Connection Failed : ". $conn->connect_error);
	} else {
		echo "<p><center>";
		if ($_SESSION['Id'] == 0 && $_SESSION['Password'] == '1478') {
			$sql = "SELECT * FROM car_info WHERE Car_Id = $CCar_Id";
    
			// Execute the query
			$result = mysqli_query($conn, $sql);
			
			
			if (mysqli_num_rows($result) > 0) {

				$sql2 = "SELECT Car_Id FROM reserved_car_info WHERE Car_Id = $CCar_Id";
    
				// Execute the query
				$result2 = mysqli_query($conn, $sql2);
				
				
				if (mysqli_num_rows($result2) > 0) {
					echo " This car can not be removed because it has some trip. "."<br>"."You can change Availability Status from 'Update Car Information' instead"."<br>";
				}
				else

				{
					$sql = "DELETE FROM car_info WHERE Car_Id = $CCar_Id";
if(mysqli_query($conn, $sql))
{
	
	echo "<br>". "Car has been Removed !";

	
	
}
				}}
				
	
else echo "Car ID not found! ";
echo "<br>". "<br>";
	echo '<button onclick= "window.location.href=\'http://localhost/Savar_car_rental_service/ShowCar.php\'">OK</button>'."<br>"."<br>";
echo "</center></p>";
}else "<p><center>". "Go to http: Savar_Car_Rental_Service/Admin.html"."</center></p>";

		$conn->close();
		
	}
}}
?>