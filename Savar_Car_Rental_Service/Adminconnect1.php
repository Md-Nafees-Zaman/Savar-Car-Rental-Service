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


$Id = $_POST['Id'];
	$Password = $_POST['Password'];
		$_SESSION['Id'] = $Id;
	$_SESSION['Password'] = $Password;

	// Database connection
	$conn = new mysqli('localhost','root','','savar car rental service');
	if($conn->connect_error){
		echo "$conn->connect_error";
		die("Connection Failed : ". $conn->connect_error);
	} else {
		echo "<p><center>";
        echo "<br>"."<br>";

 if ($Id == 0 && $Password == '1478') {

    echo "Welcome to Admin page."."<br>" . "<br>"; 
    echo '<button onclick= "window.location.href=\'http://localhost/Savar_car_rental_service/Adminconnect.php\'">Show Menu</button>'."<br>"."<br>";

    	//header("Location");
		}
        else {echo "Wrong Password!!". "<br>"."Try again."; }
        echo "</center></p>";
                //$stmt->close();
                $conn->close();
            }
        ?>
        
        
		