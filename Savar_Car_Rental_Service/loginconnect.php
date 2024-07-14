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
	$Id = $_SESSION['Id'];
	$Password = $_SESSION['Password'];
	// Database connection
	$conn = new mysqli('localhost','root','','savar car rental service');
	if($conn->connect_error){
		echo "$conn->connect_error";
		die("Connection Failed : ". $conn->connect_error);
	} else {
		echo "<p><center>";
$sql = "SELECT Id FROM registration where Id = $Id";
$result = mysqli_query($conn, $sql);
if (mysqli_num_rows($result) > 0) {
		
	$sql = "SELECT Password as log_p FROM registration where Id = $Id";
$result = mysqli_query($conn, $sql);
$row = mysqli_fetch_assoc($result);
$log_p = $row["log_p"];
 if($log_p == $Password){

	
	
	$sql = "SELECT Name as n FROM registration where Id = $Id";
$result = mysqli_query($conn, $sql);
$row = mysqli_fetch_assoc($result);
$n = $row["n"];
		echo "<br>" . "<br>"."Welcome ".$n."<br>" . "<br>"."<br>"; 
		echo '<button onclick= "window.location.href=\'http://localhost/Savar_car_rental_service/showProfile.php\'">Show(Update) Profile</button>';
		echo "<br>" . "<br>";
		
		echo '<button onclick= "window.location.href=\'http://localhost/Savar_car_rental_service/car_reservation.html\'">Reserve a car</button>';
		echo "<br>" . "<br>";
		echo '<button onclick= "window.location.href=\'http://localhost/Savar_car_rental_service/index.html\'">Logout</button>';
		echo "<br>" . "<br>";

		$sql = "SELECT * FROM reserved_car_info where Customer_Id = $Id";

		// Execute the query
		$result = mysqli_query($conn, $sql);
		
		//echo "<p><center>i am center</center></p>"
		// Check if there are any rows returned
		if (mysqli_num_rows($result) > 0) {
			// Output the HTML table headers
			echo "My Trips: "."<br>";
			echo "<table border = '1'>";
			echo "<tr><th> Trip Id </th><th> Car Id </th><th> Date </th><th> Rent (Taka) </th><th> Payment Status </th></tr>";
		  
			// Loop through each row in the result set
			while($row = mysqli_fetch_assoc($result)) {
			  // Output the data for each row as an HTML table row
			  echo "<tr><td>" . $row["Trip_ID"] . "</td><td>" . $row["Car_Id"] . "</td><td>" . $row["Date"] . "</td><td>" . $row["Rent_Tk"] . "</td><td>" . $row["Payment_Status"] . "</td></tr>";
			}
			echo "</center></p>";
			// Close the HTML table
			echo "</table>";
		  } 

		//header("Location");
		}
else {echo "Wrong Password!!". "<br>"."Try again."; }
}
else { echo "ID not found !";
}
echo "</center></p>";
		//$stmt->close();
		$conn->close();
	}
?>