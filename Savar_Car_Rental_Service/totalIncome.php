
<?php
	$Name = $_POST['Name'];
	$Address = $_POST['Address'];
	$Gender = $_POST['Gender'];
	$Email = $_POST['Email'];
	$Password = $_POST['Password'];
	$Phone = $_POST['Phone'];

	$errors = array();
	if(empty($_POST['Name'])) {
		$errors[] = 'Field 1 is required';
	  }

// Database connection
	$conn = new mysqli('localhost','root','','savar car rental service');
	if($conn->connect_error){
		echo "$conn->connect_error";
		die("Connection Failed : ". $conn->connect_error);
	} else {
		

		
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
echo '<button onclick= "window.location.href=\'http://localhost/savar_car_rental_service/\'">OK</button>';

		$stmt->close();
		$conn->close();
	}
