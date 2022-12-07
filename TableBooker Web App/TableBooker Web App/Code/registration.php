<?php


$servername = "localhost";
$username = "root";
$password = "";
$dbname = "table_booker";



if(isset($_POST['submit'])){ //check if form was submitted

    // Create connection
    $conn = new mysqli($servername, $username, $password, $dbname);
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }
    
    $fullname = $_POST['fname'];
    $uname = $_POST['uname'];
    $email = $_POST['email'];
    $password = $_POST['pass'];

    $sql = "INSERT INTO Customer (username, full_name, email, password)
    VALUES ('$uname', '$fullname', '$email', '$password')";

    if ($conn->query($sql) === TRUE) {
        echo "<script>alert('Customer is Registered Successfully!')</script>";
    } else {
        echo "<script>alert('Error. Customer is Already Registered!')</script>";
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
    <title>Registration</title>
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
          <a class="n-item" href="index.php">Home</a>
        </h2>
        <h2>
          <a class="n-item" href="contact.php">Contact</a>
        </h2>
        
        <h2>
          <a class="n-item" href="login.php">Login</a>
        </h2>
      </div>
    </nav>

    <!--Registration Area -->

    <h3 style="margin-top: 2%; text-align: center; color: yellow">
      Welcome
    </h3>
    <div class="register">
      <form method="POST" action="">
        <img
          src="https://cdn.icon-icons.com/icons2/1378/PNG/512/avatardefault_92824.png"
          height="140"
          width="150"
        />
        <br /><br /><br />

        <input
          id="fname"
          name="fname"
          type="text"
          placeholder="Please Enter Full Name"
          required
        />

        <br /><br />
        <input
          id="email"
          name="email"
          type="text"
          placeholder="Please Enter Email"
          required
        />

        <br /><br />
        <input
          id="uname"
          name="uname"
          type="text"
          placeholder="Please Enter Username"
          required
        />

        <br /><br />
        <input
          id="pass"
          name="pass"
          type="text"
          placeholder="Please Enter Password"
          required
        />
        <br /><br />
        <input class="submit" type="submit" value="Register" name="submit" />
      </form>
      <br />
      <p class="question">Already have an account ? <a href="login.php" style="color:white;"> Login </a></p>
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
