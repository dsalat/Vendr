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



?> 

<html id="fullHD">
  <head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href='../VendrCSS/CreateAccount.css' rel='stylesheet' type='text/css'>
  </head>
  <body>
    <h2 id="vendr">Vendr</h2>
    <div id="fullLogin">
      <h3 id="createAcco"> Create Account </h3>
        <div id="loginInfor">
          <form action="Submit.php" Method = "POST">
            <input type="text" id="firstName" name="firstName" placeholder="First Name"><br>
            <input type="text" id="lastName" name="lastName" placeholder="Last Name"><br>
            <input type="text" id="email" name="email" placeholder="Email"><br>
            <input type="text" id="userName" name="userName" placeholder="User Name"><br>
            <input type="text" id="password" name="password" placeholder="Password"><br><br>
            <input type="submit" id="create" value="Create">
          </form>
          <a href="../VendrPHP/Login.php"> Login Here</a>
        </div>
    </div>
  </body>

  

</html>
