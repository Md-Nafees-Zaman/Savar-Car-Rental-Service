

<?php

session_start();
	$CCar_Id = $_SESSION['CCar_Id'];

  $val = 1;
	// Database connection
	$conn = new mysqli('localhost','root','','savar car rental service');
	if($conn->connect_error){
		echo "$conn->connect_error";
		die("Connection Failed : ". $conn->connect_error);
	} else {
    if ($_SESSION['Id'] == 0 && $_SESSION['Password'] == '1478') {

	$sql = "SELECT * FROM car_info WHERE Car_Id = $CCar_Id";
    
// Execute the query
$result = mysqli_query($conn, $sql);


if (mysqli_num_rows($result) > 0) {
    // Output the HTML table headers
   
    // Loop through each row in the result set
    while($row = mysqli_fetch_assoc($result)) {
      // Output the data for each row as an HTML table row
      $k = $row["Model"] ;
     
      $r = $row["Registration_Number"];
      $s = $row["Number_of_Seat"] ;
      $t = $row["Rent_Per_Day"] ;
      $a = $row["Availability_Status"] ;
    }}
    else {
      //echo "Car ID not Found!";
      $val = 0;
    }
    //echo $k;
}
else "<p><center>". "Go to http: Savar_Car_Rental_Service/Admin.html"."</center></p>";
	$conn->close();
		
	}
?>
<!DOCTYPE html>
<html>
  <head>
    <title></title>
    <link rel="stylesheet" type="text/css" href="css/bootstrap.css" />
  </head>
  <body>
  
    <div class="container">
      <div class="row col-md-6 col-md-offset-3">
        <div class="panel panel-primary">
          <div class="panel-heading text-center">
            <h1>
               Update car info ID '<?php echo $CCar_Id; ?>'</h1>
          </div>
          <div class="panel-body">
            <form action="updateCar.php" method="post">
              <div class="form-group">
                <label for="Model"> Model</label>
                <input
                  type="text"
                  class="form-control"
                  id="Model"
                  name="Model"
                  value = "<?php echo $k; ?>"
                />
              </div>
              <div class="form-group">
                <label for="Registration_Number">Registration Number</label>
                <input
                  type="text"
                  class="form-control"
                  id="Registration_Number"
                  name="Registration_Number"
                  value = "<?php echo $r; ?>"
                />
              </div>
              
              <div class="form-group">
                <label for="Number_of_Seat">Number of Seat</label>
                <input
                  type="number"
                  class="form-control"
                  id="Number_of_Seat"
                  name="Number_of_Seat"
                  value = "<?php echo $s; ?>"
                />
              </div>
              <div class="form-group">
                <label for="Rent_Per_Day">Rent Per Day</label>
                <input
                  type="number"
                  class="form-control"
                  id="Rent_Per_Day"
                  name="Rent_Per_Day"
                  value = "<?php echo $t; ?>"
                />
              </div>
              <div class="form-group">
                <label for="Availability_Status">Availability Status(Yes/No)</label>
                <input
                  type="text"
                  class="form-control"
                  id="Availability_Status"
                  name="Availability_Status"
                  value = "<?php echo $a; ?>"
                />
              </div>
              <input type="submit" class="btn btn-primary" />
            </form>
          </div>
          <div class="panel-footer text-right">
            
          </div>
        </div>
      </div>
    </div>
    <div class="toast" role="alert" aria-live="assertive" aria-atomic="true">
 
</div>
  </body>
</html>

