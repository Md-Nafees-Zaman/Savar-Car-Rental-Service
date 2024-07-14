<!DOCTYPE html>
<html>
	<body>
<h1>
<p><center>
               Savar Car Rental Service</h1>
			   </center></p>
</body>
</html>


<?php error_reporting(0); ?> 
<?php
	
    session_start();
	// Database connection
	$conn = new mysqli('localhost','root','','savar Car rental service');
	if($conn->connect_error){
		echo "$conn->connect_error";
		die("Connection Failed : ". $conn->connect_error);
	} else {
    if ($_SESSION['Id'] == 0 && $_SESSION['Password'] == '1478') {
		//$sql = "SELECT distinct Car_Id from reserved_car_info where Date = '$Date'";
    $sql = "SELECT * FROM car_info";

// Execute the query
$result = mysqli_query($conn, $sql);
echo "<p><center>"."<br>"."List of cars ". "<br>"."<br>";
//echo "<p><center>i am center</center></p>"
// Check if there are any rows returned
if (mysqli_num_rows($result) > 0) {
    // Output the HTML table headers
    echo "<table border = '1'>";
    echo "<tr><th>Car Id</th><th>Model  </th><th>Number of Seats</th><th>Rent Per Day</th><th>Availability Status</th></tr>";
  
    // Loop through each row in the result set
    while($row = mysqli_fetch_assoc($result)) {
      // Output the data for each row as an HTML table row
      echo "<tr><td>" . $row["Car_Id"] . "</td><td>" . $row["Model"] . "</td><td>" . $row["Number_of_Seat"] . "</td><td>" . $row["Rent_Per_Day"] . "</td><td>" . $row["Availability_Status"] . "</td></tr>";
    }
    echo "</center></p>";
    // Close the HTML table
    echo "</table>";
  } else {
    echo "0 results";
  }


		// $stmt = $conn->prepare("insert into registration(Name, Address, Gender, Email, Password, Phone) values(?, ?, ?, ?, ?, ?)");
		// $stmt->bind_param("ssssss", $Name, $Address, $Gender, $Email, $Password, $Phone);
		// $execval = $stmt->execute();

		echo "<br>"."<br>";
    echo '<button onclick= "window.location.href=\'http://localhost/Savar_car_rental_service/addCar.html\'">Add car</button>'."<br>"."<br>";
		echo '<button onclick= "window.location.href=\'http://localhost/Savar_car_rental_service/update_car_id.html\'">Update a car information</button>'."<br>"."<br>";
		    echo '<button onclick= "window.location.href=\'http://localhost/savar_car_rental_service/Enter_Car_Id.html\'">Remove a Car</button>'."<br>"."<br>";
        echo '<button onclick= "window.location.href=\'http://localhost/Savar_car_rental_service/Adminconnect.php\'">Back to Menu</button>'."<br>"."<br>";
			//$stmt->close();
      echo "</center></p>";
    }else "<p><center>". "Go to http: Savar_Car_Rental_Service/Admin.html"."</center></p>";
		$conn->close();
	}
?>
