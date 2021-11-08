<?php
//echo "Connecting?";
$servername = "10.200.2.17";
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
//echo "Connected successfully";

  $sql ="INSERT INTO customer (CustomerFName, CustomerLName, CustomerEmail, CustomerUser, CustomerPass) VALUES ('$_POST[firstName]','$_POST[lastName]','$_POST[email]','$_POST[userName]','$_POST[password]')";
  if (mysqli_query($conn,$sql)) {
      echo "User created successfully";
      header("Location: Login.php");
    } else {
      echo "<br>";
      die('Error: ' . mysqli_error());
    }
?>
