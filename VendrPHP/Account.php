<?php
session_start();
#include 'LoginCheck.php';
$servername = "w2k12-compscidb.academia.sjfc.edu";
$username = "vendr";
$password = "vendr";
$dbname = 'vendr';
$dbport = '3306';

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname, $dbport);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}


$username = $_SESSION['username'];
//echo "test";
//echo $username;
//echo $_SESSION['username'];

$sql="SELECT * FROM customer WHERE CustomerUser = '$username'";
$result=mysqli_query($conn,$sql);
while($row = mysqli_fetch_assoc($result)) {
  $nameF[] = $row["CustomerFName"];
  $nameL[] = $row["CustomerLName"];
  $email[] = $row["CustomerEmail"];
  $userPassword[] = $row["CustomerPass"];
}

?>

<html id="fullHD">
  <head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href='../VendrCSS/Account.css' rel='stylesheet' type='text/css'>
    <link href='../VendrCSS/Navbar.css' rel='stylesheet' type='text/css'>
    <link href='../VendrCSS/Main.css' rel='stylesheet' type='text/css'>
  </head>
  <body>
    <div class="nav-bar">
      <div class="row">
        <div class="double-column">
          <h2 id="vendr">Vendr</h2>
        </div>
        <div class="column">
          <ul>
            <li><a href="../VendrPHP/Home.php">Home</a></li>
            <li><a href="../VendrPHP/History.php">History</a></li>
            <li><a class="active" href="../VendrPHP/Account.php">Account</a></li>
          </ul>
        </div>
      </div>
    </div>
    <div class="row">
      <div class="column">
          <h2 class="title"> Account Information </h2>
          <div class="account-information">
            <label>
              Account Holder
            </label>
            <p>
              <?php echo $nameF[0]; echo $nameL[0]; ?>
            </p>
            <label>
              Email
            </label>
            <p>
              <?php echo $email[0]; ?>
            </p>
            <label>
              UserName
            </label>
            <p>
              <?php echo $_SESSION['username']; ?>
            </p>
            <label>
              Password
            </label>
            <p type='password' id="password">
              <?php echo $userPassword[0]; ?>
            </p>
            
          </div>
          <script>
          //function myFunction() {
           // var x = document.getElementById("password");
            //  if (x.type === "password") {
            //    x.type = "text";
             // } else {
            //    x.type = "password";
            //  }
         // }
</script>
          <!--
          <form action="">
            <input type="submit" id="edit" value="Edit Profile">
          </form>
-->
      </div>
    </div>
  </body>
</html>
