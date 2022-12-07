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

if(isset($_POST['submit'])){ //check if form was submitted

  // Create connection
  $conn = new mysqli($servername, $username, $password, $dbname);
  if ($conn->connect_error) {
      die("Connection failed: " . $conn->connect_error);
  }
  
  $fullname = $_POST['fname'];
  $date = $_POST['date'];
  $time = $_POST['time'];
  $restaurant = $_POST['restaurant'];
  $bill = 0;
  if(strcmp($restaurant, "Jean Georges, New York City") == 0)
    $bill = 1000;
  else if(strcmp($restaurant, "Chez Panisse, Berkeley, California") == 0)
    $bill = 2000;
  else if(strcmp($restaurant, "Craft, New York City") == 0)
    $bill = 3000;
  else if(strcmp($restaurant, "Commander’s Palace, New Orleans") == 0)
    $bill = 4000;
  else if(strcmp($restaurant, "Pappas Bros. Steakhouse, Dallas") == 0)
    $bill = 5000;


  $sql = "INSERT INTO Booking (name, date, time, bill, username, restaurant_name)
  VALUES ('$fullname', '$date', '$time', '$bill', '$userId', '$restaurant')";

  if ($conn->query($sql) === TRUE) {
      echo "<script>alert('Table is Booked Successfully!')</script>";
  } else {
      echo "<script>alert('Error. Something Went Wrong!')</script>";
  }

  $conn->close();


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

    <!--New Booking Area -->
    <h3 style="margin-top: 2%; text-align: center; color: yellow">
      New Booking
    </h3>
    <div class="login">
      <form method="POST" action="">
      <br />
      <br />


        <input
          id="fname"
          name="fname"
          type="text"
          placeholder="Please Enter Booking Name"
          required
        />

        <br /><br />
        <input
          id="date"
          name="date"
          type="date"
          required
        />

        <br /><br />
        <input
          id="time"
          name="time"
          type="time"
          required
        />

        <br /><br />
        <select style="width: 70%;
    padding: 1.5%;
    border-radius: 15px;
    padding-left: 3%;
    border-color: rgb(5, 75, 96);
    border: 1px solid black;" name="restaurant">
            <option value="Jean Georges, New York City">Jean Georges, New York City (1000 USD)</option>
            <option value="Chez Panisse, Berkeley, California">Chez Panisse, Berkeley, California (2000 USD)</option>
            <option value="Craft, New York City">Craft, New York City (3000 USD)</option>
            <option value="Commander’s Palace, New Orleans">Commander’s Palace, New Orleans (4000 USD)</option>
            <option value="Pappas Bros. Steakhouse, Dallas">Pappas Bros. Steakhouse, Dallas (5000 USD)</option>
        </select>
        <br /><br />
        <input class="submit" type="submit" value="Book Table" name="submit" />
      </form>
    </div>
    
    

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
