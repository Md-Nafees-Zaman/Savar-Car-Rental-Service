

<?php
	
	
    session_start();
    
	// Database connection
	$conn = new mysqli('localhost','root','','savar Car rental service');
	if($conn->connect_error){
		echo "$conn->connect_error";
		die("Connection Failed : ". $conn->connect_error);
	} else {
      
		//$sql = "SELECT distinct Car_Id from reserved_car_info where Date = '$Date'";
    //$sql = "SELECT distinct * FROM reserved_car_info JOIN registration ON registration.Id = reserved_car_info.Customer_Id where  Id in (SELECT Customer_Id from reserved_car_info where Payment_Status = 'Unpaid') order by Name";
    $sql = "SELECT distinct * FROM reserved_car_info, registration where registration.Id = reserved_car_info.Customer_Id and Payment_Status = 'Unpaid' order by Name";
// Execute the query
$result = mysqli_query($conn, $sql);
echo "<p><center>";

echo "<br>"."Unpaid Customer Information ". "<br>"."<br>";
// Check if there are any rows returned
if (mysqli_num_rows($result) > 0) {
    // Output the HTML table headers
   
    echo "<table border = '1'>";
    echo "<tr><th>Trip Id</th><th>Customer Id</th><th> Name  </th><th>Address</th><th>Gender</th><th>Email</th><th>Phone</th><th>Due (Taka)</th></tr>";
  
    // Loop through each row in the result set
    while($row = mysqli_fetch_assoc($result)) {
      // Output the data for each row as an HTML table row
      echo "<tr><td>" . $row["Trip_ID"] . "</td><td>" . $row["Id"] . "</td><td>" . $row["Name"] . "</td><td>" . $row["Address"] . "</td><td>" . $row["Gender"] . "</td><td>" . $row["Email"] . "</td><td>" . $row["Phone"] . "</td><td>" . $row["Rent_Tk"] . "</td></tr>";
//
    }
  
    // Close the HTML table
    echo "</table>";
    
  } else {
    echo "0 results";
  }
  echo "<br>"."<br>";
        echo '<button onclick= "window.location.href=\'http://localhost/Savar_car_rental_service/Adminconnect.php\'">Back to Menu</button>'."<br>"."<br>";
  echo "</center></p>";

		// $stmt = $conn->prepare("insert into registration(Name, Address, Gender, Email, Password, Phone) values(?, ?, ?, ?, ?, ?)");
		// $stmt->bind_param("ssssss", $Name, $Address, $Gender, $Email, $Password, $Phone);
		// $execval = $stmt->execute();


		// echo "<br>"."<br>";
    //     echo '<button onclick= "window.location.href=\'http://localhost/savar_car_rental_service/Car_Reservation/Enter_Car_Id.html\'">Remove a Car</button>';
		//$stmt->close();
		$conn->close();
	}
?>