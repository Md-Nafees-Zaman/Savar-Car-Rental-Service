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
	$CCar_Id = $_POST['CCar_Id'];
	$Payment_Status = "Unpaid";
	$Date = $_SESSION['Date'];
	echo "<p> <center>";
	if($_SERVER['REQUEST_METHOD'] == 'POST') {
		$errors = array();
		
		// Check if each field has been filled out
		if(empty($_POST['CCar_Id'])) {
		  $errors[] = 'Car ID is required';
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
		
		$sql = "SELECT distinct Car_Id FROM car_info where Availability_Status = 'Yes' and Car_Id = $CCar_Id and Car_Id not in (select Car_Id from reserved_car_info where Date = '$Date')";
		$result = mysqli_query($conn, $sql);
	 if(mysqli_num_rows($result) > 0) {
		$sql = "SELECT Rent_Per_Day FROM car_info where Car_Id = $CCar_Id";
		$result = mysqli_query($conn, $sql);
	$row = mysqli_fetch_assoc($result);
	$rent = $row["Rent_Per_Day"];
	//echo $CCar_Id. $_SESSION['Id']. $_SESSION['Date']. $rent.  $Payment_Status;
      $stmt = $conn->prepare("insert into reserved_car_info(Car_Id, Customer_Id, Date, Rent_Tk, Payment_Status) values(?, ?, ?, ?, ?)");
		$stmt->bind_param("iisis", $CCar_Id, $_SESSION['Id'], $_SESSION['Date'], $rent,  $Payment_Status);
		$execval = $stmt->execute();

// 		$sql = "SELECT Car_Id, Model, Number_of_Seat, Rent_Per_Day FROM car_info";

// // Execute the query
// $result = mysqli_query($conn, $sql);
// echo "<br>"."Available cars on ". $Date. "<br>"."<br>";
// // Check if there are any rows returned
// if (mysqli_num_rows($result) > 0) {
//     // Output the HTML table headers
//     echo "<table border = '1'>";
//     echo "<tr><th>Car Id</th><th>Model  </th><th>Number of Seats</th><th>Rent Per Day</th></tr>";
  
//     // Loop through each row in the result set
//     while($row = mysqli_fetch_assoc($result)) {
//       // Output the data for each row as an HTML table row
//       echo "<tr><td>" . $row["Car_Id"] . "</td><td>" . $row["Model"] . "</td><td>" . $row["Number_of_Seat"] . "</td><td>$" . $row["Rent_Per_Day"] . "</td></tr>";
//     }
  
//     // Close the HTML table
//     echo "</table>";
//   } else {
//     echo "0 results";
//   }


		

		echo "You have Successfully Reserved a car on ".$_SESSION['Date']."<br>"."<br>";
		echo " Your Trip_Id is ";
		
		
	$sql = "SELECT MAX(Trip_ID) as max_id FROM reserved_car_info";
$result = mysqli_query($conn, $sql);
$row = mysqli_fetch_assoc($result);
$max_id = $row["max_id"];
echo  $max_id."<br>"."<br>";
       echo '<button onclick= "window.location.href=\'http://localhost/savar_car_rental_service/loginconnect.php\'">OK</button>';
	   $stmt->close();
	  
}
else {
	echo "Car ID not found! ";
	
	   echo  "<br>"."<br>";
       echo '<button onclick= "window.location.href=\'http://localhost/savar_car_rental_service/loginconnect.php\'">Cancel</button>';
}
		
echo"</center></p>";
		
		$conn->close();
	}
}
	}
?>