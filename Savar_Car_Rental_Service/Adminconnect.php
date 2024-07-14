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
		echo "<p><center>";
		//echo $_SESSION['Id'];

		if ($_SESSION['Id'] == 0 && $_SESSION['Password'] == '1478') {
		
	
		
		echo '<button onclick= "window.location.href=\'http://localhost/Savar_car_rental_service/ShowCustomer.php\'">Show Customer List</button>'."<br>"."<br>";
		echo '<button onclick= "window.location.href=\'http://localhost/Savar_car_rental_service/ShowCar.php\'">Show All Cars</button>'."<br>"."<br>";
		echo '<button onclick= "window.location.href=\'http://localhost/Savar_car_rental_service/ShowUnpaid.php\'">Unpaid Customer Details</button>'."<br>"."<br>";
		echo '<button onclick= "window.location.href=\'http://localhost/Savar_car_rental_service/showUnpaid.html\'">Add Payment</button>'."<br>"."<br>";
		echo '<button onclick= "window.location.href=\'http://localhost/Savar_car_rental_service/showTripList.php\'">All Trip list</button>'."<br>"."<br>";
        echo '<button onclick= "window.location.href=\'http://localhost/Savar_car_rental_service/index.html\'">Logout</button>'."<br>"."<br>";
	


		$sql = "SELECT SUM(Rent_Tk) as totalPaid FROM reserved_car_info where Payment_Status = 'Paid'";
		
		$result = mysqli_query($conn, $sql);
$row = mysqli_fetch_assoc($result);
$totalpaid = $row["totalPaid"];
// Execute the query
		echo "Total income: ".$totalpaid . " Taka."."<br>";
		$sql = "SELECT SUM(Rent_Tk) as totalUnpaid FROM reserved_car_info where Payment_Status = 'UnPaid'";
		
		$result = mysqli_query($conn, $sql);
$row = mysqli_fetch_assoc($result);
$totalUnpaid = $row["totalUnpaid"];
// Execute the query
		echo "Total Due: ".$totalUnpaid . " Taka."."<br>"."<br>";


		//header("Location");
		

echo "</center></p>";
}else "<p><center>". "Go to http: Savar_Car_Rental_Service/Admin.html"."</center></p>";
		//$stmt->close();
		$conn->close();
	}
?>

