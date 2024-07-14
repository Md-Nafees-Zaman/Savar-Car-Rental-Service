
<?php

session_start();
	$Id = $_SESSION['Id'];
    $Password = $_SESSION['Password'];

	// Database connection
	$conn = new mysqli('localhost','root','','savar car rental service');
	if($conn->connect_error){
		echo "$conn->connect_error";
		die("Connection Failed : ". $conn->connect_error);
	} else {


	$sql = "SELECT * FROM registration WHERE Id = $Id";
    
// Execute the query
$result = mysqli_query($conn, $sql);


if (mysqli_num_rows($result) > 0) {
    // Output the HTML table headers
   
    // Loop through each row in the result set
    while($row = mysqli_fetch_assoc($result)) {
      // Output the data for each row as an HTML table row
      if($row["Id"] == $Id && $row["Password"] == $Password )
      {
        $n = $row["Name"] ;
     
      $a = $row["Address"];
      $p = $row["Phone"] ;
      $g = $row["Gender"] ;
      $pa = $row["Password"] ;
      $e = $row["Email"] ;

    }
    else echo "<p><center> Please go to http: //Savar_Car_Rental_Service/login.html . </center></p>" ;

}
}
    else {
      echo "<p><center> Customer ID not Found! </center></p>";
    }
    //echo $k;

	$conn->close();
		
	}

    ?>


<!DOCTYPE html>
<html>
  <style>
    body {
      font-family: Arial, sans-serif;
      background-color: #f1f1f1;
      padding: 20px;
    }
    
    h1 {
      color: #333333;
      text-align: center;
    }
    
    p {
      color: #555555;
      margin-top: 30px;
      margin-bottom: 10px;
      font-size: 18px;
    }
    
    button {
      background-color: #4CAF50;
      color: white;
      padding: 12px 20px;
      border: none;
      border-radius: 4px;
      cursor: pointer;
      font-size: 16px;
    }
    
    button:hover {
      background-color: #3e8e41;
    }
    
    button:focus {
      outline: none;
    }
  </style>
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
               Savar Car Rental Service</h1>
          </div>
          <div class="panel-body">
            <form action="updateProfile.php" method="post">
              <div class="form-group">
                <label for="Name"> Name</label>
                <input
                  type="text"
                  class="form-control"
                  id="Name"
                  name="Name"
                  value = "<?php echo $n; ?>"
                />
              </div>
              <div class="form-group">
                <label for="Address">Address</label>
                <input
                  type="text"
                  class="form-control"
                  id="Address"
                  name="Address"
                  value = "<?php echo $a; ?>"
                />
              </div>
              <div class="form-group">
                <label for="Gender">Gender</label>
               <input
                      type="text"
                      class="form-control"
                  id="Gender"
                  name="Gender"
                  value = "<?php echo $g; ?>"
                  />
                  
              </div>
              <div class="form-group">
                <label for="Email">Email</label>
                <input
                  type="text"
                  class="form-control"
                  id="Email"
                  name="Email"
                  value = "<?php echo $e; ?>"
                />
              </div>
              <div class="form-group">
                <label for="Password">Password</label>
                <input
                  type="Password"
                  class="form-control"
                  id="Password"
                  name="Password"
                  value = "<?php echo $pa; ?>"
                />
              </div>
              <div class="form-group">
                <label for="Phone">Phone</label>
                <input
                  type="Phone"
                  class="form-control"
                  id="Phone"
                  name="Phone"
                  value = "<?php echo $p; ?>"
                />
              </div>
              <button type="submit" class="btn btn-success">OK</button>

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