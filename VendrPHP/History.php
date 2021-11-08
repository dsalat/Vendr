<?php
  session_start();
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

  $username = $_SESSION['username'];
  

  $sql0="SELECT UserID FROM customer WHERE CustomerUser = '$username'";
  $result0=mysqli_query($conn,$sql0);
  $loader2 = mysqli_fetch_array($result0);
  $userID = $loader2[0];

  $sql1="SELECT * FROM ordershistory WHERE UserID = '$userID'";
  $result0=mysqli_query($conn,$sql1);
  while($row = mysqli_fetch_assoc($result0)) {
    $orderID[] = $row["OrderID"];
  }

  // create sql part for IN condition by imploding comma after each id
  $in = '(' . implode(',', $orderID) .')';


  $sql0 = "SELECT * FROM orders WHERE OrderID IN " . $in;
  $result0=mysqli_query($conn,$sql0);

  while($row = mysqli_fetch_assoc($result0)) {
    $ordersID[] = $row["OrderID"];
    $ordersItemID[] = $row["ItemID"];
    $ordersItemQuantity[] = $row["OrderItemQuanity"];
    $ordersTotalPrice[] = $row["TotalPrice"];
  }


$numberOfOrders = sizeof($orderID);
setcookie("numOrders",$numberOfOrders);





?>

