<?php
/*
session_start();
//GLOBAL VARS:
    $servername = "10.200.2.17";
    $usernamedb = "vendr";
    $password = "vendr";
    $dbname = 'vendr';
    $dbport = '3306';

    //grab session username for use in sql query
    $username = $_SESSION['username'];

//Create connection
$conn = new mysqli($servername, $usernamedb, $password, $dbname, $dbport);

//grab the current user id
$sql0="SELECT UserID FROM customer WHERE CustomerUser = '$username'";
$result0=mysqli_query($conn,$sql0);
$loader2 = mysqli_fetch_array($result0);
$userID = $loader2[0];

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

//assign cartID
$sql1 = "SELECT MAX(CartID) FROM cart;";
$result = mysqli_query($conn,$sql1);
$loader = mysqli_fetch_array($result);
$cartID = $loader[0];
$cartID++;

//assign orderID
$sqlFindMaxOrder = "SELECT MAX(OrderID) FROM orders;";
$resultMaxOrder = mysqli_query($conn,$sqlFindMaxOrder);
$loader1 = mysqli_fetch_array($resultMaxOrder);
$orderID = $loader1[0];
$orderID++;

//assign machineID
$machineID = $_COOKIE['machineID'];

//totals
$total = $_COOKIE['total'];
$totalItems = $_COOKIE['totalItems'];

//items
$itemOne = $_COOKIE["itemOne"];
$itemTwo = $_COOKIE["itemTwo"];
$itemThree = $_COOKIE["itemThree"];
$itemFour = $_COOKIE["itemFour"];

//number of items
$numItemOne = $_COOKIE["numItemOne"];
$numItemTwo = $_COOKIE["numItemTwo"];
$numItemThree = $_COOKIE["numItemThree"];
$numItemFour = $_COOKIE["numItemFour"];

//dev tests:
    //echo $machineID;
    //echo $userID;
    //echo $total;
    //echo $totalItems;
    //echo $itemOne;
    //echo $itemTwo;
    //echo $itemThree;
    //echo $itemFour;
    //echo("number:");
    //echo $numItemOne;
    //echo $numItemTwo;
    //echo $numItemThree;
    //echo $numItemFour;
    //echo $orderID;
    //echo $cartID;

if($numItemOne>0){
    $sql2 ="INSERT INTO cart (cartID, UserID, ItemID, 
    CartItemQuanity) VALUES ('$cartID','$userID',
    '$itemOne','$numItemOne')";
    if ($conn->query($sql2) === TRUE) {
        echo "New record created successfully";
    } else {
        echo "Error: " . $sql2 . "<br>" . $conn->error;
    }
}
if($numItemTwo>0){
    $sql3 ="INSERT INTO cart (cartID, UserID, ItemID, 
    CartItemQuanity) VALUES ('$cartID','$userID',
    '$itemTwo','$numItemTwo')";
    
    if ($conn->query($sql3) === TRUE) {
        echo "New record created successfully";
    } else {
        echo "Error: " . $sql3 . "<br>" . $conn->error;
    }
}
if($numItemThree>0){
    $sql4 ="INSERT INTO cart (cartID, UserID, ItemID, 
    CartItemQuanity) VALUES ('$cartID','$userID',
    '$itemThree','$numItemThree')";
    if ($conn->query($sql4) === TRUE) {
        echo "New record created successfully";
    } else {
        echo "Error: " . $sql4 . "<br>" . $conn->error;
    }
}

if($numItemFour>0){
    $sql5 ="INSERT INTO cart (cartID, UserID, ItemID, 
    CartItemQuanity) VALUES ('$cartID','$userID',
    '$itemFour','$numItemFour')";
    if ($conn->query($sql5) === TRUE) {
        //echo "New record created successfully";
    } else {
        echo "Error: " . $sql5 . "<br>" . $conn->error;
    }
}


//generate the random code
function random_verify($limit)
{
    return substr(base_convert(sha1(uniqid(mt_rand())), 16, 36), 0, $limit);
}
$code = random_verify(6);
echo "<script> alert('$code') </script>";


//send information to the orders table. 
if($numItemOne>0){
    $updateOrders ="INSERT INTO orders (OrderID, OrderItemQuanity, TotalPrice, 
        VendingCode, ItemID, MachineID, CartID) VALUES ('$orderID','$numItemOne',
        '$total','$code', '$itemOne', '$machineID', '$cartID')";
    if ($conn->query($updateOrders) === TRUE) {
        echo "New record created successfully";
    } else {
        echo "Error: " . $updateOrders . "<br>" . $conn->error;
    }
}
if($numItemTwo>0){
    $updateOrders ="INSERT INTO orders (OrderID, OrderItemQuanity, TotalPrice, 
        VendingCode, ItemID, MachineID, CartID) VALUES ('$orderID','$numItemTwo',
        '$total','$code', '$itemTwo', '$machineID', '$cartID')";
    if ($conn->query($updateOrders) === TRUE) {
        echo "New record created successfully";
    } else {
        echo "Error: " . $updateOrders . "<br>" . $conn->error;
    }
}
if($numItemThree>0){
    $updateOrders ="INSERT INTO orders (OrderID, OrderItemQuanity, TotalPrice, 
        VendingCode, ItemID, MachineID, CartID) VALUES ('$orderID','$numItemThree',
        '$total','$code', '$itemThree', '$machineID', '$cartID')";
    if ($conn->query($updateOrders) === TRUE) {
        echo "New record created successfully";
    } else {
        echo "Error: " . $updateOrders . "<br>" . $conn->error;
    }
}
if($numItemFour>0){
    $updateOrders ="INSERT INTO orders (OrderID, OrderItemQuanity, TotalPrice, 
        VendingCode, ItemID, MachineID, CartID) VALUES ('$orderID','$numItemFour',
        '$total','$code', '$itemFour', '$machineID', '$cartID')";
    if ($conn->query($updateOrders) === TRUE) {
        echo "New record created successfully";
    } else {
        echo "Error: " . $updateOrders . "<br>" . $conn->error;
    }
}
*/
?>

<p id="testArea"> </P>
Purchase Complete click here to go home. 