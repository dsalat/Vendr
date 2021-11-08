<?php
session_start();
//echo "Connecting?";
$servername = "w2k12-compscidb.academia.sjfc.edu";
$usernamedb = "vendr";
$password = "vendr";
$dbname = 'vendr';
$dbport = '3306';

// Create connection
$conn = new mysqli($servername, $usernamedb, $password, $dbname, $dbport);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
//echo "Connected successfully <br>";

$username=$_POST['userName']; 
$password=$_POST['password'];


$sql="SELECT * FROM customer WHERE CustomerUser='$username' AND CustomerPass='$password'";
$result= mysqli_query($conn,$sql);
$check = mysqli_fetch_array($result);

#echo $check['result'];

if(isset($check)){
    //echo 'Successfully logged in...';
    header("Location: Home.php");
    $_SESSION['username'] = $username;
    $sql1 ="SELECT UserID FROM customer WHERE CustomerUser = '$username'";
    $result1 =  mysqli_query($conn,$sql1);
    while($row = mysqli_fetch_assoc($result1)) {
        $id[] = $row["UserID"];
      }
    $_SESSION['userID'] = $id[0];
}else{
    //echo 'User name and password do not match!!!';
}
?>