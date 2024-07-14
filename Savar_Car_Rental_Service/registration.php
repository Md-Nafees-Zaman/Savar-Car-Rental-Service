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
	$Name = $_POST['Name'];
	$Address = $_POST['Address'];
	$Gender = $_POST['Gender'];
	$Email = $_POST['Email'];
	$Password = $_POST['Password'];
	$Phone = $_POST['Phone'];

	if($_SERVER['REQUEST_METHOD'] == 'POST') {
		$errors = array();
		
		// Check if each field has been filled out
		if(empty($_POST['Name'])) {
		  $errors[] = 'Name is required';
		}
		if(empty($_POST['Address'])) {
		  $errors[] = 'Address is required';
		}
		if(empty($_POST['Gender'])) {
		  $errors[] = 'Gender is required';
		}
		if(empty($_POST['Email'])) {
			$errors[] = 'Email is required';
		  }
		  if(empty($_POST['Password'])) {
			$errors[] = 'Password is required';
		  }
		  if(empty($_POST['Phone'])) {
			$errors[] = 'Phone is required';
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
		  // If all fields have been filled out, process the form data
		  // ...
		  // Database connection
	$conn = new mysqli('localhost','root','','savar car rental service');
	if($conn->connect_error){
		echo "$conn->connect_error";
		die("Connection Failed : ". $conn->connect_error);
	} else {
		

		echo "<p><center>";
		echo"<br>"."<br>";
		echo"<br>"."<br>";
		$stmt = $conn->prepare("insert into registration(Name, Address, Gender, Email, Password, Phone) values(?, ?, ?, ?, ?, ?)");
		$stmt->bind_param("ssssss", $Name, $Address, $Gender, $Email, $Password, $Phone);
		$execval = $stmt->execute();
		
		//echo $execval;
		echo "Registration Successfull!!"."<br>";
		echo " Your Id number is ";
		

		
		
	$sql = "SELECT MAX(Id) as max_id FROM registration";
	$result = mysqli_query($conn, $sql);
$row = mysqli_fetch_assoc($result);
$max_id = $row["max_id"];
echo  $max_id."<br>";
echo " Use ID ". $max_id . " to login.";
echo"<br>"."<br>";
echo '<button onclick= "window.location.href=\'http://localhost/savar_car_rental_service/\'">OK</button>';
echo"<br>"."<br>";
echo"</center></p>";
		$stmt->close();
		$conn->close();
	}

		}
	  }
	  
	  
?>
