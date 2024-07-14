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
	$Model = $_POST['Model'];
	$Registration_Number = $_POST['Registration_Number'];
	$Number_of_Seat = $_POST['Number_of_Seat'];
	$Rent_Per_Day = $_POST['Rent_Per_Day'];

	if($_SERVER['REQUEST_METHOD'] == 'POST') {
		$errors = array();
		
		// Check if each field has been filled out
		if(empty($_POST['Model'])) {
		  $errors[] = 'Model is required';
		}
		if(empty($_POST['Registration_Number'])) {
		  $errors[] = 'Registration Number is required';
		}
		if(empty($_POST['Number_of_Seat'])) {
		  $errors[] = 'Number of Seat';
		}
		if(empty($_POST['Rent_Per_Day'])) {
			$errors[] = 'Rent Per Day is required';
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
	// Database connection
	$conn = new mysqli('localhost','root','','savar car rental service');
	if($conn->connect_error){
		echo "$conn->connect_error";
		die("Connection Failed : ". $conn->connect_error);
	} else {
		//if ($_SESSION['Id'] == 0 && $_SESSION['Password'] == '1478') {
		$stmt = $conn->prepare("insert into car_info(Model, Registration_Number, Number_of_Seat, Rent_Per_Day) values(?, ?, ?, ?)");
		$stmt->bind_param("ssii", $Model, $Registration_Number, $Number_of_Seat, $Rent_Per_Day);
		$execval = $stmt->execute();
		echo "<center><p>";
		echo"<br>"."<br>";echo"<br>"."<br>";
		echo "Car added!!\n\n";
		echo "<br>". "<br>";
        echo '<button onclick= "window.location.href=\'http://localhost/Savar_car_rental_service/Adminconnect.php\'">OK</button>'."<br>"."<br>";
       echo "</center></p>";
	//}else "<p><center>". "Go to http: Savar_Car_Rental_Service/Admin."."</center></p>";
		$stmt->close();
		$conn->close();
	}
	}
}
?>