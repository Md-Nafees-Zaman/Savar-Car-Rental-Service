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
	if(empty($_POST['Trip_ID'])) {
	  $errors[] = 'Trip ID is required';
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
  
	$Trip_ID = $_POST['Trip_ID'];
	echo "<p><center>";

	// Database connection
	$conn = new mysqli('localhost','root','','savar car rental service');
	if($conn->connect_error){
		echo "$conn->connect_error";
		die("Connection Failed : ". $conn->connect_error);
	} else {
		if ($_SESSION['Id'] == 0 && $_SESSION['Password'] == '1478') {
		$sql = "SELECT Trip_ID, Payment_Status FROM reserved_car_info WHERE Trip_ID = $Trip_ID and Payment_Status = 'Unpaid'";
		$result = mysqli_query($conn, $sql);
		if (mysqli_num_rows($result) > 0) {
			
        $sql = "UPDATE reserved_car_info  SET Payment_Status = 'Paid'  WHERE Trip_ID = $Trip_ID";
		
    
 
        if ($conn->query($sql) === TRUE) {
            echo "<br>". "<br>";
          echo "Payment Status changed.";
        } else {
          echo "Error updating record: " . $conn->error;
        }
        echo "<br>". "<br>";
        echo '<button onclick= "window.location.href=\'http://localhost/Savar_car_rental_service/Adminconnect.php\'">OK</button>'."<br>"."<br>";
		
	}
	else {
		echo "Trip ID not found in unpaid list!";
		echo "<br>". "<br>";
        echo '<button onclick= "window.location.href=\'http://localhost/Savar_car_rental_service/showTripList.php\'">Back to Trip list</button>'."<br>"."<br>";
        echo '<button onclick= "window.location.href=\'http://localhost/Savar_car_rental_service/Adminconnect.php\'">Cancel</button>'."<br>"."<br>";
	}
}
	else "<p><center>". "Go to http: Savar_Car_Rental_Service/Admin.html"."</center></p>";
		
}
	echo "</center></p>";
		$conn->close();
	
}  
}

?>