<html id="fullHD">
  <head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href='../VendrCSS/History.css' rel='stylesheet' type='text/css'>
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
            <li><a class="active" href="../VendrPHP/History.php">History</a></li>
            <li><a href="../VendrPHP/Account.php">Account</a></li>
          </ul>
        </div>
      </div>
    </div>
    <div>
      <button id="order0" type="button" class="collapsible"> <?php echo "Order #: " , $orderID[$numberOfOrders-1]; ?> 
      </button>
      <div class="content">
        <div class="cart-column">
          <div id="item0" class="cart-module-row">
            <div class="column">
              <?php
                $temp = $numberOfOrders-1;
                $hi = "SELECT * FROM orders WHERE OrderID = '$orderID[$temp]'" ;
                $result01=mysqli_query($conn,$hi);
                
                while($row = mysqli_fetch_assoc($result01)) {
                  $SPECordersItemID[] = $row["ItemID"];
                  $SPECordersItemQuantity[] = $row["OrderItemQuanity"];
                  $SPECordersTotalPrice[] = $row["TotalPrice"];
                }
                

                $itemsOrdered = sizeof($SPECordersItemID);

                $temp2 = $itemsOrdered;

                $int = '(' . implode(',', $SPECordersItemID) .')';
                
                $sql2 = "SELECT * FROM item WHERE item.ItemID IN " .$int;
                $result= mysqli_query($conn,$sql2);

                while($row = mysqli_fetch_assoc($result)) {
                  $check[] = $row["ItemName"];
                }
                
                
              ?>
              <div class="cart-item-row">
                <p class="cart-item-name">
                  <?php echo $check[0]; 
                    if ($check[0] == ""){
                      echo '
                      <script>
                        document.getElementsByClassName("cart-item-row")[0].style.display = "none";
                      </script>
                    ';
                    }
                  ?>
                </p>
                <p class="cart-item-quantity">
                  x<?php echo $SPECordersItemQuantity[0]; ?>
                </p>
                <p class="cart-item-price">
                  $
                </p>
              </div>
              <div class="cart-item-row">
                <p class="cart-item-name">
                  <?php echo $check[1]; 
                    if ($check[1] == ""){
                      echo '
                      <script>
                        document.getElementsByClassName("cart-item-row")[1].style.display = "none";
                      </script>
                    ';
                    }
                  ?>
                </p>
                <p class="cart-item-quantity">
                  x<?php echo $SPECordersItemQuantity[1]; ?>
                </p>
                <p class="cart-item-price">
                  $
                </p>
              </div>
              <div class="cart-item-row">
                <p class="cart-item-name">
                  <?php echo $check[2]; 
                      if ($check[2] == ""){
                        echo '
                        <script>
                          document.getElementsByClassName("cart-item-row")[2].style.display = "none";
                        </script>
                      ';
                      }
                    ?>
                </p>
                <p class="cart-item-quantity">
                  x<?php echo $SPECordersItemQuantity[2]; ?>
                </p>
                <p class="cart-item-price">
                  $
                </p>
              </div>
              <div class="cart-item-row">
                <p class="cart-item-name">
                  <?php echo $check[3]; 
                      if ($check[3] == ""){
                        echo '
                        <script>
                          document.getElementsByClassName("cart-item-row")[3].style.display = "none";
                        </script>
                      ';
                      }
                    ?>
                </p>
                <p class="cart-item-quantity">
                  x<?php echo $SPECordersItemQuantity[3]; ?>
                </p>
                <p class="cart-item-price">
                  $
                </p>
              </div>
            </div>
          </div>
          <div class="total-row">
            <p class="total">
              Total
            </p>
            <p class="total-price">
              $<?php echo $SPECordersTotalPrice[0]; ?>
            </p>
          </div>
        </div>
    </div>
    <div>
      <button id="order1" type="button" class="collapsible"><?php echo "Order #: " , $orderID[$numberOfOrders-2]; ?></button>
      <div class="content">
        <div class="cart-column">
          <div class="cart-module-row">
            <div class="column">
              <?php
                  $temp = $numberOfOrders-2;
                 
                  $hi = "SELECT * FROM orders WHERE OrderID = '$orderID[$temp]'" ;
                  $result01=mysqli_query($conn,$hi);


                  
                  
                  while($row = mysqli_fetch_assoc($result01)) {
                    
                    $SPECordersItemID2[] = $row["ItemID"];
                    $SPECordersItemQuantity2[] = $row["OrderItemQuanity"];
                    $SPECordersTotalPrice2[] = $row["TotalPrice"];
                  }

                 

                  $itemsOrdered = sizeof($SPECordersItemID2);
                  

                  if($SPECordersItemID2[0] == ''){
                    $sql3 = "SELECT item.ItemName FROM item WHERE item.ItemID = '-1'";
                    $result3= mysqli_query($conn,$sql3);
                    $check3 = mysqli_fetch_array($result3);
                  } else{
                    $sql3 = "SELECT item.ItemName FROM item WHERE item.ItemID = '$SPECordersItemID2[0]'";
                    $result3= mysqli_query($conn,$sql3);
                    $check3 = mysqli_fetch_array($result3);
                  }

                  if($SPECordersItemID2[1] == ''){
                    $sql4 = "SELECT item.ItemName FROM item WHERE item.ItemID = '-1'";
                    $result4= mysqli_query($conn,$sql4);
                    $check4 = mysqli_fetch_array($result4);
                  } else{
                    $sql4 = "SELECT item.ItemName FROM item WHERE item.ItemID = '$SPECordersItemID2[1]'";
                  $result4= mysqli_query($conn,$sql4);
                  $check4 = mysqli_fetch_array($result4);
                  }

                  if($SPECordersItemID2[2] == ''){
                    $sql5 = "SELECT item.ItemName FROM item WHERE item.ItemID = '-1'";
                    $result5= mysqli_query($conn,$sql5);
                    $check5 = mysqli_fetch_array($result5);
                  } else{
                    $sql5 = "SELECT item.ItemName FROM item WHERE item.ItemID = '$SPECordersItemID2[2]'";
                    $result5= mysqli_query($conn,$sql5);
                    $check5 = mysqli_fetch_array($result5);
                  }

                  if($SPECordersItemID2[3] == ''){
                    $sql6 = "SELECT item.ItemName FROM item WHERE item.ItemID = '-1'";
                    $result6= mysqli_query($conn,$sql6);
                    $check6 = mysqli_fetch_array($result6); 
                  } else{
                    $sql6 = "SELECT item.ItemName FROM item WHERE item.ItemID = '$SPECordersItemID2[3]'";
                    $result6= mysqli_query($conn,$sql6);
                    $check6 = mysqli_fetch_array($result6); 
                  }
 
                  
                  
              ?>
              <div class="cart-item-row">
                <p class="cart-item-name">
                <?php echo $check3[0]; 
                    if ($check3[0] == ""){
                      echo '
                      <script>
                        document.getElementsByClassName("cart-item-row")[4].style.display = "none";
                      </script>
                    ';
                    }
                ?>
                </p>
                <p class="cart-item-quantity">
                  x<?php echo $SPECordersItemQuantity2[0]; ?>
                </p>
                <p class="cart-item-price">
                  $4
                </p>
              </div>
              <div class="cart-item-row">
                <p class="cart-item-name">
                  <?php echo $check4[0]; 
                      if ($check4[0] == ""){
                        echo '
                        <script>
                          document.getElementsByClassName("cart-item-row")[5].style.display = "none";
                        </script>
                      ';
                      }
                  ?>
                </p>
                <p class="cart-item-quantity">
                  x<?php echo $SPECordersItemQuantity2[1]; ?>
                </p>
                <p class="cart-item-price">
                  $4
                </p>
              </div>
              <div class="cart-item-row">
                <p class="cart-item-name">
                  <?php echo $check5[0]; 
                        if ($check5[0] == ""){
                          echo '
                          <script>
                            document.getElementsByClassName("cart-item-row")[6].style.display = "none";
                          </script>
                        ';
                        }
                  ?>
                </p>
                <p class="cart-item-quantity">
                  x<?php echo $SPECordersItemQuantity2[2]; ?>
                </p>
                <p class="cart-item-price">
                  $4
                </p>
              </div>
              <div class="cart-item-row">
                <p class="cart-item-name">
                  <?php echo $check6[0]; 
                        if ($check6[0] == ""){
                          echo '
                          <script>
                            document.getElementsByClassName("cart-item-row")[7].style.display = "none";
                          </script>
                        ';
                        }
                  ?>
                </p>
                <p class="cart-item-quantity">
                  x<?php echo $SPECordersItemQuantity2[3]; ?>
                </p>
                <p class="cart-item-price">
                  $4
                </p>
              </div>
            </div>
          </div>
          <div class="total-row">
            <p class="total">
              Total
            </p>
            <p class="total-price">
              $<?php echo $SPECordersTotalPrice2[0]; ?>
            </p>
          </div>
        </div>
    </div>
  </body>
  <script src="../VendrJS/History.js"></script>
  <script>
    //document.getElementById("order0").style.display="none";
    var numberOfOrders = getCookie("numOrders");
    console.log(numberOfOrders);

    //do some math in the if statments
    if(numberOfOrders==0){
      document.getElementById("order0").style.display = "none";
      document.getElementById("order1").style.display = "none";
      document.getElementById("order2").style.display = "none";
      document.getElementById("order3").style.display = "none";
      document.getElementById("order4").style.display = "none";
      document.getElementById("order5").style.display = "none";
      document.getElementById("order6").style.display = "none";
      document.getElementById("order7").style.display = "none";
      document.getElementById("order8").style.display = "none";
      document.getElementById("order9").style.display = "none";
    }else if(numberOfOrders==1){
      document.getElementById("order1").style.display = "none";
      document.getElementById("order2").style.display = "none";
      document.getElementById("order3").style.display = "none";
      document.getElementById("order4").style.display = "none";
      document.getElementById("order5").style.display = "none";
      document.getElementById("order6").style.display = "none";
      document.getElementById("order7").style.display = "none";
      document.getElementById("order8").style.display = "none";
      document.getElementById("order9").style.display = "none";
    }else if(numberOfOrders==2){
      document.getElementById("order2").style.display = "none";
      document.getElementById("order3").style.display = "none";
      document.getElementById("order4").style.display = "none";
      document.getElementById("order5").style.display = "none";
      document.getElementById("order6").style.display = "none";
      document.getElementById("order7").style.display = "none";
      document.getElementById("order8").style.display = "none";
      document.getElementById("order9").style.display = "none";
    }else if(numberOfOrders==3){
      document.getElementById("order3").style.display = "none";
      document.getElementById("order4").style.display = "none";
      document.getElementById("order5").style.display = "none";
      document.getElementById("order6").style.display = "none";
      document.getElementById("order7").style.display = "none";
      document.getElementById("order8").style.display = "none";
      document.getElementById("order9").style.display = "none";
    }else if(numberOfOrders==4){
      document.getElementById("order4").style.display = "none";
      document.getElementById("order5").style.display = "none";
      document.getElementById("order6").style.display = "none";
      document.getElementById("order7").style.display = "none";
      document.getElementById("order8").style.display = "none";
      document.getElementById("order9").style.display = "none";
    }else if(numberOfOrders==5){
      document.getElementById("order5").style.display = "none";
      document.getElementById("order6").style.display = "none";
      document.getElementById("order7").style.display = "none";
      document.getElementById("order8").style.display = "none";
      document.getElementById("order9").style.display = "none";
    }else if(numberOfOrders==6){
      document.getElementById("order6").style.display = "none";
      document.getElementById("order7").style.display = "none";
      document.getElementById("order8").style.display = "none";
      document.getElementById("order9").style.display = "none";
    }else if(numberOfOrders==7){
      document.getElementById("order7").style.display = "none";
      document.getElementById("order8").style.display = "none";
      document.getElementById("order9").style.display = "none";
    }else if(numberOfOrders==8){
      document.getElementById("order8").style.display = "none";
      document.getElementById("order9").style.display = "none";
    }else if(numberOfOrders==9){
      document.getElementById("order9").style.display = "none";
    }else{
      console.log( "you fucked this up bro");
      document.getElementById("order0").style.display = "none";
    }
    //find the cookie
    function getCookie(cname) {
      var name = cname + "=";
      var decodedCookie = decodeURIComponent(document.cookie);
      var ca = decodedCookie.split(';');
      for(var i = 0; i <ca.length; i++) {
        var c = ca[i];
        while (c.charAt(0) == ' ') {
          c = c.substring(1);
        }
        if (c.indexOf(name) == 0) {
          return c.substring(name.length, c.length);
        }
      }
      return "";
    }
  </script>
</html>