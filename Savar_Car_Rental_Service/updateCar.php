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



	
	// Database connection
	$conn = new mysqli('localhost','root','','savar car rental service');
	if($conn->connect_error){
		echo "$conn->connect_error";
		die("Connection Failed : ". $conn->connect_error);
	} else {
		if ($_SESSION['Id'] == 0 && $_SESSION['Password'] == '1478') {
			$sql = "UPDATE car_info SET Registration_Number = ?, Rent_Per_Day = ?, Model = ?, Number_of_Seat = ?, Availability_Status = ? WHERE Car_Id = ?";
$stmt = $conn->prepare($sql);
$Model = $_POST['Model'];
	$Registration_Number = $_POST['Registration_Number'];
	$Number_of_Seat = $_POST['Number_of_Seat'];
	$Rent_Per_Day = $_POST['Rent_Per_Day'];
	$Car_Id = $_SESSION['CCar_Id'];
	$Availability_Status = $_POST['Availability_Status'];

$stmt->bind_param("sisisi", $Registration_Number, $Rent_Per_Day, $Model, $Number_of_Seat, $Availability_Status, $Car_Id);

echo "<p><center>"; 
if ($stmt->execute()) {
            echo "<br>". "<br>";
          echo "Car ". $Car_Id." updated successfully";
        } else {
          echo "Error updating record: " . $conn->error;
        }
        echo "<br>". "<br>";
        echo '<button onclick= "window.location.href=\'http://localhost/Savar_car_rental_service/ShowCar.php\'">OK</button>'."<br>"."<br>";
		echo "</center></p>";
	}else "<p><center>". "Go to http: Savar_Car_Rental_Service/Admin.html"."</center></p>";
	$stmt->close();	
	$conn->close();
	}
?>