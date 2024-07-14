<?php
session_start();

//$Name = $_SESSION['Name'];


	// Database connection
	$conn = new mysqli('localhost','root','','savar car rental service');
	if($conn->connect_error){
		echo "$conn->connect_error";
		die("Connection Failed : ". $conn->connect_error);
	} else {
		$sql = "UPDATE registration SET Name = ?, Address = ?, Gender = ?, Phone = ?, Email = ?, Password = ? WHERE Id = ?";
$stmt = $conn->prepare($sql);
// Bind parameters to statement
$Name = $_POST['Name'];
	$Address = $_POST['Address'];
	$Gender = $_POST['Gender'];
	$Email = $_POST['Email'];
	$Password = $_POST['Password'];
	$Phone = $_POST['Phone'];

  $Id = $_SESSION['Id'];
$stmt->bind_param("ssssssi", $Name, $Address, $Gender, $Phone, $Email, $Password, $Id);


// Execute statement
if ($stmt->execute()) {
//     echo "Record updated successfully.";
// } else {
//     echo "Error updating record: " . $conn->error;
// }

       $_SESSION['Password'] = $Password;
        header("Location: http://localhost/Savar_Car_Rental_Service/loginconnect.php");
         exit();
}
// echo "<p><center>"; 
//         if ($conn->query($sql) === TRUE) {
//             echo "<br>". "<br>";
//             echo $Name;
//           echo "Car " ." updated successfully";
//         } else {
//           echo "Error updating record: " . $conn->error;
//         }
        $stmt->close();
		$conn->close();
	}
?>