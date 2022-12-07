<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "table_booker";

if(isset($_GET['bn']))
{

  $bn = $_GET['bn'];
  $conn = new mysqli($servername, $username, $password, $dbname);
  if ($conn->connect_error) {
      die("Connection failed: " . $conn->connect_error);
  }
  

  $sql = "DELETE FROM Booking WHERE booking_number = '$bn'";

  if ($conn->query($sql) === TRUE) {
      echo "<script>alert('Booking is Deleted Successfully!')</script>";
     
  } else {
      echo "<script>alert('Error. Something Went Wrong!')</script>";
  }

}

?>


<!DOCTYPE html>
<html lang="en">
  <head>
    <link rel="stylesheet" href="styles.css" />
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link
      rel="stylesheet"
      href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.3/css/bootstrap.min.css"
    />
    <link
      rel="stylesheet"
      href="https://cdnjs.cloudflare.com/ajax/libs/ionicons/2.0.1/css/ionicons.min.css"
    />
    <title>Dashboard</title>


    <style>
      
  #bookings {
    font-family: Arial, Helvetica, sans-serif;
    border-collapse: collapse;
    width: 100%;
    height: 300x;
    overflow: scroll;
    
  }
  
  #bookings td, #bookings th {
    border: 1px solid #ddd;
    padding: 8px;
    text-align: center;
    font-weight: bold;
  }
  
  #bookings tr:nth-child(even){background-color: #f2f2f2;}
  #bookings tr:nth-child(odd){background-color: 	#9DC8F1;}
  
  #bookings th {
    padding-top: 12px;
    padding-bottom: 12px;
    background-color: #084f6e;
    color: yellow;
    text-align: center;
  }
      </style>
  </head>
  <body style="  background-image: url('images/bg.png');">
    <!--Header -->

    <nav class="navbar">
      <h2>
        <a
          style="
            color: rgb(23, 251, 255);
            text-decoration: none;
            margin-left: 15px;
          "
          href="index.php"
          >Table<span style="color: rgb(233, 233, 233)">Booker</span></a
        >
      </h2>
      <div class="nav-items">
        <h2>
          <a class="n-item" href="newBooking.php">New Booking</a>
        </h2>
        <h2>
          <a class="n-item" href="dashboard.php">My Bookings</a>
        </h2>
        
        <h2>
          <a id="" class="n-item" href="login.php?logout">Logout</a>
        </h2>
      </div>
    </nav>


    <!-- Bookings Area -->

    <?php
session_start();

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "table_booker";

$userId = '';
if(isset($_SESSION["uname"])) {
  $userId = $_SESSION["uname"];
}


    // Create connection
    $conn = new mysqli($servername, $username, $password, $dbname);
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    $sql = "SELECT * FROM Booking WHERE username = '$userId'";

    echo "<div style='width:80%; text-align:center; align-items: center; height:300px; overflow-y: auto; margin-left: 10%; margin-top: 5%;'>";

    if($result = mysqli_query($conn, $sql)){
      if(mysqli_num_rows($result) > 0){
          echo "<table id='bookings'>";
              echo "<tr>";
                  echo "<th>Booking Number</th>";
                  echo "<th>Name</th>";
                  echo "<th>Restaurant</th>";
                  echo "<th>Date</th>";
                  echo "<th>Time</th>";
                  echo "<th>Bill</th>";
                  echo "<th>Action</th>";
              echo "</tr>";
          while($row = mysqli_fetch_array($result)){
            $bn = $row['booking_number'];
              echo "<tr>";
                  echo "<td>" . $row['booking_number'] . "</td>";
                  echo "<td>" . $row['name'] . "</td>";
                  echo "<td>" . $row['restaurant_name'] . "</td>";
                  echo "<td>" . $row['date'] . "</td>";
                  echo "<td>" . $row['time'] . "</td>";
                  echo "<td>" . $row['bill'] . " USD</td>";
                  echo "<td>" . "<a style='color:red;' href='dashboard.php?bn=$bn'>Delete</a>" . "</td>";
              echo "</tr>";
          }
          echo "</table>";
          // Free result set
          mysqli_free_result($result);
      } else{
          echo "<div style='background-color: rgb(0,0,0,0.7);
          border-radius: 10px; width: 50%; padding: 2%; margin-left: 25%; color: yellow;'><h3>No Bookings Found!</h3></div>";
      }
  }
  else {}

    $conn->close();
    echo "</div>";


?>

    
    

    <!--Footer -->
    <div class="footer-dark">
      <footer>
        <div class="container">
          <div class="row">
            <div class="col-sm-6 col-md-3 item">
              <h3 style="color: aqua">Services</h3>
              <ul>
                <li><a href="#">Table Bookings</a></li>
                <li><a href="#">Find Restaurants</a></li>
                <li><a href="#">Visit Restaurants</a></li>
              </ul>
            </div>
            <div class="col-sm-6 col-md-3 item">
              <h3 style="color: aqua">About</h3>
              <ul>
                <li><a href="#">Business</a></li>
                <li><a href="#">Staff</a></li>
                <li><a href="#">Restaurants</a></li>
              </ul>
            </div>
            <div class="col-md-6 item text">
              <h3 style="color: aqua">TableBooker</h3>
              <p>
                Our business is a Restaurant Reservation System in USA started by Pal Chouhan. System is used to manage the bookings of customers around the country. Customers can book table in any desired restaurant in USA and can maintain their booking records.
              </p>
            </div>
            <div class="col item social">
              <a href="#"><i class="icon ion-social-facebook"></i></a
              ><a href="#"><i class="icon ion-social-twitter"></i></a
              ><a href="#"><i class="icon ion-social-snapchat"></i></a
              ><a href="#"><i class="icon ion-social-instagram"></i></a>
            </div>
          </div>
          <p class="copyright">Pal Chouhan © 2022</p>
        </div>
      </footer>
    </div>

    <script type="module" src="script.js"></script>
  </body>
</html>
