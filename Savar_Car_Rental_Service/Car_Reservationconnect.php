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

if($_SERVER['REQUEST_METHOD'] == 'POST') {
	$errors = array();
	
	// Check if each field has been filled out
	if(empty($_POST['Date'])) {
	  $errors[] = 'Date is required';
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
	$Date = $_POST['Date'];
	
    session_start();
    $_SESSION['Date'] = $Date;

	// Database connection
	$conn = new mysqli('localhost','root','','savar Car rental service');
	if($conn->connect_error){
		echo "$conn->connect_error";
		die("Connection Failed : ". $conn->connect_error);
	} else {
      
		//$sql = "SELECT distinct Car_Id from reserved_car_info where Date = '$Date'";
    $sql = "SELECT distinct Car_Id, Model, Number_of_Seat, Rent_Per_Day FROM car_info where Car_Id not in (select Car_Id from reserved_car_info where Date = '$Date') and Availability_Status = 'Yes'";

// Execute the query
$result = mysqli_query($conn, $sql);
echo "<p><center>";
echo "<br>"."<br>"."Available cars on ". $Date. "<br>"."<br>";
// Check if there are any rows returned
if (mysqli_num_rows($result) > 0) {
    // Output the HTML table headers
    echo "<table border = '1'>";
    echo "<tr><th>Car Id</th><th>Model  </th><th>Number of Seats</th><th>Rent Per Day (tk) </th></tr>";
  
    // Loop through each row in the result set
    while($row = mysqli_fetch_assoc($result)) {
      // Output the data for each row as an HTML table row
      echo "<tr><td>" . $row["Car_Id"] . "</td><td>" . $row["Model"] . "</td><td>" . $row["Number_of_Seat"] . "</td><td>" . $row["Rent_Per_Day"] . "</td></tr>";
    }
  
    // Close the HTML table
    echo "</table>";
  } else {
    echo "0 results";
  }


		// $stmt = $conn->prepare("insert into registration(Name, Address, Gender, Email, Password, Phone) values(?, ?, ?, ?, ?, ?)");
		// $stmt->bind_param("ssssss", $Name, $Address, $Gender, $Email, $Password, $Phone);
		// $execval = $stmt->execute();


		echo "<br>"."<br>"."Choice a car and enter Car_Id:  ";
        echo '<button onclick= "window.location.href=\'http://localhost/savar_car_rental_service/Car_ReservationEnter_Car_Id.html\'">Car_Id</button>';
        echo "</center></p>";
		//$stmt->close();
		$conn->close();
	}}}
?>